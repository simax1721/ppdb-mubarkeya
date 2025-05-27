@extends('layouts.beranda')

@section('judul-halaman')
    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2>Daftar Ulang</h2>
            <ol>
            <li><a href="{{ url('/') }}">Home</a></li>
            <li>Daftar Ulang</li>
            </ol>
        </div>

        </div>
    </section><!-- End Breadcrumbs Section -->
@endsection

@section('main-content')
    <section class="inner-page">
        <div class="container">
        
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <span class="nav-link active h3" href="#">Berkas Daftar Ulang</span>
                        </li>
                    </ul> 
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                             <div class="form-group">
                                <label class="font-weight-bolder" for="pasphoto">
                                    Pas Photo 3x4 Latar Biru (png, jpg, jpeg)
                                    <span class="text-danger"><sup><strong>*</strong></sup></span>
                                    <a href="#" id="pasphotoLink" target="_blank" class="btn btn-link d-none">Download</a>
                                </label>
                                <input type="file" name="pasphoto" class="form-control form-control-lg" id="pasphoto">
                                <input type="hidden" name="pasphotoOld" id="pasphotoOld">
                            </div>
                        
                            <div class="form-group mt-4">
                                <label class="font-weight-bolder" for="kartu_kip">
                                    kartu KIP/PKH (pdf) 
                                    <span class="text-danger"><sup><strong>*</strong></sup></span>
                                    <a href="#" id="kartu_kipLink" target="_blank" class="btn btn-link d-none">Download</a>
                                </label>
                                <input type="file" name="kartu_kip" class="form-control form-control-lg" id="kartu_kip">
                                <input type="hidden" name="kartu_kipOld" id="kartu_kipOld">
                            </div>
                    
                            <div class="form-group mt-4">
                                <label class="font-weight-bolder" for="akte">
                                    Akte Kelahiran (pdf) 
                                    <span class="text-danger"><sup><strong>*</strong></sup></span>
                                    <a href="#" id="akteLink" target="_blank" class="btn btn-link d-none">Download</a>
                                </label>
                                <input type="file" name="akte" class="form-control form-control-lg" id="akte">
                                <input type="hidden" name="akteOld" id="akteOld">
                            </div>
                        
                            <div class="form-group mt-4">
                                <label class="font-weight-bolder" for="kk">
                                    Kartu Keluarga (pdf) 
                                    <span class="text-danger"><sup><strong>*</strong></sup></span>
                                    <a href="#" id="kkLink" target="_blank" class="btn btn-link d-none">Download</a>
                                </label>
                                <input type="file" name="kk" class="form-control form-control-lg" id="kk">
                                <input type="hidden" name="kkOld" id="kkOld">
                            </div>
                    
                            <div class="form-group mt-4">
                                <label class="font-weight-bolder" for="skl">
                                    Surat Keterangan Lulus/Aktif (pdf) 
                                    <span class="text-danger"><sup><strong>*</strong></sup></span>
                                    <a href="#" id="sklLink" target="_blank" class="btn btn-link d-none">Download</a>
                                </label>
                                <input type="file" name="skl" class="form-control form-control-lg" id="skl">
                                <input type="hidden" name="sklOld" id="sklOld">
                            </div>
                        
                            <div class="form-group mt-4">
                                <label class="font-weight-bolder" for="kartu_nisn">
                                    Kartu NISN (pdf) 
                                    <span class="text-danger"><sup><strong>*</strong></sup></span>
                                    <a href="#" id="kartu_nisnLink" target="_blank" class="btn btn-link d-none">Download</a>
                                </label>
                                <input type="file" name="kartu_nisn" class="form-control form-control-lg" id="kartu_nisn">
                                <input type="hidden" name="kartu_nisnOld" id="kartu_nisnOld">
                            </div>
                        </div>
                    </div>

                    <a href="#" id="save" class="btn btn-success mt-2">Simpan</a>
                </div>
            </div>

        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            
        });

        
    </script>
@endpush