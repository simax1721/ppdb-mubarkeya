@extends('layouts.admin') 
@push('css')
  <link href="{{ url('') }}/admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush 

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-0 text-gray-800 mb-4">Seleksi Jurusan Tidak Lulus Pilihan 1 & 2</h1>

<a href="{{ url('admin/seleksi/') }}" class="btn btn-primary font-weight-bolder">SELEKSI PILIHAN 1</a>
<a href="{{ url('admin/seleksi/2') }}" class="btn btn-primary font-weight-bolder">SELEKSI PILIHAN 2</a>
<a href="{{ url('admin/seleksi/3') }}" class="btn btn-primary font-weight-bolder">SELEKSI TIDAK LULUS PILIHAN</a>

<div class="row mt-2">
  <div class="col-md-8">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="mt-2 font-weight-bold text-primary">Data</h6>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nama</th>
                  <th>Nomor Pendaftaran</th>
                  <th>Pilihan 1</th>
                  <th>Pilihan 2</th>
                  <th>Nilai</th>
                  <th>Menu</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Nama</th>
                  <th>Nomor Pendaftaran</th>
                  <th>Pilihan 1</th>
                  <th>Pilihan 2</th>
                  <th>Nilai</th>
                  <th>Menu</th>
                </tr>
              </tfoot>
              <tbody></tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="row">

      @foreach ($jurusans as $jurusan)
      <div class="col-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{ $jurusan->name }}</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">Kuota <span id="t_j{{ $jurusan->id }}"></span> / {{ $jurusan->total }}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-users fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach

    </div>
  </div>
</div>

@endsection


@push('scripts')
<script src="{{ url('') }}/admin/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="{{ url('') }}/admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<script>
  $(document).ready(function () {

    $('#dataTable').DataTable({
      processing : true,
      serverSide : true,
      ajax : {
        url: "{{ url('admin/seleksi/datatable-tidak-lulus') }}",
      //   type: 'GET'
      },
      columns: [
        {data:'nama',name:'nama'},
        {data:'no_pendaftaran',name:'no_pendaftaran'},
        {data:'jurusan1',name:'jurusan1'},
        {data:'jurusan2',name:'jurusan2'},
        {data:'nilai',name:'nilai'},
        {data:'action',name:'action', orderable: false, searchable: false},
      ],
      order: [[4, 'desc']]
    });

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
        await fetchData(jurusans[index].id, 3);
        await sleep(10);
      }



    }
    
    fetchDataWithDelay();

    $(document).on('click', '.approve', async function (e) { 
      e.preventDefault();
      var id_formulir = $('#data_id').val();
      var pilihan = 3;
      var id_jur = $('#jurusan').val();

      console.log(id_formulir, 'approve', pilihan, id_jur);

      $.ajax({
        type: "GET",
        url: `{{ url('admin/seleksi/approve') }}/?id_formulir=${id_formulir}&id_jur=${id_jur}&pilihan=${pilihan}`,
        success: function (response) {
          fetchData(id_jur, pilihan);
          toastr.success(response.text);

          $('#modal-edit').modal('hide');
          $('#dataTable').DataTable().ajax.reload();
        },
        error: function (error) { 
          console.log(error);

          if (error.responseJSON.nilai?.[0]) { 
              toastr.error(error.responseJSON.nilai[0]);
          }
          
          if (error.responseJSON.text) {
            toastr.error(error.responseJSON.text);
          }
          if (error.responseJSON.message) {
            toastr.error('Jurusan harus diisi!');
          }
        }
      });
    });
  });
</script>

<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Form Seleksi Jurusan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <h3 id="nomor" class="text-center"></h3>
        <input type="hidden" id="data_id">
        <input type="hidden" id="pilihan" value="3">
        <div class="form-group">
          <label class="font-weight-bolder" for="jurusan">Pilihan Jurusan</label>
          <select name="jurusan" id="jurusan" class="form-control form-control-lg">
            <option value="">-- Pilih --</option>
            @foreach ($jurusans as $j1)
            <option value="{{ $j1->id }}">{{ $j1->name }}</option>
            @endforeach
          </select>
      </div>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-x"></i></button>
          <button type="button" class="btn btn-primary approve" id="update"><i class="fa fa-send"></i></button>
      </div>
    </div>
  </div>
</div>

<script>
  $('body').on('click', '#btn-edit', function () {
    let data_id = $(this).data('id');
      $.ajax({
        url: `{{ url('admin/nilai/show/${data_id}') }}`,
        type: "GET",
        cache: false,
        success: function (response) {
          // console.log(response.data);
          $('#nomor').html(`${response.data.id}<br>${response.data.user.name}`);
          $('#data_id').val(response.data.id);
        }
      });
      //open modal
      $('#modal-edit').modal('show');
  });

  
</script>


@endpush