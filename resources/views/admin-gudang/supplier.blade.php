@extends('layouts/admin-gudang/main')
@section('title', 'Supplier')
@section('extra-css')
    <link rel="stylesheet" href="{{ asset('/assets/gogi/vendors/dataTable/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/gogi/vendors/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/admin-gudang.css') }}">
@endsection

@section('content')
{{-- Start Content --}}
<div class="content">
    <div class="page-header">
        <h4>Supplier</h4>
        <hr>
    </div>

    <div class="row">
        <div class="col-md-12">

            <div class="judul-tabel mb-3">
                <h5 class="">Daftar Supplier</h5>
                <button class="btn btn-sm btn-rounded bg-dribbble ml-auto tombol-tambah-supplier" data-toggle="modal" data-target="#modal-tambah-supplier">
                    <i class="fas fa-plus mr-1"></i>
                    TAMBAH BARU
                </button>
            </div>

            <table id="supplier-table" class="table table-bordered table-stripped table-responsive-stack">
                <thead class="thead-dark">
                    <th scope="col">ID Supplier</th>
                    <th scope="col">Nama Supplier</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Aksi</th>
                </thead>
                <tbody>
                    @foreach($data as $d)
                    <tr>
                        <td>{{$d->ID_SUPPLIER}}</td>
                        <td>{{$d->NAMA_SUPPLIER}}</td>
                        <td>{{$d->ALAMAT_SUPPLIER}}, {{$d->KOTA}}</td>
                        <td colspan="2">
                            <button class="btn btn-sm btn-linkedin mr-1" data-toggle="modal" data-target="#modal-detail-supplier-{{$d->ID_SUPPLIER}}">
                                <i class="fas fa-info-circle mr-1"></i>
                                DETAIL
                            </button>
                            <button class="btn btn-sm btn-warning tombol-edit-supplier" data-toggle="modal" data-target="#modal-edit-supplier-{{$d->ID_SUPPLIER}}">
                                <i class="fas fa-edit mr-1"></i>
                                EDIT
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
{{-- End of Content --}}
@foreach($data as $d)
{{-- Start Detail Supplier Modal --}}
<div class="modal fade" id="modal-detail-supplier-{{$d->ID_SUPPLIER}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title">Detail Supplier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times-circle text-danger"></i>
                </button>
            </div>
            <div class="modal-body">

                <div class="container">

                    <div class="my-3">
                        <h5>ID Supplier</h5>
                        <h6>{{$d->ID_SUPPLIER}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Nama Supplier</h5>
                        <h6>{{$d->NAMA_SUPPLIER}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Alamat</h5>
                        <h6>{{$d->ALAMAT_SUPPLIER}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Kota/Kabupaten</h5>
                        <h6>{{$d->KOTA}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Provinsi</h5>
                        <h6>{{$d->PROVINSI}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Nomor Telepon</h5>
                        <h6>
                            @if($d->NO_TELP_SUPPLIER != null)
                            {{$d->NO_TELP_SUPPLIER}}
                            @else
                            N\A
                            @endif
                        </h6>
                    </div>

                    <div class="my-3">
                        <h5>Email</h5>
                        <h6>
                            @if($d->EMAIL_SUPPLIER != null)
                            {{$d->EMAIL_SUPPLIER}}
                            @else
                            N\A
                            @endif
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- End of Detail Supplier Modal --}}
@endforeach

{{-- Start Input Supplier Modal --}}
<div class="modal fade" id="modal-tambah-supplier" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title">Tambah Supplier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times-circle text-danger"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('/admin-gudang/supplier/insert')}}" method="POST">
                    @csrf
                    
                    <div class="form-group">
                        <label for="" class="col-form-label">
                            Nama Supplier
                        </label>
                        <input type="text" name="nama_supplier" id="" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">
                            Alamat
                        </label>
                        <input type="text" name="alamat_supplier" id="" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">
                            Provinsi
                        </label>
                        <select class="form-control select-component select-provinsi" id="" name="provinsi">
                            <option>Pilih provinsi . . </option>
                            @foreach ($provinsi as $id => $name)
                                <option value="{{ $id }}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">
                            Kabupaten/Kota
                        </label>
                        <select class="form-control select-component select-kota" id="" name="kota">
                            <option>Pilih kota . . </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">
                            No. Telepon
                        </label>
                        <input type="number" name="no_telp_supplier" id="" class="form-control num-without-style">
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">Email</label>
                        <input type="email" name="email_supplier" id="" class="form-control">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-google" data-dismiss="modal">BATAL</button>
                        <button type="submit" class="btn btn-linkedin">SIMPAN</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
{{-- End of Input Supplier Modal --}}
@foreach($data as $d)
{{-- Start Edit Supplier Modal --}}
<div class="modal fade" id="modal-edit-supplier-{{$d->ID_SUPPLIER}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title">Edit Supplier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times-circle text-danger"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('/admin-gudang/supplier/edit')}}" method="POST">
                    @csrf

                    {{-- Hidden id supplier untuk update supplier --}}
                    <input type="hidden" name="id_supplier" id="" value="{{$d->ID_SUPPLIER}}" readonly>

                    <div class="form-group">
                        <label for="a" class="col-form-label">
                            Nama Supplier
                        </label>
                        <input type="text" name="nama_supplier" id="a" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">
                            Alamat
                        </label>
                        <input type="text" name="alamat_supplier" id="" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">
                            Provinsi
                        </label>
                        <select class="form-control select-component select-provinsi" id="" name="provinsi">
                            <option>Pilih provinsi . . </option>
                            @foreach ($provinsi as $id => $name)
                                <option value="{{ $id }}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">
                            Kabupaten/Kota
                        </label>
                        <select class="form-control select-component select-kota" id="" name="kota">
                            <option>Pilih kota . . </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">
                            No. Telepon
                        </label>
                        <input type="number" name="no_telp_supplier" id="" class="form-control num-without-style">
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">Email</label>
                        <input type="email" name="email_supplier" id="" class="form-control">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-google" data-dismiss="modal">BATAL</button>
                        <button type="submit" class="btn btn-linkedin">SIMPAN</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
{{-- End of Edit Supplier Modal --}}
@endforeach
@endsection

@section('extra-script')
    <script src="{{ asset('/assets/gogi/vendors/dataTable/datatables.min.js') }}"></script>
    <script src="{{ asset('/assets/gogi/vendors/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('/assets/js/admin-gudang-supplier.js') }}"></script>
@endsection