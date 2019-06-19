<link rel="stylesheet" type="text/css" href="/DataTables/datatables.min.css"/>

<script type="text/javascript" src="/DataTables/datatables.min.js"></script>

<table class="table table-striped table-hover table-custom" id="{{ $id }}">
    <thead>
        <tr>
            @foreach($class::getdatatable() as $row)
                <th>{{ $row['slug'] }}</th>
            @endforeach
        </tr>
    </thead>

</table>

<script>
    $('#{{ $id }}').DataTable({
        serverSide: true,
        ajax: "{{ $class::route('data') }}",
        columns: [
            @foreach($class::getdatatable() as $row)
                { name: '{{ $row['name'] }}'
                @if(! $row['orderable'])
                , orderable: false
                @endif
                @if(! $row['searchable'])
                , searchable: false
                @endif
            },
            @endforeach
        ],
        buttons: [
            {   extend: "whatAButton", name: "myButton" }
        ]
    });
</script>