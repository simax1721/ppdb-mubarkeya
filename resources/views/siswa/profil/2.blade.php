@extends('layouts.beranda')

@section('judul-halaman')
    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2>Biodata Siswa</h2>
            <ol>
            <li><a href="{{ url('/') }}">Home</a></li>
            <li>Profil Siswa</li>
            <li>Biodata Siswa</li>
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
                      <a class="nav-link" href="{{ url('profil') }}">Pendaftaran Akun</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active" href="{{ url('profil/biodata') }}">Biodata Siswa</a>
                    </li>
                  </ul>
                </div>
                <div class="card-body">
                  
                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bolder" for="nik">NIK</label>
                            <input type="number" name="nik" class="form-control form-control-lg" id="nik">
                            <small class="text-danger">{{ $errors->first('nik') }}</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bolder" for="no_hp">Nomor Telepon</label>
                            <input type="number" name="no_hp" class="form-control form-control-lg" id="no_hp">
                            <small class="text-danger">{{ $errors->first('no_hp') }}</small>
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bolder" for="agama">Agama</label>
                            <select name="agama" id="agama" class="form-control form-control-lg">
                              <option value="">-- Pilih --</option>
                              <option value="ISLAM">ISLAM</option>
                              <option value="KRISTEN">KRISTEN</option>
                            </select>
                            {{-- <input type="text" name="agama" class="form-control form-control-lg" id="agama"> --}}
                            <small class="text-danger">{{ $errors->first('agama') }}</small>
                        </div>
                        <div class="form-group">
                          <label class="font-weight-bolder" for="asal_sekolah">Asal Sekolah</label>
                          <input type="text" name="asal_sekolah" class="form-control form-control-lg" id="asal_sekolah">
                          <small class="text-danger">{{ $errors->first('asal_sekolah') }}</small>
                      </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bolder" for="alamat">Alamat</label>
                            <textarea name="alamat" id="alamat" rows="4" class="form-control form-control-lg">{{ old('alamat') }}</textarea>
                            {{-- <input type="text" name="alamat" class="form-control form-control-lg" id="alamat"> --}}
                            <small class="text-danger">{{ $errors->first('alamat') }}</small>
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                        
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                      <label class="font-weight-bolder" for="nama_bapak">Nama Bapak</label>
                      <input type="text" name="nama_bapak" class="form-control form-control-lg" id="nama_bapak">
                          <small class="text-danger">{{ $errors->first('nama_bapak') }}</small>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                            <label class="font-weight-bolder" for="nomor_bapak">Nomor Telepon Bapak</label>
                            <input type="number" name="nomor_bapak" class="form-control form-control-lg" id="nomor_bapak">
                            <small class="text-danger">{{ $errors->first('nomor_bapak') }}</small>
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                      <label class="font-weight-bolder" for="nama_ibu">Nama Ibu</label>
                      <input type="text" name="nama_ibu" class="form-control form-control-lg" id="nama_ibu">
                          <small class="text-danger">{{ $errors->first('nama_ibu') }}</small>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                            <label class="font-weight-bolder" for="nomor_ibu">Nomor Telepon Ibu</label>
                            <input type="number" name="nomor_ibu" class="form-control form-control-lg" id="nomor_ibu">
                            <small class="text-danger">{{ $errors->first('nomor_ibu') }}</small>
                        </div>
                    </div>
                  </div>

                  <button id="save" class="btn btn-success">Simpan</button>

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
          url: "{{ url('/profil/users') }}",
          success: function (response) {
            if (response.data.photo == null) {
              swal.fire({
                icon: `error`,
                title: `Profil`,
                text: `Mohon upload foto terlebih dahulu!`,
                showConfirmButton: true,
                timer: 3000
              });

              window.setTimeout(function() {
                window.location.href = `{{ url('profil') }}`;
              }, 3000);
            }
          }
        });

        $.ajax({
          type: "GET",
          url: "{{ url('/profil/biodata-users') }}",
          success: function (response) {
            $('#nik').val(response.data.nik);
            $('#agama').val(response.data.agama);
            $('#no_hp').val(response.data.no_hp);
            $('#alamat').val(response.data.alamat);
            $('#asal_sekolah').val(response.data.asal_sekolah);
            $('#nama_bapak').val(response.data.nama_bapak);
            $('#nomor_bapak').val(response.data.nomor_bapak);
            $('#nama_ibu').val(response.data.nama_ibu);
            $('#nomor_ibu').val(response.data.nomor_ibu);
          }
        });

        $('#save').click(function (e) { 
          e.preventDefault();

          let nik   = $('#nik').val();
          let agama   = $('#agama').val();
          let no_hp   = $('#no_hp').val();
          let alamat   = $('#alamat').val();
          let asal_sekolah   = $('#asal_sekolah').val();
          let nama_bapak   = $('#nama_bapak').val();
          let nomor_bapak   = $('#nomor_bapak').val();
          let nama_ibu   = $('#nama_ibu').val();
          let nomor_ibu   = $('#nomor_ibu').val();
          let token   = $("meta[name='csrf-token']").attr("content");


          $.ajax({
            type: "POST",
            url: "{{ url('/profil/updatebiodata') }}",
            cache: false,
            data: {
              'nik': nik,
              'agama': agama,
              'no_hp': no_hp,
              'alamat': alamat,
              'asal_sekolah': asal_sekolah,
              'nama_bapak': nama_bapak,
              'nomor_bapak': nomor_bapak,
              'nama_ibu': nama_ibu,
              'nomor_ibu': nomor_ibu,
              '_token': token,
            },
            success: function (response) {
              console.log(response);

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
              
              if (error.responseJSON.nomor_ibu?.[0]) { 
                toastr.error(error.responseJSON.nomor_ibu[0]);
              }
              if (error.responseJSON.nama_ibu?.[0]) { 
                toastr.error(error.responseJSON.nama_ibu[0]);
              }
              if (error.responseJSON.nomor_bapak?.[0]) { 
                toastr.error(error.responseJSON.nomor_bapak[0]);
              }
              if (error.responseJSON.nama_bapak?.[0]) { 
                toastr.error(error.responseJSON.nama_bapak[0]);
              }
              if (error.responseJSON.asal_sekolah?.[0]) { 
                toastr.error(error.responseJSON.asal_sekolah[0]);
              }
              if (error.responseJSON.alamat?.[0]) { 
                toastr.error(error.responseJSON.alamat[0]);
              }
              if (error.responseJSON.agama?.[0]) { 
                toastr.error(error.responseJSON.agama[0]);
              }
              if (error.responseJSON.no_hp?.[0]) { 
                toastr.error(error.responseJSON.no_hp[0]);
              }
              if (error.responseJSON.nik?.[0]) { 
                toastr.error(error.responseJSON.nik[0]);
              }
            }
          });
        });


      });
    </script>
@endpush