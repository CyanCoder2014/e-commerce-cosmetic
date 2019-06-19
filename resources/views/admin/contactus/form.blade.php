@extends('layouts.layout')

@section('content')

    <form name="_token" method="POST" enctype="multipart/form-data"
          action="<?= route('send.contactus'); ?>">
        <input type="hidden" name="_token" value="{{ csrf_token() }} ">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1"> </label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                           placeholder="@lang('home.Email')">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputPassword1"></label>
                    <input class="form-control" name="name" id="exampleInputPassword1"
                           placeholder="@lang('home.Name')">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1"> </label>
                    <input type="number" class="form-control" name="tell" id="exampleInputEmail1"
                           placeholder="@lang('home.Tell')">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputPassword1"></label>
                    <input class="form-control" name="subject" id="exampleInputPassword1"
                           placeholder="@lang('home.Subject')">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1"></label>
            <textarea class="form-control" name="message" rows="3" placeholder="@lang('home.Message')"></textarea>
        </div>

        <button type="submit" name="_token" value="{{ csrf_token() }}" class="btn tf-btn btn-default"
                style="margin-right: -30px" onsubmit="return alert('ok')">@lang('home.Send')
        </button>
    </form>
@endsection