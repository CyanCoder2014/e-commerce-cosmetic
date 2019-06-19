@extends('layouts.layout')

@section('content')




    <section class="hero container-full">


        <article class="pricing__table" style="width: 90%;margin:0 auto;direction: rtl">



            <div class="content_fullwidth less2" style="margin-top:70px;direction: rtl">
                <div class="">
                    <h2>{{$aboutus->data['title']}}</h2>
                    <div>
                        {{$aboutus->data['intro']}}
                    </div>
                    <p>
                        {{$aboutus->data['description']}}
                    </p>
                </div>
            </div>
        </article>

    </section>



@endsection