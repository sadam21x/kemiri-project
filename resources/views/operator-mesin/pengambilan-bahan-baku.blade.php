@extends('layouts/operator-mesin/main')
@section('title', 'Pengambilan Bahn Baku')
@section('extra-css')
<link rel="stylesheet" href="{{ asset('/assets/gogi/vendors/dataTable/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/gogi/vendors/datepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/gogi/vendors/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/operator-mesin.css') }}">
@endsection

@section('content')
{{-- Start Content --}}
<div class="content">

    <div class="page-header">
        <h4>Pengambilan Bahan Baku</h4>
        <hr>
    </div>

    <div class="row">
        <div class="col-md-12">

            <div class="judul-tabel mb-3">
                <h5 class="">Riwayat Pengambilan Bahan Baku</h5>
                <button class="btn btn-sm btn-rounded bg-dribbble ml-auto">
                    <i class="fas fa-plus mr-1"></i>
                    TAMBAH BARU
                </button>
            </div>

            <table id="pengambilan-bahan-baku-table" class="table table-bordered table-stripped table-responsive-stack">
                <thead class="thead-dark">
                    <th scope="col">Waktu Pengambilan</th>
                    <th scope="col">Operator Mesin</th>
                    <th scope="col">Aksi</th>
                </thead>
                <tbody>
                    <tr>
                        <td>01/08/2020 - 10:30</td>
                        <td>Rudi Antara</td>
                        <td>
                            <a href="" class="btn btn-sm btn-linkedin" data-toggle="modal" data-target="#modal-detail-pengambilan-bahan-baku">
                                <i class="fas fa-info-circle mr-1"></i>
                                DETAIL
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>01/08/2020 - 06:15</td>
                        <td>Rama Suastika</td>
                        <td>
                            <a href="" class="btn btn-sm btn-linkedin" data-toggle="modal" data-target="#modal-detail-pengambilan-bahan-baku">
                                <i class="fas fa-info-circle mr-1"></i>
                                DETAIL
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>
{{-- End of Content --}}

{{-- Start Input Pengambilan Bahan Baku Modal --}}
<div class="modal fade" id="modal-input-pengambilan-bahan-baku" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title" id="modal-form-label">Input Pengambilan Bahan Baku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times-circle text-danger"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    @csrf

                    {{-- Hidden id operator mesin yang melakukan input data --}}
                    <input type="hidden" name="input-id-pegawai" id="input-id-pegawai" value="">

                    <div class="form-group">
                        <label for="input-tanggal" class="col-form-label">Tanggal</label>
                        <input type="date" name="input-tanggal" id="input-tanggal" class="form-control date-component">
                    </div>

                    <div class="form-group">
                        <label for="input-supplier" class="col-form-label">Supplier</label>
                        <select class="form-control select-component" id="input-supplier" name="input-supplier">
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
{{-- End of Input Pengambilan Bahan Baku Modal --}}
@endsection

@section('extra-script')
    <script src="{{ asset('/assets/gogi/vendors/dataTable/datatables.min.js') }}"></script>
    <script src="{{ asset('/assets/gogi/vendors/datepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('/assets/gogi/vendors/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('/assets/js/operator-mesin-pengambilan-bahan-baku.js') }}"></script>
@endsection