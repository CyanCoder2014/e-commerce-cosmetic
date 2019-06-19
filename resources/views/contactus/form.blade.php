@extends('layouts.layout')

@section('content')




    <section class="hero container-full">


        <article class="pricing__table" style="width: 90%;margin:0 auto;direction: rtl">



            <div class="content_fullwidth less2" style="margin-top:70px;direction: rtl">
                <div class="">
                    <div>
                        <div>
                            <p>{{$contact->data['description']}}</p>
                        </div>
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <div><span class="ml-3">ادرس:</span>{{$contact->data['address_']}}</div>
                                <div></div>
                            </li>
                            <li class="mb-2">
                                <div><span class="ml-3">تلفن:</span>{{$contact->data['phone']}}</div>
                                <div></div>
                            </li>
                            <li class="mb-2">
                                <div><span class="ml-3">همراه:</span>{{$contact->data['mobile']}}</div>
                                <div></div>
                            </li>
                        </ul>
                    </div>
                    <form name="_token" method="POST" enctype="multipart/form-data"
                          action="{{ route('send.contactus') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }} ">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> </label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                           placeholder="ایمیل">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1"></label>
                                    <input class="form-control" name="name" id="exampleInputPassword1"
                                           placeholder="نام">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> </label>
                                    <input type="number" class="form-control" name="tell" id="exampleInputEmail1"
                                           placeholder="تلفن">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1"></label>
                                    <input class="form-control" name="subject" id="exampleInputPassword1"
                                           placeholder="عنوان">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"></label>
                            <textarea class="form-control" name="message" rows="3" placeholder="پیام"></textarea>
                        </div>

                        <button type="submit" name="_token" value="{{ csrf_token() }}" class="btn tf-btn bg-gold text-white mb-5" onsubmit="return alert('ok')">ارسال
                        </button>
                    </form>
                </div>
            </div>
        </article>

    </section>



@endsection