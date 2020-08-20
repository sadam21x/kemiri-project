@extends('layouts/admin-gudang/main')
@section('title', 'Pengiriman Barang')
@section('extra-css')
    <link rel="stylesheet" href="{{ asset('/assets/gogi/vendors/dataTable/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/gogi/vendors/datepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/gogi/vendors/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/admin-gudang.css') }}">
@endsection

@section('content')
<!-- Content -->
<div class="content ">
    <div class="page-header">
        <div>
            <h3>Pengiriman Barang</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-body">
                    <button type="button" class="btn btn-primary btn-sm mb-3 tombol-input-pengiriman-barang" data-toggle="modal" data-target="#modal-pengiriman-barang">
                        <i class="fas fa-pen-square mr-2"></i>
                        INPUT PENGIRIMAN BARANG
                    </button>
                    <h5 class="my-2">Riwayat Pengiriman Barang</h5>
                    <table id="pengiriman-barang-table" class="table table-striped table-bordered table-responsive-stack">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Pelanggan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>01/08/2020</td>
                                <td>Depo Air Minum Kertajaya Indah</td>
                                <td>
                                    <a href="" class="badge badge-success">
                                        TERKIRIM
                                        <i class="fas fa-check ml-1"></i>
                                    </a>
                                </td>
                                <td colspan="2">
                                    <a href="" data-id="1" class="btn btn-twitter btn-sm tombol-edit-penerimaan" data-toggle="modal" data-target="#modal-penerimaan">
                                        DETAIL
                                    </a>
                                    <a href="" data-id="1" class="disabled btn btn-warning btn-sm tombol-edit-penerimaan" data-toggle="modal" data-target="#modal-pengiriman-barang">
                                        <i class="fas fa-pen mr-2"></i>
                                        EDIT
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>02/08/2020</td>
                                <td>Depo Air Minum Surya</td>
                                <td>
                                    <a href="" class="badge badge-secondary">
                                        PENDING
                                        <i class="fas fa-exclamation-circle ml-1"></i>
                                    </a>
                                </td>
                                <td colspan="2">
                                    <a href="" data-id="1" class="btn btn-twitter btn-sm tombol-edit-penerimaan" data-toggle="modal" data-target="#modal-penerimaan">
                                        DETAIL
                                    </a>
                                    <a href="" data-id="1" class="btn btn-warning btn-sm tombol-edit-penerimaan" data-toggle="modal" data-target="#modal-pengiriman-barang">
                                        <i class="fas fa-pen mr-2"></i>
                                        EDIT
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

</div>
<!-- ./ Content -->

{{-- Start Modal --}}
<div class="modal fade" id="modal-pengiriman-barang" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-form-label">Input Pengiriman Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="ti-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    @csrf

                    {{-- Hidden id untuk update pengiriman-barang --}}
                    <input type="hidden" name="input-id" id="input-id">

                    <div class="form-group">
                        <label for="input-tanggal" class="col-form-label">Tanggal</label>
                        <input type="text" name="input-tanggal" id="input-tanggal" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="input-pelanggan" class="col-form-label">Pelanggan</label>
                        <select class="form-control" id="input-pelanggan" name="input-pelanggan">
                            <option>Pilih pelanggan . . </option>
                            <option value="Depo Air Minum Pertama Makmur">Depo Air Minum Pertama Makmur</option>
                            <option value="Depo Air Minum Jaya Sakthi">Depo Air Minum Jaya Sakthi</option>
                            <option value="Depo Air Minum Bapak Zainuri">Depo Air Minum Bapak Zainuri</option>
                            <option value="Depo Air Minum Bapak Santoso">Depo Air Minum Bapak Santoso</option>
                            <option value="Depo Air Minum Dewata Indah">Depo Air Minum Dewata Indah</option>
                            <option value="Depo Air Minum Ibu Nur Aminah">Depo Air Minum Ibu Nur Aminah</option>
                            <option value="Depo Air Minum Himasi">Depo Air Minum Himasi</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="input-jumlah-karung" class="col-form-label">Jumlah Karung</label>
                        <input type="number" name="input-jumlah-karung" id="input-jumlah-karung" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="input-berat-karung" class="col-form-label">Berat per Karung (Kg)</label>
                        <input type="number" name="input-berat-karung" id="input-berat-karung" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="input-berat-total" class="col-form-label">Berat Total (Kg)</label>
                        <input type="number" name="input-berat-total" id="input-berat-total" class="form-control" placeholder="0">
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
{{-- End of Modal --}}
@endsection

@section('extra-script')
    <script src="{{ asset('/assets/gogi/vendors/dataTable/datatables.min.js') }}"></script>
    <script src="{{ asset('/assets/gogi/vendors/datepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('/assets/gogi/vendors/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('/assets/js/admin-gudang-pengiriman-barang.js') }}"></script>
@endsection