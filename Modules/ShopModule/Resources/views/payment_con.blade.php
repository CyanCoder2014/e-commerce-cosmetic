@if($Status == 'Succeed')


<html>
    <head>
        <title>Connecting ....</title>
    <head>
<body onload="javascript:window.location='$PayPath'" style="font-family:tahoma; text-align:center;font-waight:bold;direction:rtl">
    درحال اتصال به درگاه پرداخت آرین پال ...</body>
</html>

@else

 {{$Status}}
@endif
