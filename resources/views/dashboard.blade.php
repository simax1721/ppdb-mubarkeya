@extends('layouts.beranda')

@push('css')
    
@endpush

@section('judul-halaman')
    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2>Dashboard</h2>
            <ol>
            <li><a href="{{ url('/') }}">Home</a></li>
            <li>Dashboard</li>
            </ol>
        </div>

        </div>
    </section><!-- End Breadcrumbs Section -->
@endsection

@section('main-content')
    <section class="inner-page">
        <div class="container">

        </div>
    </section>
@endsection