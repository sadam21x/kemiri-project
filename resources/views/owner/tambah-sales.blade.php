@extends('layouts/owner/main')
@section('title', 'Tambah Sales')
@section('extra-css')
    <link rel="stylesheet" href="{{ asset('/assets/gogi/vendors/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/gogi/vendors/slick/slick.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/assets/gogi/vendors/slick/slick-theme.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/assets/css/owner.css') }}">
@endsection

@section('content')
<!-- Content -->
<div class="content ">

    <div class="page-header">
        <h4>Tambah Sales</h4>
        <hr>
    </div>

    <div class="row">
        <div class="col-md-5 col-sm-12 form-tambah-sales-col">

            <form action="" method="post">

                <div class="form-group mb-5">
                    <label>Pilih Avatar</label>

                    <div class="select-avatar-show my-3">
                        <img src="{{ asset('/assets/img/avatar/avatar-1.png') }}">
                        <img src="{{ asset('/assets/img/avatar/avatar-3.png') }}">
                        <img src="{{ asset('/assets/img/avatar/avatar-4.png') }}">
                        <img src="{{ asset('/assets/img/avatar/avatar-5.png') }}">
                        <img src="{{ asset('/assets/img/avatar/avatar-6.png') }}">
                        <img src="{{ asset('/assets/img/avatar/avatar-7.png') }}">
                        <img src="{{ asset('/assets/img/avatar/avatar-8.png') }}">
                        <img src="{{ asset('/assets/img/avatar/avatar-9.png') }}">
                        <img src="{{ asset('/assets/img/avatar/avatar-10.png') }}">
                        <img src="{{ asset('/assets/img/avatar/avatar-11.png') }}">
                        <img src="{{ asset('/assets/img/avatar/avatar-12.png') }}">
                    </div>
                    <div class="select-avatar-nav my-3">
                        <img src="{{ asset('/assets/img/avatar/avatar-1.png') }}">
                        <img src="{{ asset('/assets/img/avatar/avatar-3.png') }}">
                        <img src="{{ asset('/assets/img/avatar/avatar-4.png') }}">
                        <img src="{{ asset('/assets/img/avatar/avatar-5.png') }}">
                        <img src="{{ asset('/assets/img/avatar/avatar-6.png') }}">
                        <img src="{{ asset('/assets/img/avatar/avatar-7.png') }}">
                        <img src="{{ asset('/assets/img/avatar/avatar-8.png') }}">
                        <img src="{{ asset('/assets/img/avatar/avatar-9.png') }}">
                        <img src="{{ asset('/assets/img/avatar/avatar-10.png') }}">
                        <img src="{{ asset('/assets/img/avatar/avatar-11.png') }}">
                        <img src="{{ asset('/assets/img/avatar/avatar-12.png') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" class="form-control">
                </div>

                <label>Jenis Kelamin</label>
                <div class="form-group">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jk_pria" value="">
                        <label class="form-check-label" for="jk_pria">Pria</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jk_wanita" value="">
                        <label class="form-check-label" for="jk_wanita">Wanita</label>
                    </div>
                </div>

                <label>Jabatan</label>
                <div class="form-group">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jabatn_sales" id="jb_sales_a" value="">
                        <label class="form-check-label" for="jb_sales_a">Sales A</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jabatn_sales" id="jb_sales_b" value="">
                        <label class="form-check-label" for="jb_sales_b">Sales B</label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" class="form-control">
                </div>

                <div class="form-group">
                    <label>Provinsi</label>
                    <select class="form-control select-component select-provinsi" name="provinsi">
                        <option>Pilih provinsi . . </option>
                        @foreach ($provinsi as $id => $name)
                            <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Kabupaten/Kota</label>
                    <select class="form-control select-component select-kota" name="kota">
                        <option>Pilih kota . . </option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Nomor Telepon</label>
                    <input type="number" min="0" class="form-control num-without-style">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control">
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control input_password">
                </div>

                <div class="form-group">
                    <label>Konfirmasi Password</label>
                    <input type="password" class="form-control input_konfirmasi_password">
                    <span id='pesan_konfirmasi_password'></span>
                </div>

                <div class="form-group form-check my-3 ml-1">
                    <input type="checkbox" class="form-check-input mt-1" id="togglePassword">
                    <label class="form-check-label" for="togglePassword">Tampilkan Password</label>
                </div>

                <div class="d-flex justify-content-center mt-5">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save mr-2"></i>
                        SIMPAN
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>
<!-- ./ Content -->
@endsection

@section('extra-script')
    <script src="{{ asset('/assets/gogi/vendors/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('/assets/gogi/vendors/slick/slick.min.js') }}"></script>
    <script src="{{ asset('/assets/js/owner-tambah-sales.js') }}"></script>
@endsection