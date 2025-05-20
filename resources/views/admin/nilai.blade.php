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
              <thead class="">
                <tr>
                  <th style="vertical-align: middle; text-align: center;" rowspan="2">Nama</th>
                  <th style="vertical-align: middle; text-align: center;" rowspan="2">Nomor Pendaftaran</th>
                  <th style="vertical-align: middle; text-align: center;" colspan="5">Nilai</th>
                  <th style="vertical-align: middle; text-align: center;" rowspan="2">Menu</th>
                </tr>
                <tr>
                  <th style="vertical-align: middle; text-align: center; width: 75px">Al-Quran</th>
                  <th style="vertical-align: middle; text-align: center; width: 75px">Akademik</th>
                  <th style="vertical-align: middle; text-align: center; width: 75px">Minat dan Bakat</th>
                  <th style="vertical-align: middle; text-align: center; width: 75px">Kejuruan</th>
                  <th style="vertical-align: middle; text-align: center; width: 75px; border: 1px solid #e6edf4;">Kesehatan</th>
                </tr>
              </thead>
              {{-- <tfoot>
                <tr>
                  <th>Nama</th>
                  <th>Nomor Pendaftaran</th>
                  <th>al</th>
                  <th>Pilihan 2</th>
                  <th>Nilai</th>
                  <th>Menu</th>
                </tr>
              </tfoot> --}}
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
          {data:'nalquran',name:'nalquran'},
          {data:'nakademik',name:'nakademik'},
          {data:'nmikat',name:'nmikat'},
          {data:'nkejuruan',name:'nkejuruan'},
          {data:'nkesehatan',name:'nkesehatan'},
          
          {data:'action',name:'action', orderable: false, searchable: false},
        ],
        order: [[1, 'desc']]
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
                <label for="nalquran_edit" class="control-label">Al-Quran</label>
                <input type="number" class="form-control" id="nalquran_edit" name="nalquran_edit" placeholder="">
            </div>
            <div class="form-group">
                <label for="nakademik_edit" class="control-label">Akademik</label>
                <input type="number" class="form-control" id="nakademik_edit" name="nakademik_edit" placeholder="">
            </div>
            <div class="form-group">
                <label for="nmikat_edit" class="control-label">Minat dan Bakar</label>
                <input type="number" class="form-control" id="nmikat_edit" name="nmikat_edit" placeholder="">
            </div>
            <div class="form-group">
                <label for="nkejuruan_edit" class="control-label">Kejuruan</label>
                <input type="number" class="form-control" id="nkejuruan_edit" name="nkejuruan_edit" placeholder="">
            </div>
            <label for="nkesehatan_label" class="control-label">Kesehatan</label>
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="nkesehatan_edit" name="nkesehatan_edit" value="✔">
              <label class="custom-control-label" for="nkesehatan_edit">✔</label>
            </div>
            {{-- <div class="form-group">
                <label for="nkesehatan_edit" class="control-label">Kesehatan</label>
                <input type="checkbox" value="✔" class="form-control" id="nkesehatan_edit" name="nkesehatan_edit" placeholder="">
            </div> --}}
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
              $('#nalquran_edit').val(response.data.nalquran);
              $('#nakademik_edit').val(response.data.nakademik);
              $('#nmikat_edit').val(response.data.nmikat);
              $('#nkejuruan_edit').val(response.data.nkejuruan);
              $('#nkesehatan_edit').prop('checked', response.data.nkesehatan != null);
              // $('#nkesehatan_edit').val(response.data.nkesehatan);
            }
          });
          //open modal
          $('#modal-edit').modal('show');
      });
    
      $('#update').click(function (e) { 
          e.preventDefault();
          let data_id = $('#data_id').val();
          let nalquran   = $('#nalquran_edit').val();
          let nakademik   = $('#nakademik_edit').val();
          let nmikat   = $('#nmikat_edit').val();
          let nkejuruan   = $('#nkejuruan_edit').val();
          let nkesehatan = $('#nkesehatan_edit').is(':checked') ? $('#nkesehatan_edit').val() : null;
          let token   = $("meta[name='csrf-token']").attr("content");

          console.log(nalquran, nakademik, nmikat, nkejuruan, nkesehatan);
          
    
          $.ajax({
              url: `{{ url('admin/nilai/update/${data_id}') }}`,
              type: "POST",
              cache: false,
              data: {
                  'nalquran': nalquran,
                  'nakademik': nakademik,
                  'nmikat': nmikat,
                  'nkejuruan': nkejuruan,
                  'nkesehatan': nkesehatan,
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
    
                  // clear form
                  $('#nalquran_edit').val('');
                  $('#nakademik_edit').val('');
                  $('#nmikat_edit').val('');
                  $('#nkejuruan_edit').val('');
                  $('#nkesehatan_edit').prop('checked', false);
    
                  //close modal
                  $('#modal-edit').modal('hide');
                  $('#dataTable').DataTable().ajax.reload();

                  console.log(response);
                  
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