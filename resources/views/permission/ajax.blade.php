<script type="text/javascript">
    $(function () {

        let table = $("#dataTablePermission").DataTable({
            processing: true,
            serverSide: true,
            "responsive": true,
            ajax: "{{ route('permission.index') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'action', name:'action', orderable: false, searchable: true},
            ]
        });

    })
</script>
