@extends('layouts.beranda')

@section('judul-halaman')
    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2>Pendaftaran Akun</h2>
            <ol>
            <li><a href="{{ url('/') }}">Home</a></li>
            <li>Profil Siswa</li>
            <li>Pendaftaran Akun</li>
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
                        <a class="nav-link active" href="{{ url('profil') }}">Pendaftaran Akun</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ url('profil/biodata') }}">Biodata Siswa</a>
                    </li>
                  </ul>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-2">
                      <img id="photoNow" alt="" style="min-height: 100px; min-width: 100%; max-width: 100%; border: 0.5px solid #777; margin-bottom: 10px;">
                      <label class="font-weight-bolder" for="name" class="mt-3">Photo</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="photo" aria-describedby="photo">
                          <label class="custom-file-label" for="photo">Pilih Foto</label>
                          <input type="hidden" id="photoOld">
                        </div>
                        {{-- <div class="input-group-append">
                          <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon04">Button</button>
                        </div> --}}
                      </div>
                      <img class="mt-3" id="imagePreview" style="width: 100%; border: 0.5px solid #777">
                      <a href="#" id="save" class="btn btn-success mt-2 disabled" >Simpan Perubahan</a>
                    </div>
                    <div class="col-10">
                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bolder" for="name">Nama Lengkap</label>
                                <input type="text" name="name" class="form-control form-control-lg" id="name" value="{{ old('name') }}">
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bolder" for="nisn">NISN</label>
                                <input type="number" name="nisn" class="form-control form-control-lg" id="nisn" value="{{ old('nisn') }}">
                                <small class="text-danger">{{ $errors->first('nisn') }}</small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bolder" for="jk">Jenis Kelamin</label>
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
                                <label class="font-weight-bolder" for="tmp_lahir">Tempat Lahir</label>
                                <input type="text" name="tmp_lahir" class="form-control form-control-lg" id="tmp_lahir" value="{{ old('tmp_lahir') }}">
                                <small class="text-danger">{{ $errors->first('tmp_lahir') }}</small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bolder" for="tgl_lahir">Tanggal Lahir</label>
                                <input type="date" name="tgl_lahir" class="form-control form-control-lg" id="tgl_lahir" value="{{ old('tgl_lahir') }}">
                                <small class="text-danger">{{ $errors->first('tgl_lahir') }}</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bolder" for="email">Email</label>
                                <input type="email" name="email" class="form-control form-control-lg" id="email" value="{{ old('email') }}" readonly>
                                <small class="text-danger">{{ $errors->first('email') }}</small>
                            </div>
                        </div>
                    </div>
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
        url: "{{ url('/profil/users') }}",
        success: function (response) {
          $('#name').val(response.data.name);
          $('#nisn').val(response.data.nisn);
          $('#tmp_lahir').val(response.data.tmp_lahir);
          $('#tgl_lahir').val(response.data.tgl_lahir);
          $('#email').val(response.data.email);
          $('#jk').val(response.data.jk);

          $('#photoOld').val(response.data.photo == null ? '' : response.data.photo);
          $('#photoNow').attr('src', `{{ url('uploads/') }}/${response.data.photo}`);
          

        }
      });

      $('#photo').on('change', function (event) {
          var file = event.target.files[0];
          if (file) {
              var reader = new FileReader();
              reader.onload = function (e) {
                  $('#imagePreview').attr('src', e.target.result).show();
              }
              reader.readAsDataURL(file);
          }
      });
    });

    $('#save').click(function (e) { 
      e.preventDefault();

      let name = $('#name').val();
      let nisn = $('#nisn').val();
      let jk = $('#jk').val();
      let tmp_lahir = $('#tmp_lahir').val();
      let tgl_lahir = $('#tgl_lahir').val();
      let photo = $('#photo')[0].files?.[0] == undefined ? $('#photoOld').val() : $('#photo')[0].files[0];

      let token   = $("meta[name='csrf-token']").attr("content");



      var form = new FormData();
        
      form.append('name', name);
      form.append('nisn', nisn);
      form.append('jk', jk);
      form.append('tmp_lahir', tmp_lahir);
      form.append('tgl_lahir', tgl_lahir);
      form.append('photo', photo);

      form.append('_token', token);

      console.log(form);
      
      
      $.ajax({
        url: "{{ url('/profil/updateakun') }}",
        type: "POST",
        cache: false,
        processData: false,
        contentType: false,
        data: form,
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
        error:function (error){
          console.log(error);

          if (error.responseJSON.photo?.[0]) { 
            toastr.error(error.responseJSON.photo[0]);
          }
          if (error.responseJSON.tgl_lahir?.[0]) { 
            toastr.error(error.responseJSON.tgl_lahir[0]);
          }
          if (error.responseJSON.tmp_lahir?.[0]) { 
            toastr.error(error.responseJSON.tmp_lahir[0]);
          }
          if (error.responseJSON.jk?.[0]) { 
            toastr.error(error.responseJSON.jk[0]);
          }
          if (error.responseJSON.nisn?.[0]) { 
            toastr.error(error.responseJSON.nisn[0]);
          }
          if (error.responseJSON.name?.[0]) { 
            toastr.error(error.responseJSON.name[0]);
          }
        }
      });
      
    });

      // toastr.success('test');

      // swal.fire({
      //   icon: `${response.icon}`,
      //   title: `${response.title}`,
      //   text: `${response.text}`,
      //   showConfirmButton: true,
      //   timer: 3000
      // });
      // swal.fire({
      //   icon: `error`,
      //   title: `profil`,
      //   text: `Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus adipisci facere a iste!`,
      //   showConfirmButton: true,
      //   timer: 3000
      // });
    </script>
@endpush