@extends('layouts/manajer-marketing/main')
@section('title', 'Evaluasi Kinerja Sales')
@section('extra-css')
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
            <div class="container">
                <form action="" method="post">
                    @csrf

                    <div class="form-row">
                        <div class="form-group col-md-2 col-sm-12">
                            <label class="col-form-label">Tanggal Evaluasi</label>
                            <input type="text" name="" id="" value="@php echo date('d/m/Y'); @endphp" class="form-control" readonly>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label class="col-form-label">ID Sales</label>
                            <input type="text" name="" id="" value="SLA00001" class="form-control" readonly>
                        </div>
                        <div class="form-group col-md-5 col-sm-12">
                            <label class="col-form-label">Nama Sales</label>
                            <input type="text" name="" id="" value="Rama Suastika" class="form-control" readonly>
                        </div>
                        <div class="form-group col-md-2 col-sm-12">
                            <label class="col-form-label">Jabatan</label>
                            <input type="text" name="" id="" value="Sales A" class="form-control" readonly>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-12">
                            <label class="col-form-label">Evaluasi</label>
                            <textarea name="" rows="12" id="" class="tinymce-textarea"></textarea>
                        </div>
                    </div>

                    <div class="form-row mt-2">
                        <div class="form-group col-12" style="text-align: right;">
                            <a href="{{ url('/manajer-marketing/evaluasi-kinerja-sales') }}" class="btn btn-google">
                                BATAL
                            </a>
                            <button type="submit" class="btn btn-primary">
                                SIMPAN
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- End of Content --}}
    
@endsection

@section('extra-script')
    <script src="{{ asset('/assets/js/manajer-marketing-input-evaluasi-sales.js') }}"></script>
@endsection