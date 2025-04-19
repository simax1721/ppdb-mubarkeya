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
        url: `{{ url('admin/daftar-ulang/datatable') }}?id_jurusan=${id_jur}&pilihan=${pilihan}`,
        success: function (response) {
          console.log(response.data);

          $(`#t_j${id_jur}`).html(response.lulusTotal);

          var data = response.data;
          var isi = "";

          data.forEach(r => {
            var is_daftar_ulang = '';
            
            if (r.is_daftar_ulang != null) {
              is_daftar_ulang = ``;

              isi = `${isi} 
              <tr class="text-success font-weight-bolder">
                <td>${r.id}</td>
                <td>${r.user.name}</td>
                <td class="font-weight-bolder text-center"><div class="p-1"><i class="fas fa-check"></i></div></td>
                <td>
                  <button type="button" class="btn btn-danger btn-sm reject" data-id_formulir="${r.id}" data-pilihan="1" data-id_jur="${id_jur}"><i class="fas fa-times"></i></button>
                  </td>
              </tr>
              `;
            } else {
                  is_daftar_ulang = ``;
                  isi = `${isi} 
                  <tr class="">
                    <td>${r.id}</td>
                    <td>${r.user.name}</td>
                    <td class="font-weight-bolder"></td> 
                    <td>
                      <button type="button" class="btn btn-success btn-sm approve" data-id_formulir="${r.id}" data-pilihan="1" data-id_jur="${id_jur}"><i class="fas fa-check"></i></button>
                    </td>
                  </tr>
            `;
            }

            
          });

            $(`.id_jur${id_jur}`).html(`
              <p class="">Daftar Ulang : ${response.daftar_ulang} / ${response.lulusTotal}</p>
              <table class="table table-bordered table-striped">
                <tr class="">
                  <th>No Pendaftaran</th>
                  <th>Nama</th>
                  <th>Daftar Ulang</th>
                  <th>Aksi</th>
                </tr>
                ${isi}
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