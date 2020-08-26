@extends('layouts/operator-mesin/main')
@section('title', 'Evaluasi Hasil Produksi')
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
        <h4>Evaluasi Hasil Produksi</h4>
        <hr>
    </div>

    <div class="row">
        <div class="col-md-12">

            <div class="judul-tabel mb-3">
                <h5 class="">Riwayat Produksi</h5>
            </div>

            <table id="pengambilan-bahan-baku-table" class="table table-bordered table-stripped table-responsive-stack">
                <thead class="thead-dark">
                    <th scope="col">ID Pengambilan Bahan Baku</th>
                    <th scope="col">Waktu Pengambilan Bahan Baku</th>
                    <th scope="col">Operator Mesin</th>
                    <th scope="col">Aksi</th>
                </thead>
                <tbody>
                    <tr>
                        <td>PGB00001</td>
                        <td>01/08/2020 - 10:30</td>
                        <td>Rudi Antara</td>
                        <td colspan="3">
                            <button class="btn btn-sm btn-linkedin" data-toggle="modal" data-target="#modal-detail-evaluasi">
                                <i class="fas fa-info-circle mr-1"></i>
                                DETAIL
                            </button>
                            <button class="btn btn-sm btn-dribbble" data-toggle="modal" data-target="#modal-input-evaluasi">
                                <i class="fas fa-pen mr-1"></i>
                                EVALUASI
                            </button>
                            <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal-edit-evaluasi">
                                <i class="fas fa-edit"></i>
                                EDIT
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>PGB00002</td>
                        <td>02/08/2020 - 06:15</td>
                        <td>Rama Suastika</td>
                        <td colspan="3">
                            <button class="btn btn-sm btn-linkedin" data-toggle="modal" data-target="#modal-detail-evaluasi">
                                <i class="fas fa-info-circle mr-1"></i>
                                DETAIL
                            </button>
                            <button class="btn btn-sm btn-dribbble" data-toggle="modal" data-target="#modal-input-evaluasi">
                                <i class="fas fa-pen mr-1"></i>
                                EVALUASI
                            </button>
                            <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal-edit-evaluasi">
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

{{-- Start Input Evaluasi Hasil Produksi Modal --}}
<div class="modal fade" id="modal-input-evaluasi" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title" id="modal-form-label">Evaluasi Hasil Produksi</h5>
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
                        <label for="" class="col-form-label">ID Pengambilan Bahan Baku</label>
                        <input type="text" name="" id="" value="PGB00001" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">Jenis Barang Produksi</label>
                        <input type="text" name="" id="" value="Tutup Galon A" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">Mesin</label>
                        <input type="text" name="" id="" value="Mesin B12" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">Supplier Bahan Baku</label>
                        <input type="text" name="" id="" value="UD. Permata Langit" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">Jumlah Produk Hasil Bagus (Kg)</label>
                        <input type="number" name="" id="" min="0" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">Jumlah Produk Hasil Rusak (Kg)</label>
                        <input type="number" name="" id="" min="0" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">Evaluasi Produk Hasil</label>
                        <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">Evaluasi Mesin</label>
                        <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">Evaluasi Bahan Baku</label>
                        <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
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
{{-- End of Input Evaluasi Hasil Produksi Modall --}}

{{-- Start Edit Evaluasi Hasil Produksi Modal --}}
<div class="modal fade" id="modal-edit-evaluasi" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title" id="modal-form-label">Edit Evaluasi Hasil Produksi</h5>
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
                        <label for="" class="col-form-label">ID Pengambilan Bahan Baku</label>
                        <input type="text" name="" id="" value="PGB00001" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">Jenis Barang Produksi</label>
                        <input type="text" name="" id="" value="Tutup Galon A" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">Mesin</label>
                        <input type="text" name="" id="" value="Mesin B12" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">Supplier Bahan Baku</label>
                        <input type="text" name="" id="" value="UD. Permata Langit" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">Jumlah Produk Hasil Bagus (Kg)</label>
                        <input type="number" name="" id="" min="0" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">Jumlah Produk Hasil Rusak (Kg)</label>
                        <input type="number" name="" id="" min="0" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">Evaluasi Produk Hasil</label>
                        <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">Evaluasi Mesin</label>
                        <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">Evaluasi Bahan Baku</label>
                        <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
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
{{-- End of Edit Evaluasi Hasil Produksi Modall --}}

{{-- Start Detail Evaluasi Hasil Produksi Modal --}}
<div class="modal fade" id="modal-detail-evaluasi" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title" id="modal-form-label">Detail Pengambilan Bahn Baku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times-circle text-danger"></i>
                </button>
            </div>
            <div class="modal-body">

                <div class="container">

                    <div class="my-3">
                        <h5>ID Pengambilan Bahan Baku</h5>
                        <h6>PGB00001</h6>
                    </div>

                    <div class="my-3">
                        <h5>Operator Mesin</h5>
                        <h6>Rudi Antara</h6>
                    </div>

                    <div class="my-3">
                        <h5>Jenis Barang Produksi</h5>
                        <h6>Tutup Galon A</h6>
                    </div>

                    <div class="my-3">
                        <h5>Mesin</h5>
                        <h6>Mesin B12</h6>
                    </div>

                    <div class="my-3">
                        <h5>Supplier Bahan Baku</h5>
                        <h6>UD. Permata Langit</h6>
                    </div>

                    <div class="my-3">
                        <h5>Jumlah Produk Hasil Bagus (Kg)</h5>
                        <h6>70</h6>
                    </div>

                    <div class="my-3">
                        <h5>Jumlah Produk Hasil Rusak (Kg)</h5>
                        <h6>3</h6>
                    </div>

                    <div class="my-3">
                        <h5>Evaluasi Produk Hasil</h5>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur
                            adipisicing elit. Eos debitis consequuntur
                            quibusdam dolorum dolor animi quidem officia
                            alias, doloribus tenetur?
                        </p>
                    </div>

                    <div class="my-3">
                        <h5>Evaluasi Mesin</h5>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur
                            adipisicing elit. Eos debitis consequuntur
                            quibusdam dolorum dolor animi quidem officia
                            alias, doloribus tenetur?
                        </p>
                    </div>

                    <div class="my-3">
                        <h5>Evaluasi Bahan Baku</h5>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur
                            adipisicing elit. Eos debitis consequuntur
                            quibusdam dolorum dolor animi quidem officia
                            alias, doloribus tenetur?
                        </p>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
{{-- End of Detail Evaluasi Hasil Produksi Modal --}}
@endsection

@section('extra-script')
    <script src="{{ asset('/assets/gogi/vendors/dataTable/datatables.min.js') }}"></script>
    <script src="{{ asset('/assets/gogi/vendors/datepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('/assets/gogi/vendors/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('/assets/js/operator-mesin-evaluasi-hasil-produksi.js') }}"></script>
@endsection