<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Nicolaslopezj\Searchable\SearchableTrait;

class Product extends CRUD
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
            'name' => 10,
        ],
        'joins' => [
        ],
    ];
    protected $table='product';
    protected static $layout='admin';
    protected static $name = 'محصولات';
//    protected $table='events_cat';
    protected $fillable=['user_id','name','brand_id','collection_id','reference','size'
        ,'usage','motor','frame','waterproof','kind','wristlet','lock','glass','face',
        'accessories','tools','parts','keeping','complexity','sex','material','price','description','image','active'];
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
            'name' => 'brand.name',
            'slug' => 'برند',
            'orderable' => true,
            'searchable' => true,
        ],
        [
            'name' => 'collection.name',
            'slug' => 'کالکشن',
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
            'slug' => 'نام کاربر سازنده',
            'default' => true,
        ],
        [
            'name'=> 'name',
            'type' => 'text',
            'slug' => 'نام',
            'validation' => 'required',
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
            'validation' => 'required',
            'condition' => 'brand_id,brand_id'
        ],
        [
            'name'=> 'reference',
            'type' => 'text',
            'slug' => 'رفرنس',
            'validation' => '',
        ],
        [
            'name'=> 'size',
            'type' => 'number',
            'slug' => 'سایز قاب',
            'validation' => '',
        ],
        [
            'name'=> 'usage',
            'type' => 'select',
            'slug' => 'کاربرد',
            'values' => ['مچی','جیبی','رومیزی'],
            'validation' => 'required',
        ],
        [
            'name'=> 'motor',
            'type' => 'select',
            'slug' => 'موتور',
            'values' => ['اتوماتیک','کوکی','کوارتز'],
            'validation' => 'required',
        ],
        [
            'name'=> 'frame',
            'type' => 'text',
            'slug' => 'جنس قاب',
            'validation' => '',
        ],
        [
            'name'=> 'kind',
            'type' => 'text',
            'slug' => 'جنس بزل',
            'validation' => '',
        ],
        [
            'name'=> 'wristlet',
            'type' => 'text',
            'slug' => 'جنس بند',
            'validation' => '',
        ],
        [
            'name'=> 'lock',
            'type' => 'text',
            'slug' => 'جنس قفل',
            'validation' => '',
        ],
        [
            'name'=> 'glass',
            'type' => 'text',
            'slug' => 'نوع شیشه',
            'validation' => '',
        ],
        [
            'name'=> 'face',
            'type' => 'text',
            'slug' => 'نوع صفحه',
            'validation' => '',
        ],
        [
            'name'=> 'accessories',
            'type' => 'select',
            'slug' => 'لوازم جانبی',
            'values' => ['ندارد','دارد '],
            'validation' => '',
        ],
        [
            'name'=> 'tools',
            'type' => 'text',
            'slug' => 'ابزار',
            'validation' => '',
            'showIF' => 'accessories,1'
        ],
        [
            'name'=> 'parts',
            'type' => 'text',
            'slug' => 'قطعات',
            'validation' => '',
            'showIF' => 'accessories,1'

        ],
        [
            'name'=> 'keeping',
            'type' => 'text',
            'slug' => 'نگهداری',
            'validation' => '',
            'showIF' => 'accessories,1'
        ],
        [
            'name'=> 'complexity',
            'type' => 'tags',
            'slug' => 'پیچیدگی',
            'values' => ['آنالوگ','تقویم','کرنوگراف','توربیلیون'],
            'validation' => '',

        ],
        [
            'name'=> 'sex',
            'type' => 'select',
            'slug' => 'جنسیت',
            'values' => ['زنانه','مردانه','یونیسکس'],
            'validation' => 'required',
        ],
        [
            'name'=> 'material',
            'type' => 'tags',
            'slug' => 'متریال به کار رفته',
            'values' => ['طلا','استیل','سرامیک','تیتانیوم','سنگ قیمتی','پلاتین','چرم'],
            'validation' => '',
        ],
        [
            'name'=> 'image',
            'type' => 'image',
            'addable' => true,
            'slug' => 'عکس',
            'validation' => '',
        ],
        [
            'name'=> 'description',
            'type' => 'ckeditor',
            'slug' => 'توضیحات',
            'validation' => 'required',
        ],
        [
            'name'=> 'price',
            'type' => 'number',
            'slug' => 'قیمت',
            'validation' => 'required',
        ],
        [
            'name'=> 'waterproof',
            'type' => 'select',
            'slug' => 'واترپروف',
            'values' => ['دارد','ندارد'],
            'validation' => 'required',
        ]
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
    static $url_prefix='admin/products';
    static $middleware=['auth'];

    public function brand(){
        return $this->belongsTo('Modules\ShopModule\Products\Brand');
    }
    public function collection(){
        return $this->belongsTo('Modules\ShopModule\Products\Collection');
    }
    public function city(){
        return $this->belongsTo('App\City');
    }
    public function province(){
        return $this->belongsTo('App\Province');
    }
    protected function default_user_id(){
        return Auth::id();
    }
//    public static function laratablesQueryConditions($query)
//    {
//        return $query->where('user_id', Auth::id());
//    }


    public function link(){
        return '#';
    }
}
