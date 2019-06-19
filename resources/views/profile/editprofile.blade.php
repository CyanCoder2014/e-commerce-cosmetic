@extends('layouts.userProfile_layout')


@section('profile_content')
    <div class="position-relative overflow-h" style="max-height: 300px">
        <img src="/new/img/bg.png" class="w-100"/>
        <div class="ladiesbtn"><a href="#" class="sweep-to-left0 sweep-to-left-border-gold shadow d-block mt-5 " style="color: #0b0b0b;border: 0 "></a></div>
    </div>
    <form action="{{ route('profile.edit') }}" method="post">
        {{csrf_field()}}
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name" class="col-md-4 right12">نام و نام خانوادگی </label>

            <div class="col-md-6 right12">
                <div class="input-group">
                    <div class="input-group-addon icon-user"></div>
                    <input id="name" type="text" class="form-control"  placeholder="نام" name="name" value="{{ $user->name }}" required autofocus>
                </div>
                @if ($errors->has('name'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
            <label for="name" class="col-md-4 right12">نام کاربری</label>

            <div class="col-md-6 right12">
                <div class="input-group">
                    <div class="input-group-addon icon-user"></div>
                    <input id="name" type="text"  placeholder="نام کاربری" class="form-control" name="username" value="{{ $user->username }}" required autofocus>
                </div>
                @if ($errors->has('username'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
            <label for="name" class="col-md-4 right12">تلفن همراه</label>

            <div class="col-md-6 right12">
                <div class="input-group">
                    <div class="input-group-addon icon-user"></div>
                    <input id="name" type="text"  placeholder="تلفن همراه" class="form-control" name="mobile" value="{{ $user->mobile }}" required autofocus>
                </div>
                @if ($errors->has('mobile'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                @endif
            </div>
        </div>


        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-md-4 right12">ایمیل</label>

            <div class="col-md-6 right12">
                <div class="input-group">
                    <div class="input-group-addon icon-mail"></div>
                    <input id="email" type="email" placeholder="ایمیل" class="form-control" name="email" value="{{ $user->email }}" required>
                </div>
                @if ($errors->has('email'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif
            </div>
        </div>




        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="col-md-4 right12">پسورد</label>

            <div class="col-md-6 right12">
                <div class="input-group">
                    <div class="input-group-addon icon-lock"></div>
                    <input id="password" type="password" class="form-control" name="password">
                </div>
                @if ($errors->has('password'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <label for="password-confirm" class="col-md-4 right12">تکرار پسورد </label>

            <div class="col-md-6 right12">
                <div class="input-group">
                    <div class="input-group-addon icon-lock"></div>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                </div>
            </div>
        </div>
        <br>
        <div class="form-group" >
            <div class="col-md-6 col-md-offset-3">
                <button type="submit" class="btn btn-primary">
                   ویرایش
                </button>
            </div>
        </div>
    </form>
@endsection