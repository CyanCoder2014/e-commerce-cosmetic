@extends('layouts.layout')



@section('header')

    <title>مدیر جو | {{$test->title}}</title>
    <meta name="description"
          content="{{$test->description}}"/>
    <meta name="title" content="{{$test->title}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('/slick/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/slick/slick-theme.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/js/vendor/toastr/toastr.min.css')}}">
    <style>
        .btn {
            font-family: yekan;
            color: black;
            font-size: 15px !important;
        }

        .list-group-item > h3 {
            text-align: right;
        }

        fieldset > .form-check {
            text-align: right;
            direction: rtl;
        }
    </style>
@endsection



@section('content')

    <div class="content_fullwidth less2" style="margin-top:70px;/*direction: rtl;text-align: right*/">

        <div class="container" style="margin-top: -20px">
            <form method="post" href="{{ route('front.testDone',['id'=>$test->id]) }}">
                {{ csrf_field() }}
                <input type="hidden" name="test_id" value="{{$test->id}}">
                <div class="list-group list-group-flush">
                    <h1 style="color: #5e5e5e;text-align:right;direction: rtl">{{$test->title}}</h1>
                    <section class="qslider slider">
                        @foreach($questions as $keyQ => $question)
                            <div class="list-group-item" style="border-top: 1px solid #cccbcb;margin-bottom: 10px;">
                                <h3>{{$question->title}}</h3>
                                <fieldset>
                                    @foreach($question->options as $key => $option)
                                        <div class="form-check radio-green form-group">
                                            <input class="radioBtn form-check-input
                                                  @if($keyQ == $questions->keys()->last())
                                                    check-12
                                                   @endif
                                                    " name="answer[{{$question->id}}]"
                                                   type="radio" value="{{ $key }}">
                                            <label style="margin-right: 20px" class=""
                                                   for="radio103">{{ $option['title'] }}</label>
                                        </div>
                                    @endforeach
                                </fieldset>


                                @if($keyQ == $questions->keys()->last())
                                    <button class="submit btn btn-success" disabled>نمایش نتیجه آزمون</button>
                                @endif

                            </div>
                        @endforeach
                    </section>


                </div>
                <div>
                    <button type="button" id="Prev" class="btn btn-primary pull-right">سوال قبل</button>
                    <button id="result-12" style="display: none" class="btn btn-success  pull-left">نمایش نتیجه آزمون
                    </button>
                    <button type="button" id="Next" class="btn btn-primary pull-right">سوال بعد</button>
                </div>
            </form>

        </div>
    </div>
    <br>
    <br>
    <br>
    <br>



@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="{{asset('/slick/slick.min.js')}}" type="text/javascript" charset="utf-8"></script>
    <script src="{{asset('assets/js/vendor/toastr/toastr.min.js')}}"></script>
    <script type="text/javascript">
        $(document).on('ready', function () {
            $(".qslider").slick({
                infinite: false,
                prevArrow: false,
                nextArrow: false
            });
            $('#Prev').on('click', function () {
                $(".qslider").slick('slickPrev');
            });
            $('#Next').on('click', function () {
                if($('.slick-current').find('.radioBtn').is(':checked'))
                    $(".qslider").slick('slickNext');
                else{
                    toastr.warning("ابتدا باید به سوال پاسخ بدهید");
                }
            });
            $('.radioBtn').on('click', function () {
                if($('.slick-current').find('.submit'))
                    $('.slick-current').find('.submit').removeAttr("disabled");
                $(".qslider").slick('slickNext');
            });
            $('.qslider').on('beforeChange', function(event, slick, currentSlide, nextSlide){
                $(".slick-slide").removeClass('works');
                $('.slick-current').addClass('works');
            });

        });
        $(document).on('ready', function () {
            if ($('.check-12').prop('checked')) {
                $("#result-12").css('display', 'block');
            }
        });

        //        var isChecked = $('#rdSelect').prop('checked');
    </script>
@endsection

