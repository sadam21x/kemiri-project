@extends('layouts/owner/main')
@section('title', 'Pembayaran Customer')
@section('extra-css')
    <link rel="stylesheet" href="{{ asset('/assets/datatable/datatables.min.css') }}">    
    <link rel="stylesheet" href="{{ asset('/assets/css/owner.css') }}">    
@endsection

@section('content')
<!-- Content -->
<div class="content ">

    <div class="page-header">
        <h4>Pembayaran Customer</h4>
        <hr>
    </div>

    <div class="row">
        <div class="col-md-12">

            <div class="judul-tabel mb-3">
                <h5>Riwayat Order</h5>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive-stack datatable-component">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Konfirmasi Pembayaran</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>20/08/2020</td>
                                    <td>Depo Air Minum Prima Mukti</td>
                                    <td>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input switch-bayar" id="konfirmasi-bayar">
                                            <label class="custom-control-label label-bayar text-danger" for="konfirmasi-bayar">Belum Bayar</label>
                                        </div>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-linkedin" data-toggle="modal" data-target="#modal-detail-order-barang">
                                            <i class="fas fa-info-circle mr-2"></i>
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

</div>
<!-- ./ Content -->

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

                    <div class="mb-3">
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
@endsection

@section('extra-script')
    <script src="{{ asset('/assets/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('/assets/js/owner-pembayaran-customer.js') }}"></script>
@endsection