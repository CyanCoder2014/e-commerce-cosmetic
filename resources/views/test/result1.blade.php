@extends('layouts.layout')


@section('header')

    <title>مدیر جو | پاسخ آزمون {{$record->test->title}}  </title>
    <meta name="description"
          content="انگیزه"/>

    <script async="" src="{{asset('Bar Chart_files/analytics.js')}}"></script>
    <script src="{{asset('Bar Chart_files/Chart.bundle.js')}}"></script>
    <style type="text/css">/* Chart.js */
        @-webkit-keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}@keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}.chartjs-render-monitor{-webkit-animation:chartjs-render-animation 0.001s;animation:chartjs-render-animation 0.001s;}</style>
    <script src="{{asset('Bar Chart_files/utils.js')}}"></script>
    <style>
        canvas {
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
            /*width:500px !important;*/
            /*height:300px !important;*/
        }
    </style>
    <script>
        var dynamicColors = function() {
            var r = Math.floor(Math.random() * 255);
            var g = Math.floor(Math.random() * 255);
            var b = Math.floor(Math.random() * 255);
            return "rgb(" + r + "," + g + "," + b + ")";
        };
    </script>


@endsection



@section('content')

    <div class="content_fullwidth less2" style="margin-top:70px;direction: rtl;">

        <div class="container row" style="margin: -20px auto; margin-bottom: 10px">
                <div class="col-md-8" >
                    <canvas id="myChart" height="200" width="500"></canvas>


                    <div class="row" style="direction: ltr;">
                        <?php $col=intval(12/count($record->result));?>
                        @foreach($record->result as $key => $result)
                            <div class="col-sm-{{$col}}" id="radomColor{{$key}}" style="text-align: center; font-size: 25px;">
                                {{$result['title']}}
                            </div>
                        @endforeach

                    </div>
                </div>
                <div class="col-md-4" style="text-align: center">
                    <h3>نتیجه ازمون {{$record->test->title}}:</h3>
                    <h4>{{$record->final_result}}</h4>
                    <div class="col-xs-12" style="text-align: center;align-items: center;">
                        <a target="_blank" href="{{ route('front.test',['id' => '321-'.$record->test_id.'-'.str_replace(" ","-",'شروع مجدد')]) }}" class="btn btn-primary">شروع مجدد</a>
                    </div>
                    <div>

                        <p>{{$record->test->final_desc}}</p>
                        <a class="btn btn-success" href="{{$record->test->link}}">
                            {{$record->test->link_name}}
                        </a>
                    </div>
                </div>

        </div>

    </div>
    <script>



        window.onload = function() {

            var color = [];
            @foreach($record->result as $key => $result)
                color['{{$key}}']=dynamicColors();
                $('#radomColor{{$key}}').css('color',color['{{$key}}']);
                    @endforeach
            var ctx = document.getElementById("myChart");
            debugger;
            var BarData = {
                labels: [@foreach($record->result as $key => $result)@foreach($result['options'] as $k => $option)"{{$k}}",@endforeach @endforeach],
                datasets: [{
                    data: [@foreach($record->result as $key => $result)@foreach($result['options'] as $k =>$option){{$option['freq']}},@endforeach @endforeach],
                    backgroundColor: [
                        @foreach($record->result as $key => $result)@foreach($result['options'] as $k =>$option)color['{{$key}}'],@endforeach @endforeach
                    ],

                }]

            };
            var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: BarData,
                        options: {
                            "hover": {
                                "animationDuration": 0
                            },
                            "animation": {
                                "duration": 1,
                                "onComplete": function() {
                                    var chartInstance = this.chart,
                                        ctx = chartInstance.ctx;

                                    ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                                    ctx.textAlign = 'center';
                                    ctx.textBaseline = 'bottom';

                                    this.data.datasets.forEach(function(dataset, i) {
                                        var meta = chartInstance.controller.getDatasetMeta(i);
                                        meta.data.forEach(function(bar, index) {
                                            var data = dataset.data[index];
                                            ctx.fillText(data, bar._model.x, bar._model.y - 5);
                                        });
                                    });
                                }
                            },
                            legend: {
                                "display": false,
                                labels: {
                                    // This more specific font property overrides the global property
                                    fontFamily: 'yekan'
                                }
                            },
                            tooltips: {
                                "enabled": false
                            },
                            scales: {
                                yAxes: [{

                                    display: false,
                                    gridLines: {
                                        display: false
                                    },
                                    ticks: {
                                        max: Math.max(...BarData.datasets[0].data) + 1,
                                    display: false,
                                    beginAtZero: true
                                }
                                }],
                                xAxes: [{
                                    maxBarThickness: 100,
                                    gridLines: {
                                        display: false
                                    },
                                    ticks: {
                                        beginAtZero: true,
                                        fontFamily: "yekan",
                                        fontSize: 20,
                                    }
                                }]
                            },
                            layout: {
                                padding: {
                                    left: 0,
                                    right: 0,
                                    top: 0,
                                    bottom: 0
                                }
                            }
        }
        });


        };






    </script>



    <br>
    <br>
    <br>
    <br>
    <br>

@endsection
