@extends('layouts/admin-gudang/main')
@section('title', 'Supplier')
@section('extra-css')
    <link rel="stylesheet" href="{{ asset('/assets/gogi/vendors/dataTable/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/gogi/vendors/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/admin-gudang.css') }}">
@endsection

@section('content')
{{-- Start Content --}}
<div class="content">
    <div class="page-header">
        <h3>Supplier</h3>
        <hr>
    </div>

    <div class="row">
        <div class="col-md-12">
            <button type="button" class="btn bg-info-gradient btn-sm mb-3 tombol-tambah-supplier " data-toggle="modal"
                data-target="#modal-tambah-supplier">
                <i class="fas fa-plus-square mr-2"></i>
                TAMBAH SUPPLIER
            </button>

            <table id="supplier-table" class="table table-bordered table-stripped table-responsive-stack">
                <thead class="thead-dark">
                    <th scope="col">ID Supplier</th>
                    <th scope="col">Nama Supplier</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Aksi</th>
                </thead>
                <tbody>
                    <tr>
                        <td>SUP001</td>
                        <td>UD. Prima Pertiwi</td>
                        <td>Jl. Slamet Riyadi No. 41, Solo</td>
                        <td colspan="2">
                            <a href="" class="btn btn-sm btn-linkedin mr-1" data-toggle="modal" data-target="#modal-detail-supplier">
                                <i class="fas fa-info-circle mr-1"></i>
                                DETAIL
                            </a>
                            <a href="" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal-edit-supplier">
                                <i class="fas fa-edit mr-1"></i>
                                EDIT
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
{{-- End of Content --}}

{{-- Start Detail Supplier Modal --}}
<div class="modal fade" id="modal-detail-supplier" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title" id="modal-form-label">Detail Supplier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times-circle text-danger"></i>
                </button>
            </div>
            <div class="modal-body">

                <div class="container">

                    <div class="my-3">
                        <h5>ID Supplier</h5>
                        <h6>SUP001</h6>
                    </div>

                    <div class="my-3">
                        <h5>Nama Supplier</h5>
                        <h6>UD. Prima Pertiwi</h6>
                    </div>

                    <div class="my-3">
                        <h5>Alamat</h5>
                        <h6>Jl. Slamet Riyadi No. 41</h6>
                    </div>

                    <div class="my-3">
                        <h5>Kota/Kabupaten</h5>
                        <h6>Solo</h6>
                    </div>

                    <div class="my-3">
                        <h5>Provinsi</h5>
                        <h6>Jawa Tengah</h6>
                    </div>

                    <div class="my-3">
                        <h5>Nomor Telepon</h5>
                        <h6>087762543221</h6>
                    </div>

                    <div class="my-3">
                        <h5>Email</h5>
                        <h6>N/A</h6>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
{{-- End of Detail Supplier Modal --}}

{{-- Start Input Modal --}}
<div class="modal fade" id="modal-tambah-supplier" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title" id="modal-form-label">Tambah Supplier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times-circle text-danger"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="input-nama" class="col-form-label">
                            Nama Supplier
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" name="input-nama" id="input-nama" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="input-alamat" class="col-form-label">
                            Alamat
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" name="input-alamat" id="input-alamat" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="input-provinsi" class="col-form-label">
                            Provinsi
                            <span class="text-danger">*</span>
                        </label>
                        <select class="form-control select-component" id="input-provinsi" name="input-provinsi">
                            <option>Pilih provinsi . . </option>
                            <option value="Jawa Timur">Jawa Timur</option>
                            <option value="Bali">Bali</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="input-kota" class="col-form-label">
                            Kabupaten/Kota
                            <span class="text-danger">*</span>
                        </label>
                        <select class="form-control select-component" id="input-kota" name="input-kota">
                            <option>Pilih kota . . </option>
                            <option value="Banyuwangi">Banyuwangi</option>
                            <option value="Kota Surabaya">Kota Surabaya</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="input-telepon" class="col-form-label">
                            No. Telepon
                            <span class="text-danger">*</span>
                        </label>
                        <input type="number" name="input-telepon" id="input-telepon" class="form-control num-without-style">
                    </div>

                    <div class="form-group">
                        <label for="input-email" class="col-form-label">Email</label>
                        <input type="number" name="input-email" id="input-email" class="form-control">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-google" data-dismiss="modal">BATAL</button>
                        <button type="submit" class="btn btn-linkedin">SIMPAN</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
{{-- End of Input Modal --}}

{{-- Start Edit Modal --}}
<div class="modal fade" id="modal-edit-supplier" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title" id="modal-form-label">Edit Supplier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times-circle text-danger"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    @csrf

                    {{-- Hidden id supplier untuk update supplier --}}
                    <input type="hidden" name="edit-id" id="edit-id" value="">

                    <div class="form-group">
                        <label for="edit-nama" class="col-form-label">
                            Nama Supplier
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" name="edit-nama" id="edit-nama" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="edit-alamat" class="col-form-label">
                            Alamat
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" name="edit-alamat" id="edit-alamat" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="edit-provinsi" class="col-form-label">
                            Provinsi
                            <span class="text-danger">*</span>
                        </label>
                        <select class="form-control select-component" id="edit-provinsi" name="edit-provinsi">
                            <option>Pilih provinsi . . </option>
                            <option value="Jawa Timur">Jawa Timur</option>
                            <option value="Bali">Bali</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="edit-kota" class="col-form-label">
                            Kabupaten/Kota
                            <span class="text-danger">*</span>
                        </label>
                        <select class="form-control select-component" id="edit-kota" name="edit-kota">
                            <option>Pilih kota . . </option>
                            <option value="Banyuwangi">Banyuwangi</option>
                            <option value="Kota Surabaya">Kota Surabaya</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="edit-telepon" class="col-form-label">
                            No. Telepon
                            <span class="text-danger">*</span>
                        </label>
                        <input type="number" name="edit-telepon" id="edit-telepon" class="form-control num-without-style">
                    </div>

                    <div class="form-group">
                        <label for="edit-email" class="col-form-label">Email</label>
                        <input type="number" name="edit-email" id="edit-email" class="form-control">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-google" data-dismiss="modal">BATAL</button>
                        <button type="submit" class="btn btn-linkedin">SIMPAN</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
{{-- End of Edit Modal --}}
@endsection

@section('extra-script')
    <script src="{{ asset('/assets/gogi/vendors/dataTable/datatables.min.js') }}"></script>
    <script src="{{ asset('/assets/gogi/vendors/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('/assets/js/admin-gudang-supplier.js') }}"></script>
@endsection