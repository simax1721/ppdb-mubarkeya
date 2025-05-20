@extends('layouts.admin') 
@push('css')
@endpush 

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-0 text-gray-800 mb-4">Seleksi Jurusan Pilihan 2</h1>

<a href="{{ url('admin/seleksi/') }}" class="btn btn-primary font-weight-bolder">SELEKSI PILIHAN 1</a>
<a href="{{ url('admin/seleksi/2') }}" class="btn btn-primary font-weight-bolder">SELEKSI PILIHAN 2</a>
<a href="{{ url('admin/seleksi/3') }}" class="btn btn-primary font-weight-bolder">SELEKSI TIDAK LULUS PILIHAN</a>

<div class="row mt-2">

  @foreach ($jurusans as $jurusan)
  <div class="col-md-6 mb-3">
    <div class="card">
      <div class="card-header bg-dark text-white">
        <div class="row align-items-center">
          <div class="col-10">
            <h6 class="font-weight-bolder">{{ $jurusan->name }}</h6>
          </div>
          <div class="col-2 text-right">
            <h6 class="font-weight-bolder">Kuota <span id="t_j{{ $jurusan->id }}"></span> / {{ $jurusan->total }}</h6>
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
        url: `{{ url('admin/seleksi/datatable') }}?id_jurusan=${id_jur}&pilihan=${pilihan}`,
        success: function (response) {
          console.log(response.data);

          $(`#t_j${id_jur}`).html(response.lulusTotal);

          var data = response.data;
          var isi = "";

          data.forEach(r => {
            var nkesehatan = r.nkesehatan == null ? '' : r.nkesehatan;
            isi = `${isi} 
            <tr class="">
              <td>${r.id}</td>
              <td>${r.user.name}</td>
              <td class="font-weight-bolder">${r.nalquran}</td>
              <td class="font-weight-bolder">${r.nakademik}</td>
              <td class="font-weight-bolder">${r.nmikat}</td>
              <td class="font-weight-bolder">${r.nkejuruan}</td>
              <td class="font-weight-bolder">${nkesehatan}</td>
              <td class="font-weight-bolder">${r.nilai}</td>
                <td>
                  <button type="button" class="btn btn-success btn-sm approve" data-id_formulir="${r.id}" data-pilihan="${pilihan}" data-id_jur="${id_jur}"><i class="fas fa-check"></i></button>
                  <button type="button" class="btn btn-danger btn-sm reject" data-id_formulir="${r.id}" data-pilihan="${pilihan}" data-id_jur="${id_jur}"><i class="fas fa-times"></i></button>
                </td>
              </tr>
            `;
          });

            $(`.id_jur${id_jur}`).html(`
              <table class="table table-bordered table-striped">
                <thead>
                  <tr class="">
                    <th style="vertical-align: middle; text-align: center;"  rowspan="2">No Pendaftaran</th>
                    <th style="vertical-align: middle; text-align: center;"  rowspan="2">Nama</th>
                    <th style="vertical-align: middle; text-align: center;"  colspan="5">Nilai</th>
                    <th style="vertical-align: middle; text-align: center;"  rowspan="2">Total</th>
                    <th style="vertical-align: middle; text-align: center;"  rowspan="2">Aksi</th>
                  </tr>
                  <tr class="">
                    <th style="vertical-align: middle; text-align: center;" >Al-Quran</th>
                    <th style="vertical-align: middle; text-align: center;" >Akademik</th>
                    <th style="vertical-align: middle; text-align: center;" >Minat Dan Bakat</th>
                    <th style="vertical-align: middle; text-align: center;" >Kejuruan</th>
                    <th style="vertical-align: middle; text-align: center;" >Kesehatan</th>
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
        await fetchData(jurusans[index].id, 2);
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
        url: `{{ url('admin/seleksi/approve') }}/?id_formulir=${id_formulir}&id_jur=${id_jur}&pilihan=${pilihan}`,
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
        url: `{{ url('admin/seleksi/reject') }}/?id_formulir=${id_formulir}&id_jur=${id_jur}&pilihan=${pilihan}`,
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