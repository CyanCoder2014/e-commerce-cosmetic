@extends('layouts.userProfile_layout')

@section('name')
لیست ادرس های شما@endsection
@section('header')
    <meta name="description"
          content="لیست ادرس های شما">
@endsection


@section('profile_content')


    <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-sm-12">
            <h1 class="title">لیست ادرس های شما</h1>
            <a href="{{ route('address.add') }}" class="btn btn-primary">افزودن</a>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <td class="text-center">شهر</td>
                        <td class="text-center">کدپستی</td>
                        <td class="text-center">آدرس</td>
                        <td class="text-center">اعمال</td>


                    </tr>
                    </thead>
                    <tbody>

                    @foreach($addresses as $address)
                        <tr>
                            <td class="text-center">{{ $address->city->name }}</td>
                            <td class="text-right">
                               {{ $address->postcode }}
                            </td>
                            <td class="text-center">{{ $address->address }}</td>
                            <td class="text-center">
                                <a href="{{ route('address.edit',['id' => $address->id]) }}" class="btn btn-warning">ویرایش</a>
                                <a href="{{ route('address.delete',['id' => $address->id]) }}" class="btn btn-danger">حذف</a>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
        <!--Middle Part End -->
    </div>


@endsection
