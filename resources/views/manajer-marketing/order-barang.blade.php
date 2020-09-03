@extends('layouts/manajer-marketing/main')
@section('title', 'Order Barang')
@section('extra-css')
    <link rel="stylesheet" href="{{ asset('/assets/gogi/vendors/dataTable/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/manajer-marketing.css') }}">
@endsection

@section('content')
<!-- Start Content -->
<div class="content ">
    <div class="page-header">
        <h4>Order Barang</h4>
        <hr>
    </div>

    <div class="row">
        <div class="col-md-12">

            <div class="judul-tabel">
                <h5>Riwayat Order Barang</h5>
                <a href="{{ url('/manajer-marketing/order-barang/input') }}" class="btn btn-sm btn-rounded bg-dribbble ml-auto">
                    <i class="fas fa-plus mr-1"></i>
                    TAMBAH BARU
                </a>
            </div>

            <div class="card">
                <div class="card-body">
                    <table id="order-barang-table" class="table table-bordered table-striped table-responsive-stack">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">ID Order</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Customer</th>
                                <th scope="col">Konfirmasi Order</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>ORD00001</td>
                                <td>01/08/2020</td>
                                <td>Depo Air Minum Kertajaya Indah</td>
                                <td>
                                    <div>
                                        <span>KONFIRMASI</span>
                                        <i class="fas fa-check ml-1"></i>
                                    </div>
                                </td>
                                <td colspan="2">
                                    <button class="btn btn-linkedin btn-sm" data-toggle="modal"
                                        data-target="#modal-detail-order-barang">
                                        <i class="fas fa-info-circle mr-1"></i>
                                        DETAIL
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>ORD00002</td>
                                <td>02/08/2020</td>
                                <td>Depo Air Minum Surya</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-success">
                                        KONFIRMASI
                                    </button>
                                </td>
                                <td colspan="2">
                                    <button class="btn btn-linkedin btn-sm" data-toggle="modal"
                                        data-target="#modal-detail-order-barang">
                                        <i class="fas fa-info-circle mr-1"></i>
                                        DETAIL
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

</div>
<!-- End of Content -->

{{-- Start Detail Order Barang Modal --}}
<div class="modal fade" id="modal-detail-order-barang" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title">Detail Order Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times-circle text-danger"></i>
                </button>
            </div>
            <div class="modal-body">

                <div class="container">

                    <div class="my-3">
                        <h5>ID Order</h5>
                        <h6>ORD00001</h6>
                    </div>

                    <div class="my-3">
                        <h5>Tanggal</h5>
                        <h6>01/08/2020</h6>
                    </div>

                    <div class="my-3">
                        <h5>Staff Sales</h5>
                        <h6>Dewangga Ari Wicaksana</h6>
                    </div>

                    <div class="my-3">
                        <h5>Customer</h5>
                        <h6>Depo Air Minum Kertajaya Indah</h6>
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

                </div>

            </div>
        </div>
    </div>
</div>
{{-- End of Detail Order Barang Modal--}}
@endsection

@section('extra-script')
    <script src="{{ asset('/assets/gogi/vendors/dataTable/datatables.min.js') }}"></script>
    <script src="{{ asset('/assets/js/manajer-marketing-order-barang.js') }}"></script>
@endsection