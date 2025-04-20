@extends('layouts.admin') 
@push('css')
<!-- Custom styles for this page -->
<link href="{{ url('') }}/admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush 

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-0 text-gray-800 mb-4">Timeline</h1>

<div class="row">

    <div class="col-md-7">

    <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="mt-2 font-weight-bold text-primary">Data</h6>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Timeline</th>
                  <th>Tanggal Mulai</th>
                  <th>Tanggal Selesai</th>
                  <th>Menu</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                    <th>No</th>
                  <th>Timeline</th>
                  <th>Tanggal Mulai</th>
                  <th>Tanggal Selesai</th>
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
          url: "{{ route('timeline.get_datatable') }}",
        //   type: 'GET'
        },
        columns: [
          {data:'no',name:'no'},
          {data:'name',name:'name'},
          {data:'tgl_mulai',name:'tgl_mulai'},
          {data:'tgl_selesai',name:'tgl_selesai'},
          {data:'action',name:'action', orderable: false, searchable: false},
        ],
        order: [[0, 'asc']]
      });
    });
  </script>

<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Form Edit</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="data_id">
          <div class="form-group">
              <label for="name_edit" class="control-label">Timeline</label>
              <input type="text" class="form-control" id="name_edit" name="name_edit" placeholder="">
          </div>
          <div class="row">
            <div class="col-md-6"><div class="form-group">
              <label for="tgl_mulai_edit" class="control-label">Tanggal Mulai</label>
              <input type="date" class="form-control" id="tgl_mulai_edit" name="tgl_mulai_edit" placeholder="">
          </div>
          </div>
            <div class="col-md-6">
                <div class="form-group">
                <label for="tgl_selesai_edit" class="control-label">Tanggal Selesai</label>
                <input type="date" class="form-control" id="tgl_selesai_edit" name="tgl_selesai_edit" placeholder="">
            </div>
          </div>
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
          url: `{{ url('admin/timeline/show/${data_id}') }}`,
          type: "GET",
          cache: false,
          success: function (response) {
            // console.log(response.data);
            $('#data_id').val(response.data.id);
            $('#name_edit').val(response.data.name);
            $('#tgl_mulai_edit').val(response.data.tgl_mulai);
            $('#tgl_selesai_edit').val(response.data.tgl_selesai);
          }
        });
        //open modal
        $('#modal-edit').modal('show');
    });
  
    $('#update').click(function (e) { 
        e.preventDefault();
        let data_id = $('#data_id').val();
        let name   = $('#name_edit').val();
        let tgl_mulai   = $('#tgl_mulai_edit').val();
        let tgl_selesai   = $('#tgl_selesai_edit').val();
        let token   = $("meta[name='csrf-token']").attr("content");
  
        $.ajax({
            url: `{{ url('admin/timeline/update/${data_id}') }}`,
            type: "POST",
            cache: false,
            data: {

                'name': name,
                'tgl_mulai': tgl_mulai,
                'tgl_selesai': tgl_selesai,
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
                $('#name_edit').val('');
                $('#tgl_mulai_edit').val('');
                $('#tgl_selesai_edit').val('');
  
                //close modal
                $('#modal-edit').modal('hide');
                $('#dataTable').DataTable().ajax.reload();
            },
            error: function (error) { 
                console.log(error);
                
            }
        });
    });
  </script>

  

@endpush