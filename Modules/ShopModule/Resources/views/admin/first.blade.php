@extends('layouts.admin')

@section('content')



    <div class="main-content-area">
        <div class="row" style="margin-top: 50px; min-height: 560px">


            <div class="col-md-3 col-sm-6">
                <div class="widget white with-padding">
                    <div class="service">
                        <span><i class="ti-briefcase"></i></span>
                        <h3>   مدیریت  کالکشن ها</h3>
                        <p> </p>
                        <a href="<?= Url('/admin/data'); ?>" title="" class="c-btn medium blue-bg">مدیریت اطلاعات </a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="widget white with-padding">
                    <div class="service">
                        <span><i class="ti-briefcase"></i></span>
                        <h3>   مدیریت  خریداران</h3>
                        <p> </p>
                        <a  href="#" title="" class="c-btn medium ">مدیریت اطلاعات </a>
                    </div>
                </div>
            </div>


            <div class="col-md-3 col-sm-6">
                <div class="widget white with-padding">
                    <div class="service">
                        <span><i class="ti-briefcase"></i></span>
                        <h3>   مدیریت  فروشندگان</h3>
                        <p> </p>
                        <a href="#" title="" class="c-btn medium ">مدیریت اطلاعات </a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="widget white with-padding">
                    <div class="service">
                        <span><i class="ti-briefcase"></i></span>
                        <h3>   مدیریت  پیمانکاران</h3>
                        <p> </p>
                        <a href="#" title="" class="c-btn medium ">مدیریت اطلاعات </a>
                    </div>
                </div>
            </div>

            @if(Auth::check())
                @if(Auth::id() == '1')



                    <div class="col-md-3 col-sm-6">
                        <div class="widget white with-padding">
                            <div class="service">
                                <span><i class="ti-briefcase"></i></span>
                                <h3>      مدیریت محصولات</h3>
                                <p> </p>
                                <a href="#" title="" class="c-btn medium ">مدیریت اطلاعات </a>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-3 col-sm-6">
                        <div class="widget white with-padding">
                            <div class="service">
                                <span><i class="ti-briefcase"></i></span>
                                <h3>      مدیریت درخواست ها</h3>
                                <p> </p>
                                <a  href="#" title="" class="c-btn medium ">مدیریت اطلاعات </a>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-3 col-sm-6">
                        <div class="widget white with-padding">
                            <div class="service">
                                <span><i class="ti-briefcase"></i></span>
                                <h3>      مدیریت مطالب</h3>
                                <p> </p>
                                <a href="<?= Url('/admin/content'); ?>" title="" class="c-btn medium blue-bg">مدیریت اطلاعات </a>
                            </div>
                        </div>
                    </div>



                    <div class="col-md-3 col-sm-6">
                        <div class="widget white with-padding">
                            <div class="service">
                                <span><i class="ti-briefcase"></i></span>
                                <h3>      مدیریت دسته بندی ها</h3>
                                <p> </p>
                                <a href="<?= Url('/admin/list/3'); ?>" title="" class="c-btn medium blue-bg">مدیریت اطلاعات </a>
                            </div>
                        </div>
                    </div>
                @endif
            @endif







        </div>
    </div>



@endsection