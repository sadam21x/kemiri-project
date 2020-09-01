@extends('layouts/manajer-marketing/main')
@section('title', 'Sales')
@section('extra-css')
    <link rel="stylesheet" href="{{ asset('/assets/gogi/vendors/dataTable/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/manajer-marketing.css') }}">
@endsection

@section('content')
{{-- Start Content --}}
<div class="content">
    <div class="page-header">
        <h4>Sales</h4>
        <hr>
    </div>

    <div class="row">
        <div class="col-md-12">

            {{-- Start Sales A --}}
            <div class="judul-tabel">
                <h5 class="">Daftar Sales A</h5>
            </div>

            <div class="card">
                <div class="card-body">
                    <table id="sales-a-table" class="table table-bordered table-stripped table-responsive-stack">
                        <thead class="thead-dark">
                            <th scope="col">ID Sales</th>
                            <th scope="col">Nama Sales</th>
                            <th scope="col">Aksi</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>SLA00001</td>
                                <td>Rama Suastika</td>
                                <td colspan="2">
                                    <a href="{{ url('/manajer-marketing/detail-sales') }}"
                                        class="btn btn-sm btn-linkedin mr-1">
                                        <i class="fas fa-info-circle mr-2"></i>
                                        DETAIL
                                    </a>
                                    <a href="{{ url('/manajer-marketing/evaluasi-kinerja-sales') }}"
                                        class="btn btn-sm btn-secondary mr-1">
                                        <i class="fas fa-book-open mr-2"></i>
                                        EVALUASI
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>SLA00002</td>
                                <td>Devia Kirana</td>
                                <td colspan="2">
                                    <a href="{{ url('/manajer-marketing/detail-sales') }}"
                                        class="btn btn-sm btn-linkedin mr-1">
                                        <i class="fas fa-info-circle mr-2"></i>
                                        DETAIL
                                    </a>
                                    <a href="{{ url('/manajer-marketing/evaluasi-kinerja-sales') }}"
                                        class="btn btn-sm btn-secondary mr-1">
                                        <i class="fas fa-book-open mr-2"></i>
                                        EVALUASI
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- End of Sales A --}}

            {{-- Start Sales B --}}
            <div class="judul-tabel">
                <h5 class="">Daftar Sales B</h5>
            </div>

            <div class="card">
                <div class="card-body">
                    <table id="sales-b-table" class="table table-bordered table-stripped table-responsive-stack">
                        <thead class="thead-dark">
                            <th scope="col">ID Sales</th>
                            <th scope="col">Nama Sales</th>
                            <th scope="col">Aksi</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>SLB00001</td>
                                <td>Rama Suastika</td>
                                <td colspan="2">
                                    <a href="{{ url('/manajer-marketing/detail-sales') }}"
                                        class="btn btn-sm btn-linkedin mr-1">
                                        <i class="fas fa-info-circle mr-2"></i>
                                        DETAIL
                                    </a>
                                    <a href="{{ url('/manajer-marketing/evaluasi-kinerja-sales') }}"
                                        class="btn btn-sm btn-secondary mr-1">
                                        <i class="fas fa-book-open mr-2"></i>
                                        EVALUASI
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>SLB00002</td>
                                <td>Devia Kirana</td>
                                <td colspan="2">
                                    <a href="{{ url('/manajer-marketing/detail-sales') }}"
                                        class="btn btn-sm btn-linkedin mr-1">
                                        <i class="fas fa-info-circle mr-2"></i>
                                        DETAIL
                                    </a>
                                    <a href="{{ url('/manajer-marketing/evaluasi-kinerja-sales') }}"
                                        class="btn btn-sm btn-secondary mr-1">
                                        <i class="fas fa-book-open mr-2"></i>
                                        EVALUASI
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- End of Sales B --}}

        </div>
    </div>
</div>
{{-- End of Content --}}
@endsection

@section('extra-script')
    <script src="{{ asset('/assets/gogi/vendors/dataTable/datatables.min.js') }}"></script>
    <script src="{{ asset('/assets/js/manajer-marketing-sales.js') }}"></script>
@endsection