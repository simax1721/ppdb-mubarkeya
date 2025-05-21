@extends('layouts.beranda')

@section('judul-halaman')
    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2>Pendaftaran Akun</h2>
            <ol>
            <li><a href="{{ url('/') }}">Home</a></li>
            <li>Pendaftaran</li>
            <li>Pendaftaran Akun</li>
            </ol>
        </div>

        </div>
    </section><!-- End Breadcrumbs Section -->
@endsection

@section('main-content')
    <section class="inner-page">
        <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-11 col-md-11 col-sm-11 col-11 p-5" style="background-color: #f5f9fc; border-radius: 15px;">
                <h2 class="font-weight-bolder text-center mb-5">Pendaftar Akun</h2>
                

                <form action="{{ route('register') }}" class="px-5" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Nama Lengkap</label>
                                <input type="text" name="name" class="form-control form-control-lg" id="name" value="{{ old('name') }}">
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nisn">NISN</label>
                                <input type="number" name="nisn" class="form-control form-control-lg" id="nisn" value="{{ old('nisn') }}">
                                <small class="text-danger">{{ $errors->first('nisn') }}</small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jk">Jenis Kelamin</label>
                                <select name="jk" id="jk" class="form-control form-control-lg">
                                    <option value="" selected>- Pilih -</option>
                                    <option value="LAKI - LAKI">LAKI - LAKI</option>
                                    <option value="PEREMPUAN">PEREMPUAN</option>
                                </select>
                                <small class="text-danger">{{ $errors->first('jk') }}</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tmp_lahir">Tempat Lahir</label>
                                <input type="text" name="tmp_lahir" class="form-control form-control-lg" id="tmp_lahir" value="{{ old('tmp_lahir') }}">
                                <small class="text-danger">{{ $errors->first('tmp_lahir') }}</small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tgl_lahir">Tanggal Lahir</label>
                                <input type="date" name="tgl_lahir" class="form-control form-control-lg" id="tgl_lahir" value="{{ old('tgl_lahir') }}">
                                <small class="text-danger">{{ $errors->first('tgl_lahir') }}</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control form-control-lg" id="email" value="{{ old('email') }}">
                                <small class="text-danger">{{ $errors->first('email') }}</small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control form-control-lg" id="password" value="">
                                <small class="text-danger">{{ $errors->first('password') }}</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password_confirmation">Konfirmasi Password</label>
                                <input type="password" name="password_confirmation" class="form-control form-control-lg" id="password_confirmation" value="">
                                <small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success btn-block btn-lg">Daftar</button>
                </form>
                <p class="text-center mt-4 mb-3">Sudah punya akun? <a style="text-decoration: underline" href="{{ url('/login') }}">Masuk</a> disini</p>
                {{-- <div class="p-5"></div> --}}
            </div>
        </div>
        </div>
    </section>
@endsection