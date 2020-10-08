@extends('layouts/owner/main')
@section('title', 'Laporan Transaksi Customer')
@section('extra-css')
    <link rel="stylesheet" href="{{ asset('/assets/datatable/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/owner.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/owner-laporan-transaksi.css') }}">
@endsection

@section('content')
<!-- Content -->
<div class="content ">

    <div class="page-header">
        <h4>Laporan Transaksi Customer</h4>
        <hr>
    </div>

    <div class="row">
        <div class="col-md-12">

            <div class="d-flex justify-content-center">
                <h5 class="card-title">
                    Statistik Penjualan Tahun @php echo date("Y"); @endphp
                </h5>
            </div>

            <div class="card chart-container">
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="chart-penjualan-keseluruhan-tahunan"></div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <h5 class="card-title">
                Per Tanggal
                @php
                    echo "01" . date("/m/Y") . " - " . date("d/m/Y");
                @endphp
                </h5>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card card-1">
                        <div class="card-body">
                            <h6 class="card-title">
                                Jumlah Transaksi
                            </h6>
                            <div class="d-flex align-items-center mb-3">
                                <div>
                                    <div class="avatar">
                                        <span class="avatar-title bg-primary-bright text-primary rounded-pill">
                                            <i class="ti-layers"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="font-weight-bold ml-1 font-size-30 ml-3">37 Transaksi</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card card-1">
                        <div class="card-body">
                            <h6 class="card-title">
                                Jumlah Pemasukan
                            </h6>
                            <div class="d-flex align-items-center mb-3">
                                <div>
                                    <div class="avatar">
                                        <span class="avatar-title bg-primary-bright text-primary rounded-pill">
                                            <i class="ti-money"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="font-weight-bold ml-1 font-size-30 ml-3">IDR 4.560.000</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="judul-tabel mt-3">
                <h5>Daftar Transaksi</h5>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table datatable-component table-bordered table-responsive-stack">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Biaya Transaksi (IDR)</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>12/08/2020</td>
                                    <td>Depo Air Minum Permata</td>
                                    <td>3.750.000</td>
                                    <td>
                                        <button class="btn btn-linkedin btn-sm" data-toggle="modal" data-target="#modal-detail-transaksi">
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

{{-- Start Modal Detail Transaksi --}}
<div class="modal fade" id="modal-detail-transaksi" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title">Detail Transaksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times-circle text-danger"></i>
                </button>
            </div>
            <div class="modal-body">

                <div class="container">

                    <div class="mb-3">
                        <h5>Tanggal</h5>
                        <h6>12/08/2020</h6>
                    </div>

                    <div class="my-3">
                        <h5>Customer</h5>
                        <h6>Depo Air Minum Permata</h6>
                    </div>

                    <div class="my-3">
                        <h5>Alamat</h5>
                        <h6>Jl. Airlangga No. 4-6 Surabaya</h6>
                    </div>

                    <div class="my-3">
                        <h5>Barang</h5>
                        
                        <table class="table table-sm table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Jumlah (pcs)</th>
                                    <th scope="col">Harga (IDR)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Tutup Galon A</td>
                                    <td>5000</td>
                                    <td>400.000</td>
                                </tr>
                                <tr>
                                    <td>Tutup Galon B</td>
                                    <td>7000</td>
                                    <td>375.000</td>
                                </tr>
                                <tr>
                                    <td>Tutup Galon C</td>
                                    <td>2000</td>
                                    <td>90.000</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="my-3">
                        <h5>Jumlah Barang (pcs)</h5>
                        <h6>9.000</h6>
                    </div>

                    <div class="my-3">
                        <h5>Biaya Transaksi (IDR)</h5>
                        <h6>875.000</h6>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
{{-- End of Modal Detail Transaksi --}}
@endsection

@section('extra-script')
    <script src="{{ asset('/assets/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('/assets/js/owner-laporan-transaksi.js') }}"></script>
    <script src="{{ asset('/assets/js/google-chart-loader.js') }}"></script>

    <script>
        // Load the Visualization API and the corechart package.
        google.charts.load('current', {
            'packages': ['corechart', 'line']
        });

        // Set a callback to run when the Google Visualization API is loaded.
        google.charts.setOnLoadCallback(perkembanganPenjualan);

        // function - perkembangan penjualan keseluruhan produk sepanjang tahun
        function perkembanganPenjualan() {

            var data = new google.visualization.DataTable();
            data.addColumn('string', '');
            data.addColumn('number', 'Produk Terjual (pcs)');

            data.addRows([
                ['Januari', 37000],
                ['Februari', 67000],
                ['Maret', 45000],
                ['April', 55250],
                ['Mei', 35050],
                ['Juni', 81000],
                ['Juli', 72890],
                ['Agustus', 77650],
                ['September', 54545],
                ['Oktober', 0],
                ['November', 0],
                ['Desember', 0],
            ]);

            var options = {
                width: 900,
                height: 500
            };

            var chart_div = document.getElementById('chart-penjualan-keseluruhan-tahunan');
            var chart = new google.charts.Line(chart_div);
            chart.draw(data, google.charts.Line.convertOptions(options));
        }
    </script>
@endsection