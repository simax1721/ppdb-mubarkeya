@extends('layouts.beranda')

@section('judul-halaman')
    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2>Masuk</h2>
            <ol>
            <li><a href="{{ url('/') }}">Home</a></li>
            <li>Pendaftaran</li>
            <li>Masuk</li>
            </ol>
        </div>

        </div>
    </section><!-- End Breadcrumbs Section -->

    
@endsection

@section('main-content')
    <section class="inner-page">
        <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6 col-sm-9 col-11 p-5" style="background-color: #f5f9fc; border-radius: 15px;">
                <h2 class="font-weight-bolder text-center mb-2">Masuk</h2>
                <p class="text-center mb-3 ">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Itaque, in?</p>

                <form action="{{ route('login') }}" class="px-5" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control form-control-lg" id="email" aria-describedby="emailHelp">
                        <small class="text-danger">{{ $errors->first('email') }}</small>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control form-control-lg" id="password">
                        <small class="text-danger">{{ $errors->first('password') }}</small>
                    </div>
                    <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="custom-control-label" style="color: #000000AA" for="remember">{{ __('Remember Me') }}</label>
                    </div>

                    <button type="submit" class="btn btn-success btn-block btn-lg">Masuk</button>
                </form>
                <p class="text-center mt-4 mb-3">Belum punya akun? <a style="text-decoration: underline" href="{{ url('/register') }}">Daftar</a></p>
                {{-- <div class="p-5"></div> --}}
            </div>
        </div>
        </div>
    </section>
@endsection