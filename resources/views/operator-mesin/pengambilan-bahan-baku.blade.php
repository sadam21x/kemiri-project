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
                <button class="btn btn-sm btn-rounded bg-dribbble ml-auto" data-toggle="modal" data-target="#modal-input-pengambilan-bahan-baku">
                    <i class="fas fa-plus mr-1"></i>
                    TAMBAH BARU
                </button>
            </div>

            <table id="pengambilan-bahan-baku-table" class="table table-bordered table-stripped table-responsive-stack">
                <thead class="thead-dark">
                    <th scope="col">ID Pengambilan</th>
                    <th scope="col">Waktu Pengambilan</th>
                    <th scope="col">Operator Mesin</th>
                    <th scope="col">Aksi</th>
                </thead>
                <tbody>
                    <tr>
                        <td>PGB00001</td>
                        <td>01/08/2020 - 10:30</td>
                        <td>Rudi Antara</td>
                        <td colspan="2">
                            <button class="btn btn-sm btn-linkedin" data-toggle="modal" data-target="#modal-detail-pengambilan-bahan-baku">
                                <i class="fas fa-info-circle mr-1"></i>
                                DETAIL
                            </button>
                            <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal-edit-pengambilan-bahan-baku">
                                <i class="fas fa-edit"></i>
                                EDIT
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>PGB00002</td>
                        <td>01/08/2020 - 06:15</td>
                        <td>Rama Suastika</td>
                        <td colspan="2">
                            <button class="btn btn-sm btn-linkedin" data-toggle="modal" data-target="#modal-detail-pengambilan-bahan-baku">
                                <i class="fas fa-info-circle mr-1"></i>
                                DETAIL
                            </button>
                            <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal-edit-pengambilan-bahan-baku">
                                <i class="fas fa-edit"></i>
                                EDIT
                            </button>
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
                <h5 class="modal-title">Input Pengambilan Bahan Baku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times-circle text-danger"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    @csrf

                    {{-- Hidden id operator mesin yang melakukan input data --}}
                    <input type="hidden" name="" id="" value="">

                    <div class="form-group">
                        <label for="" class="col-form-label">Supplier Bahan Baku</label>
                        <select class="form-control select-component" id="" name="">
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
                        <label for="" class="col-form-label">Bahan Baku</label>
                        <select class="form-control select-component" id="" name="">
                            <option>Pilih bahan baku . . </option>
                            <option value="Plastik Bekas">Plastik Bekas</option>
                            <option value="Plastik Virgin">Plastik Virgin</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">Jumlah (Kg)</label>
                        <input type="number" name="" id="" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">Jumlah (Karung)</label>
                        <input type="number" name="" id="" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">Barang Produksi</label>
                        <select class="form-control select-component" id="" name="">
                            <option>Pilih barang yang akan diproduksi . . </option>
                            <option value="Tutup Galon Tipe A">Tutup Galon Tipe A</option>
                            <option value="Tutup Galon Tipe B">Tutup Galon Tipe B</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">Mesin yang digunakan</label>
                        <select class="form-control select-component" id="" name="">
                            <option>Pilih mesin . . </option>
                            <option value="Mesin A">Mesin A</option>
                            <option value="Mesin B">Mesin B</option>
                        </select>
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

{{-- Start Edit Pengambilan Bahan Baku Modal --}}
<div class="modal fade" id="modal-edit-pengambilan-bahan-baku" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title">Edit Pengambilan Bahan Baku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times-circle text-danger"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    @csrf

                    {{-- Hidden id pengambilan bahan baku untuk update data --}}
                    <input type="hidden" name="">

                    <div class="form-group">
                        <label for="" class="col-form-label">Supplier Bahan Baku</label>
                        <select class="form-control select-component" id="" name="">
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
                        <label for="" class="col-form-label">Bahan Baku</label>
                        <select class="form-control select-component" id="" name="">
                            <option>Pilih bahan baku . . </option>
                            <option value="Plastik Bekas">Plastik Bekas</option>
                            <option value="Plastik Virgin">Plastik Virgin</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">Jumlah (Kg)</label>
                        <input type="number" name="" id="" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">Jumlah (Karung)</label>
                        <input type="number" name="" id="" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">Barang Produksi</label>
                        <select class="form-control select-component" id="" name="">
                            <option>Pilih barang yang akan diproduksi . . </option>
                            <option value="Tutup Galon Tipe A">Tutup Galon Tipe A</option>
                            <option value="Tutup Galon Tipe B">Tutup Galon Tipe B</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">Mesin yang digunakan</label>
                        <select class="form-control select-component" id="" name="">
                            <option>Pilih mesin . . </option>
                            <option value="Mesin A">Mesin A</option>
                            <option value="Mesin B">Mesin B</option>
                        </select>
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

{{-- Start Detail Pengambilan Bahan Baku Modal --}}
<div class="modal fade" id="modal-detail-pengambilan-bahan-baku" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title">Detail Pengambilan Bahan Baku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times-circle text-danger"></i>
                </button>
            </div>
            <div class="modal-body">

                <div class="container">

                    <div class="my-3">
                        <h5>ID Pengambilan</h5>
                        <h6>PGB00001</h6>
                    </div>

                    <div class="my-3">
                        <h5>Waktu Pengambilan</h5>
                        <h6>01/08/2020 - 10:15</h6>
                    </div>

                    <div class="my-3">
                        <h5>Operator Mesin</h5>
                        <h6>Adrian Kusuma</h6>
                    </div>

                    <div class="my-3">
                        <h5>Supplier Bahan Baku</h5>
                        <h6>UD. Permata Langit</h6>
                    </div>

                    <div class="my-3">
                        <h5>Bahan Baku</h5>
                        <h6>Plastik Virgin</h6>
                    </div>

                    <div class="my-3">
                        <h5>Jumlah</h5>
                        <h6>110 Kg - 3 Karung</h6>
                    </div>

                    <div class="my-3">
                        <h5>Barang yang diproduksi</h5>
                        <h6>Tutup Galon Tipe B</h6>
                    </div>

                    <div class="my-3">
                        <h5>Mesin</h5>
                        <h6>Mesin A211</h6>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
{{-- End of Detail Pengambilan Bahan Baku Modal --}}
@endsection

@section('extra-script')
    <script src="{{ asset('/assets/gogi/vendors/dataTable/datatables.min.js') }}"></script>
    <script src="{{ asset('/assets/gogi/vendors/datepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('/assets/gogi/vendors/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('/assets/js/operator-mesin-pengambilan-bahan-baku.js') }}"></script>
@endsection