<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class UserProfile extends Model
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
            'company' => 10,
        ],
        'joins' => [
        ],
    ];


    protected $table='users_profile';

    protected $fillable = [
        'users_id', 'national_code', 'gender', 'birth', 'country', 'image', 'image_b', 'intro', 'education', 'job', 'tell', 'mobile', 'site', 'introduce',
    ];


    public $timestamps = false;


    public function user()
    {
        return $this->belongsTo('App\User' , 'users_id');
    }
    public function country()
    {
        return $this->belongsTo('App\City' );
    }
    public function link(){
        return route('profileseller',['url' => '25'.'-'.$this->id.'-'.$this->user->name]);
    }
    public function type(){
        switch ($this->type){
            case 0: return 'فروشگاه';
            case 1: return 'تعمیرگاه ساعت';
            case 2: return 'شرکت وارد کننده';
        }
    }
    public function type_sub(){
        switch ($this->type_sub){
            case 1: return 'نمایندگی';
            case 2: return 'مستقل';
        }
    }
    public function person(){
        switch ($this->person){
            case 1: return 'حقیقی';
            case 2: return 'حقوقی';
        }
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
    public function brands(){
        return $this->hasMany(UserProfileBrands::class,'profile_id');
    }
}
