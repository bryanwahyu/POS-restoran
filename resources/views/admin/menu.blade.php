@extends('layout.admin')
@section('isi')
<script src="{{asset('datatable.min.js')}}"></script>
<link rel="stylesheet" href="{{asset('datatable.min.css')}}">
@endsection

@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-active">Menu</li>
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
                    <th>Harga</th>
                    <th>Foto</th>
                    <th>Status</th>
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
          <h5 class="modal-title">Tambah Menu Baru</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" onsubmit="return tambah_menu()">
                <div class="form-group form-row">
                    <label class="col-3">Nama</label>
                    <div class="col-8">
                        <input type="text" class="form-control" id="add-nama">
                    </div>
                </div>
                <div class="form-group form-row">
                    <label class="col-3">Jenis</label>
                    <div class="col-8">
                        <select  id="add-jenis" class="form-control">
                            <option value="Makanan">Makanan</option>
                            <option value="Minuman">Minuman</option>
                        </select>
                    </div>
                </div>
                <div class="form-group form-row">
                    <label class="col-3"> Foto:</label>
                    <div class="col-8">
                        <input type="file" id="add-foto">
                    </div>
                </div>
                <div class="form-group form-row">
                    <label class="col-3">Harga :</label>
                    <div class="col-8">
                        <input type="number" class="form-control" id="add-harga">
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

  <input type="hidden" id="menu-id">
  <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Data menu</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" onsubmit="return edit_menu()">
                <div class="form-group form-row">
                    <label class="col-3">Nama</label>
                    <div class="col-8">
                        <input type="text" class="form-control" id="edit-nama">
                    </div>
                </div>
                <div class="form-group form-row">
                    <label class="col-3">Jenis</label>
                    <div class="col-8">
                        <select  id="edit-jenis" class="form-control">
                            <option value="Makanan">Makanan</option>
                            <option value="Minuman">Minuman</option>
                        </select>
                    </div>
                </div>
                <div class="form-group form-row">
                    <label class="col-3"> Foto:</label>
                    <div class="col-8">
                        <input type="file" id="edit-foto">
                    </div>
                </div>
                <div class="form-group form-row">
                    <label class="col-3">Harga :</label>
                    <div class="col-8">
                        <input type="number" class="form-control" id="edit-harga">
                    </div>
                </div>
                <div class="form-group form-row">
                    <label class="col-3">Status</label>
                    <div class="col-8">
                        <select id="edit-status" class="form-control">
                            <option value="1">Ada</option>
                            <option value="0">Kosong</option>
                        </select>
                    </div>
                </div>
            </div>
        <div class="modal-footer">
        <button type="submit" class="btn btn-primary"> Save</button>
        </form>
        </div>
      </div>
    </div>
  </div>

<script>
    let addfoto='';
    let editfoto='';
        $.ajax({
            method:'get',
            url:api+'/v1/menu',
            headers:{
                Authorization:"Bearer "+localStorage.getItem('token'),
                Accept:'application/json'
            },
            success:res=>{
                let data=$('#data').DataTable()

                res.data.forEach(a=>{
                    let action='<div class="btn-group">'
                    action=action+'<button class="btn btn-primary" onclick="detail('+a.id+')"><i class="fa fa-eye"></i></button>'
                    action=action+'<button class="btn btn-danger" onclick="hapus('+a.id+')"><i class="fa fa-trash"></i></button>'
                    action=action+'</div>'
                    foto='<img src="'+a.foto+'" width="150px" height="150px">'
                    let status
                    if(a.status==0){
                        status="kosong";
                    }else{
                        status="Ada"
                    }
                    data.row.add([
                        a.nama,
                        a.harga,
                        foto,
                        status,
                        action
                    ]).draw(false)
                })
            }
        })

      function tambahmodal(){
          $("#tambah-modal").modal('show')
      }
      function tambah_menu(){
          let data={}
          data.nama=$('#add-nama').val()
          data.harga=$('#add-harga').val()
          data.jenis=$('#add-jenis').val()
          data.foto=addfoto

          $.ajax({
              method:"post",
              url:api+'/v1/menu',
              contentType:'application/json',
              headers:{
                  Authorization:"Bearer "+localStorage.getItem('token'),
                  Accept:"application/json"
              },
              data:JSON.stringify(data),
              success:res=>{
                  console.log(res)
                alert(res.pesan)
                window.location.reload()
              }
          })

         return false;
      }
      function detail(id){
          $('#edit-modal').modal('show')
          $('#menu-id').val(id)
          $.ajax({
              method:'get',
              url:api+'/v1/menu/'+id,
              headers:{
                  Authorization:'Bearer '+localStorage.getItem('token'),
                  Accept:'application/json'
              },
              success:res=>{
                  $('#edit-nama').val(res.data.nama)
                  $('#edit-harga').val(res.data.harga)
                  $('#edit-status').val(res.data.status)
                  $('#edit-jenis').val(res.data.jenis)
              }
          })
      }

      function edit_menu(){
            let id=$("#menu-id").val()
            let data={}
            data.nama=$('#edit-nama').val()
            data.harga=$('#edit-harga').val()
            data.status=$('#edit-status').val()
            data.jenis=$('#edit-jenis').val()
            data.foto=editfoto

            $.ajax({
                method:'put',
                url:api+'/v1/menu/'+id,
                data:JSON.stringify(data),
                contentType:'application/json',
                headers:{
                    Authorization:'Bearer '+localStorage.getItem('token'),
                    Accept:'application/json'
                },
                success:res=>{
                    alert(res.pesan)
                    window.location.reload()
                }
            })
            return false
      }

      function hapus(id){
          $.ajax({
              method:'delete',
              url:api+'/v1/menu/'+id,
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
      File.prototype.convertToBase64 = function(callback){
                var reader = new FileReader();
                reader.onloadend = function (e) {
                    callback(e.target.result, e.target.error);
                };
                reader.readAsDataURL(this);
        };

        $("#add-foto").on('change',function(){
          var selectedFile = this.files[0];
          selectedFile.convertToBase64(function(base64){
               addfoto=base64
          })
        });
        $("#edit-foto").on('change',function(){
          var selectedFile = this.files[0];
          selectedFile.convertToBase64(function(base64){
               editfoto=base64
          })
        });
    </script>

@endsection
