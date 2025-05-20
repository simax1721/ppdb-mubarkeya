@extends('layouts.admin') 
@push('css')
@endpush 

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-0 text-gray-800 mb-4">Daftar Ulang</h1>


<div class="row mt-2">

  @foreach ($jurusans as $jurusan)
  <div class="col-md-6 mb-3">
    <div class="card">
      <div class="card-header bg-dark text-white">
        <div class="row align-items-center">
          <div class="col-9">
            <h6 class="font-weight-bolder">{{ $jurusan->name }}</h6>
          </div>
          <div class="col-3 text-right">
            <a href="{{ url('admin/daftar-ulang/download/' . date('Y') . '/' . $jurusan->name) }}" class="btn btn-info" id="downloadBerkas">Download Berkas</a>
            {{-- <h6 class="font-weight-bolder">Kuota <span id="t_j{{ $jurusan->id }}"></span> / {{ $jurusan->total }}</h6> --}}
          </div>
        </div>
      </div>
      <div class="card-body id_jur{{ $jurusan->id }}">
        <table class="table table-bordered">
        </table>
      </div>
    </div>
  </div>
  @endforeach  

</div>

@endsection


@push('scripts')

<script>
  $(document).ready(function () {

    function sleep(ms) {
      return new Promise(resolve => setTimeout(resolve, ms));
    }

    async function fetchData(id_jur, pilihan) {
      await $.ajax({
        type: "GET",
        url: `{{ url('admin/daftar-ulang/datatable') }}?id_jurusan=${id_jur}&pilihan=${pilihan}`,
        success: function (response) {
          console.log(response.data);

          $(`#t_j${id_jur}`).html(response.lulusTotal);

          var data = response.data;
          var isi = "";

          data.forEach(r => {
            var is_daftar_ulang = '';
            var pasphoto = r.daftar_ulang.pasphoto == null ? '' : '✔';
            var kartu_kip = r.daftar_ulang.kartu_kip == null ? '' : '✔';
            var akte = r.daftar_ulang.akte == null ? '' : '✔';
            var kk = r.daftar_ulang.kk == null ? '' : '✔';
            var skl = r.daftar_ulang.skl == null ? '' : '✔';
            var kartu_nisn = r.daftar_ulang.kartu_nisn == null ? '' : '✔';
            
            if (r.is_daftar_ulang != null) {
              isi = `${isi} 
              <tr class="text-success font-weight-bolder">
                <td>${r.id} <br> ${r.user.name}</td>
                <td>${pasphoto}</td>
                <td>${kartu_kip}</td>
                <td>${akte}</td>
                <td>${kk}</td>
                <td>${skl}</td>
                <td>${kartu_nisn}</td>
                <td class="font-weight-bolder">✔</td> 
                <td>
                  <button type="button" class="btn btn-danger btn-sm reject" data-id_formulir="${r.id}" data-pilihan="1" data-id_jur="${id_jur}"><i class="fas fa-times"></i></button>
                </td>
              </tr>`;
            } else {
                  isi = `${isi} 
                  <tr class="">
                    <td>${r.id} <br> ${r.user.name}</td>
                    <td>${pasphoto}</td>
                    <td>${kartu_kip}</td>
                    <td>${akte}</td>
                    <td>${kk}</td>
                    <td>${skl}</td>
                    <td>${kartu_nisn}</td>
                    <td class="font-weight-bolder"></td> 
                    <td>
                      <button type="button" class="btn btn-success btn-sm approve" data-id_formulir="${r.id}" data-pilihan="1" data-id_jur="${id_jur}"><i class="fas fa-check"></i></button>
                    </td>
                  </tr>`;
            }

            
          });

            $(`.id_jur${id_jur}`).html(`
              <p class="">Daftar Ulang : ${response.daftar_ulang} / ${response.lulusTotal}</p>
              <table class="table table-bordered table-striped">
                <thead>
                  <tr class="">
                    <th style="vertical-align: middle; text-align: center;" rowspan="2">No Pendaftaran</th>
                    <th style="vertical-align: middle; text-align: center;" colspan="6">Berkas</th>
                    <th style="vertical-align: middle; text-align: center;" rowspan="2">Status</th>
                    <th style="vertical-align: middle; text-align: center;" rowspan="2">Aksi</th>
                  </tr>
                  <tr class="">
                    <th style="vertical-align: middle; text-align: center;">Photo</th>
                    <th style="vertical-align: middle; text-align: center;">Kartu<br>KIP</th>
                    <th style="vertical-align: middle; text-align: center;">Akte<br>Kelahiran</th>
                    <th style="vertical-align: middle; text-align: center;">KK</th>
                    <th style="vertical-align: middle; text-align: center;">SKL</th>
                    <th style="vertical-align: middle; text-align: center;">Kartu<br>NISN</th>
                  </tr>
                </thead>
                <tbody>
                  ${isi}
                </tbody>
              </table>`);
        },
        error: function (error) { 
          toastr.error('Gagal mengambil data!');
        }
      });
    }

    async function fetchDataWithDelay() {
      var totaljurusan = {{ count($jurusans) }};
      var jurusans = @json($jurusans);

      for (let index = 0; index < jurusans.length; index++) {
        await fetchData(jurusans[index].id, 1);
        await sleep(10);
      }



    }
    
    fetchDataWithDelay();
    $(document).on('click', '.approve', async function (e) { 
      e.preventDefault();
      var id_formulir = $(this).data('id_formulir');
      var pilihan = $(this).data('pilihan');
      var id_jur = $(this).data('id_jur');

      console.log(id_formulir, 'approve', pilihan, id_jur);

      $.ajax({
        type: "GET",
        url: `{{ url('admin/daftar-ulang/approve') }}/?id_formulir=${id_formulir}&id_jur=${id_jur}&pilihan=${pilihan}`,
        success: function (response) {
          $(`.id_jur${id_jur}`).empty();
          fetchData(id_jur, pilihan);
          toastr.success(response.text);
        },
        error: function (error) { 
          console.log(error);
          
          toastr.error(error.responseJSON.text);
        }
      });
    });
    
    $(document).on('click', '.reject', async function (e) { 
      e.preventDefault();
      var id_formulir = $(this).data('id_formulir');
      var pilihan = $(this).data('pilihan');
      var id_jur = $(this).data('id_jur');

      console.log(id_formulir, 'reject', pilihan, id_jur);

      $.ajax({
        type: "GET",
        url: `{{ url('admin/daftar-ulang/reject') }}/?id_formulir=${id_formulir}&id_jur=${id_jur}&pilihan=${pilihan}`,
        success: function (response) {
          $(`.id_jur${id_jur}`).empty();
          fetchData(id_jur, pilihan);
          toastr.warning(response.text);
        },
        error: function (error) { 
          console.log(error);
          
          toastr.error(error.responseJSON.text);
        }
      });
    });


  });
</script>


@endpush