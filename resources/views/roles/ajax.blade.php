<script type="text/javascript">
    $(function () {

        let table = $("#dataTableRole").DataTable({
            processing: true,
            serverSide: true,
            "responsive": true,
            ajax: "{{ route('roles.index') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'action', name:'action', orderable: false, searchable: true},
            ]
        });

    })
</script>
