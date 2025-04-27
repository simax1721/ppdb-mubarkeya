@extends('layouts.admin')

@section('main-content')
    <h2>Pengumuman</h2>

    <a href="#" id="kirim" class="btn btn-info btn-lg mt-2">KIRIM PENGUMUMAN <i id="icon-kirim" class="fas fa-volume-up"></i></a>
@endsection

@push('scripts')
    <script>
        $('#kirim').click(function (e) { 
            e.preventDefault();
            $.ajax({
                type: "GET",
                url: "{{ url('admin/pengumuman/kirim') }}",
                beforeSend: async function () {
                    $('#kirim').addClass('disabled');

                    $('#icon-kirim').removeClass('fa-volume-up');
                    $('#icon-kirim').addClass('fa-spinner');
                    $('#icon-kirim').addClass('spin');

                    // await new Promise(resolve => setTimeout(resolve, 10000));
                },
                success: function (response) {
                    
                    $('#icon-kirim').removeClass('fa-spinner');
                    $('#icon-kirim').removeClass('spin');
                    $('#icon-kirim').addClass('fa-volume-up');

                    toastr.success(response.message);
                },
                error: function (error) { 
                    console.log(error);
                    $('#kirim').removeClass('disabled');
                    $('#icon-kirim').removeClass('fa-spinner');
                    $('#icon-kirim').removeClass('spin');
                    $('#icon-kirim').addClass('fa-volume-up');

                    toastr.error('Gagal Mengirim Pengumuman!');
                },
                complete: function () {
                    
                },
            });
        });
    </script>
@endpush