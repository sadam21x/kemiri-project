@extends('layouts/admin-gudang/main')
@section('title', 'Input Pengiriman Barang')
@section('extra-css')
    <link rel="stylesheet" href="{{ asset('/assets/gogi/vendors/dataTable/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/gogi/vendors/datepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/gogi/vendors/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/admin-gudang.css') }}">
@endsection

@section('content')
{{-- Start Content --}}
<div class="content">
    <div class="page-header">
        <h4>Input Pengiriman Barang</h4>
        <hr>
    </div>

    <div class="row">
        <div class="col-md-12">
            {{-- Start form pengiriman barang --}}
            <form action="" method="post">
                @csrf

                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="staff">Staff Gudang</label>
                        {{-- Id admin gudang --}}
                        <input type="hidden" value="" name="user_id" id="user_id">
                        <input type="text" class="form-control" readonly value="Ahmad Baihaqi">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="customer">Customer</label>
                        <select name="" id="" class="select-component form-control">
                            <option value="Depo Air Minum Jaya Sakthi">Depo Air Minum Jaya Sakthi</option>
                            <option value="Depo Air Minum Kertajaya Indah">Depo Air Minum Kertajaya Indah</option>
                            <option value="Depo Air Minum Pak Mahmud">Depo Air Minum Pak Mahmud</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Tanggal Pengiriman</label>
                        <input type="date" name="" id="" class="form-control">
                    </div>
                </div>

                <div class="form-row my-2">
                    <h5>Tambah Produk</h5>
                </div>

                <div class="form-row mt-2">
                    <div class="form-group mx-2">
                        <label for="categories">Kategori</label>
                        <select id="categories" name="categories" class="form-control">
                            <option value="semua">Semua</option>
                            <option value="Tutup Galon">Tutup Galon</option>
                            <option value="AMDK">AMDK</option>
                        </select>
                    </div>

                    <div class="form-group mx-2">
                        <label for="product">Produk</label>
                        <select id="product" name="product" class="form-control select-component">
                            <option value="Tutup Galon Tipe A">Tutup Galon Tipe A</option>
                            <option value="Tutup Galon Tipe B">Tutup Galon Tipe B</option>
                            <option value="Tutup Galon Tipe C">Tutup Galon Tipe C</option>
                        </select>
                    </div>

                    <div class="form-group col-md-4 mt-4 ml-2">
                        <a class="btn btn-sm btn-secondary mt-2 text-white">Tambah</a>
                    </div>
                </div>

                <table class="table table-hover my-4">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID Produk</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Harga/pcs (IDR)</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Diskon (%)</th>
                            <th scope="col">Harga Akhir (IDR)</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>
                                PRD001
                            </td>
                            <td>
                                Tutup Galon Tipe A
                            </td>
                            <td>
                                125
                            </td>
                            <td>
                                <input type="number" name="" id="" value="1" min="1" class="input-num-sm">
                            </td>
                            <td>
                                <input type="number" name="" id="" value="0" min="0" max="100" class="input-num-sm">
                            </td>
                            <td>
                                125
                            </td>
                            <td>
                                <button class="btn btn-sm btn-youtube">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="form-group row mt-5">

                    <div class="form-group col-md-6">
                        <h3>Pembayaran</h3>

                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Total Item</label>
                            <div class="col-sm-4">
                                <input type="text" readonly class="form-control-plaintext" id=""
                                    name="" value="1000">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Total Harga Produk (IDR)</label>
                            <div class="col-sm-4">
                                <input type="text" readonly class="form-control-plaintext" id=""
                                    name="" value="125.000">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Ongkos Kirim (IDR)</label>
                            <div class="col-sm-4">
                                <input type="text" readonly class="form-control-plaintext" id=""
                                    name="" value="20.000">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Total Bayar (IDR)</label>
                            <div class="col-sm-4">
                                <input type="text" readonly class="form-control-plaintext" id=""
                                    name="" value="145.000">
                            </div>
                        </div>

                    </div>

                    <div class="form-group col-md-4">
                        <h3>Metode Pengiriman</h3>

                        <div class="form-group">
                            <select id="" name="" class="form-control select-component">
                                <option value="">Truk Kontainer</option>
                                <option value="">POS</option>
                                <option value="">TIKI</option>
                                <option value="">JNE</option>
                                <option value="">J&T</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group d-flex justify-content-center">
                    <button type="button" class="btn btn-linkedin my-3" data-toggle="modal" data-target="#modal-konfirmasi">
                        SIMPAN
                    </button>
                </div>

                <div class="modal fade" id="modal-konfirmasi" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-secondary">
                                <h5 class="modal-title" id="modal-form-label">Konfirmasi</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i class="fas fa-times-circle text-danger"></i>
                                </button>
                            </div>
                            <div class="modal-body">

                                <div class="container">

                                    <div class="my-3">
                                        <h5>Apakah anda yakin untuk menyimpan transaksi ini?</h5>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-google" data-dismiss="modal">BATAL</button>
                                        <button type="submit" class="btn btn-linkedin">SIMPAN</button>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                
            </form>
            {{-- End of form pengiriman barang --}}
        </div>
    </div>
</div>
{{-- End of Content --}}
@endsection

@section('extra-script')
    <script src="{{ asset('/assets/gogi/vendors/dataTable/datatables.min.js') }}"></script>
    <script src="{{ asset('/assets/gogi/vendors/datepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('/assets/gogi/vendors/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('/assets/js/admin-gudang-input-pengiriman-barang.js') }}"></script>
@endsection