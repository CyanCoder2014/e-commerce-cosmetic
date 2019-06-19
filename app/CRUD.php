<?php
/// v2.0 ////
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Morilog\Jalali\CalendarUtils;
use Morilog\Jalali\Jalalian;

abstract class CRUD extends Model
{
    public function __construct(array $attributes = [])
    {
        if (!empty(static::casting()))
            $this->casts = static::casting();
        parent::__construct($attributes);
        $this->attributes = $this->defaults();
//        dd($this);
    }

    protected static $name;
    protected static $layout;
    protected static $tablefields;
    protected static $crud;
    protected static $method_access;
    protected static $url_prefix;
    protected static $middleware;
    public function image(){
        if(isset($this->image) && is_string($this->image))
            return asset($this->image)  ;
        else
            return null;
    }
    public function intro(){
        if (!isset($this->description))
            return '';
        $desc = strip_tags($this->description);
        if(strlen($desc) <= 60)
            return $desc;
        $limit=60;
        for (;;$limit++)
            if ($desc[$limit] == ' ')
                break;
        return str_limit($desc,$limit);
    }
//    public function link(){
//        return route('event.frontshow',['id' => $this->id]);
//    }

    private static function implicit_ACL($method):bool{
        if(!isset(static::$method_access[$method]) || !static::$method_access[$method])
            return false;
//        return true;
        return static::ACL($method);

    }
    public static function ACL($method):bool{
        return true;
    }

    /**
     * @return mixed
     */
    public static function getName()
    {
        return static::$name;
    }



    public static function getform(){
        $cruds = static::$crud;
        foreach ($cruds as $key => $crud)
        {
            if(isset($crud['values']) && is_string($crud['values']))
            {
                $values = [ ];
                if(!isset($crud['condition'])){
                    $model= explode(',',$crud['values']);
                    $model_name =$model[0];
                    $model_key =$model[1];
                    $model_value =$model[2];
                    foreach ($model_name::all() as $record)
                        $values[$record->$model_key]=$record->$model_value;
                }
                $cruds[$key]['values'] =$values;
            }
        }

        return $cruds;


    }
    public static function getvalidation(){
        $validation=[];
        foreach (static::$crud as $crud)
            if (isset($crud['validation']))
                $validation[$crud['name']]=$crud['validation'];
        return $validation;
    }
    public static function route($name,$id=null){
        switch ($name){
            case 'index': return route(static::$url_prefix.'.index'); break;
            case 'create': return route(static::$url_prefix.'.create'); break;
            case 'store': return route(static::$url_prefix.'.store'); break;
            case 'edit': if (isset($id)) return route(static::$url_prefix.'.edit',['id'=>$id]); break;
            case 'update': if (isset($id)) return route(static::$url_prefix.'.update',['id'=>$id]); break;
            case 'destroy': if (isset($id)) return route(static::$url_prefix.'.destroy',['id'=>$id]); break;
            case 'data': return route(static::$url_prefix.'.getdata'); break;
            case 'condition': return route(static::$url_prefix.'.condition',['field'=>$id]); break;
        }
    }
    public static function Route_list(){
//        dd(static::class);
        return Route::group([],function (){
            if (static::implicit_ACL('index'))

                Route::get(static::$url_prefix,'CRUDController@index')->defaults('class',static::class)->name(static::$url_prefix.'.index')->middleware(static::$middleware);
            if (static::implicit_ACL('create'))
                Route::get(static::$url_prefix.'/create','CRUDController@create')->defaults('class',static::class)->name(static::$url_prefix.'.create')->middleware(static::$middleware);
            if (static::implicit_ACL('store'))
                Route::post(static::$url_prefix.'/store','CRUDController@store')->defaults('class',static::class)->name(static::$url_prefix.'.store')->middleware(static::$middleware);
            if (static::implicit_ACL('edit'))
                Route::get(static::$url_prefix.'/edit/{id}','CRUDController@edit')->defaults('class',static::class)->name(static::$url_prefix.'.edit')->middleware(static::$middleware);
            if (static::implicit_ACL('update'))
                Route::put(static::$url_prefix.'/edit/{id}','CRUDController@update')->defaults('class',static::class)->name(static::$url_prefix.'.update')->middleware(static::$middleware);
            if (static::implicit_ACL('destroy'))
                Route::delete(static::$url_prefix.'/destroy/{id}','CRUDController@destroy')->defaults('class',static::class)->name(static::$url_prefix.'.destroy')->middleware(static::$middleware);
            if (static::implicit_ACL('index'))
                Route::get(static::$url_prefix.'/getdata','CRUDController@getdata')->defaults('class',static::class)->name(static::$url_prefix.'.getdata')->middleware(static::$middleware);
            if (static::implicit_ACL('condition'))
                Route::get(static::$url_prefix.'/condition/{field}','CRUDController@condition')->defaults('class',static::class)->name(static::$url_prefix.'.condition')->middleware(static::$middleware);


        });
    }

    public static function getdatatable(){
        return static::$tablefields;
    }
    public static function laratablesCustomAction($record)
    {
        return view('crud.action', ['id' => $record->id,'class' => static::class])->render();
    }

    public static function casting(){
        $cast=[];
        foreach (static::$crud as $crud)
            if(in_array($crud['type'],['tags']) || (isset($crud['addable']) && $crud['addable']))
                $cast[$crud['name']] = 'array';
        return $cast;
    }
    public  function defaults(){
        $methods=[];
        foreach (static::$crud as $crud)
            if(isset($crud['default']) && $crud['default'])
//                dd(static::{'default_'.$crud['name']}());
                $methods[$crud['name']] = $this->{'default_'.$crud['name']}();
        return $methods;
    }


    public function getAttribute($key)
    {

//        return 1;
        if(parent::getAttribute($key)){
            $key1 = array_search($key, array_column(static::$crud, 'name'));
//            if(
//                strpos($key,'_id') &&  // if it has "_name" at end of string
//                in_array(trim($key,'_id'),array_column(static::$crud, 'name')) // without "_name" is in $crud
//            ){
//                $key1 = array_search(trim($key,'_id'), array_column(static::$crud, 'name'));
//
//                switch (static::$crud[$key1]['type']){
//                    case 'select':
//                        if(is_array(static::$crud[$key1]['values']))
//                            return static::$crud[$key1]['values'][parent::getAttribute($key)];
//                        else{
//                            $model= explode(',',static::$crud[$key1]['values']);
//                            $model_name =$model[0];
//                            $model_key =$model[1];
//                            $model_value =$model[2];
//                            return $model_name::where($model_key,parent::getAttribute($key))->first();
//                        }
//
//                }
//
//
//            }
            switch (static::$crud[$key1]['type']){
                case 'datetime': return Jalalian::forge(parent::getAttribute($key))->format('Y/m/d   H:i:s');break;
                case 'date': return CalendarUtils::strftime('Y/m/d', strtotime(parent::getAttribute($key)));break;
//                case 'select':
//                    if(is_array(static::$crud[$key1]['values']))
//                        return static::$crud[$key1]['values'][parent::getAttribute($key)];
//                    else{
//                        $model= explode(',',static::$crud[$key1]['values']['values']);
//                        $model_name =$model[0];
//                        $model_key =$model[1];
//                        $model_value =$model[2];
//                        return $model_name::where($model_key,parent::getAttribute($key))->first()->{$model_value};
//                    }

                default:return parent::getAttribute($key);
            }

        }
    }
    public function setAttribute($key, $value){
        $key1 = array_search($key, array_column(static::$crud, 'name'));
        switch (static::$crud[$key1]['type']){
            case 'datetime':$value = Jalalian::toGeorgian($value); break;
            case 'date':$value = Jalalian::toGeorgianDate($value); break;

        }
        parent::setAttribute($key,$value);



    }
    public static function findField($name){
        $key = array_search($name, array_column(static::$crud, 'name'));
        if ($key)
            return static::$crud[$key];
        return null;

    }
    public function __call($method, $parameters)
    {
        if(in_array($method,array_column(static::$crud, 'name'))){
            $key1 = array_search($method, array_column(static::$crud, 'name'));

            switch (static::$crud[$key1]['type']){
                case 'select':
                    if(is_array(static::$crud[$key1]['values']))
                        return static::$crud[$key1]['values'][$this->attributes[$method]];
                    else{
                        $model= explode(',',static::$crud[$key1]['values']);
                        $model_name =$model[0];
                        $model_key =$model[1];
                        $model_value =$model[2];
                        return $model_name::where($model_key,$this->attributes[$method])->first()->{$model_value};
                    }

            }

        }
        return parent::__call($method, $parameters); // TODO: Change the autogenerated stub
    }

    public static function condition($field,Request $request){
        $values = [];
        if(in_array($field,array_column(static::$crud, 'name'))) {
            $key1 = array_search($field, array_column(static::$crud, 'name'));
            if (isset(static::$crud[$key1]['condition']) &&
                isset(static::$crud[$key1]['values']) && is_string(static::$crud[$key1]['values'])) {
                $model = explode(',', static::$crud[$key1]['values']);
                $table = explode(',', static::$crud[$key1]['condition']);
                $table_column = $table[1];
                $condition_field = $table[0];
                $model_name = $model[0];
                $model_key = $model[1];
                $model_value = $model[2];
                foreach ($model_name::where($table_column, $request->$condition_field)->get() as $record)
                    $values[$record->$model_key] = $record->$model_value;
            }
        }
        return $values;
    }
    public static function getLayout(){
        return 'layouts.'.static::$layout;
    }
}
