@extends('layouts/operator-mesin/main')
@section('title', 'Pengambilan Bahan Baku')
@section('extra-css')
<link rel="stylesheet" href="{{ asset('/assets/gogi/vendors/dataTable/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/gogi/vendors/datepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/gogi/vendors/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/operator-mesin.css') }}">
@endsection

@section('content')
{{-- Start Content --}}
<div class="content">

    <div class="page-header">
        <h4>Pengambilan Bahan Baku</h4>
        <hr>
    </div>

    <div class="row">
        <div class="col-md-12">

            <div class="judul-tabel mb-3">
                <h5 class="">Riwayat Pengambilan Bahan Baku</h5>
                <button class="btn btn-sm btn-rounded bg-dribbble ml-auto" data-toggle="modal" data-target="#modal-input-pengambilan-bahan-baku">
                    <i class="fas fa-plus mr-1"></i>
                    TAMBAH BARU
                </button>
            </div>

            <table id="pengambilan-bahan-baku-table" class="table table-bordered table-stripped table-responsive-stack">
                <thead class="thead-dark">
                    <th scope="col">ID Pengambilan</th>
                    <th scope="col">Waktu Pengambilan</th>
                    <th scope="col">Operator Mesin</th>
                    <th scope="col">Aksi</th>
                </thead>
                <tbody>
                    @foreach($data as $d)
                    <tr>
                        <td>{{$d->KODE_PENGAMBILAN_BAHAN_BAKU}}</td>
                        <td>{{$d->WAKTU_PENGAMBILAN}}</td>
                        <td>{{$d->NAMA_OPERATOR_MESIN}}</td>
                        <td>
                            <button class="btn btn-sm btn-linkedin" data-toggle="modal" data-target="#modal-detail-pengambilan-bahan-baku-{{$d->KODE_PENGAMBILAN_BAHAN_BAKU}}">
                                <i class="fas fa-info-circle mr-1"></i>
                                DETAIL
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

{{-- Start Input Pengambilan Bahan Baku Modal --}}
<div class="modal fade" id="modal-input-pengambilan-bahan-baku" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title">Input Pengambilan Bahan Baku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times-circle text-danger"></i>
                </button>
            </div>
            <div class="modal-body modal-body-pengambilan-bahan-baku">
                <form action="{{url('/operator-mesin/pengambilan-bahan-baku/insert')}}" method="POST">
                    @csrf

                    {{-- Hidden id operator mesin yang melakukan input data --}}
                    <input type="hidden" name="id_operator_mesin" id="" value="1">

                    <div class="form-group">
                        <button type="button" class="btn btn-sm rounded btn-twitter tambah-bahan-baku-btn">
                            <i class="fas fa-plus mr-2"></i>
                            BAHAN BAKU
                        </button>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">Barang Produksi</label>
                        <select class="form-control select-component" id="" name="">
                            <option>Pilih barang yang akan diproduksi . . </option>
                            @foreach($product as $p)
                            <option value="{{$p->kode_product}}">{{$p->nama_product}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">Mesin yang digunakan</label>
                        <select class="form-control select-component" id="" name="">
                            <option>Pilih mesin . . </option>
                            <option value="Mesin A">Mesin A</option>
                            <option value="Mesin B">Mesin B</option>
                        </select>
                    </div>

                    <hr>

                    <div class="form-group">
                        <label class="col-form-label">Bahan Baku</label>
                        <select class="form-control select-component" id="bahan_baku" name="">
                            <option>Pilih bahan baku . . </option>
                            <option value="Plastik Bekas">Plastik Bekas</option>
                            <option value="Plastik Virgin">Plastik Virgin</option>
                            <option value="Pewarna">Pewarna</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Supplier Bahan Baku</label>
                        <select class="form-control select-component" id="supplier" name="">
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
                        <label class="col-form-label">Jumlah Bahan Baku (Kg)</label>
                        <input type="number" name="" id="total_berat" class="form-control">
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Jumlah Bahan Baku (Karung)</label>
                        <input type="number" name="" id="jumlah_karung_sak" class="form-control">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-google" data-dismiss="modal">BATAL</button>
                        <button type="submit" class="btn btn-sm btn-linkedin">SIMPAN</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
{{-- End of Input Pengambilan Bahan Baku Modal --}}
@foreach($detail as $dt)
{{-- Start Detail Pengambilan Bahan Baku Modal --}}
<div class="modal fade" id="modal-detail-pengambilan-bahan-baku-{{$dt->KODE_PENGAMBILAN_BAHAN_BAKU}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title">Detail Pengambilan Bahan Baku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times-circle text-danger"></i>
                </button>
            </div>
            <div class="modal-body">

                <div class="container">

                    <div class="my-3">
                        <h5>ID Pengambilan</h5>
                        <h6>{{$dt->KODE_PENGAMBILAN_BAHAN_BAKU}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Waktu Pengambilan</h5>
                        <h6>{{$dt->WAKTU_PENGAMBILAN}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Operator Mesin</h5>
                        <h6>{{$dt->NAMA_OPERATOR_MESIN}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Barang yang diproduksi</h5>
                        <h6>{{$dt->HASIL_PRODUKSI}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Mesin</h5>
                        <h6>{{$dt->NAMA_MESIN}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Bahan Baku {{$loop->iteration}}</h5>
                        <h6>{{$dt->nama_bahan_baku}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Supplier Bahan Baku {{$loop->iteration}}</h5>
                        <h6>{{$dt->nama_supplier}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Jumlah Bahan Baku {{$loop->iteration}}</h5>
                        <h6>{{$dt->jumlah_kg}}</h6>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
{{-- End of Detail Pengambilan Bahan Baku Modal --}}
@endforeach
@endsection
@section('extra-script')
    <script src="{{ asset('/assets/gogi/vendors/dataTable/datatables.min.js') }}"></script>
    <script src="{{ asset('/assets/gogi/vendors/datepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('/assets/gogi/vendors/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('/assets/js/operator-mesin-pengambilan-bahan-baku.js') }}"></script>
@endsection