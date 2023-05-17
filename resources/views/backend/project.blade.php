@extends('be.Base')
@section('content')
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Project</h6>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#PhoneModal" id="#myBtn">
                    Tambah Data
                </button>
            </div>
            <div class="p-3">
                <div class="row" id="data-container">
                    <div class="table-responsive p-3">
                        <table id="dataTable" class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Uuid</th>
                                    <th>Title</th>
                                    <th>link</th>
                                    <th>image</th>
                                    <th>date</th>
                                    <th>tecnologi 1</th>
                                    <th>tecnologi 2</th>
                                    <th>tecnologi 3</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Data from database will be shown here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- modal create --}}
    <div class="modal fade" id="PhoneModal" tabindex="-1" role="dialog" aria-labelledby="PhoneModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="PhoneModalLabel">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formTambah" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="uuid">
                        <div class="form-group">
                            <label for="title">title</label>
                            <input type="text" class="form-control" name="title" id="title"
                                placeholder="Input Here..">
                        </div>
                        <div class="form-group">
                            <label for="link">link</label>
                            <input type="link" class="form-control" name="link" id="link"
                                placeholder="Input Here">
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" name="image" id="image"
                                placeholder="Input Here">
                        </div>
                        <div class="form-group">
                            <label for="date">date</label>
                            <input type="date" class="form-control" name="date" id="date"
                                placeholder="Input Here">
                        </div>
                        <div class="form-group">
                            <label for="tecnologi1">tecnologi 1</label>
                            <input type="tecnologi1" class="form-control" name="tecnologi1" id="tecnologi1"
                                placeholder="Input Here">
                        </div>
                        <div class="form-group">
                            <label for="tecnologi2">tecnologi 2</label>
                            <input type="tecnologi2" class="form-control" name="tecnologi2" id="tecnologi2"
                                placeholder="Input Here">
                        </div>
                        <div class="form-group">
                            <label for="tecnologi3">tecnologi 3</label>
                            <input type="tecnologi3" class="form-control" name="tecnologi3" id="tecnologi3"
                                placeholder="Input Here">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    {{-- modal edit --}}
    <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="EditModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="EditModalLabel">Edit Menu Bazar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formEdit" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="uuid" id="uuid">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="etitle"
                                placeholder="Input Here..">
                        </div>
                        <div class="form-group">
                            <label for="link">Link</label>
                            <input type="text" class="form-control" name="link" id="elink"
                                placeholder="Input Here">
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="eimage" name="image">
                                <label class="custom-file-label" for="eimage" id="eimage-label">Image</label>
                            </div>
                            <img src="" alt="" id="preview" class="mx-auto d-block pb-2"
                                style="max-width: 200px; padding-top: 23px">
                        </div>
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" name="date" id="edate"
                                placeholder="Input Here">
                        </div>
                        <div class="form-group">
                            <label for="tecnologi1">tecnologi 1</label>
                            <input type="text" class="form-control" name="tecnologi1" id="etecnologi1"
                                placeholder="Input Here">
                        </div>
                        <div class="form-group">
                            <label for="tecnologi2">tecnologi 2</label>
                            <input type="text" class="form-control" name="tecnologi2" id="etecnologi2"
                                placeholder="Input Here">
                        </div>
                        <div class="form-group">
                            <label for="tecnologi3">tecnologi 3</label>
                            <input type="text" class="form-control" name="tecnologi3" id="etecnologi3"
                                placeholder="Input Here">
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                    <button type="submit" form="formEdit" class="btn btn-outline-primary">Update Data</button>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: "{{ url('v1/project') }}",
                method: "GET",
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    var tableBody = "";
                    $.each(response.data, function(index, item) {
                        tableBody += "<tr>";
                        tableBody += "<td>" + (index + 1) + "</td>";
                        tableBody += "<td>" + item.uuid + "</td>";
                        tableBody += "<td>" + item.title + "</td>";
                        tableBody += "<td>" + item.link + "</td>";
                        tableBody += "<td><img src='/uploads/project/" + item.image +
                            "' alt='" +
                            item.title +
                            "' class='img-thumbnail' style='width: 200px'></td>";
                        tableBody += "<td>" + item.date + "</td>";
                        tableBody += "<td>" + item.tecnologi1 + "</td>";
                        tableBody += "<td>" + item.tecnologi2 + "</td>";
                        tableBody += "<td>" + item.tecnologi3 + "</td>";
                        tableBody += "<td>" +
                            "<button type='button' class='btn btn-primary edit-modal' data-toggle='modal' data-target='#EditModal' " +
                            "data-uuid='" + item.uuid + "' " +
                            "<i class='fa fa-edit'>Edit</i></button>" +
                            "<button type='button' class='btn btn-danger delete-confirm' data-uuid='" +
                            item.uuid + "'><i class='fa fa-trash'></i></button>" +
                            "</td>";

                        tableBody += "</tr>";
                    });
                    $('#dataTable').DataTable().destroy();
                    $("#dataTable tbody").empty();
                    $("#dataTable tbody").append(tableBody);
                    $('#dataTable').DataTable({
                        "paging": true,
                        "ordering": true,
                        "searching": true
                    });
                },
                error: function() {
                    console.log("Failed to get data from server");
                }
            });
        });


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        //create

        $(document).ready(function() {
            var formTambah = $('#formTambah');

            formTambah.on('submit', function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: '{{ url('v1/project/create/') }}',
                    data: formData,
                    dataType: 'json',
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        console.log(data);
                        if (data.message === 'check your validation') {
                            var error = data.errors;
                            var errorMessage = "";

                            $.each(error, function(keu, value) {
                                errorMessage += value[0] + "<br>";
                            });

                            Swal.fire({
                                tite: 'Error',
                                html: errorMessage,
                                icon: 'error',
                                timer: 5000,
                                showConfirmButton: true
                            });
                        } else {
                            console.log(data);
                            Swal.fire({
                                title: 'Success',
                                text: 'Data Success Create',
                                icon: 'success',
                                showCancelButton: false,
                                confirmButtonText: 'OK'
                            }).then(function() {
                                location.reload();
                            });
                        }
                    },
                    error: function(data) {
                        var error = data.responseJSON.errors;
                        var errorMessage = "";

                        $.each(error, function(key, value) {
                            errorMessage += value[0] + "<br>";
                        });

                        Swal.fire({
                            title: 'Error',
                            html: errorMessage,
                            icon: 'error',
                            timer: 5000,
                            showConfirmButton: true
                        });
                    }
                });
            });
        });


        //edit
        $(document).on('click', '.edit-modal', function() {
            var uuid = $(this).data('uuid');
            $.ajax({
                url: "{{ url('v1/project/get') }}/" + uuid,
                type: 'GET',
                dataType: 'JSON',
                success: function(data) {
                    console.log(data);
                    $('#uuid').val(data.data.uuid);
                    $('#etitle').val(data.data.title);
                    $('#elink').val(data.data.link);
                    $('#preview').attr('src', "{{ asset('uploads/project') }}/" + data.data.image);
                    $('#edate').val(data.data.date);
                    $('#etecnologi1').val(data.data.tecnologi1);
                    $('#etecnologi2').val(data.data.tecnologi2);
                    $('#etecnologi3').val(data.data.tecnologi3);
                    $('#EditModal').modal('show');
                },
                error: function() {
                    alert("error");
                }
            });
        });
        //update
        $(document).ready(function() {
            var formEdit = $('#formEdit');

            formEdit.on('submit', function(e) {
                e.preventDefault();

                var uuid = $('#uuid').val();
                var formData = new FormData(this);

                var file = $('#eimage')[0].files[0];
                if (!file) {
                    formData.delete('image');
                }

                $.ajax({
                    type: "POST",
                    url: "{{ url('v1/project/update') }}/" + uuid,
                    data: formData,
                    dataType: 'json',
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        console.log(data);
                        Swal.fire({
                            title: 'Success',
                            text: 'Data success for update',
                            icon: 'success',
                            showCancelButton: false,
                            confirmButtonText: 'OK'
                        }).then(function() {
                            location.reload();
                        });
                    },
                    error: function(data) {
                        var errors = data.responseJSON.errors;
                        var errorMessage = "";

                        $.each(errors, function(key, value) {
                            errorMessage += value + "<br>";
                        });

                        Swal.fire({
                            title: "Error",
                            html: errorMessage,
                            icon: "error",
                            timer: 5000,
                            showConfirmButton: true
                        });
                    }
                });
            });
        })



        //delete
        $(document).on('click ', '.delete-confirm', function(e) {
            e.preventDefault();
            var uuid = $(this).data('uuid');
            Swal.fire({
                title: 'Do your sure want to delete this data ?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, Delete',
                cancelButtonText: 'Cancel',
                resolveButton: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ url('v1/project/delete') }}/" + uuid,
                        type: 'DELETE',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "uuid": uuid
                        },
                        success: function(response) {
                            console.log(response);
                            Swal.fire({
                                title: 'Data berhasil dihapus',
                                icon: 'success',
                                timer: 5000,
                                showConfirmButton: true
                            }).then((result) => {
                                location.reload();
                            });
                        },
                        error: function() {
                            Swal.fire({
                                tite: 'Terjadi kesalahan ',
                                icon: 'error',
                                timer: 1500,
                                showConfirmButton: false
                            });
                        }


                    });
                }
            });
        });
    </script>
@endsection
