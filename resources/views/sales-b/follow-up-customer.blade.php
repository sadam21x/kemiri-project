@extends('layouts/sales-b/main')
@section('title', 'Follow Up Customer')
@section('extra-css')
    <link rel="stylesheet" href="{{ asset('/assets/gogi/vendors/dataTable/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/gogi/vendors/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/sales-b.css') }}">
@endsection

@section('content')
{{-- Start Content --}}
<div class="content">
    <div class="page-header">
        <h4>Follow Up Customer</h4>
        <hr>
    </div>

    <div class="row">
        <div class="col-md-12">

            <div class="judul-tabel mb-3">
                <h5 class="">Daftar Customer</h5>
            </div>

            <table class="table table-bordered table-stripped datatable-component table-responsive-stack">
                <thead class="thead-dark">
                    <th scope="col">ID Customer</th>
                    <th scope="col">Nama Customer</th>
                    <th scope="col">Status</th>
                    <th scope="col">Follow Up Order</th>
                </thead>
                <tbody>
                    <tr>
                        <td>CUST00001</td>
                        <td>Depo Air Minum Bajra Sandhi</td>
                        <td></td>
                        <td colspan="2">
                            <button class="btn btn-sm btn-success">
                                ORDER
                            </button>
                            <button class="btn btn-sm btn-google" data-toggle="modal" data-target="#modal-follow-up">
                                TIDAK ORDER
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>CUST00001</td>
                        <td>Depo Air Minum Bajra Sandhi</td>
                        <td>
                            <div class="btn btn-sm">
                                ORDER
                                <i class="fas fa-check ml-2"></i>
                            </div>
                        </td>
                        <td>
                        <a href="{{ url('/sales-b/order-barang/input') }}" class="btn btn-sm bg-dribbble">
                                <i class="fas fa-plus-circle mr-2"></i>
                                INPUT
                            </a> 
                        </td>
                    </tr>
                    <tr>
                        <td>CUST00001</td>
                        <td>Depo Air Minum Bajra Sandhi</td>
                        <td>
                            <div class="btn btn-sm">
                                TIDAK ORDER
                                <i class="fas fa-times ml-2"></i>
                            </div>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-linkedin" data-toggle="modal" data-target="#modal-detail-pembatalan-order">
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
{{-- End of Content --}}


{{-- Start Detail Pembatalan Order Modal --}}
<div class="modal fade" id="modal-detail-pembatalan-order" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title">Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times-circle text-danger"></i>
                </button>
            </div>
            <div class="modal-body">

                <div class="container">

                    <div class="mb-3">
                        <h5>Alasan</h5>
                        <p>
                            Sudah membeli di tempat lain
                        </p>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
{{-- End of Detail Pembatalan Order Modal --}}

{{-- Start Follow Up Modal --}}
<div class="modal fade" id="modal-follow-up" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title">Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times-circle text-danger"></i>
                </button>
            </div>
            <div class="modal-body">

                <form action="" method="post">
                    @csrf

                    <div class="form-group">
                        <label>Alasan Memilih Tidak Melakukan Order?</label>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="alasan" id="alasan-1" value="" checked>
                            <label class="form-check-label" for="alasan-1">
                                Tidak/belum membutuhkan
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="alasan" id="alasan-2" value="">
                            <label class="form-check-label" for="alasan-2">
                                Sudah memesan di tempat lain
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="alasan" id="alasan-3" value="">
                            <label class="form-check-label" for="alasan-3">
                                Kualitas meragukan
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="alasan" id="alasan-4" value="">
                            <label class="form-check-label" for="alasan-4">
                                Lainyya
                            </label>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-sm">
                            SIMPAN
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
{{-- End of Follow Up Modal --}}
@endsection

@section('extra-script')
    <script src="{{ asset('/assets/gogi/vendors/dataTable/datatables.min.js') }}"></script>
    <script src="{{ asset('/assets/gogi/vendors/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('/assets/js/sales-b-follow-up-customer.js') }}"></script>
@endsection