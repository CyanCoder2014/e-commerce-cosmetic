<!DOCTYPE html>
<html>
<head>
    <title>Bootstrap Tags Input</title>
    <meta name="robots" content="index, follow" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= Url('assets/bootstrap-tagsinput.css'); ?>">
    <link rel="stylesheet" href="<?= Url('assets/app.css'); ?>">

</head>
<body>


sss

<div class="example example_typeahead">
    <div class="bs-example">
        <input type="text" value="Amsterdam,Washington" />
    </div>
    <div class="accordion ">
        <div class="accordion-group">

        </div>






        <input type="text" value="" data-role="tagsinput" />
        <script>
            var citynames = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                prefetch: {
                    url: '../../assets/citynames.json',
                    filter: function(list) {
                        return $.map(list, function(cityname) {
                            return { name: cityname }; });
                    }
                }
            });
            citynames.initialize();

            $('input').tagsinput({
                maxTags: 1,
                typeaheadjs: {
                    name: 'citynames',
                    displayKey: 'name',
                    valueKey: 'name',
                    source: citynames.ttAdapter()
                }
            });



            // $('input').tagsinput({
            //   maxTags: 3
            // });




            // $("input").val()
            // $("input").tagsinput('items')
        </script>





    </div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
<script src="<?= Url('/assets/bootstrap-tagsinput.min.js'); ?>"></script>

<script src="<?= Url('/assets/app_bs3.js'); ?>"></script>


</body>
</html>









<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-42755476-1', 'bootstrap-tagsinput.github.io');
    ga('send', 'pageview');
</script>