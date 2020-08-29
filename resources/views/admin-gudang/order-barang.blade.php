@extends('layouts/admin-gudang/main')
@section('title', 'Order Barang')
@section('extra-css')
    <link rel="stylesheet" href="{{ asset('/assets/gogi/vendors/dataTable/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/admin-gudang.css') }}">
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

            <div class="judul-tabel mb-3">
                <h5 class="">Riwayat Order Barang</h5>
            </div>

            <table id="order-barang-table" class="table table-striped table-bordered table-responsive-stack">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID Order</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>ORD00001</td>
                        <td>01/08/2020</td>
                        <td>Depo Air Minum Kertajaya Indah</td>
                        <td>
                            <div class="badge badge-success">
                                SELESAI
                                <i class="fas fa-check ml-1"></i>
                            </div>
                        </td>
                        <td colspan="2">
                            <button class="btn btn-linkedin btn-sm"
                                data-toggle="modal" data-target="#modal-detail-order-barang">
                                <i class="fas fa-info-circle mr-1"></i>
                                DETAIL
                            </button>
                            <button class="btn btn-google btn-sm"
                                data-toggle="modal" data-target="#modal-pengiriman-barang">
                                PENGIRIMAN
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>ORD00002</td>
                        <td>02/08/2020</td>
                        <td>Depo Air Minum Surya</td>
                        <td>
                            <div class="badge badge-secondary">
                                DIPROSES
                                <i class="fas fa-exclamation-circle ml-1"></i>
                            </div>
                        </td>
                        <td colspan="2">
                            <button class="btn btn-linkedin btn-sm"
                                data-toggle="modal" data-target="#modal-detail-order-barang">
                                <i class="fas fa-info-circle mr-1"></i>
                                DETAIL
                            </button>
                            <button class="btn btn-google btn-sm"
                                data-toggle="modal" data-target="#modal-pengiriman-barang">
                                PENGIRIMAN
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
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
                        <h5>Tanggal Order</h5>
                        <h6>01/08/2020</h6>
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

                    <div class="mt-5 d-flex justify-content-center">
                        <a href="" class="btn btn-md btn-google">
                            <i class="far fa-file-alt mr-2"></i>
                            NOTA ORDER
                        </a>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
{{-- End of Detail Order Barang Modal--}}

{{-- Start Pengiriman Modal --}}
<div class="modal fade" id="modal-pengiriman-barang" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title">Pengiriman Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times-circle text-danger"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    @csrf

                    {{-- Hidden id admin gudang yang bertugas --}}
                    <input type="hidden" name="" id="" value="">

                    <div class="form-group">
                        <label for="">Tanggal Pengiriman</label>
                        <input type="date" name="" id="" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">ID Order</label>
                        <input type="text" name="" id="" value="ORD00001" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">Tanggal Order</label>
                        <input type="text" name="" id="" value="01/08/2020" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">Customer</label>
                        <input type="text" name="" id="" value="Depo Air Minum Kertajaya Indah" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">Produk</label>
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

                    <div class="form-group">
                        <label for="" class="col-form-label">Total Item (pcs)</label>
                        <input type="text" name="" id="" value="1000" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">Total Harga Produk (IDR)</label>
                        <input type="text" name="" id="" value="125000" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">Ongkos Kirim (IDR)</label>
                        <input type="text" name="" id="" value="20000" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">Total Bayar (IDR)</label>
                        <input type="text" name="" id="" value="145000" class="form-control" readonly>
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
{{-- End of Pengiriman Modall --}}
@endsection

@section('extra-script')
    <script src="{{ asset('/assets/gogi/vendors/dataTable/datatables.min.js') }}"></script>
    <script src="{{ asset('/assets/js/admin-gudang-order-barang.js') }}"></script>
@endsection