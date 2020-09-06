@extends('layouts/owner/main')
@section('title', 'Sales')
@section('extra-css')
    <link rel="stylesheet" href="{{ asset('/assets/datatable/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/owner.css') }}">
@endsection

@section('content')
{{-- Start Content --}}
<div class="content">
    <div class="page-header">
        <div class="d-flex">
            <h4>Sales</h4>
            <a href="{{ url('/owner/sales/tambah') }}" data-toggle="tooltip" data-placement="bottom" title="Tambah sales baru">
                <i class="fas fa-user-plus fa-2x"></i>
            </a>
        </div>
        <hr>
    </div>

    <div class="row">
        <div class="col-md-12">

            {{-- Start Sales A --}}
            <div class="judul-tabel">
                <h5>Daftar Sales A</h5>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive-stack datatable-component">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">ID Sales</th>
                                    <th scope="col">Nama Sales</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>SLA00001</td>
                                    <td>Bayu Sandhi Pratama</td>
                                    <td>
                                        <a href="{{ url('/owner/detail-sales') }}" class="btn btn-sm btn-linkedin">
                                            <i class="fas fa-info-circle mr-2"></i>
                                            DETAIL
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- End of Sales A --}}

            {{-- Start Sales B --}}
            <div class="judul-tabel">
                <h5>Daftar Sales B</h5>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive-stack datatable-component">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">ID Sales</th>
                                    <th scope="col">Nama Sales</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>SLB00001</td>
                                    <td>Made Handy Bijaksana</td>
                                    <td>
                                        <a href="{{ url('/manajer-marketing/detail-sales/') }}"
                                            class="btn btn-sm btn-linkedin">
                                            <i class="fas fa-info-circle mr-2"></i>
                                            DETAIL
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- End of Sales B --}}

        </div>
    </div>
</div>
{{-- End of Content --}}
@endsection

@section('extra-script')
    <script src="{{ asset('/assets/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('/assets/js/owner-sales.js') }}"></script>
@endsection