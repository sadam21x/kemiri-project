@extends('layouts/admin-gudang/main')
@section('title', 'Dashboard')    
@section('extra-css')
    <link rel="stylesheet" href="{{ asset('/assets/datatable/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/gogi/vendors/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/admin-gudang.css') }}">
@endsection

@section('content')
<!-- Content -->
<div class="content ">

    <div class="page-header">
        <h4>Dashboard</h4>
        <hr>
    </div>

    <div class="row">
        <div class="col d-flex align-items-center justify-content-center">
            <div class="row">
                <div class="col-md">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Jumlah Stock Plastik Bekas</h6>
                            <div class="d-flex align-items-center">
                                <div>
                                    <div class="avatar">
                                        <span class="avatar-title bg-primary-bright text-primary rounded-pill">
                                        </span>
                                    </div>
                                </div>
                                <div class="font-weight-bold ml-1 font-size-30 ml-3">265</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Jumlah Stock Plastik Virgin</h6>
                            <div class="d-flex align-items-center">
                                <div>
                                    <div class="avatar">
                                        <span class="avatar-title bg-success text-info rounded-pill">
                                        </span>
                                    </div>
                                </div>
                                <div class="font-weight-bold ml-1 font-size-30 ml-3">80</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Jumlah Stock Pewarna</h6>
                            <div class="d-flex align-items-center">
                                <div>
                                    <div class="avatar">
                                        <span class="avatar-title bg-warning text-secondary rounded-pill">
                                        </span>
                                    </div>
                                </div>
                                <div class="font-weight-bold ml-1 font-size-30 ml-3">30</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <h6 class="card-title mb-4 text-center">Total Penjualan Bulan ini</h6>
                        <h2 class="font-size-35 font-weight-bold text-center">Rp 10.000.000</h2>
                        <p>Angka diatas menunjukkan total penjualan barang pada bulan ini</p>
                    </div>
                </div>
            </div>            
        </div>
        <div class="col-md-6">
            <div class="card bg-info-bright">
                <div class="card-body">
                    <div class="text-center">
                        <h6 class="card-title mb-4 text-center">Total Penjualan Minggu Ini</h6>
                        <h2 class="font-size-35 font-weight-bold text-center">Rp 3.500.000</h2>
                        <p>Angka diatas menunjukkan total penjualan barang pada minggu ini</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="judul-tabel mt-3 ml-4">
                    <h5>Rekap Supplier Penerimaan Bahan Baku Minggu ini</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="customer-table" class="table table-bordered table-responsive-stack">
                            <thead class="thead-dark">
                                <th scope="col">Tanggal</th>
                                <th scope="col">Supplier</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Tgl</td>
                                    <td>Nama</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="judul-tabel mt-3 ml-4">
                    <h5>Rekap Daftar Order Barang Yang Masih Di Proses</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="customer-table" class="table table-bordered table-responsive-stack">
                            <thead class="thead-dark">
                                <th scope="col">Tanggal</th>
                                <th scope="col">Customer</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Tgl</td>
                                    <td>Nama</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="judul-tabel mt-3 ml-4">
                    <h5>Rekap Daftar Pengiriman Barang Yang Masih Pending</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="customer-table" class="table table-bordered table-responsive-stack">
                            <thead class="thead-dark">
                                <th scope="col">Tanggal</th>
                                <th scope="col">Customer</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Tgl</td>
                                    <td>Nama</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="judul-tabel mt-3 ml-4">
                    <h5>Daftar Supplier</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="customer-table" class="table table-bordered table-responsive-stack">
                            <thead class="thead-dark">
                                <th scope="col">Nama Supplier</th>
                                <th scope="col">Alamat</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Nama</td>
                                    <td>Alamat</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="judul-tabel mt-3 ml-4">
                    <h5>Daftar Customer</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="customer-table" class="table table-bordered table-responsive-stack">
                            <thead class="thead-dark">
                                <th scope="col">Nama Customer</th>
                                <th scope="col">Alamat</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Nama</td>
                                    <td>Alamat</td>
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
@endsection

@section('extra-script')
    <script src="{{ asset('/assets/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('/assets/gogi/vendors/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('/assets/js/admin-gudang-dashboard.js') }}"></script>
@endsection