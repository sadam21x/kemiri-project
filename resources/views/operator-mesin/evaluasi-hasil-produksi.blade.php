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
                <h5 class="modal-title">Evaluasi Hasil Produksi</h5>
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
                        <label for="" class="col-form-label">Bahan Baku</label>
                        <input type="text" name="" id="" value="Plastik Virgin" class="form-control" readonly>
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
                        <label class="col-form-label">Evaluasi Produk Hasil</label>
                    </div>

                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="evaluasi-produk" id="eval-produk-jelek"
                                value="jelek">
                            <label class="form-check-label" for="eval-produk-jelek">Jelek</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="evaluasi-produk" id="eval-produk-sedang"
                                value="sedang">
                            <label class="form-check-label" for="eval-produk-sedang">Sedang</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="evaluasi-produk" id="eval-produk-bagus"
                                value="bagus">
                            <label class="form-check-label" for="eval-produk-bagus">Bagus</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Evaluasi Mesin</label>
                    </div>

                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="evaluasi-mesin" id="eval-mesin-jelek"
                                value="jelek">
                            <label class="form-check-label" for="eval-mesin-jelek">Jelek</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="evaluasi-mesin" id="eval-mesin-sedang"
                                value="sedang">
                            <label class="form-check-label" for="eval-mesin-sedang">Sedang</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="evaluasi-mesin" id="eval-mesin-bagus"
                                value="bagus">
                            <label class="form-check-label" for="eval-mesin-bagus">Bagus</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Evaluasi Bahan Baku</label>
                    </div>

                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="evaluasi-bahan-baku" id="eval-bahan-baku-jelek"
                                value="jelek">
                            <label class="form-check-label" for="eval-bahan-baku-jelek">Jelek</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="evaluasi-bahan-baku" id="eval-bahan-baku-sedang"
                                value="sedang">
                            <label class="form-check-label" for="eval-bahan-baku-sedang">Sedang</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="evaluasi-bahan-baku" id="eval-bahan-baku-bagus"
                                value="bagus">
                            <label class="form-check-label" for="eval-bahan-baku-bagus">Bagus</label>
                        </div>
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
                <h5 class="modal-title">Edit Evaluasi Hasil Produksi</h5>
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
                        <label for="" class="col-form-label">Bahan Baku</label>
                        <input type="text" name="" id="" value="Plastik Virgin" class="form-control" readonly>
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
                        <label class="col-form-label">Evaluasi Produk Hasil</label>
                    </div>

                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="evaluasi-produk" id="edit-eval-produk-jelek"
                                value="jelek">
                            <label class="form-check-label" for="edit-eval-produk-jelek">Jelek</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="evaluasi-produk" id="edit-eval-produk-sedang"
                                value="sedang">
                            <label class="form-check-label" for="edit-eval-produk-sedang">Sedang</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="evaluasi-produk" id="edit-eval-produk-bagus"
                                value="bagus">
                            <label class="form-check-label" for="edit-eval-produk-bagus">Bagus</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Evaluasi Mesin</label>
                    </div>

                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="evaluasi-mesin" id="edit-eval-mesin-jelek"
                                value="jelek">
                            <label class="form-check-label" for="edit-eval-mesin-jelek">Jelek</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="evaluasi-mesin" id="edit-eval-mesin-sedang"
                                value="sedang">
                            <label class="form-check-label" for="edit-eval-mesin-sedang">Sedang</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="evaluasi-mesin" id="edit-eval-mesin-bagus"
                                value="bagus">
                            <label class="form-check-label" for="edit-eval-mesin-bagus">Bagus</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Evaluasi Bahan Baku</label>
                    </div>

                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="evaluasi-bahan-baku" id="edit-eval-bahan-baku-jelek"
                                value="jelek">
                            <label class="form-check-label" for="edit-eval-bahan-baku-jelek">Jelek</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="evaluasi-bahan-baku" id="edit-eval-bahan-baku-sedang"
                                value="sedang">
                            <label class="form-check-label" for="edit-eval-bahan-baku-sedang">Sedang</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="evaluasi-bahan-baku" id="edit-eval-bahan-baku-bagus"
                                value="bagus">
                            <label class="form-check-label" for="edit-eval-bahan-baku-bagus">Bagus</label>
                        </div>
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
                <h5 class="modal-title">Detail Produksi</h5>
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
                        <h5>Bahan Baku</h5>
                        <h6>Plastik Virgin</h6>
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
                        <h6>Sedang</h6>
                    </div>

                    <div class="my-3">
                        <h5>Evaluasi Mesin</h5>
                        <h6>Bagus</h6>
                    </div>

                    <div class="my-3">
                        <h5>Evaluasi Bahan Baku</h5>
                        <h6>Sedang</h6>
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