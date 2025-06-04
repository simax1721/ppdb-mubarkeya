@extends('layouts.beranda')

@section('judul-halaman')
    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2>Pengumuman Lulus</h2>
            <ol>
            <li><a href="{{ url('/') }}">Home</a></li>
            <li>Pengumuman Lulus</li>
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
                            <span class="nav-link active h3" href="#">Pengumuman</span>
                        </li>
                    </ul> 
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 d-none" id="preview-formulir">
                            
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
                        if (response.data == null) {
                            swal.fire({
                                icon: `error`,
                                title: `Formulir Pendaftaran`,
                                text: `Mohon formulir terlebih dahulu!`,
                                showConfirmButton: true,
                                timer: 3000
                            });
                        } else {
                            var status = `{{ $cekstatus }}`;
                            if (status == 'lulus') {
                                $('#preview-formulir').html(`<iframe src="{{ url('/lulus') }}/${response.data.id}" frameborder="0" style="width: 100%; height: 60vh; border: none; overflow: hidden;" scrolling="no"></iframe>`)
                            } else {
                                $('#preview-formulir').html(`<iframe src="{{ url('/tidaklulus') }}/${response.data.id}" frameborder="0" style="width: 100%; height: 60vh; border: none; overflow: hidden;" scrolling="no"></iframe>`)
                            }

                        }
                        
                        // response.data == null ? '' : ;
                    }
                });

            }
            });

        });
    </script>
@endpush