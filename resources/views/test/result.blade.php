{{--<html>--}}
{{--<head>--}}
    {{--<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>--}}
    {{--<script type="text/javascript">--}}
        {{--google.charts.load('current', {'packages':['bar']});--}}
        {{--google.charts.setOnLoadCallback(drawChart);--}}

        {{--function drawChart() {--}}

            {{--@foreach($record->result as $key => $result)--}}
            {{--var data{{$key}} = google.visualization.arrayToDataTable([--}}

                {{--[@foreach($result['options'] as $k => $option)"{{$k}}",@endforeach],--}}
                {{--[@foreach($result['options'] as $option)"{{$option['freq']}},"@endforeach]--}}
            {{--]);--}}
            {{--var options{{$key}} = {--}}
                {{--chart: {--}}
                    {{--title: 'Company Performance',--}}
                    {{--subtitle: 'Sales, Expenses, and Profit: 2014-2017',--}}
                {{--}--}}
            {{--};--}}
            {{--var chart{{$key}} = new google.charts.Bar(document.getElementById('columnchart_material{{$key}}'));--}}
            {{--chart{{$key}}.draw(data{{$key}}, google.charts.Bar.convertOptions(options{{$key}}));--}}
            {{--@endforeach--}}
        {{--}--}}
    {{--</script>--}}
{{--</head>--}}
{{--<body>--}}
{{--@foreach($record->result as $key => $result)--}}
{{--<div id="columnchart_material{{$key}}" style="width: 800px; height: 500px;"></div>--}}
{{--@endforeach--}}

{{--</body>--}}
{{--</html>--}}

@extends('layouts.layout')



@section('header')

    <title>مدیر جو | پاسخ آزمون </title>
    <meta name="description"
          content="انگیزه"/>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script type="text/javascript">

        window.onload = function () {

                    @foreach($record->result as $key => $result)
            var chart = new CanvasJS.Chart("chartContainer{{$key}}", {
                    title:{
                        text: "{{$result['title']}}"
                    },
                    data: [
                        {
                            // Change type to "doughnut", "line", "splineArea", etc.
                            type: "column",
                            dataPoints: [
                                    @foreach($result['options'] as $k => $option)
                                { label: "{{$k}}",  y: {{$option['freq']}}  },
                                @endforeach

                            ]
                        }
                    ]
                });
            chart.render();
            @endforeach
        }
    </script>
@endsection



@section('content')




    <div class="content_fullwidth less2" style="margin-top:70px;direction: rtl">

        <div class="container row" style="margin-top: -20px">
            @foreach($record->result as $key => $result)
            <div id="chartContainer{{$key}}" style="height: 300px; width: 100%;"></div>
            @endforeach
        </div>
    </div>

@endsection
