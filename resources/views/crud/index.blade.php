@extends($class::getLayout())
@section('header')
    <style>
        table.dataTable{
            width: 100%!important;
        }
        .btn-danger {
            color: #000!important;
            background-color: #d5d8db!important;
            border-color: #d5d8db!important;
        }
        .btn-danger:hover {
            color: #fff!important;
            background-color: #ff6a00!important;
            border-color: #ff6a00!important;
        }
        .btn-warning:hover {
            color: #fff!important;
            background-color: #ff6a00!important;
            border-color: #ff6a00!important;
        }
        .btn-warning {
            color: #000!important;
            background-color: #fff0e6!important;
            border-color: #fff0e6!important;
        }
        td,th{
            text-align: center!important;
        }
        .dataTables_wrapper .dataTables_filter input {
            margin-right: 0.5em;
            min-width: 200px;
            border-radius: 5px;
        }
    </style>
@endsection
@section('content')
    <section id="content">

        <div class="page page-dashboard">

            <div class="pageheader">



                <div class="page-bar">

{{--                    <ul class="page-breadcrumb">--}}
{{--                        <li>--}}
{{--                            <a href="index.html"><i class="fa fa-home"></i> پنل مدیریت </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="">{{ $class::getName() }}</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}


                </div>

            </div>

            <!-- cards row -->
            <div class="container" >

                @if(session()->has('message'))
                    <br>
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif

                <br>
                <div class="inner" style="min-height: 565px;">
                    <div class="row">

                        <section id="lts_sec " class="right w-100">

                            <div class="container ">
                                <div class="row ">
                                    <div class="col my-3"><h2 class="text-right"><span>{{ $class::getName() }}</span></h2></div>
                                    <div class="col-lg-12 col-md-12  col-sm-12 col-xs12 ">
                                        <div class="title_sec mb-5 text-right">

                                            <a href="{{ $class::route('create') }}" class="btn bg-gold text-white">افزودن</a>
                                        </div>



                                        <div class="panel-group" id="accordion">
                                            @include('crud.datatable',['id' => 'event-table','model' => $class])

                                        </div>

                                    </div>
                                </div>


                            </div>


                        </section>
                    </div>
                </div>
            </div>


            <div class="modal fade large-modal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"></h4>
                        </div>
                        <div class="modal-body">
                            <p></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="c-btn large red-bg" data-dismiss="modal">بستن</button>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </section>


@endsection