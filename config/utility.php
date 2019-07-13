<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | This option controls the default authentication "guard" and password
    | reset options for your application. You may change these defaults
    | as required, but they're a perfect start for most applications.
    |
    */

    'names' => [
//        'introduction' => 'معرفی صفحه اول',
//        'banners' => 'بنر ها و عکس چهار لینک اصلی',
//        'sliderFirst' => 'اسلاید شو اول',
        'setting' => 'تنظیمات سایت',
        'productLinks' => 'لینک های محصولات منو',
        'productSliderMenu' => 'اسلایدر محصولات منو',
        'sliderFirst' => 'اسلاید شو صفحه اول',
        'aboutUs' => 'درباره ما',
        'sliderAboutUs' => 'اسلاید شو شرکت نمایندگی درباره ما',
        'sliderAboutUs2' => 'اسلاید شو شرکت اصلی درباره ما',
        //       'slider2' => 'اسلاید دوم',
        'contact' => 'تماس با ما',
        //       'gallery' => 'گالري عکس',
//        'banner2' => 'بنر دوم',
//        'footer_1' => 'فوتر اول',
//        'footer_2' => 'فوتر دوم',
//        'footer_3' => 'فوتر سوم',
//        'footer_4' => 'فوتر چهارم',
//        'factor' => 'تنظیمات فاکتور',


    ],
    'types' => ['setting', 'contact', 'sliderFirst', 'sliderAboutUs', 'sliderAboutUs2', 'aboutUs', 'productLinks', 'productSliderMenu'],
    'forms' => [             //  name       type            label
        'setting' => [
//                        'title_fa' => ['type'=>'text','label'=>'نام سایت فارسی','class'=>null,'style'=>null,'values' => array()],
            'title' => ['type' => 'text', 'label' => 'نام سایت', 'class' => null, 'style' => null, 'values' => array()],
//                        'name1_fa' => ['type'=>'text','label'=>'قسمت اول نام شرکت فارسی','class'=>null,'style'=>null,'values' => array()],
//                        'name2_fa' => ['type'=>'text','label'=>'قسمت دوم نام شرکت فارسی','class'=>null,'style'=>null,'values' => array()],
//                        'name1' => ['type'=>'text','label'=>'قسمت اول نام شرکت انگی','class'=>null,'style'=>null,'values' => array()],
//                        'name2' => ['type'=>'text','label'=>'قسمت دوم نام شرکت فارسی','class'=>null,'style'=>null,'values' => array()],
            'image_white' => ['type' => 'file', 'label' => 'لوگو سفید شرکت', 'class' => null, 'style' => null, 'values' => array()],
            'image_black' => ['type' => 'file', 'label' => 'لوگو مشکی شرکت', 'class' => null, 'style' => null, 'values' => array()],
//                        'banner' => ['type'=>'file','label'=>'بنر بالای صفحه','class'=>null,'style'=>null,'values' => array()],
//                        'banner1' => ['type'=>'file','label'=>'بنر 1','class'=>null,'style'=>null,'values' => array()],
//                        'banner2' => ['type'=>'file','label'=>'بنر 2','class'=>null,'style'=>null,'values' => array()],

            'about_us' => ['type' => 'text', 'label' => 'توضیحات درباره ما', 'class' => null, 'style' => null, 'values' => array()],
            'about_us_image' => ['type' => 'file', 'label' => 'عکس درباره ما', 'class' => null, 'style' => null, 'values' => array()],
            'catalog_right_title' => ['type' => 'text', 'label' => 'عنوان عکس کاتالوگ سمت راست', 'class' => null, 'style' => null, 'values' => array()],
            'catalog_right_image' => ['type' => 'file', 'label' => 'عکس کاتالوگ سمت راست', 'class' => null, 'style' => null, 'values' => array()],
            'catalog_left_top_title' => ['type' => 'text', 'label' => 'عنوان عکس کاتالوگ سمت چپ بالا', 'class' => null, 'style' => null, 'values' => array()],
            'catalog_left_top_image' => ['type' => 'file', 'label' => 'عکس کاتالوگ سمت چپ بالا', 'class' => null, 'style' => null, 'values' => array()],
            'catalog_left_bottom_title' => ['type' => 'text', 'label' => 'عنوان عکس کاتالوگ سمت چپ پایین', 'class' => null, 'style' => null, 'values' => array()],
            'catalog_left_bottom_image' => ['type' => 'file', 'label' => 'عکس کاتالوگ سمت چپ پایین', 'class' => null, 'style' => null, 'values' => array()],
            'grow_image1' => ['type' => 'file', 'label' => 'عکس بزرگ شونده 1', 'class' => null, 'style' => null, 'values' => array()],
            'grow_image1_text' => ['type' => 'text', 'label' => 'عنوان عکس بزرگ شونده 1', 'class' => null, 'style' => null, 'values' => array()],
            'grow_image2' => ['type' => 'file', 'label' => 'عکس بزرگ شونده 2', 'class' => null, 'style' => null, 'values' => array()],
            'grow_image2_text' => ['type' => 'text', 'label' => 'عنوان عکس بزرگ شونده 2', 'class' => null, 'style' => null, 'values' => array()],
            'grow_image3' => ['type' => 'file', 'label' => 'عکس بزرگ شونده 3', 'class' => null, 'style' => null, 'values' => array()],
            'grow_image3_text' => ['type' => 'text', 'label' => 'عنوان عکس بزرگ شونده 3', 'class' => null, 'style' => null, 'values' => array()],
            'grow_image4' => ['type' => 'file', 'label' => 'عکس بزرگ شونده 4', 'class' => null, 'style' => null, 'values' => array()],
            'grow_image4_text' => ['type' => 'text', 'label' => 'عنوان عکس بزرگ شونده 4', 'class' => null, 'style' => null, 'values' => array()],
//                        'about_us_fa' => ['type'=>'text','label'=>'درباره ما فوتر فارسی','class'=>null,'style'=>null,'values' => array()],
            'about_us_title' => ['type' => 'text', 'label' => 'عنوان درباره ما ( شرکت نمایندگی )', 'class' => null, 'style' => null, 'values' => array()],
        ],

        'sliderFirst' => [
//                        'title_fa' => ['type'=>'text','label'=>'عنوان فارسی','class'=>null,'style'=>null,'values' => array()],
            'title' => ['type' => 'text', 'label' => 'عنوان ', 'class' => null, 'style' => null, 'values' => array()],
            'image' => ['type' => 'file', 'label' => 'عکس', 'class' => null, 'style' => null, 'values' => array()],
            'video' => ['type' => 'file', 'label' => 'فیلم', 'class' => null, 'style' => null, 'values' => array()],
            'iframe' => ['type' => 'text', 'label' => 'لینک یوتیوب', 'class' => null, 'style' => null, 'values' => array()],
//                        'description_fa' => ['type'=>'textarea','label'=>'توضیحات ','class'=>null,'style'=>null,'values' => array()],
            'description' => ['type' => 'textarea', 'label' => 'توضیحات ', 'class' => null, 'style' => null, 'values' => array()],
//                        'link_fa' => ['type'=>'text','label'=>'لینک فارسی','class'=>null,'style'=>null,'values' => array()],
            'link' => ['type' => 'text', 'label' => 'لینک ', 'class' => null, 'style' => null, 'values' => array()]
        ],
        'productLinks' => [
            'name' => ['type' => 'text', 'label' => 'عنوان ', 'class' => null, 'style' => null, 'values' => array()],
            'link' => ['type' => 'text', 'label' => 'لینک ', 'class' => null, 'style' => null, 'values' => array()]
        ],
        'sliderAboutUs' => [
            'image' => ['type' => 'file', 'label' => 'عکس', 'class' => null, 'style' => null, 'values' => array()],
        ],
        'aboutUs' => [
            'about_us_image_bg' => ['type' => 'file', 'label' => 'عکس بکگراند', 'class' => null, 'style' => null, 'values' => array()],
            'title1' => ['type' => 'text', 'label' => 'عنوان ( شرکت اصلی )', 'class' => null, 'style' => null, 'values' => array()],
            'logo1' => ['type' => 'file', 'label' => 'لوگو ( شرکت اصلی )', 'class' => null, 'style' => null, 'values' => array()],
            'image1' => ['type' => 'file', 'label' => 'تصویر ( شرکت اصلی )', 'class' => null, 'style' => null, 'values' => array()],
            'intro1' => ['type' => 'text', 'label' => 'توضیحات ( شرکت اصلی )', 'class' => null, 'style' => null, 'values' => array()],
            'title2' => ['type' => 'text', 'label' => 'توضیحات ( شرکت نمایندگی )', 'class' => null, 'style' => null, 'values' => array()],
            'logo2' => ['type' => 'file', 'label' => 'لوگو ( شرکت نمایندگی )', 'class' => null, 'style' => null, 'values' => array()],
            'image2' => ['type' => 'file', 'label' => 'عکس ( شرکت نمایندگی )', 'class' => null, 'style' => null, 'values' => array()],
            'intro2' => ['type' => 'text', 'label' => 'توضیحات ( شرکت نمایندگی )', 'class' => null, 'style' => null, 'values' => array()],
        ],
        'sliderAboutUs2' => [
            'title' => ['type' => 'text', 'label' => 'عنوان ', 'class' => null, 'style' => null, 'values' => array()],
            'year' => ['type' => 'text', 'label' => 'سال ', 'class' => null, 'style' => null, 'values' => array()],
            'image' => ['type' => 'file', 'label' => 'عکس', 'class' => null, 'style' => null, 'values' => array()],
            'description' => ['type' => 'textarea', 'label' => 'توضیحات ', 'class' => null, 'style' => null, 'values' => array()],
        ],
        'productSliderMenu' => [
            'name' => ['type' => 'text', 'label' => 'عنوان ', 'class' => null, 'style' => null, 'values' => array()],
            'image' => ['type' => 'file', 'label' => 'عکس', 'class' => null, 'style' => null, 'values' => array()],
            'description' => ['type' => 'textarea', 'label' => 'توضیحات ', 'class' => null, 'style' => null, 'values' => array()],
        ],

        /*'footer_title' => [
            'title_1' => ['type' => 'text', 'label' => 'عنوان اولی', 'class' => null, 'style' => null, 'values' => array()],
            'title_2' => ['type' => 'text', 'label' => 'عنوان دومی', 'class' => null, 'style' => null, 'values' => array()],
            'title_3' => ['type' => 'text', 'label' => 'عنوان سومی', 'class' => null, 'style' => null, 'values' => array()],
            'title_4' => ['type' => 'text', 'label' => 'عنوان چهارمی', 'class' => null, 'style' => null, 'values' => array()],
        ],*/
        /*'footer_1' => ['title' => ['type' => 'text', 'label' => 'عنوان', 'class' => null, 'style' => null, 'values' => array()],
//                        'title_fa' => ['type'=>'text','label'=>'عنوان فارسی','class'=>null,'style'=>null,'values' => array()],
//                          'image' => ['type'=>'file','label'=>'عکس','class'=>null,'style'=>null,'values' => array()],
//                        'description' => ['type'=>'text','label'=>'توضیحات انگلیسی','class'=>null,'style'=>null,'values' => array()],
//                        'description_fa' => ['type'=>'text','label'=>'توضیحات فارسی','class'=>null,'style'=>null,'values' => array()],
            'link' => ['type' => 'text', 'label' => 'لینک', 'class' => null, 'style' => null, 'values' => array()],
//                        'link_fa' => ['type'=>'text','label'=>'لینک فارسی','class'=>null,'style'=>null,'values' => array()]
        ],
        'footer_2' => ['title' => ['type' => 'text', 'label' => 'عنوان', 'class' => null, 'style' => null, 'values' => array()],
//                        'title_fa' => ['type'=>'text','label'=>'عنوان فارسی','class'=>null,'style'=>null,'values' => array()],
//                          'image' => ['type'=>'file','label'=>'عکس','class'=>null,'style'=>null,'values' => array()],
//                        'description' => ['type'=>'text','label'=>'توضیحات انگلیسی','class'=>null,'style'=>null,'values' => array()],
//                        'description_fa' => ['type'=>'text','label'=>'توضیحات فارسی','class'=>null,'style'=>null,'values' => array()],
            'link' => ['type' => 'text', 'label' => 'لینک', 'class' => null, 'style' => null, 'values' => array()],
//                        'link_fa' => ['type'=>'text','label'=>'لینک فارسی','class'=>null,'style'=>null,'values' => array()]
        ],
        'footer_3' => ['title' => ['type' => 'text', 'label' => 'عنوان', 'class' => null, 'style' => null, 'values' => array()],
//                        'title_fa' => ['type'=>'text','label'=>'عنوان فارسی','class'=>null,'style'=>null,'values' => array()],
//                          'image' => ['type'=>'file','label'=>'عکس','class'=>null,'style'=>null,'values' => array()],
//                        'description' => ['type'=>'text','label'=>'توضیحات انگلیسی','class'=>null,'style'=>null,'values' => array()],
//                        'description_fa' => ['type'=>'text','label'=>'توضیحات فارسی','class'=>null,'style'=>null,'values' => array()],
            'link' => ['type' => 'text', 'label' => 'لینک', 'class' => null, 'style' => null, 'values' => array()],
//                        'link_fa' => ['type'=>'text','label'=>'لینک فارسی','class'=>null,'style'=>null,'values' => array()]
        ],
        'footer_4' => ['title' => ['type' => 'text', 'label' => 'عنوان', 'class' => null, 'style' => null, 'values' => array()],
//                        'title_fa' => ['type'=>'text','label'=>'عنوان فارسی','class'=>null,'style'=>null,'values' => array()],
//                          'image' => ['type'=>'file','label'=>'عکس','class'=>null,'style'=>null,'values' => array()],
//                        'description' => ['type'=>'text','label'=>'توضیحات انگلیسی','class'=>null,'style'=>null,'values' => array()],
//                        'description_fa' => ['type'=>'text','label'=>'توضیحات فارسی','class'=>null,'style'=>null,'values' => array()],
            'link' => ['type' => 'text', 'label' => 'لینک', 'class' => null, 'style' => null, 'values' => array()],
//                        'link_fa' => ['type'=>'text','label'=>'لینک فارسی','class'=>null,'style'=>null,'values' => array()]
        ],*/
//        'customers' => ['name' => ['type'=>'text','label'=>'نام انگلیسی','class'=>null,'style'=>null,'values' => array()],
//                        'name_fa' => ['type'=>'text','label'=>'نام فارسی','class'=>null,'style'=>null,'values' => array()],
//                        'c_name' => ['type'=>'text','label'=>'نام شرکت انگلیسی','class'=>null,'style'=>null,'values' => array()],
//                        'c_name_fa' => ['type'=>'text','label'=>'نام شرکت فارسی','class'=>null,'style'=>null,'values' => array()],
//                        'image' => ['type'=>'file','label'=>'عکس','class'=>null,'style'=>null,'values' => array()],
//                        'description' => ['type'=>'text','label'=>'توضیحات انگلیسی','class'=>null,'style'=>null,'values' => array()],
//                        'description_fa' => ['type'=>'text','label'=>'توضیحات فارسی','class'=>null,'style'=>null,'values' => array()],
//        ],
        'contact' => [
            'email' => ['type' => 'text', 'label' => 'پست الکترونیک', 'class' => null, 'style' => null, 'values' => array()],
            'phone' => ['type' => 'text', 'label' => 'شماره تلفن', 'class' => null, 'style' => null, 'values' => array()],
            'mobile' => ['type' => 'text', 'label' => 'شماره همراه', 'class' => null, 'style' => null, 'values' => array()],
            'address_' => ['type' => 'text', 'label' => 'ادرس', 'class' => null, 'style' => null, 'values' => array()],
            'description' => ['type' => 'text', 'label' => 'توضیحات', 'class' => null, 'style' => null, 'values' => array()],
            'telegram_link' => ['type' => 'text', 'label' => 'لینک تلگرام', 'class' => null, 'style' => null, 'values' => array()],
            'twitter_link' => ['type' => 'text', 'label' => 'لینک توئیتر', 'class' => null, 'style' => null, 'values' => array()],
            'linkedin_link' => ['type' => 'text', 'label' => 'لینک لینکیداین', 'class' => null, 'style' => null, 'values' => array()],
            'instagram_link' => ['type' => 'text', 'label' => 'لینک اینستاگرام', 'class' => null, 'style' => null, 'values' => array()],
            'facebook_link' => ['type' => 'text', 'label' => 'لینک اینستاگرام', 'class' => null, 'style' => null, 'values' => array()],
        ],
//        'skill' => [    'title' => ['type'=>'text','label'=>'عنوان انگلیسی','class'=>null,'style'=>null,'values' => array()],
//                        'title_fa' => ['type'=>'text','label'=>'عنوان فارسی','class'=>null,'style'=>null,'values' => array()],
//                        'number' => ['type'=>'text','label'=>'تعداد','class'=>null,'style'=>null,'values' => array()]
//        ]

    ],
    'addable' => [
        'sliderFirst' => true,
        'productLinks' => true,
        'productSliderMenu' => true,
        'aboutUs' => true,
        'setting' => true,
        'contact' => true,
        'sliderAboutUs' => true,
        'sliderAboutUs2' => true,

    ]


];
