<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()['cache']->forget('spatie.permission.cache');

        Permission::create(['name' => 'add manager','label'=> 'افزودن مدیر سایت']);
        Permission::create(['name' => 'edit manager','label'=> 'ویرایش مدیر سایت']);
        Permission::create(['name' => 'delete manager','label'=> 'حذف مدیر سایت']);
        //user
        Permission::create(['name' => 'add user','label'=> 'افزودن کاربر']);
        Permission::create(['name' => 'edit user','label'=> 'ویرایش کاربر']);
        Permission::create(['name' => 'delete user','label'=> 'حذف کاربر']);
        //Role
        Permission::create(['name' => 'add role','label'=> 'افزودن نقش']);
        Permission::create(['name' => 'edit role','label'=> 'ویرایش نقش']);
        Permission::create(['name' => 'delete role','label'=> 'حذف نقش']);
        // product
        Permission::create(['name' => 'add product','label'=> 'افزودن محصول']);
        Permission::create(['name' => 'edit product','label'=> 'ویرایش محصول']);
        Permission::create(['name' => 'delete product','label'=> 'حذف محصول']);
        Permission::create(['name' => 'add pcat','label'=> 'افزودن دسته بندی محصول']);
        Permission::create(['name' => 'edit pcat','label'=> 'ویرایش دسته بندی محصول']);
        Permission::create(['name' => 'delete pcat','label'=> 'حذف دسته بندی محصول']);
        Permission::create(['name' => 'reply pcomment','label'=> 'پاسخ نظرات محصول']);
        Permission::create(['name' => 'apply pcomment','label'=> 'تایید نظرات محصول']);
        Permission::create(['name' => 'delete pcomment','label'=> 'حذف نظرات محصول']);
        Permission::create(['name' => 'add pshipping','label'=> 'افزودن سیستم حمل و نقل']);
        Permission::create(['name' => 'edit pshipping','label'=> 'ویرایش سیستم حمل و نقل']);
        Permission::create(['name' => 'delete pshipping','label'=> 'حذف سیستم حمل و نقل']);
        Permission::create(['name' => 'add provider','label'=> 'افزودن کالکشن  محصولات']);
        Permission::create(['name' => 'edit provider','label'=> 'ویرایش کالکشن  محصولات']);
        Permission::create(['name' => 'delete provider','label'=> 'حذف کالکشن  محصولات']);
        Permission::create(['name' => 'add brand','label'=> 'افزودن برند محصولات']);
        Permission::create(['name' => 'edit brand','label'=> 'ویرایش برند محصولات']);
        Permission::create(['name' => 'delete brand','label'=> 'حذف برند محصولات']);

        // content
        Permission::create(['name' => 'add content','label'=> 'افزودن مطلب']);
        Permission::create(['name' => 'edit content','label'=> 'ویرایش مطلب']);
        Permission::create(['name' => 'delete content','label'=> 'حذف مطلب']);
        Permission::create(['name' => 'add ccat','label'=> 'افزودن دسته بندی مطلب']);
        Permission::create(['name' => 'edit ccat','label'=> 'ویرایش دسته بندی مطلب']);
        Permission::create(['name' => 'delete ccat','label'=> 'حذف دسته بندی مطلب']);
        Permission::create(['name' => 'reply ccomment','label'=> 'پاسخ نظرات مطلب']);
        Permission::create(['name' => 'apply ccomment','label'=> 'تایید نظرات مطلب']);
        Permission::create(['name' => 'delete ccomment','label'=> 'حذف نظرات مطلب']);
        // order
        Permission::create(['name' => 'order','label'=> 'سفارشات']);
        // invoice
        Permission::create(['name' => 'invoice','label'=> 'فاکتور']);
        Permission::create(['name' => 'edit invoice','label'=> 'ویرایش فاکتور']);
        // newsletter
        Permission::create(['name' => 'newsletter','label'=> 'خبرنامه']);
        // Setting
        Permission::create(['name' => 'setting','label'=> 'تنظیمات']);
        //contact us
        Permission::create(['name' => 'reply contactus','label'=> 'پاسخ درخواست تماس با ما']);
        Permission::create(['name' => 'delete contactus','label'=> 'حذف درخواست تماس با ما']);
        $role = \Spatie\Permission\Models\Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());
        \App\User::findOrFail(1)->assignRole('super-admin');

//        $role = \Spatie\Permission\Models\Role::findByName('super-admin');
//        $role->givePermissionTo(Permission::all());
    }
}
