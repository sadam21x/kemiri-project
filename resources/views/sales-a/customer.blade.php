@extends('layouts/sales-a/main')
@section('title', 'Customer')
@section('extra-css')
    <link rel="stylesheet" href="{{ asset('/assets/gogi/vendors/dataTable/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/gogi/vendors/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/sales-a.css') }}">
@endsection

@section('content')
{{-- Start Content --}}
<div class="content">
    <div class="page-header">
        <h4>Customer</h4>
        <hr>
    </div>

    <div class="row">
        <div class="col-md-12">

            <div class="judul-tabel mb-3">
                <h5 class="">Daftar Customer</h5>
                <button class="btn btn-sm btn-rounded bg-dribbble ml-auto tombol-tambah-customer" data-toggle="modal" data-target="#modal-tambah-customer">
                    <i class="fas fa-plus mr-1"></i>
                    TAMBAH BARU
                </button>
            </div>

            <table id="customer-table" class="table table-bordered table-stripped table-responsive-stack">
                <thead class="thead-dark">
                    <th scope="col">ID Customer</th>
                    <th scope="col">Nama Customer</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Aksi</th>
                </thead>
                <tbody>
                    <tr>
                        <td>CUST00001</td>
                        <td>Depo Air Minum Alam Sutera</td>
                        <td>Jl. Kusuma Bangsa, Tambaksari, Kota Surabaya</td>
                        <td colspan="2">
                            <a href="" class="btn btn-sm btn-linkedin mr-1" data-toggle="modal" data-target="#modal-detail-customer">
                                <i class="fas fa-info-circle mr-1"></i>
                                DETAIL
                            </a>
                            <a href="" class="btn btn-sm btn-warning tombol-edit-customer" data-toggle="modal" data-target="#modal-edit-customer">
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

{{-- Start Detail Customer Modal --}}
<div class="modal fade" id="modal-detail-customer" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title" id="modal-form-label">Detail Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times-circle text-danger"></i>
                </button>
            </div>
            <div class="modal-body">

                <div class="container">

                    <div class="my-3">
                        <h5>ID Customer</h5>
                        <h6>CUST00001</h6>
                    </div>

                    <div class="my-3">
                        <h5>Nama Customer</h5>
                        <h6>Depo Air Minum Alam Sutera</h6>
                    </div>

                    <div class="my-3">
                        <h5>Alamat</h5>
                        <h6>Jl. Kusuma Bangsa, Tambaksari</h6>
                    </div>

                    <div class="my-3">
                        <h5>Kota/Kabupaten</h5>
                        <h6>Kota Surabaya</h6>
                    </div>

                    <div class="my-3">
                        <h5>Provinsi</h5>
                        <h6>Jawa Timur</h6>
                    </div>

                    <div class="my-3">
                        <h5>Contact Person</h5>
                        <h6>Rifat Najmi</h6>
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
{{-- End of Detail Customer Modal --}}

{{-- Start Input Customer Modal --}}
<div class="modal fade" id="modal-tambah-customer" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title" id="modal-form-label">Tambah Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times-circle text-danger"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    @csrf

                    {{-- Hidden id sales yang menginput data --}}
                    {{-- <input type="hidden" name=""> --}}

                    <div class="form-group">
                        <label for="" class="col-form-label">
                            Nama Customer/Depo
                        </label>
                        <input type="text" name="" id="" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">
                            Alamat
                        </label>
                        <input type="text" name="" id="" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">
                            Provinsi
                        </label>
                        <select class="form-control select-component select-provinsi" id="" name="">
                            <option>Pilih provinsi . . </option>
                            @foreach ($provinsi as $id => $name)
                                <option value="{{ $id }}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">
                            Kabupaten/Kota
                        </label>
                        <select class="form-control select-component select-kota" id="" name="">
                            <option>Pilih kota . . </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">
                            Contact Person
                        </label>
                        <input type="text" name="" id="" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">
                            No. Telepon
                        </label>
                        <input type="number" name="" id="" class="form-control num-without-style">
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">Email</label>
                        <input type="email" name="" id="" class="form-control">
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
{{-- End of Input Customer Modal --}}

{{-- Start Edit Customer Modal --}}
<div class="modal fade" id="modal-edit-customer" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title" id="modal-form-label">Edit Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times-circle text-danger"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="" class="col-form-label">
                            Nama Customer/Depo
                        </label>
                        <input type="text" name="" id="" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">
                            Alamat
                        </label>
                        <input type="text" name="" id="" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">
                            Provinsi
                        </label>
                        <select class="form-control select-component select-provinsi" id="" name="">
                            <option>Pilih provinsi . . </option>
                            @foreach ($provinsi as $id => $name)
                                <option value="{{ $id }}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">
                            Kabupaten/Kota
                        </label>
                        <select class="form-control select-component select-kota" id="" name="">
                            <option>Pilih kota . . </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">
                            Contact Person
                        </label>
                        <input type="text" name="" id="" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">
                            No. Telepon
                        </label>
                        <input type="number" name="" id="" class="form-control num-without-style">
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">Email</label>
                        <input type="email" name="" id="" class="form-control">
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
{{-- End of Edit Customer Modal --}}
@endsection

@section('extra-script')
    <script src="{{ asset('/assets/gogi/vendors/dataTable/datatables.min.js') }}"></script>
    <script src="{{ asset('/assets/gogi/vendors/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('/assets/js/sales-a-customer.js') }}"></script>
@endsection