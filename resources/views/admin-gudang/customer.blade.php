@extends('layouts/admin-gudang/main')
@section('title', 'Customer')
@section('extra-css')
    <link rel="stylesheet" href="{{ asset('/assets/gogi/vendors/dataTable/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/admin-gudang.css') }}">
@endsection

@section('content')
{{-- Start Content --}}
<div class="content">
    <div class="page-header">
        <h3>Customer</h3>
        <hr>
    </div>

    <div class="row">
        <div class="col-md-12">

            <table id="customer-table" class="table table-bordered table-stripped table-responsive-stack">
                <thead class="thead-dark">
                    <th scope="col">ID Customer</th>
                    <th scope="col">Nama Customer</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Aksi</th>
                </thead>
                <tbody>
                    <tr>
                        <td>CUST001</td>
                        <td>Depo Air Minum Prima Pertiwi</td>
                        <td>Jl. Slamet Riyadi No. 41, Solo</td>
                        <td>
                            <a href="" class="btn btn-sm btn-linkedin mr-1" data-toggle="modal" data-target="#modal-detail-customer">
                                <i class="fas fa-info-circle mr-1"></i>
                                DETAIL
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
{{-- End of Content --}}

{{-- Start Detail Customer Modal --}}
<div class="modal fade" id="modal-detail-customer" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title" id="modal-form-label">Detail Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times-circle text-danger"></i>
                </button>
            </div>
            <div class="modal-body">

                <div class="container">

                    <div class="my-3">
                        <h5>ID Customer</h5>
                        <h6>CUST001</h6>
                    </div>

                    <div class="my-3">
                        <h5>Nama Customer</h5>
                        <h6>Depo Air Minum Prima Pertiwi</h6>
                    </div>

                    <div class="my-3">
                        <h5>Alamat</h5>
                        <h6>Jl. Slamet Riyadi No. 41</h6>
                    </div>

                    <div class="my-3">
                        <h5>Kota/Kabupaten</h5>
                        <h6>Solo</h6>
                    </div>

                    <div class="my-3">
                        <h5>Provinsi</h5>
                        <h6>Jawa Tengah</h6>
                    </div>

                    <div class="my-3">
                        <h5>Nomor Telepon</h5>
                        <h6>087762543221</h6>
                    </div>

                    <div class="my-3">
                        <h5>Email</h5>
                        <h6>N/A</h6>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
{{-- End of Detail Customer Modal --}}
@endsection

@section('extra-script')
    <script src="{{ asset('/assets/gogi/vendors/dataTable/datatables.min.js') }}"></script>
    <script src="{{ asset('/assets/js/admin-gudang-customer.js') }}"></script>
@endsection