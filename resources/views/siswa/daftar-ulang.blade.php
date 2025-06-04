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
                            <div class="form-group mt-4">
                                <label class="font-weight-bolder" for="nilairapot">
                                    Nilai Rapot 
                                    <span class="text-danger"><sup><strong>*</strong></sup></span>
                                    <a href="#" id="nilairapotLink" target="_blank" class="btn btn-link d-none">Download</a>
                                </label>
                                <input type="file" name="nilairapot" class="form-control form-control-lg" id="nilairapot">
                                <input type="hidden" name="nilairapotOld" id="kartu_nisnOld">
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
            $.ajax({
                type: "GET",
                url: "{{ url('daftarulang/daftarulang-users') }}",
                success: function (response) {
                    
                    $('#pasphotoOld').val(response.data.pasphoto == null ? '' : response.data.pasphoto);
                    $('#pasphotoLink').attr('href', `{{ url('') }}${response.data.pasphoto}`);
                    response.data.pasphoto != null ? $('#pasphotoLink').removeClass('d-none') : '';

                    $('#kartu_kipOld').val(response.data.kartu_kip == null ? '' : response.data.kartu_kip);
                    $('#kartu_kipLink').attr('href', `{{ url('') }}${response.data.kartu_kip}`);
                    response.data.kartu_kip != null ? $('#kartu_kipLink').removeClass('d-none') : '';

                    $('#akteOld').val(response.data.akte == null ? '' : response.data.akte);
                    $('#akteLink').attr('href', `{{ url('') }}${response.data.akte}`);
                    response.data.akte != null ? $('#akteLink').removeClass('d-none') : '';

                    $('#kkOld').val(response.data.kk == null ? '' : response.data.kk);
                    $('#kkLink').attr('href', `{{ url('') }}${response.data.kk}`);
                    response.data.kk != null ? $('#kkLink').removeClass('d-none') : '';

                    $('#sklOld').val(response.data.skl == null ? '' : response.data.skl);
                    $('#sklLink').attr('href', `{{ url('') }}${response.data.skl}`);
                    response.data.skl != null ? $('#sklLink').removeClass('d-none') : '';

                    $('#kartu_nisnOld').val(response.data.kartu_nisn == null ? '' : response.data.kartu_nisn);
                    $('#kartu_nisnLink').attr('href', `{{ url('') }}${response.data.kartu_nisn}`);
                    response.data.kartu_nisn != null ? $('#kartu_nisnLink').removeClass('d-none') : '';
                    
                    $('#nilairapotOld').val(response.data.nilairapot == null ? '' : response.data.nilairapot);
                    $('#nilairapotLink').attr('href', `{{ url('') }}${response.data.nilairapot}`);
                    response.data.nilairapot != null ? $('#nilairapotLink').removeClass('d-none') : '';

                }
            });
        });

        $('#save').click(function (e) { 
            e.preventDefault();
            
            let pasphoto = $('#pasphoto')[0].files?.[0] == undefined ? '' : $('#pasphoto')[0].files[0];
            let kartu_kip = $('#kartu_kip')[0].files?.[0] == undefined ? '' : $('#kartu_kip')[0].files[0];
            let akte = $('#akte')[0].files?.[0] == undefined ? '' : $('#akte')[0].files[0];
            let kk = $('#kk')[0].files?.[0] == undefined ? '' : $('#kk')[0].files[0];
            let skl = $('#skl')[0].files?.[0] == undefined ? '' : $('#skl')[0].files[0];
            let kartu_nisn = $('#kartu_nisn')[0].files?.[0] == undefined ? '' : $('#kartu_nisn')[0].files[0];
            let nilairapot = $('#nilairapot')[0].files?.[0] == undefined ? '' : $('#nilairapot')[0].files[0];

            let token   = $("meta[name='csrf-token']").attr("content");

            var form = new FormData();

            form.append('pasphoto', pasphoto);
            form.append('kartu_kip', kartu_kip);
            form.append('akte', akte);
            form.append('kk', kk);
            form.append('skl', skl);
            form.append('kartu_nisn', kartu_nisn);
            form.append('nilai-rapot', nilai-rapot);
            form.append('_token', token);

            $.ajax({
                type: "POST",
                url: "{{ url('daftarulang/store') }}",
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
                error: function (error) { 
                    if (error.responseJSON.pasphoto?.[0]) { 
                        toastr.error(error.responseJSON.pasphoto[0]);
                    }
                    if (error.responseJSON.kartu_kip?.[0]) { 
                        toastr.error(error.responseJSON.kartu_kip[0]);
                    }
                    if (error.responseJSON.akte?.[0]) { 
                        toastr.error(error.responseJSON.akte[0]);
                    }
                    if (error.responseJSON.kk?.[0]) { 
                        toastr.error(error.responseJSON.kk[0]);
                    }
                    if (error.responseJSON.skl?.[0]) { 
                        toastr.error(error.responseJSON.skl[0]);
                    }
                    if (error.responseJSON.kartu_nisn?.[0]) { 
                        toastr.error(error.responseJSON.kartu_nisn[0]);
                    }
                    if (error.responseJSON.nilairapot?.[0]) { 
                        toastr.error(error.responseJSON.nilairapot[0]);
                    }

                    console.log(error);
                    
                }
            });
        });
    </script>
@endpush