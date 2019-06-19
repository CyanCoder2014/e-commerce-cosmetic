<?php

namespace App;


use Illuminate\Support\Facades\Auth;
use Nicolaslopezj\Searchable\SearchableTrait;

class Advertising extends CRUD
{
    use SearchableTrait;
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'title' => 10,
            'description' => 2,
        ],
        'joins' => [
        ],
    ];
    public $timestamps=false;
    protected static $layout='layout';
    protected static $name = 'مدیریت آگهی ها';
//    protected $table='events_cat';
    protected $fillable=['user_id','title','province_id','city_id','brand_id','collection_id','product_id','reference','serial'
        ,'status','description','price','guarantee','box','tell','email','images','active'];
    static $tablefields = [
        [
            'name' => 'id',
            'slug' => 'شماره',
            'orderable' => true,
            'searchable' => true,
        ],
        [
            'name' => 'title',
            'slug' => 'نام',
            'orderable' => true,
            'searchable' => true,
        ],
        [
            'name' => 'product.name',
            'slug' => 'محصول',
            'orderable' => true,
            'searchable' => true,
        ],
        [
            'name' => 'price',
            'slug' => 'قیمت',
            'orderable' => false,
            'searchable' => false,
        ],
        [
            'name' => 'action',
            'slug' => 'اعمال',
            'orderable' => false,
            'searchable' => false,
        ]

    ];
    static $crud =[
        [
            'name'=> 'user_id',
            'type' => 'null',
            'slug' => 'نام کاربری',
            'default' => true,
        ],
        [
            'name'=> 'title',
            'type' => 'text',
            'slug' => 'نام',
            'validation' => 'required',
        ],
        [
            'name'=> 'province_id',
            'type' => 'select',
            'slug' => 'استان',
            'values' => 'App\Province,id,name',
            'validation' => 'required'
        ],
        [
            'name'=> 'city_id',
            'type' => 'select',
            'slug' => 'شهر',
            'values' => 'App\City,id,name',
            'validation' => 'required',
            'condition' => 'province_id,province_id'
        ],
        [
            'name'=> 'brand_id',
            'type' => 'select',
            'slug' => 'برند',
            'values' => 'Modules\ShopModule\Products\Brand,id,name',
            'validation' => 'required'
        ],
        [
            'name'=> 'collection_id',
            'type' => 'select',
            'slug' => 'کالکشن',
            'values' => 'Modules\ShopModule\Products\Collection,id,name',
            'validation' => '',
            'condition' => 'brand_id,brand_id'
        ],
        [
            'name'=> 'product_id',
            'type' => 'select',
            'slug' => 'محصول',
            'values' => 'Modules\ShopModule\Products\ProductModel,id,name',
            'validation' => '',
            'condition' => 'collection_id,collection_id'
        ],
        [
            'name'=> 'reference',
            'type' => 'text',
            'slug' => 'رفرنس',
            'validation' => 'required',
        ],
        [
            'name'=> 'serial',
            'type' => 'text',
            'slug' => 'سریال',
            'validation' => 'required',
        ],
        [
            'name'=> 'status',
            'type' => 'select',
            'slug' => 'وضعیت',
            'values' => ['نو','در حد نو','کارکرده'],
            'validation' => 'required',
        ],
        [
            'name'=> 'description',
            'type' => 'ckeditor',
            'slug' => 'توضیحات',
            'validation' => 'required',
        ],
        [
            'name'=> 'price',
            'type' => 'text',
            'slug' => 'قیمت',
            'validation' => 'required',
        ],
        [
            'name'=> 'guarantee',
            'type' => 'select',
            'slug' => 'گارانتی',
            'values' => ['دارد','ندارد'],
            'validation' => 'required',
        ],
        [
            'name'=> 'box',
            'type' => 'select',
            'slug' => 'جعبه',
            'values' => ['دارد','ندارد'],
            'validation' => 'required',
        ],
        [
            'name'=> 'tell',
            'type' => 'text',
            'slug' => 'تلفن',
            'validation' => 'required',
        ],
        [
            'name'=> 'email',
            'type' => 'text',
            'slug' => 'ایمیل',
            'validation' => '',
        ],
        [
            'name'=> 'images',
            'type' => 'file',
            'addable' => true,
            'addnum' => 4,
            'slug' => 'عکس ها',
            'validation' => '',
        ],
    ];
    static $method_access=[
        'index' => true,
        'create' => false,
        'store' => false,
        'edit' => true,
        'update' => true,
        'destroy' => true,
        'show' => false,
        'condition' => true,
    ];
    static $url_prefix='advertising';
    static $middleware=['auth'];

    public function profile(){
        return $this->belongsTo(UserProfile::class,'user_id','users_id');
    }
    public function brand(){
        return $this->belongsTo('Modules\ShopModule\Products\Brand');
    }
    public function collection(){
        return $this->belongsTo('Modules\ShopModule\Products\Collection');
    }
    public function product(){
        return $this->belongsTo('Modules\ShopModule\Products\ProductModel');
    }
    public function city(){
        return $this->belongsTo('App\City');
    }
    public function province(){
        return $this->belongsTo('App\Province');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
    protected function default_user_id(){
        return Auth::id();
    }
    public static function laratablesQueryConditions($query)
    {
        return $query->where('user_id', Auth::id());
    }
    public function link(){
        return route('advertise.show',['url' => '25'.'-'.$this->id.'-'.$this->title]);
    }
    public function active(){
        switch ($this->active){
            case 0:return 'نامشخص';
            case 1:return 'رد شده';
            case 2:return 'تایید شده';
        }
    }
    public static function activate(){
        return static::where('active',2);
    }

}
