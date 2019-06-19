@extends('layouts.layout')

<?php $fileCount=0 ?>
@section('script')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="{{asset('/vendor/laravel-filemanager/js/lfm.js')}}"></script>
    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
    <script>
$('.lfm').filemanager('file');
    </script>
@endsection
@section('content')
    <section id="content"  >

    <div class="page page-dashboard mt-5">



        <!-- cards row -->

        <div class="inner" style="min-height: 565px;">
            <div class="row">
                <section id="lts_sec " class="right" style="margin: -20px auto;">
                    <div class="container ">
                        <div class="row ">
                            <div class="col-lg-12 col-md-12  col-sm-12 col-xs12 ">
                                <div class="title_sec">
                                    {{--@ can('add product')--}}
                                    <a href="{{route('advertising.addpage')}}" style="float: left" class="btn btn-primary"><i class="fa fa-plus"></i> افزودن آگهی </a>
                                    {{--@ endcan--}}
                                    <h3>مدیریت  آگهی ها </h3>
                                </div>

                                <br>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover table-custom"
                                           id="dataTables-example">
                                        <thead>
                                        <tr>
                                            <th style="text-align: center">&nbsp;شماره</th>
                                            <th style="text-align: center">&nbsp;عنوان آگهی</th>
                                            <th style="text-align: center">&nbsp;تاریخ انتشار</th>
                                            <th style="text-align: center">  قیمت</th>
                                            <th style="text-align: center"> ویرایش</th>
                                            <th style="text-align: center">حذف</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($products as $product)
                                            <tr class="odd gradeX">
                                                <th style="text-align: center">{{ $product->id }}</th>
                                                <th style="text-align: center"> &nbsp;
                                                    <ul>
                                                        <li>
                                                            <a target="_blank" href="{{ '/shop/show/'.'321'.'-'.$product->id.'-'.str_replace(" ","-",$product->name) }}">{{$product->name}} </a>
                                                        </li>
                                                    </ul>
                                                </th>
                                                <th style="text-align: center; font-weight: 100">{!!  to_jalali_date($product->created_at) !!}</th>
                                                <th style="text-align: center; font-weight: 100">{{ $product->price }}</th>
                                                <th style="text-align: center; font-weight: 100">
{{--                                                    @can('edit product')--}}
                                                    <a href="{{route('advertising.edit', $product->id)}}" class="btn btn-warning "><i class="fa fa-edit"></i></a>
                                                    {{--@endcan--}}
                                                </th>
                                                <th style="text-align: center; font-weight: 100">
{{--                                                    @can('delete product')--}}
                                                    <a onclick="return confirm('آیا از حذف این آگهی مطمئن هستید؟');"  href="{{ route('advertising.delete',['id' =>$product->id]) }}" class="btn btn-danger"><i class="fa fa-remove"></i></a>
                                                    {{--@endcan--}}
                                                </th>



                                            </tr>





                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {{$products->links()}}
                        <br><br>
                    </div>

                </section>
            </div>
        </div>
    </div>












</section>
@endsection