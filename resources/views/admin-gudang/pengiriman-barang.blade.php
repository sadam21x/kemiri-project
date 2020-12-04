@extends('layouts/admin-gudang/main')
@section('title', 'Pengiriman Barang')
@section('extra-css')
    <link rel="stylesheet" href="{{ asset('/assets/datatable/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/admin-gudang.css') }}">
@endsection

@section('content')
<!-- Start Content -->
<div class="content">
    <div class="page-header">
        <h4>Pengiriman Barang</h4>
        <hr>
    </div>

    <div class="row">
        <div class="col-md-12">

            {{-- Start Order Barang --}}
            <div class="judul-tabel mb-3">
                <h5>Riwayat Order Barang</h5>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="order-barang-table"
                            class="table table-bordered table-responsive-stack">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">ID Order</th>
                                    <th scope="col">Tanggal Penjualan</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data_penjualan as $d)
                                @if($d->STATUS_PEMBAYARAN == 1 && $d->KODE_PENGIRIMAN == null || (date("Y-m-d") < date("Y-m-d",strtotime($d->TGL_KIRIM_RIIL))))
                                <tr>
                                    <td>{{$d->ID_PENJUALAN}}</td>
                                    <td>{{date("d/m/Y",strtotime($d->TGL_PENJUALAN))}}</td>
                                    <td>{{$d->depo_air_minum->NAMA_DEPO}}</td>
                                    <td>
                                        @if($d->STATUS_PEMBAYARAN == 1 && $d->KODE_PENGIRIMAN == null)
                                        <div class="badge badge-secondary">
                                            PERLU DIPROSES
                                            <i class="fas fa-exclamation-circle ml-1"></i>
                                        </div>
                                        @elseif($d->STATUS_PEMBAYARAN == 1 && $d->KODE_PENGIRIMAN != null && (date("Y-m-d") < date("Y-m-d",strtotime($d->TGL_KIRIM_RIIL))))
                                        <div class="badge badge-secondary">
                                            MENUNGGU PENGIRIMAN
                                            <i class="fas fa-exclamation-circle ml-1"></i>
                                        </div>
                                        @endif
                                    </td>
                                    <td colspan="2">
                                        <button class="btn btn-linkedin btn-sm" data-toggle="modal"
                                            data-target="#modal-detail-order-barang-{{$d->ID_PENJUALAN}}">
                                            <i class="fas fa-info-circle mr-1"></i>
                                            DETAIL
                                        </button>
                                        @if($d->KODE_PENGIRIMAN == null)
                                        <button class="btn btn-google btn-sm" data-toggle="modal"
                                            data-target="#modal-pengiriman-barang-{{$d->ID_PENJUALAN}}">
                                            PENGIRIMAN
                                        </button>
                                        @endif
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- End of Order Barang --}}

            {{-- Start Pengiriman Barang --}}
            <div class="judul-tabel mb-3">
                <h5>Riwayat Pengiriman Barang</h5>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="pengiriman-barang-table" class="table table-bordered table-responsive-stack">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">ID Pengiriman</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data_pengiriman as $d)
                                @php $hari_ini = date("d/m/Y");
                                $tglkirim = date("d/m/Y",strtotime($d->TGL_KIRIM_RIIL));
                                @endphp
                                <tr>
                                    <td>{{$d->KODE_PENGIRIMAN}}</td>
                                    <td>{{$tglkirim}}</td>
                                    <td>{{$d->pembayaran_penjualan->penjualan->depo_air_minum->NAMA_DEPO}}
                                    </td>
                                    <td>
                                        @if($tglkirim <= $hari_ini)
                                        <div class="badge badge-secondary">
                                            MENUNGGU PENGIRIMAN
                                            <i class="fas fa-exclamation-circle ml-1"></i>
                                        </div>
                                        @elseif($tglkirim > $hari_ini)
                                        <div class="badge badge-success">
                                            TELAH DIKIRIM
                                            <i class="fas fa-check ml-1"></i>
                                        </div>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-linkedin btn-sm tombol-detail-pengiriman"
                                            data-toggle="modal"
                                            data-target="#modal-detail-pengiriman-barang-{{$d->KODE_PENGIRIMAN}}">
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
                {{-- End of Pengiriman Barang --}}
            </div>
        </div>
    </div>
</div>
<!-- End of Content -->
@foreach($data_pengiriman as $d)
{{-- Start Detail Pengiriman Modal --}}
<div class="modal fade" id="modal-detail-pengiriman-barang-{{$d->KODE_PENGIRIMAN}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title">Detail Pengiriman Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times-circle text-danger"></i>
                </button>
            </div>
            <div class="modal-body">

                <div class="container">

                    <div class="my-3">
                        <h5>ID Pengiriman</h5>
                        <h6>{{$d->KODE_PENGIRIMAN}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Tanggal Pengiriman</h5>
                        <h6>{{date("d/m/Y",strtotime($d->TGL_KIRIM_RIIL))}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Staff Gudang</h5>
                        <h6>{{$d->admin_gudang->NAMA_ADMIN_GUDANG}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Customer</h5>
                        <h6>{{$d->pembayaran_penjualan->penjualan->depo_air_minum->NAMA_DEPO}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Metode Pengiriman</h5>
                        <h6>{{$d->pembayaran_penjualan->penjualan->METODE_KIRIM}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Produk</h5>
                        <table class="table table-stripped table-bordered">
                            <thead class="thead-dark">
                                <th scope="col">Produk</th>
                                <th scope="col">Jumlah (pcs)</th>
                            </thead>
                            <tbody>
                                @foreach($d->pembayaran_penjualan->penjualan->detil_penjualans as $detilp)
                                <tr>
                                    <td>{{$detilp->product->NAMA_PRODUCT}}</td>
                                    <td>{{$detilp->JUMLAH_PCS}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="my-3">
                        <h5>Total Item (pcs)</h5>
                        <h6>{{ $d->pembayaran_penjualan->penjualan->detil_penjualans->sum('JUMLAH_PCS')}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Total Harga Produk (IDR)</h5>
                        <h6>{{ number_format(floatval($d->pembayaran_penjualan->penjualan->TOTAL_PENJUALAN) - floatval($d->pembayaran_penjualan->penjualan->ONGKOS_KIRIM),0,',','.')}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Ongkos Kirim (IDR)</h5>
                        <h6>{{number_format($d->pembayaran_penjualan->penjualan->ONGKOS_KIRIM,0,',','.')}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Total Bayar (IDR)</h5>
                        <h6>{{ number_format($d->pembayaran_penjualan->penjualan->TOTAL_PENJUALAN,0,',','.')}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Kendaraan Pengirim</h5>
                        <h6>{{ $d->TIPE_KENDARAAN}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Nomor Polisi</h5>
                        <h6>{{ $d->NOPOL}}</h6>
                    </div>

                    <div class="my-4 d-flex justify-content-center">
                        <a href="{{url('/surat-jalan').'/'.$d->pembayaran_penjualan->penjualan->ID_PENJUALAN}}" class="btn btn-md btn-google">
                            <i class="far fa-file-alt mr-2"></i>
                            SURAT JALAN
                        </a>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
{{-- End of Detail Pengiriman Modal--}}
@endforeach
@foreach($data_penjualan as $d)
{{-- Start Detail Order Barang Modal --}}
<div class="modal fade" id="modal-detail-order-barang-{{$d->ID_PENJUALAN}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title">Detail Order Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times-circle text-danger"></i>
                </button>
            </div>
            <div class="modal-body">

                <div class="container">

                    <div class="my-3">
                        <h5>ID Order</h5>
                        <h6>{{$d->ID_PENJUALAN}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Tanggal Order</h5>
                        <h6>{{date("d/m/Y",strtotime($d->TGL_PENJUALAN))}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Customer</h5>
                        <h6>{{$d->depo_air_minum->NAMA_DEPO}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Produk</h5>
                        <table class="table table-stripped table-bordered">
                            <thead class="thead-dark">
                                <th scope="col">Produk</th>
                                <th scope="col">Jumlah (pcs)</th>
                            </thead>
                            <tbody>
                                @foreach($d->detil_penjualans as $detilp)
                                <tr>
                                    <td>{{$detilp->product->NAMA_PRODUCT}}</td>
                                    <td>{{$detilp->JUMLAH_PCS}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="my-3">
                        <h5>Total Item (pcs)</h5>
                        <h6>{{ $d->detil_penjualans->sum('JUMLAH_PCS')}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Total Harga Produk (IDR)</h5>
                        <h6>{{ number_format(floatval($d->TOTAL_PENJUALAN) - floatval($d->ONGKOS_KIRIM),0,',','.') }}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Ongkos Kirim (IDR)</h5>
                        <h6>{{number_format($d->ONGKOS_KIRIM,0,',','.')}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Total Bayar (IDR)</h5>
                        <h6>{{ number_format($d->TOTAL_PENJUALAN,0,',','.')}}</h6>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
{{-- End of Detail Order Barang Modal--}}
@endforeach
{{-- Start Pengiriman Modal --}}
<div class="modal fade" id="modal-pengiriman-barang-{{$d->ID_PENJUALAN}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title">Pengiriman Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times-circle text-danger"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('/admin-gudang/pengiriman-barang/store')}}" id="form_pengiriman" method="POST" class="needs-validation" novalidate>
                    @csrf

                    {{-- Hidden id admin gudang yang bertugas --}}
                    <input type="hidden" name="ID_ADMIN_GUDANG" value="1">

                    <input type="hidden" name="KODE_PEMBAYARAN_PENJUALAN" value="@if($d->pembayaran_penjualan != null){{$d->pembayaran_penjualan->KODE_PEMBAYARAN_PENJUALAN}} @endif">


                    <div class="form-group">
                        <label>Tanggal Pengiriman</label>
                        <input type="date" name="TGL_KIRIM" class="form-control @error('TGL_KIRIM') is-invalid @enderror" required value="@php date('m/d/Y') @endphp">
                        <div class="invalid-feedback">
                            Mohon isi tanggal kirim.
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Kendaraan Pengirim</label>
                        <input type="text" class="form-control @error('TIPE_KENDARAAN') is-invalid @enderror" name="TIPE_KENDARAAN" required>
                        <div class="invalid-feedback">
                            Mohon isi tipe kendaraan dengan benar.
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Nomor Polisi</label>
                        <input type="text" class="form-control @error('NOPOL') is-invalid @enderror" name="NOPOL" required>
                        <div class="invalid-feedback">
                            Mohon isi nomor polisi dengan benar.
                        </div>
                        <small class="form-text text-muted">contoh: W 2275 DV</small>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">ID Order</label>
                        <input type="text" value="{{$d->ID_PENJUALAN}}" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">Tanggal Order</label>
                        <input type="text" value="{{date('d/m/Y',strtotime($d->TGL_PENJUALAN))}}" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">Customer</label>
                        <input type="text" value="{{$d->depo_air_minum->NAMA_DEPO}}" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">Produk</label>
                        <table class="table table-stripped table-bordered">
                            <thead class="thead-dark">
                                <th scope="col">Produk</th>
                                <th scope="col">Jumlah (pcs)</th>
                            </thead>
                            <tbody>
                                @foreach($d->detil_penjualans as $detilp)
                                <tr>
                                    <td>{{$detilp->product->NAMA_PRODUCT}}</td>
                                    <td>{{$detilp->JUMLAH_PCS}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">Total Item (pcs)</label>
                        <input type="text" value="{{ $d->detil_penjualans->sum('JUMLAH_PCS')}}" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">Total Harga Produk (IDR)</label>
                        <input type="text" value="{{ number_format($d->detil_penjualans->sum('HARGA_BARANG'),0,',','.')}}" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">Ongkos Kirim (IDR)</label>
                        <input type="text" value="{{number_format($d->ONGKOS_KIRIM,0,',','.')}}" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">Total Bayar (IDR)</label>
                        <input type="text" value="{{ number_format(floatval($d->ONGKOS_KIRIM) + floatval($d->detil_penjualans->sum('HARGA_BARANG')),0,',','.')}}" class="form-control" readonly>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-google batal" data-dismiss="modal">BATAL</button>
                        <button type="submit" class="btn btn-linkedin">SIMPAN</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
{{-- End of Pengiriman Modall --}}
@endsection

@section('extra-script')
    <script src="{{ asset('/assets/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('/assets/js/admin-gudang-pengiriman-barang.js') }}"></script>
@endsection