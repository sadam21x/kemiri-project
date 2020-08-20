@extends('layouts/admin-gudang/main')
@section('title', 'Penerimaan Bahan Baku')
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
            <h3>Penerimaan Bahan Baku</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-body">
                    <button type="button" class="btn btn-primary btn-sm mb-3 tombol-input-penerimaan" data-toggle="modal" data-target="#modal-penerimaan">
                        <i class="fas fa-pen-square mr-2"></i>
                        INPUT PENERIMAAN BAHAN BAKU
                    </button>
                    <h5 class="my-2">Riwayat Penerimaan Bahan Baku</h5>
                    <table id="penerimaan-bahan-baku-table" class="table table-striped table-bordered table-responsive-stack">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Supplier</th>
                                <th>Jumlah Karung</th>
                                <th>Berat per Karung (Kg)</th>
                                <th>Total Berat (Kg)</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>01/08/2020</td>
                                <td>UD. Pertama Jaya</td>
                                <td>50</td>
                                <td>20</td>
                                <td>1000</td>
                                <td>
                                    <a href="" data-id="1" class="btn btn-warning btn-sm tombol-edit-penerimaan" data-toggle="modal" data-target="#modal-penerimaan">
                                        <i class="fas fa-pen mr-2"></i>
                                        EDIT
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>02/08/2020</td>
                                <td>CV. Permata Langit</td>
                                <td>30</td>
                                <td>2</td>
                                <td>60</td>
                                <td>
                                    <a href="" data-id="1" class="btn btn-warning btn-sm tombol-edit-penerimaan" data-toggle="modal" data-target="#modal-penerimaan">
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
<div class="modal fade" id="modal-penerimaan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-form-label">Input Penerimaan Bahan Baku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="ti-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    @csrf

                    {{-- Hidden id untuk update penerimaan --}}
                    <input type="hidden" name="input-id" id="input-id">

                    <div class="form-group">
                        <label for="input-tanggal" class="col-form-label">Tanggal</label>
                        <input type="text" name="input-tanggal" id="input-tanggal" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="input-supplier" class="col-form-label">Supplier</label>
                        <select class="form-control" id="input-supplier" name="input-supplier">
                            <option>Pilih supplier . . </option>
                            <option value="UD. Pertama Makmur">UD. Pertama Makmur</option>
                            <option value="Toko Jaya Sakthi">Toko Jaya Sakthi</option>
                            <option value="Bapak Zainuri">Bapak Zainuri</option>
                            <option value="Bapak Santoso">Bapak Santoso</option>
                            <option value="UD. Dewata Indah">UD. Dewata Indah</option>
                            <option value="Ibu Nur Aminah">Ibu Nur Aminah</option>
                            <option value="Himasi">Himasi</option>
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
    <script src="{{ asset('/assets/js/admin-gudang-penerimaan.js') }}"></script>
@endsection