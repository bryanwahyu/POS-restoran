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
    <div class="col-12 mt-3 mb-3">
     <button  onclick="tambahmodal()" class="btn btn-primary">Tambah</button>

    </div>
    <div class="col-12">
        <div class="table-responsive">
            <table id="data" class="table table-stripped">
                <thead>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Role</th>
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
            <form class="form-horizontal" onsubmit="return tambah_user()">
                <div class="form-group form-row">
                    <label class="col-3">Nama</label>
                    <div class="col-8">
                        <input type="text" class="form-control" id="add-nama">
                    </div>
                </div>
                <div class="form-group form-row">
                    <label class="col-3">Username</label>
                    <div class="col-8">
                        <input type="text" class="form-control" onchange="cekusername()" id="add-username" >
                    </div>
                </div>
                <div class="form-group form-row">
                    <label class="col-3">Password</label>
                    <div class="col-8">
                        <input type="password" class="form-control" id="add-password">
                    </div>
                </div>
                <div class="form-group form-row">
                    <label class="col-3">Role</label>
                    <div class="col-8">
                        <select class="form-control" id="add-role">
                            <option value="admin">Admin</option>
                            <option value="kasir">Kasir</option>
                            <option value="barista">Barista</option>
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

  <input type="hidden" id="user-id">
  <div class="modal fade" id="detail-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">detail User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" onsubmit="return edit_user()">
                <div class="form-group form-row">
                    <label class="col-3">Nama</label>
                    <div class="col-8">
                        <input type="text" class="form-control" disabled id="detail-nama">
                    </div>
                </div>
                <div class="form-group form-row">
                    <label class="col-3">Username</label>
                    <div class="col-8">
                        <input type="text" class="form-control" disabled id="detail-username" >
                    </div>
                </div>
                <div class="form-group form-row">
                    <label class="col-3">Role</label>
                    <div class="col-8">
                        <select class="form-control" disabled id="detail-role">
                            <option value="admin">Admin</option>
                            <option value="kasir">Kasir</option>
                            <option value="barista">Barista</option>
                        </select>
                    </div>
                </div>
            </div>
        <div class="modal-footer">
          <button type="button" onclick="edit_button()" id="data-edit" class="btn btn-primary">Edit</button>
          <button type="save" onclick="edit_user()" id="simpan-edit" class="btn btn-primary d-none">Save</button>

        </form>


        </div>
      </div>
    </div>
  </div>

<script>

        $.ajax({
            method:'get',
            url:api+'/v1/user',
            headers:{
                Authorization:"Bearer "+localStorage.getItem('token'),
                Accept:'application/json'
            },
            success:res=>{
                let data=$('#data').DataTable()

                res.data.forEach(a=>{
                    let action='<div class="btn-group">'
                    action=action+'<button class="btn btn-primary" onclick="detail('+a.id+')"><i class="fa fa-eye"></i></button>'
                    action=action+'<button class="btn btn-warning" onclick="reset('+a.id+')"><i class="fa fa-redo-alt"></i></button>'
                    action=action+'<button class="btn btn-danger" onclick="hapus('+a.id+')"><i class="fa fa-trash"></i></button>'
                    action=action+'</div>'

                    data.row.add([
                        a.nama,
                        a.username,
                        a.role,
                        action
                    ]).draw(false)
                })
            }
        })
      function tambahmodal(){
          $("#tambah-modal").modal('show')
      }
      function tambah_user(){
          let data={}
          data.nama=$('#add-nama').val()
          data.username=$('#add-username').val()
          data.password=$('#add-password').val()
          data.role=$('#add-role').val()

          $.ajax({
              method:"post",
              url:api+'/v1/user',
              contentType:'application/json',
              headers:{
                  Authorization:"Bearer "+localStorage.getItem('token'),
                  Accept:"application/json"
              },
              data:JSON.stringify(data),
              success:res=>{
                alert(res.pesan)
                window.location.reload()
              }
          })

         return false;
      }
      function cekusername(){
          let username=$("#add-username").val()
        $.ajax({
            method:"get",
            url:api+'/v1/user/cek/'+username,
            headers:{
                Authorization:"Bearer "+localStorage.getItem('token'),
                Accept:'application/json'
            },
            success:res=>{
               if(res.kode==200){
                    $('#add-username').attr('disabled')
               }else{
                   alert('Data username sudah digunakan')
               }
            }
        })
      }
      function detail(id){
        $('#detail-modal').modal('show');
        $('#user-id').val(id)
        $('#detail-nama').attr('disabled')
        $('#detail-role').attr('disabled')
        $('#detail-username').attr('disabled')
        $('#simpan-edit').addClass('d-none')
        $('#data-edit').removeClass('d-none')

        $.ajax({
            method:'get',
            url:api+'/v1/user/'+id,
            headers:{
                Authorization:"Bearer "+localStorage.getItem('token'),
                Accept:'application/json'
            },
            success:res=>{
                console.log(res)
                $('#detail-nama').val(res.data.nama)
                $('#detail-role').val(res.data.role)
                $('#detail-username').val(res.data.username)
            }
        })

      }
      function edit_button(){
            $('#detail-nama').removeAttr('disabled')
            $('#detail-role').removeAttr('disabled')
            $('#simpan-edit').removeClass('d-none')
            $('#data-edit').addClass('d-none')
      }
      function edit_user(){
          let id=$('#user-id').val()
          let data={}
          data.nama=$('#detail-nama').val()
          data.role=$('#detail-role').val()

          $.ajax({
              method:'put',
              url:api+'/v1/user/'+id,
              headers:{
                    Authorization:'Bearer '+localStorage.getItem('token'),
                    Accept:'application/json'
              },
              data:JSON.stringify(data),
              contentType:'application/json',
              success:res=>{
                alert(res.pesan)
                window.location.reload();
              }

          })
          return false;
      }
      function reset(id){
        $.ajax({
            method:'get',
            url:api+'/v1/user/reset/'+id,
            headers:{
                Authorization:'Bearer '+localStorage.getItem('token'),
                Accept:'application/json'
            },
            success:res=>{
                alert(res.pesan)
                window.location.reload()
            }
        })
      }
      function hapus(id){
          $.ajax({
              method:'delete',
              url:api+'/v1/user/'+id,
              headers:{
                  Authorization:'Bearer '+localStorage.getItem('token'),
                  Accept:'application/json'
              },
              success:res=>{
                  alert(res.pesan)
                  window.location.reload()
              }
          })
      }
    </script>

@endsection
