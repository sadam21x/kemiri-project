@extends('layouts/admin-gudang/main')
@section('title', 'Penerimaan Bahan Baku')
@section('extra-css')
    <link rel="stylesheet" href="{{ asset('/assets/gogi/vendors/dataTable/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/gogi/vendors/datepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/gogi/vendors/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/admin-gudang.css') }}">
@endsection

@section('content')
<!-- Content -->
<div class="content ">
    <div class="page-header">
        <h4>Penerimaan Bahan Baku</h4>
        <hr>
    </div>

    <div class="row">
        <div class="col-md-12">

            <div class="judul-tabel mb-3">
                <h5 class="">Riwayat Penerimaan Bahan Baku</h5>
                <button class="btn btn-sm btn-rounded bg-dribbble ml-auto tombol-input-penerimaan" data-toggle="modal" data-target="#modal-input-penerimaan">
                    <i class="fas fa-plus mr-1"></i>
                    TAMBAH BARU
                </button>
            </div>
            
            <table id="penerimaan-bahan-baku-table" class="table table-stripped table-bordered table-responsive-stack">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID Penerimaan</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Supplier</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $d)
                    <tr>
                        <td>{{$d->ID_PENERIMAAN}}</td>
                        <td>{{$d->TGL_KEDATANGAN}}</td>
                        <td>{{$d->SUPPLIER}}</td>
                        <td colspan="2">
                            <button class="btn btn-linkedin btn-sm tombol-detail-penerimaan"
                                data-toggle="modal" data-target="#modal-detail-penerimaan-{{$d->ID_PENERIMAAN}}">
                                <i class="fas fa-info-circle mr-1"></i>
                                DETAIL
                            </button>
                            <button class="btn btn-warning btn-sm tombol-edit-penerimaan"
                                data-toggle="modal" data-target="#modal-edit-penerimaan">
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
<!-- ./ Content -->
@foreach($data as $d)
{{-- Start Detail Penerimaan Bahan Baku Modal --}}
<div class="modal fade" id="modal-detail-penerimaan-{{$d->ID_PENERIMAAN}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title">Detail Penerimaan Bahan Baku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times-circle text-danger"></i>
                </button>
            </div>
            <div class="modal-body">

                <div class="container">

                    <div class="my-3">
                        <h5>ID Penerimaan</h5>
                        <h6>{{$d->ID_PENERIMAAN}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Tanggal</h5>
                        <h6>{{$d->TGL_PENERIMAAN}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Staff Gudang</h5>
                        <h6>Ahmad Baihaqi</h6>
                    </div>

                    <div class="my-3">
                        <h5>Supplier</h5>
                        <h6>{{$d->SUPPLIER}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Bahan Baku</h5>
                        <h6>Plastik Virgin</h6>
                    </div>

                    <div class="my-3">
                        <h5>Jumlah Karung</h5>
                        <h6>30</h6>
                    </div>

                    <div class="my-3">
                        <h5>Berat per Karung (Kg)</h5>
                        <h6>2</h6>
                    </div>

                    <div class="my-3">
                        <h5>Berat Total (Kg)</h5>
                        <h6>60</h6>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
{{-- End of Detail Penerimaan Bahan Baku Modal--}}
@endforeach
{{-- Start Input Penerimaan Bahan Baku Modal --}}
<div class="modal fade" id="modal-input-penerimaan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title">Input Penerimaan Bahan Baku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times-circle text-danger"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    @csrf

                    {{-- Hidden id admin gudang yang melakukan input data penerimaan --}}
                    <input type="hidden" name="" id="" value="">

                    <div class="form-group">
                        <label for="" class="col-form-label">Tanggal</label>
                        <input type="date" name="" id="" class="form-control date-component">
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">Supplier</label>
                        <select class="form-control select-component" id="" name="">
                            <option>Pilih supplier . . </option>
                            <option value="UD. Pertama Makmur">UD. Pertama Makmur</option>
                            <option value="Toko Jaya Sakthi">Toko Jaya Sakthi</option>
                            <option value="Bapak Zainuri">Bapak Zainuri</option>
                            <option value="Bapak Santoso">Bapak Santoso</option>
                            <option value="UD. Dewata Indah">UD. Dewata Indah</option>
                            <option value="Ibu Nur Aminah">Ibu Nur Aminah</option>
                            <option value="Himasi">Himasi</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="" class="col-form-label">Bahan Baku</label>
                        <select class="form-control select-component" id="" name="">
                            <option>Pilih bahan baku . . </option>
                            <option value="Plastik Bekas">Plastik Bekas</option>
                            <option value="Plastik Virgin">Plastik Virgin</option>
                            <option value="Pewarna">Pewarna</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">Jumlah Karung</label>
                        <input type="number" name="" id="" class="form-control input-jumlah-karung">
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">Berat per Karung (Kg)</label>
                        <input type="number" name="" id="" class="form-control input-berat-karung">
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">Berat Total (Kg)</label>
                        <input type="number" name="" id="" class="form-control input-berat-total" placeholder="0">
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
{{-- End of Input Penerimaan Bahan Baku Modal --}}

{{-- Start Edit Penerimaan Bahan Baku Modal --}}
<div class="modal fade" id="modal-edit-penerimaan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title">Edit Penerimaan Bahan Baku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times-circle text-danger"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    @csrf

                    {{-- Hidden id penerimaan bahan baku untuk update penerimaan --}}
                    <input type="hidden" name="" id="" value="">

                    <div class="form-group">
                        <label for="" class="col-form-label">Tanggal</label>
                        <input type="date" name="" id="" class="form-control date-component">
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">Supplier</label>
                        <select class="form-control select-component" id="" name="">
                            <option>Pilih supplier . . </option>
                            <option value="UD. Pertama Makmur">UD. Pertama Makmur</option>
                            <option value="Toko Jaya Sakthi">Toko Jaya Sakthi</option>
                            <option value="Bapak Zainuri">Bapak Zainuri</option>
                            <option value="Bapak Santoso">Bapak Santoso</option>
                            <option value="UD. Dewata Indah">UD. Dewata Indah</option>
                            <option value="Ibu Nur Aminah">Ibu Nur Aminah</option>
                            <option value="Himasi">Himasi</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">Bahan Baku</label>
                        <select class="form-control select-component" id="" name="">
                            <option>Pilih bahan baku . . </option>
                            <option value="Plastik Bekas">Plastik Bekas</option>
                            <option value="Plastik Virgin">Plastik Virgin</option>
                            <option value="Pewarna">Pewarna</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">Jumlah Karung</label>
                        <input type="number" name="" id="" class="form-control edit-jumlah-karung">
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">Berat per Karung (Kg)</label>
                        <input type="number" name="" id="" class="form-control edit-berat-karung">
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">Berat Total (Kg)</label>
                        <input type="number" name="" id="" class="form-control edit-berat-total" placeholder="0">
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
{{-- End of Edit Penerimaan Bahan Baku Modal --}}
@endsection

@section('extra-script')
    <script src="{{ asset('/assets/gogi/vendors/dataTable/datatables.min.js') }}"></script>
    <script src="{{ asset('/assets/gogi/vendors/datepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('/assets/gogi/vendors/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('/assets/js/admin-gudang-penerimaan.js') }}"></script>
@endsection