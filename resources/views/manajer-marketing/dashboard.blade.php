@extends('layouts/manajer-marketing/main')
@section('title', 'Dashboard')
@section('extra-css')
    
@endsection

@section('content')
<!-- Content -->
<div class="content ">

    <div class="page-header">
        <h4>Dashboard</h4>
        <hr>
    </div>

    <div class="row">
        <div class="col-md-12">

            <div class="d-flex justify-content-center">
                <h6>Konten Menyusul</h6>
            </div>

        </div>
    </div>

</div>
<!-- ./ Content -->
@endsection

@section('extra-script')
    <script src="{{ asset('/assets/js/manajer-marketing-dashboard.js') }}"></script>
@endsection