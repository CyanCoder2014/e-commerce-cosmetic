<? $type = []; ?>
@foreach($class::getform() as $form)
    @include('crud.widgets.'.$form['type'],['fiels' => $form,'value' => old($form['name']), 'class' => $class ])
    @switch($form['type'])
        @case('ckeditor')
            <script src="<?= Url('assets/plugins/ckeditor/ckeditor.js'); ?>"></script>
        @break
        @case('date')
            <link rel="stylesheet" href="/widgets/datepicker/jquery.md.bootstrap.datetimepicker.style.css"/>
            <script src="/widgets/jquery.min.js"></script>
            {{--<script src="/widgets/datepicker/js/persianDatepicker.min.js"></script>--}}
            <script src="/widgets/datepicker/jquery.md.bootstrap.datetimepicker.js"></script>
        @break
    @endswitch
@endforeach
