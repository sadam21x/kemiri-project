@extends('layouts/admin-gudang/main')
@section('title', 'Pengiriman Barang')
@section('extra-css')
    <link rel="stylesheet" href="{{ asset('/assets/gogi/vendors/dataTable/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/admin-gudang.css') }}">
@endsection

@section('content')
<!-- Start Content -->
<div class="content ">
    <div class="page-header">
        <h4>Pengiriman Barang</h4>
        <hr>
    </div>

    <div class="row">
        <div class="col-md-12">

            <div class="judul-tabel mb-3">
                <h5 class="">Riwayat Pengiriman Barang</h5>
                <a href="{{ url('/admin-gudang/pengiriman-barang/input') }}" class="btn btn-sm btn-rounded bg-dribbble ml-auto">
                    <i class="fas fa-plus mr-1"></i>
                    TAMBAH BARU
                </a>
            </div>

            <table id="pengiriman-barang-table" class="table table-striped table-bordered table-responsive-stack">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID Pengiriman</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>PGR00001</td>
                        <td>01/08/2020</td>
                        <td>Depo Air Minum Kertajaya Indah</td>
                        <td>
                            <a href="" class="badge badge-success">
                                TERKIRIM
                                <i class="fas fa-check ml-1"></i>
                            </a>
                        </td>
                        <td colspan="2">
                            <button class="btn btn-linkedin btn-sm tombol-detail-pengiriman"
                                data-toggle="modal" data-target="#modal-detail-pengiriman-barang">
                                <i class="fas fa-info-circle mr-1"></i>
                                DETAIL
                            </button>
                            <a href="{{ url('/admin-gudang/pengiriman-barang/edit') }}" class="disabled btn btn-warning btn-sm">
                                <i class="fas fa-edit mr-1"></i>
                                EDIT
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>PGR00002</td>
                        <td>02/08/2020</td>
                        <td>Depo Air Minum Surya</td>
                        <td>
                            <a href="" class="badge badge-secondary">
                                PENDING
                                <i class="fas fa-exclamation-circle ml-1"></i>
                            </a>
                        </td>
                        <td colspan="2">
                            <button class="btn btn-linkedin btn-sm tombol-detail-pengiriman"
                                data-toggle="modal" data-target="#modal-detail-pengiriman-barang">
                                <i class="fas fa-info-circle mr-1"></i>
                                DETAIL
                            </button>
                            <a href="{{ url('/admin-gudang/pengiriman-barang/edit') }}" class="btn btn-warning btn-sm">
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
<!-- End of Content -->

{{-- Start Detail Pengiriman Modal --}}
<div class="modal fade" id="modal-detail-pengiriman-barang" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title">Detail Pengiriman Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times-circle text-danger"></i>
                </button>
            </div>
            <div class="modal-body">

                <div class="container">

                    <div class="my-3">
                        <h5>ID Pengiriman</h5>
                        <h6>PGR00001</h6>
                    </div>

                    <div class="my-3">
                        <h5>Tanggal Pengiriman</h5>
                        <h6>01/08/2020</h6>
                    </div>

                    <div class="my-3">
                        <h5>Staff Gudang</h5>
                        <h6>Ahmad Baihaqi</h6>
                    </div>

                    <div class="my-3">
                        <h5>Customer</h5>
                        <h6>Depo Air Minum Kertajaya Indah</h6>
                    </div>

                    <div class="my-3">
                        <h5>Metode Pengiriman</h5>
                        <h6>Truk Kontainer</h6>
                    </div>

                    <div class="my-3">
                        <h5>Produk</h5>
                        <table class="table table-stripped table-bordered">
                            <thead class="thead-dark">
                                <th scope="col">Produk</th>
                                <th scope="col">Jumlah (pcs)</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Tutup Galon Tipe A</td>
                                    <td>500</td>
                                </tr>
                                <tr>
                                    <td>Tutup Galon Tipe B</td>
                                    <td>500</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="my-3">
                        <h5>Total Item (pcs)</h5>
                        <h6>1000</h6>
                    </div>

                    <div class="my-3">
                        <h5>Total Harga Produk (IDR)</h5>
                        <h6>125.000</h6>
                    </div>

                    <div class="my-3">
                        <h5>Ongkos Kirim (IDR)</h5>
                        <h6>20.000</h6>
                    </div>

                    <div class="my-3">
                        <h5>Total Bayar (IDR)</h5>
                        <h6>145.000</h6>
                    </div>

                    <div class="mt-5 d-flex justify-content-center">
                        <a href="{{ url('/admin-gudang/bukti-terima-barang') }}" class="btn btn-md btn-google">
                            <i class="far fa-file-alt mr-2"></i>
                            SURAT JALAN
                        </a>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
{{-- End of Detail Pengiriman Modal--}}
@endsection

@section('extra-script')
    <script src="{{ asset('/assets/gogi/vendors/dataTable/datatables.min.js') }}"></script>
    <script src="{{ asset('/assets/js/admin-gudang-pengiriman-barang.js') }}"></script>
@endsection