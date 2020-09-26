@extends('layouts/manajer-marketing/main')
@section('title', 'Dashboard')
@section('extra-css')
    <link rel="stylesheet" href="{{ asset('/assets/css/manajer-marketing-dashboard.css') }}">
    <script>
        const namaBulan = [
            "Januari", "Februari", "Maret", "April", "Mei", "Juni",
            "Juli", "Agustus", "September", "Oktober", "November",
            "Desember"
        ];

        const waktu = new Date();
    </script>
@endsection

@section('content')
<!-- Content -->
<div class="content ">

    <div class="page-header">
        <h4>Dashboard</h4>
        <hr>
    </div>

    <div class="row">
        <div class="col-md-12">

            <div class="d-flex justify-content-center">
                <h5 class="card-title">
                    Statistik Penjualan Produk
                    <script>document.write(namaBulan[waktu.getMonth()] + ' ' + waktu.getFullYear());</script>
                </h5>
            </div>

            <div class="card chart-container">
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="chart-penjualan-produk-bulanan"></div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <h5 class="card-title">
                    Perkembangan Penjualan Produk @php echo date("Y"); @endphp
                </h5>
            </div>

            <div class="card chart-container">
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="chart-penjualan-produk-tahunan"></div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <h5 class="card-title">
                    Perkembangan Penjualan Produk Keseluruhan @php echo date("Y"); @endphp
                </h5>
            </div>

            <div class="card chart-container">
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="chart-penjualan-keseluruhan-tahunan"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
<!-- ./ Content -->
@endsection

@section('extra-script')
    <script src="{{ asset('/assets/js/google-chart-loader.js') }}"></script>
    
    <script>
        const menu = document.getElementById("dashboard-menu");
        menu.classList.add("active");

        // Load the Visualization API and the corechart package.
        google.charts.load('current', {
            'packages': ['corechart', 'line']
        });

        // Set a callback to run when the Google Visualization API is loaded.
        google.charts.setOnLoadCallback(penjualanProdukBulanan);
        google.charts.setOnLoadCallback(penjualanProdukTahunan);
        google.charts.setOnLoadCallback(penjualanKeseluruhanTahunan);

        // function - statistik penjualan produk per bulan
        function penjualanProdukBulanan() {

            var data = new google.visualization.arrayToDataTable([
                ["Element", "Produk Terjual (pcs)", { role: "style" } ],
                ['Tutup Galon Tipe A', 10000, "blue"],
                ['Tutup Galon Tipe B', 7000, "blue"],
                ['Tutup Galon Tipe C', 12000, "blue"],
                ['Tutup Galon Tipe D', 2000, "blue"],
                ['Tutup Galon Tipe E', 5000, "blue"]
            ]);

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1,
                                { calc: "stringify",
                                    sourceColumn: 1,
                                    type: "string",
                                    role: "annotation" },
                                2]);

            var options = {
                width: 1000,
                height: 500,
                bar: {groupWidth: "95%"},
                legend: { position: "none" },
            };

            var chart_div = document.getElementById('chart-penjualan-produk-bulanan');
            var chart = new google.visualization.ColumnChart(chart_div);
            chart.draw(view, options);
        }

        // function - chart perkembangan penjualan produk sepanjang tahun
        function penjualanProdukTahunan() {
            var data = google.visualization.arrayToDataTable([
                ['Bulan', 'Tutup Galon A', 'Tutup Galon B', 'Tutup Galon C'],
                ['Januari', 1000, 400, 600],
                ['Februari', 1170, 460, 760],
                ['Maret', 660, 1120, 550],
                ['April', 1030, 540, 1200],
                ['Mei', 1000, 400, 600],
                ['Juni', 1170, 460, 760],
                ['Juli', 660, 1120, 550],
                ['Agustus', 1030, 540, 1200],
                ['September', 1000, 400, 600],
                ['Oktober', 0, 0, 0],
                ['November', 0, 0, 0],
                ['Desember', 0, 0, 0]
            ]);

            var options = {
                vAxis: {
                    minValue: 0
                },
                width: 1000,
                height: 500
            };

            var chart_div = document.getElementById('chart-penjualan-produk-tahunan');
            var chart = new google.visualization.AreaChart(chart_div);
            chart.draw(data, options);
        }

        // function - perkembangan penjualan keseluruhan produk sepanjang tahun
        function penjualanKeseluruhanTahunan() {

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