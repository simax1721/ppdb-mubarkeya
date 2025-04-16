@extends('layouts.admin') 
@push('css')
<!-- Custom styles for this page -->
<link href="{{ url('') }}/admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush 

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-0 text-gray-800 mb-4">Penilaian</h1>

<div class="row">

    <div class="col-md-12">

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
</div>
@endsection @push('scripts')
<!-- Page level plugins -->
  <script src="{{ url('') }}/admin/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="{{ url('') }}/admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script>
    //Call the dataTables jQuery plugin
    $(document).ready(function() {
      $('#dataTable').DataTable({
        processing : true,
        serverSide : true,
        ajax : {
          url: "{{ route('nilai.get_datatable') }}",
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
        order: [[0, 'asc']]
      });
    });
  </script>

<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Form Pengisian Nilai</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <h3 id="nomor" class="text-center"></h3>
          <input type="hidden" id="data_id">
            <div class="form-group">
                <label for="nilai_edit" class="control-label">Nilai</label>
                <input type="number" class="form-control" id="nilai_edit" name="nilai_edit" placeholder="">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-x"></i></button>
            <button type="button" class="btn btn-primary" id="update"><i class="fa fa-send"></i></button>
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
              $('#nilai_edit').val(response.data.nilai);
            }
          });
          //open modal
          $('#modal-edit').modal('show');
      });
    
      $('#update').click(function (e) { 
          e.preventDefault();
          let data_id = $('#data_id').val();
          let nilai   = $('#nilai_edit').val();
          let token   = $("meta[name='csrf-token']").attr("content");
    
          $.ajax({
              url: `{{ url('admin/nilai/update/${data_id}') }}`,
              type: "POST",
              cache: false,
              data: {
                  'nilai': nilai,
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
    
                  //clear form
                  $('#nilai_edit').val('');
    
                  //close modal
                  $('#modal-edit').modal('hide');
                  $('#dataTable').DataTable().ajax.reload();
              },
              error: function (error) {
								console.log(error);
								
								if (error.responseJSON.nilai?.[0]) { 
										toastr.error(error.responseJSON.nilai[0]);
								}
              }
          });
      });
    </script>


@endpush