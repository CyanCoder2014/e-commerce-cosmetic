<?php

namespace App;


class Agency extends CRUD
{
    protected static $layout='admin';
    protected static $name = 'نمایندگی';
    protected $fillable=['id','name','title','city_id','province_id','address'
        ,'map','tell','fax','email','site','description'];
    static $tablefields = [
        [
            'name' => 'id',
            'slug' => 'شماره',
            'orderable' => true,
            'searchable' => true,
        ],
        [
            'name' => 'name',
            'slug' => 'نام',
            'orderable' => true,
            'searchable' => true,
        ],
        [
            'name' => 'tell',
            'slug' => 'تلفن',
            'orderable' => true,
            'searchable' => true,
        ],
        [
            'name' => 'city.name',
            'slug' => 'شهر',
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
            'name'=> 'name',
            'type' => 'text',
            'slug' => 'نام',
            'validation' => 'required',
        ],
        [
            'name'=> 'title',
            'type' => 'text',
            'slug' => 'عنوان',
            'validation' => 'required'
        ],
        [
            'name'=> 'first_page',
            'type' => 'checkbox',
            'slug' => 'نمایش در صفحه اول',
        ],
        [
            'name'=> 'province_id',
            'type' => 'select',
            'slug' => 'استان',
            'values' => 'App\Province,id,name',
            'validation' => 'required',
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
            'name'=> 'address',
            'type' => 'textarea',
            'slug' => 'آدرس',
            'validation' => '',
        ],
        [
            'name'=> 'map',
            'type' => 'textarea',
            'slug' => 'نقشه',
            'description' => 'نقشه',
            'validation' => '',
        ],
        [
            'name'=> 'tell',
            'type' => 'tel',
            'slug' => 'تلفن',
            'validation' => 'required',
        ],
//        [
//            'name'=> 'mobile',
//            'type' => 'tel',
//            'slug' => 'موبایل',
//            'validation' => '',
//        ],
        [
            'name'=> 'fax',
            'type' => 'tel',
            'slug' => 'فکس',
            'validation' => '',
        ],
        [
            'name'=> 'email',
            'type' => 'email',
            'slug' => 'ایمیل',
            'validation' => '',
        ],
        [
            'name'=> 'site',
            'type' => 'text',
            'slug' => 'سایت',
            'validation' => '',
        ],
        [
            'name'=> 'description',
            'type' => 'ckeditor',
            'slug' => 'توضیحات',
            'validation' => '',
        ],

    ];
    static $method_access=[
        'index' => true,
        'create' => true,
        'store' => true,
        'edit' => true,
        'update' => true,
        'destroy' => true,
        'show' => true,
        'condition' => true,
    ];
    static $url_prefix='agency';
    static $middleware=['auth'];

    public function city(){
        return $this->belongsTo('App\City');
    }
    public function province(){
        return $this->belongsTo('App\Province');
    }
    public function link(){
        return route('agency.search',['agency_id'=>$this->id,'city_id'=> $this->city_id,'province_id'=> $this->province_id]);
    }

}
