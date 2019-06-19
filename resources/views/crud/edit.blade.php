@extends($class::getLayout())
<?php $fileCount=0 ?>
@section('script')
    <link rel="stylesheet" href="{{asset('assets/js/vendor/touchspin/jquery.bootstrap-touchspin.min.css')}}">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

@endsection
@section('end_script')
    <script src="{{asset('/vendor/laravel-filemanager/js/lfm.js')}}"></script>
    <script>
        $('.lfm').click(function(){
            $('.lfm').filemanager('image');
        });
        $('.filelfm').filemanager('file');
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script>
        $('#shipping_list').select2({
            dropdownAutoWidth : true,
            placeholder: "سیستم های حمل و نقل را انتخاب کنید ...",
            minimumInputLength: 2,
            ajax: {
                url: '{{ route('shipping.find') }}',
                dataType: 'json',
                data: function (params) {
                    return {
                        q: $.trim(params.term)
                    };
                },
                processResults: function (data) {
                    return {
                        results: data
                    };
                },
                cache: true
            }
        });
    </script>
@endsection
@section('content')

    <!-- ====================================================
            ================= CONTENT ===============================
            ===================================================== -->
    <section id="content" style="text-align: right">

        <div class="page page-shop-single-product">

            <div class="pageheader">

                <h2>ویرایش<span></span></h2>

                <div class="page-bar">

{{--                    <ul class="page-breadcrumb">--}}
{{--                        <li>--}}
{{--                            <a href="{{ url('/admin') }}"><i class="fa fa-home"></i> پنل مدیریت</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="{{ url('/admin') }}">مدیریت</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="">ویرایش {{ $class::getName() }} </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}

                </div>

            </div>

            <div class="container">

                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif

                <form id="productForm" class="form-horizontal ng-pristine ng-valid" role="form" method="post" action="{{ $class::route('update',$record->id) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('put') }}
                    <div class="row">
                        @foreach($class::getform() as $form)
                            @if(isset($form['addable']) && $form['addable'])
                                @include('crud.widgets.addable.'.$form['type'],['fiels' => $form,'value' => $record->{$form['name']},'class' =>$class ])
                            @else
                                @include('crud.widgets.'.$form['type'],['fiels' => $form,'value' => $record->{$form['name']},'class' =>$class ])
                            @endif
                        @endforeach
                    </div>
                    <button type="submit" class="btm btn-success">ثبت</button>

                </form>


            </div>

        </div>

    </section>
    <!--/ CONTENT -->






@endsection