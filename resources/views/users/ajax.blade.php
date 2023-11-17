<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var table = $('#dataTableUser').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: "{{ route('users.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'avatar',
                    name: 'avatar'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'role',
                    name: 'role'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false
                },
            ],
            order: [
                [0, 'asc']
            ]
        });

        // Handle the "Tambah Data" button click event
        $('#addUserButton').click(function() {
            $('#createFormUser')[0].reset();
        });

        // Handle "ubah data "
        $('body').on('click', '.btn-edit', function() {
            var user_id = $(this).data('id');
            $.get("{{ route('users.index') }}" + '/' + user_id + '/edit', function(data) {
                $('#editModalLabel').html("Ubah User");
                $('#saveBtn').val("edit-user");
                $('#editModal').modal('show');
                $('#name_edit').val(data.name);
                $('#avatar_edit').val(data.avatar);
                $('#email_edit').val(data.email);
                $('#userIdEdit').val(data.id);
            })
        });

        // Handle the "Ubah Data" form submission
        $('#editUserButton').click(function(e) {
            var form = $('#editFormUser')[0];
            var formData = new FormData(form);
            $.ajax({
                url: "{{ route('users.index') }}" + "/" + id,
                type:"PUT",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    $('#editModal').modal('hide');
                    table.ajax.reload();
                    Swal.fire(
                        'Simpan',
                        response.message,
                        'success'
                    );
                }
            });
        });

        // Handle the "Tambah Data" form submission
        $('#createUserButton').click(function() {
            var form = $('#createFormUser')[0];
            var formData = new FormData(form);

            $.ajax({
                url: "{{ route('users.store') }}",
                method: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    $('#addUserModal').modal('hide');
                    table.ajax.reload();
                    Swal.fire(
                        'Simpan',
                        response.message,
                        'success'
                    );
                }
            });
        });
    });
</script>
