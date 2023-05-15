@extends('layoutsbe.Base')
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
                                    <th>Product Name</th>
                                    <th>Product Model</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Product Image</th>
                                    <th>Detail ID</th>
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
                            <label for="product_name">Nama Product</label>
                            <input type="text" class="form-control" name="product_name" id="product_name"
                                placeholder="Input Here..">
                        </div>
                        <div class="form-group">
                            <label for="product_model">Product Model</label>
                            <input type="text" class="form-control" name="product_model" id="product_model"
                                placeholder="Input Here">
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" class="form-control" name="price" id="price">
                        </div>
                        <div class="form-group">
                            <label for="stock">Stock</label>
                            <input type="number" class="form-control" name="stock" id="stock"
                                placeholder="Input Here">
                        </div>
                        <div class="form-group">
                            <label for="image_phone">Image</label>
                            <input type="file" class="form-control" name="image_phone" id="image_phone"
                                placeholder="Input Here">
                        </div>
                        <div class="form-group">
                            <label for="detail_id">Detail</label>
                            <select name="detail_id" id="detail_id" class="form-control">
                                <option value="">-- Pilih Detail --</option>
                            </select>
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>

    </script>
@endsection
