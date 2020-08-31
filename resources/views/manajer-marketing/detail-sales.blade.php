@extends('layouts/manajer-marketing/main')
@section('title', 'Detail Sales')
@section('extra-css')
    <link rel="stylesheet" href="{{ asset('/assets/gogi/vendors/dataTable/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/manajer-marketing.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/manajer-marketing-detail-sales.css') }}">
@endsection

@section('content')
{{-- Start Content --}}
<div class="content">
    <div class="page-header">
        <h4>Detail Sales</h4>
        <hr>
    </div>

    <div class="row">

        {{-- Start detail profil sales --}}
        <div class="col-md-4 col-sm-12 d-flex justify-content-center">
            <div class="card" style="">
                <div class="card-img-top" style="background-image: url({{ asset('/assets/img/login-bg-3.png') }});">
                    <figure class="avatar avatar-xl">
                        <img src="{{ asset('/assets/img/ikan1-spongebob.png') }}" class="rounded-circle" alt="avatar">
                    </figure>
                    <div class="badge badge-dark nama-sales">
                        Rama Suastika
                    </div>
                </div>

                <div class="card-body card-body-profile">
                    <table style="tab">
                        <tr>
                            <td class="label-detail">ID Sales</td>
                            <td>SLA00001</td>
                        </tr>
                        <tr>
                            <td class="label-detail">Jabatan</td>
                            <td>Sales A</td>
                        </tr>
                        <tr>
                            <td class="label-detail">Jenis Kelamin</td>
                            <td>Pria</td>
                        </tr>
                        <tr>
                            <td class="label-detail">Alamat</td>
                            <td>Jl. D.I Pandjaitan No. 14 avysvyvsyvsvysvy</td>
                        </tr>
                        <tr>
                            <td class="label-detail">Kota/Kabupaten</td>
                            <td>Semarang</td>
                        </tr>
                        <tr>
                            <td class="label-detail">Telepom</td>
                            <td>082265118092</td>
                        </tr>
                        <tr>
                            <td class="label-detail">Email</td>
                            <td>rama76@gmail.com</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        {{-- End of detail profil sales --}}

        {{-- Start rekap kinerja --}}
        <div class="col-md-8 col-sm-12">
            <div class="card-title">
                Rekap Penginputan Customer
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered rekap-table datatable-component">
                            <thead class="thead-dark">
                                <th scope="col">Tanggal</th>
                                <th scope="col">Customer</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>01/08/2020</td>
                                    <td>Depo Sinar Mas Nusantara Bersatu</td>
                                </tr>
                                <tr>
                                    <td>01/08/2020</td>
                                    <td>Depo Sinar Mas</td>
                                </tr>
                                <tr>
                                    <td>01/08/2020</td>
                                    <td>Depo Sinar Mas</td>
                                </tr>
                                <tr>
                                    <td>01/08/2020</td>
                                    <td>Depo Sinar Mas</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        {{-- End of rekap kinerja --}}
    </div>
</div>
{{-- End of Content --}}
    
@endsection

@section('extra-script')
    <script src="{{ asset('/assets/gogi/vendors/dataTable/datatables.min.js') }}"></script>
    <script src="{{ asset('/assets/js/manajer-marketing-detail-sales.js') }}"></script>
@endsection