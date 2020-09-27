@extends('layout.admin')
@section('isi')
<script src="{{asset('datatable.min.js')}}"></script>
<link rel="stylesheet" href="{{asset('datatable.min.css')}}">
@endsection

@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-active">User Manajemen</li>
</ol>
<div class="row">
    <div class="col-12 mb-3">
     <button  onclick="tambahmodal()" class="btn btn-primary">Tambah</button>

    </div>
    <div class="col-12">
        <div class="table-responsive">
            <table id="data" class="table table-stripped">
                <thead>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>No HP</th>
                    <th>Action</th>
                </thead>
            </table>
        </div>
    </div>
</div>


<div class="modal fade" id="tambah-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah User Baru</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="form-horizontal">
                <div class="form-group form-row">
                    <label class="col-3">Nama</label>
                    <div class="col-8">
                        <input type="text" class="form-control" id="add-nama">
                    </div>
                </div>
                <div class="form-group form-row">
                    <label class="col-3">Username</label>
                    <div class="col-8">
                        <input type="text" class="form-control" id="add-username" readonly>
                    </div>
                </div>
                <div class="form-group form-row">
                    <label class="col-3">Password</label>
                    <div class="col-8">
                        <input type="password" class="form-control" id="add-password" readonly>
                    </div>
                </div>
                <div class="form-group form-row">
                    <label class="col-3">No HP</label>
                    <div class="col-8">
                        <input type="text" class="form-control" id="add-phone" readonly>
                    </div>
                </div>
                <div class="form-group form-row">
                    <label class="col-3">Role</label>
                    <div class="col-8">
                        <select class="form-control" id="add-role"  readonly>
                            <option value="Arabica">Admin</option>
                            <option value="Robusta">Kasir</option>
                            <option value="Blend">Owner</option>
                        </select>
                    </div>
                </div>
            </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save changes</button>
         </form>

        </div>
      </div>
    </div>
  </div>

<script>
      function tambahmodal(){
          $("#tambah-modal").modal('show')
      }
    </script>

@endsection