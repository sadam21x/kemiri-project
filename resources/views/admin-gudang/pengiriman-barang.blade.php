@extends('layouts/admin-gudang/main')
@section('title', 'Pengiriman Barang')
@section('extra-css')
    <link rel="stylesheet" href="{{ asset('/assets/datatable/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/admin-gudang.css') }}">
@endsection

@section('content')
<!-- Start Content -->
<div class="content ">
    <div class="page-header">
        <h4>Pengiriman Barang</h4>
        <hr>
    </div>

    <div class="row">
        <div class="col-md-12">

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
                                @foreach($data as $d)
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
            </div>

        </div>
    </div>

</div>
<!-- End of Content -->
@foreach($data as $d)
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
                        <h6>{{ number_format($d->pembayaran_penjualan->penjualan->detil_penjualans->sum('HARGA_BARANG'),0,',','.')}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Ongkos Kirim (IDR)</h5>
                        <h6>{{number_format($d->pembayaran_penjualan->penjualan->ONGKOS_KIRIM,0,',','.')}}</h6>
                    </div>

                    <div class="my-3">
                        <h5>Total Bayar (IDR)</h5>
                        <h6>{{ number_format(floatval($d->pembayaran_penjualan->penjualan->ONGKOS_KIRIM) + floatval($d->pembayaran_penjualan->penjualan->detil_penjualans->sum('HARGA_BARANG')),0,',','.')}}</h6>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
{{-- End of Detail Pengiriman Modal--}}
@endforeach
@endsection

@section('extra-script')
    <script src="{{ asset('/assets/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('/assets/js/admin-gudang-pengiriman-barang.js') }}"></script>
@endsection