@extends('layouts/manajer-marketing/main')
@section('title', 'Profil Saya')
@section('extra-css')
    <link rel="stylesheet" href="{{ asset('/assets/css/manajer-marketing.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/user-profile.css') }}">
@endsection

@section('content')
<!-- Content -->
<div class="content ">

    <div class="page-header">
        <div class="d-flex">
            <h4>Profil Saya</h4>
            <a href="{{ url('/owner/tambah-pegawai') }}" data-toggle="tooltip" data-placement="bottom" title="Edit Profil">
                <i class="fas fa-pen fa-2x"></i>
            </a>
        </div>
        <hr>
    </div>

    <div class="row">
        <div class="col-sm-12 d-flex justify-content-center">
            <div class="card" style="">
                <div class="card-img-top" style="background-image: url({{ asset('/assets/img/login-bg-3.png') }});">
                    <figure class="avatar avatar-xl">
                        <img src="{{ asset('/assets/img/avatar/avatar-1.png') }}" class="rounded-circle" alt="avatar">
                    </figure>
                    <div class="badge badge-dark nama-sales">
                        Sony Wahyudi
                    </div>
                </div>
                <div class="card-body card-body-profile">
                    <table class="profil-table">
                        <tr>
                            <td class="label-detail">ID</td>
                            <td>MJM001</td>
                        </tr>
                        <tr>
                            <td class="label-detail">Jabatan</td>
                            <td>Manajer Marketing</td>
                        </tr>
                        <tr>
                            <td class="label-detail">Jenis Kelamin</td>
                            <td>Pria</td>
                        </tr>
                        <tr>
                            <td class="label-detail">Alamat</td>
                            <td>Jl. A. Yani 35 A</td>
                        </tr>
                        <tr>
                            <td class="label-detail">Kota/Kabupaten</td>
                            <td>Surabaya</td>
                        </tr>
                        <tr>
                            <td class="label-detail">Provinsi</td>
                            <td>Jawa Timur</td>
                        </tr>
                        <tr>
                            <td class="label-detail">Telepon</td>
                            <td>087762144021</td>
                        </tr>
                        <tr>
                            <td class="label-detail">Email</td>
                            <td>swahyudi@kemiri.biz</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- ./ Content -->
@endsection

@section('extra-script')
    {{-- <script src="{{ asset('/assets/js/manajer-marketing-dashboard.js') }}"></script> --}}
@endsection