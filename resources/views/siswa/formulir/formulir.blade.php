@extends('layouts.beranda')

@section('judul-halaman')
    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2>Formulir Pendaftaran</h2>
            <ol>
            <li><a href="{{ url('/') }}">Home</a></li>
            <li>Formulir Pendaftaran</li>
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
                            <span class="nav-link active h3" href="#">Formulir Pendaftaran</span>
                        </li>
                    </ul> 
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="font-weight-bolder" for="jurusan1">Pilihan Jurusan Ke-1</label>
                                <select name="jurusan1" id="jurusan1" class="form-control form-control-lg">
                                  <option value="">-- Pilih --</option>
                                  @foreach ($jurusans as $j1)
                                  <option value="{{ $j1->id }}">{{ $j1->name }}</option>
                                  @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bolder" for="jurusan2">Pilihan Jurusan Ke-2</label>
                                <select name="jurusan2" id="jurusan2" class="form-control form-control-lg">
                                  <option value="">-- Pilih --</option>
                                  @foreach ($jurusans as $j1)
                                  <option value="{{ $j1->id }}">{{ $j1->name }}</option>
                                  @endforeach
                                </select>
                            </div>
                            <input type="hidden" name="biodata_users_id" id="biodata_users_id">
                            <input type="hidden" name="users_id" id="users_id">
                            <button type="button" id="save" class="btn btn-success">Simpan</button>
                        </div>
                        <div class="col-md-7" id="preview-formulir">
                            
                        </div>
                      </div>
                </div>
            </div>

        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $.ajax({
            type: "GET",
            url: "{{ url('/profil/biodata-users') }}",
            success: function (response) {
                if (response.data == null) {
                swal.fire({
                    icon: `error`,
                    title: `Profil`,
                    text: `Mohon lengkapi profil terlebih dahulu!`,
                    showConfirmButton: true,
                    timer: 3000
                });

                window.setTimeout(function() {
                    window.location.href = `{{ url('profil') }}`;
                }, 3000);
                }

                $('#users_id').val(response.data.users_id);
                $('#biodata_users_id').val(response.data.id);

                $.ajax({
                    type: "GET",
                    url: "{{ url('/formulir/formulir-users') }}",
                    success: function (response) {
                        $('#jurusan1').val(response.data?.pilihan1.id);
                        $('#jurusan2').val(response.data?.pilihan2.id);
                        response.data == null ? '' : $('#preview-formulir').html(`<iframe src="{{ url('formulir/print') }}" frameborder="1" style="width: 100%; height: 900px; zoom: 70%"></iframe>`);
                    }
                });

            }
            });

            $('#save').click(function (e) { 
                e.preventDefault();
                let users_id   = $('#users_id').val();
                let biodata_users_id   = $('#biodata_users_id').val();
                let jurusan1   = $('#jurusan1').val();
                let jurusan2   = $('#jurusan2').val();
                let token   = $("meta[name='csrf-token']").attr("content");
        
                $.ajax({
                    url: `{{ url('formulir/store') }}`,
                    type: "POST",
                    cache: false,
                    data: {
                        'users_id': users_id,
                        'biodata_users_id': biodata_users_id,
                        'jurusan1': jurusan1,
                        'jurusan2': jurusan2,
                        '_token': token,
                    },
                    success: function (response) {
                        swal.fire({
                            icon: `${response.icon}`,
                            title: `${response.title}`,
                            text: `${response.text}`,
                            showConfirmButton: false,
                            timer: 3000
                        });

                        window.setTimeout(function() {
                            window.location.href = ``;
                        }, 3000);
        
                    },
                    error: function (error) {
                    console.log(error);
                    
                    if (error.responseJSON.jurusan2?.[0]) { 
                        toastr.error(error.responseJSON.jurusan2[0]);
                    }

                    if (error.responseJSON.jurusan1?.[0]) { 
                        toastr.error(error.responseJSON.jurusan1[0]);
                    }
                    }
                });
            });

        });
    </script>
@endpush