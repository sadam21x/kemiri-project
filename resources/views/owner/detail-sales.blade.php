@extends('layouts/owner/main')
@section('title', 'Detail Sales')
@section('extra-css')
    <link rel="stylesheet" href="{{ asset('/assets/gogi/vendors/dataTable/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/owner.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/owner-detail-sales.css') }}">
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
                        @if($jabatan == "Sales A")
                        {{$data->NAMA_SALES_A}}
                        @else
                        {{$data->NAMA_SALES_B}}
                        @endif
                    </div>
                </div>
                @if($jabatan == "Sales A")
                <div class="card-body card-body-profile">
                    <table class="profil-table">
                        <tr>
                            <td class="label-detail">ID Sales</td>
                            <td>{{$data->ID_SALES_A}}</td>
                        </tr>
                        <tr>
                            <td class="label-detail">Jabatan</td>
                            <td>Sales A</td>
                        </tr>
                        <tr>
                            <td class="label-detail">Jenis Kelamin</td>
                            <td>@if($data->JENIS_KELAMIN_SALES_A)
                                Pria
                                @else
                                Wanita
                                @endif</td>
                        </tr>
                        <tr>
                            <td class="label-detail">Alamat</td>
                            <td>{{$data->ALAMAT_SALES_A}}</td>
                        </tr>
                        <tr>
                            <td class="label-detail">Kota/Kabupaten</td>
                            <td>{{$data->indonesia_city->name}}</td>
                        </tr>
                        <tr>
                            <td class="label-detail">Provinsi</td>
                            <td>{{$data->indonesia_city->indonesia_province->name}}</td>
                        </tr>
                        <tr>
                            <td class="label-detail">Telepon</td>
                            <td>{{$data->NO_TELP_SALES_A}}</td>
                        </tr>
                        <tr>
                            <td class="label-detail">Email</td>
                            <td>{{$data->EMAIL_SALES_A}}</td>
                        </tr>
                    </table>
                </div>
                @else
                <div class="card-body card-body-profile">
                    <table class="profil-table">
                        <tr>
                            <td class="label-detail">ID Sales</td>
                            <td>{{$data->ID_SALES_B}}</td>
                        </tr>
                        <tr>
                            <td class="label-detail">Jabatan</td>
                            <td>Sales B</td>
                        </tr>
                        <tr>
                            <td class="label-detail">Jenis Kelamin</td>
                            <td>@if($data->JENIS_KELAMIN_SALES_B)
                                Pria
                                @else
                                Wanita
                                @endif</td>
                        </tr>
                        <tr>
                            <td class="label-detail">Alamat</td>
                            <td>{{$data->ALAMAT_SALES_B}}</td>
                        </tr>
                        <tr>
                            <td class="label-detail">Kota/Kabupaten</td>
                            <td>{{$data->indonesia_city->name}}</td>
                        </tr>
                        <tr>
                            <td class="label-detail">Provinsi</td>
                            <td>{{$data->indonesia_city->indonesia_province->name}}</td>
                        </tr>
                        <tr>
                            <td class="label-detail">Telepon</td>
                            <td>{{$data->NO_TELP_SALES_B}}</td>
                        </tr>
                        <tr>
                            <td class="label-detail">Email</td>
                            <td>{{$data->EMAIL_SALES_B}}</td>
                        </tr>
                    </table>
                </div>
                @endif
            </div>
        </div>
        {{-- End of detail profil sales --}}

        {{-- Start rekap kinerja --}}
        <div class="col-md-8 col-sm-12">
            <div class="card-title">
                @if($jabatan == "Sales A")
                Rekap Penginputan Customer
                @else
                Rekap Penginputan Order
                @endif
                
            </div>

            <div class="card">
                <div class="card-body">
                    <table
                        class="table table-striped table-bordered rekap-table table-responsive-stack">
                        <thead class="thead-dark">
                            <th scope="col">Tanggal</th>
                            <th scope="col">Customer</th>
                        </thead>
                        <tbody>
                            @if($jabatan == "Sales A")
                                @foreach($data->depo_air_minums as $d)
                                <tr>
                                    <td>{{$d->created_at}}</td>
                                    <td>{{$d->NAMA_DEPO}}</td>
                                </tr>
                                @endforeach
                            @else
                                @foreach($data->penjualans as $d)
                                <tr>
                                    <td>{{$d->TGL_PENJUALAN}}</td>
                                    <td>{{$d->depo_air_minum->NAMA_DEPO}}</td>
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
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
    <script src="{{ asset('/assets/js/owner-detail-sales.js') }}"></script>
@endsection