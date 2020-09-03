@extends('layouts/manajer-marketing/main')
@section('title', 'Riwayat Evaluasi Kinerja Sales')
@section('extra-css')
    <link rel="stylesheet" href="{{ asset('/assets/gogi/vendors/dataTable/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/manajer-marketing.css') }}">
@endsection

@section('content')
{{-- Start Content --}}
<div class="content">
    <div class="page-header">
        <h4>Evaluasi Kinerja Sales</h4>
        <hr>
    </div>

    <div class="row">
        <div class="col-md-12">

            {{-- Start Sales A --}}
            <div class="judul-tabel">
                <h5>Riwayat Evaluasi Kinerja Sales A</h5>
            </div>

            <div class="card">
                <div class="card-body">
                    <table id="sales-a-table" class="table table-bordered table-stripped table-responsive-stack">
                        <thead class="thead-dark">
                            <th scope="col">ID Evaluasi</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Sales</th>
                            <th scope="col">Aksi</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>EVA00001</td>
                                <td>12/08/2020</td>
                                <td>Aluna Sagita G.</td>
                                <td>
                                    <button class="btn btn-sm btn-linkedin mr-1" data-toggle="modal" data-target="#modal-detail-evaluasi-sales">
                                        <i class="fas fa-info-circle mr-2"></i>
                                        DETAIL
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- End of Sales A --}}

            {{-- Start Sales B --}}
            <div class="judul-tabel">
                <h5>Riwayat Evaluasi Kinerja Sales B</h5>
            </div>

            <div class="card">
                <div class="card-body">
                    <table id="sales-a-table" class="table table-bordered table-stripped table-responsive-stack">
                        <thead class="thead-dark">
                            <th scope="col">ID Evaluasi</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Sales</th>
                            <th scope="col">Aksi</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>EVB00001</td>
                                <td>12/08/2020</td>
                                <td>Lyodra Margaretha G.</td>
                                <td>
                                    <button class="btn btn-sm btn-linkedin mr-1" data-toggle="modal" data-target="#modal-detail-evaluasi-sales">
                                        <i class="fas fa-info-circle mr-2"></i>
                                        DETAIL
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- End of Sales B --}}

        </div>
    </div>
</div>
{{-- End of Content --}}

{{-- Start Detail Evaluasi Sales Modal --}}
<div class="modal fade" id="modal-detail-evaluasi-sales" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title">Detail Evaluasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times-circle text-danger"></i>
                </button>
            </div>
            <div class="modal-body">

                <div class="container">

                    <div class="mb-3">
                        <h5>ID Evaluasi</h5>
                        <h6>EVA000001</h6>
                    </div>

                    <div class="my-3">
                        <h5>Tanggal Evaluasi</h5>
                        <h6>12/08/2020</h6>
                    </div>

                    <div class="my-3">
                        <h5>Manajer Marketing</h5>
                        <h6>Adrian Napitupulu</h6>
                    </div>

                    <div class="my-3">
                        <h5>ID Sales</h5>
                        <h6>SLA000001</h6>
                    </div>

                    <div class="my-3">
                        <h5>Nama Sales</h5>
                        <h6>Aluna Sagita G.</h6>
                    </div>

                    <div class="my-3">
                        <h5>Jabatan</h5>
                        <h6>Sales A</h6>
                    </div>

                    <div class="my-3">
                        <h5>Evaluasi</h5>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur, vel ex sapiente optio dolor aut!
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
{{-- End of Detail Evaluasi Sales Modal --}}
@endsection

@section('extra-script')
    <script src="{{ asset('/assets/gogi/vendors/dataTable/datatables.min.js') }}"></script>
    <script src="{{ asset('/assets/js/manajer-marketing-evaluasi-sales.js') }}"></script>
@endsection