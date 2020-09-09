@extends('layouts/owner/main')
@section('title', 'Admin Gudang')
@section('extra-css')
    <link rel="stylesheet" href="{{ asset('/assets/datatable/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/owner.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/owner-detail-pegawai.css') }}">
@endsection

@section('content')
{{-- Start Content --}}
<div class="content">
    <div class="page-header">
        <div class="d-flex">
            <h4>Admin Gudang</h4>
            <a href="{{ url('/owner/tambah-pegawai') }}" data-toggle="tooltip" data-placement="bottom" title="Tambah pegawai baru">
                <i class="fas fa-user-plus fa-2x"></i>
            </a>
        </div>
        <hr>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="judul-tabel">
                <h5>Daftar Admin Gudang</h5>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive-stack datatable-component">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>AG00001</td>
                                    <td>Viladimir Putin</td>
                                    <td>
                                        <button class="btn btn-sm btn-linkedin" data-toggle="modal" data-target="#modal-detail-pegawai">
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
{{-- End of Content --}}

{{-- Start Detail Pegawai Modal --}}
<div class="modal fade" id="modal-detail-pegawai" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title">Detail Pegawai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times-circle text-danger"></i>
                </button>
            </div>
            <div class="modal-body">

                <div class="d-flex justify-content-center">

                    <div class="card card-pegawai">
                        <div class="card-img-top" style="background-image: url({{ asset('/assets/img/login-bg-3.png') }});">
                            <figure class="avatar avatar-xl">
                                <img src="{{ asset('/assets/img/avatar/avatar-1.png') }}" class="rounded-circle" alt="avatar">
                            </figure>
                            <div class="badge badge-dark nama-sales">
                                Ananda Rizky
                            </div>
                        </div>

                        <div class="card-body card-body-profile">
                            <table class="profil-table">
                                <tr>
                                    <td class="label-detail">ID Pegawai</td>
                                    <td>ADM00001</td>
                                </tr>
                                <tr>
                                    <td class="label-detail">Jabatan</td>
                                    <td>Admin Gudang</td>
                                </tr>
                                <tr>
                                    <td class="label-detail">Jenis Kelamin</td>
                                    <td>Pria</td>
                                </tr>
                                <tr>
                                    <td class="label-detail">Alamat</td>
                                    <td>Jl. Tukad Pakerisan 17x</td>
                                </tr>
                                <tr>
                                    <td class="label-detail">Kota/Kabupaten</td>
                                    <td>Kota Denpasar</td>
                                </tr>
                                <tr>
                                    <td class="label-detail">Provinsi</td>
                                    <td>Bali</td>
                                </tr>
                                <tr>
                                    <td class="label-detail">Telepon</td>
                                    <td>083117621550</td>
                                </tr>
                                <tr>
                                    <td class="label-detail">Email</td>
                                    <td>ananda@gmail.com</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
{{-- End of Detail Pegawai Modal --}}
@endsection

@section('extra-script')
    <script src="{{ asset('/assets/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('/assets/js/owner-pegawai.js') }}"></script>
@endsection