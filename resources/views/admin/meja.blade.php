@extends('layout.admin')
@section('isi')
<script src="{{asset('datatable.min.js')}}"></script>
<link rel="stylesheet" href="{{asset('datatable.min.css')}}">
@endsection

@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-active">Meja</li>
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
                    <th>Kapasistas</th>
                    <th>QRCode</th>
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
            <form class="form-horizontal" onsubmit="return tambah_meja()">
                <div class="form-group form-row">
                    <label class="col-3">Nama</label>
                    <div class="col-8">
                        <input type="text" class="form-control" id="add-nama">
                    </div>
                </div>
                <div class="form-group form-row">
                    <label class="col-3">Kapasistas :</label>
                    <div class="col-8">
                        <input type="number" class="form-control" id="add-kapasistas" >
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

  <input type="hidden" id="meja-id">
  <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Data Meja</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" onsubmit="return edit_meja()">
                <div class="form-group form-row">
                    <label class="col-3">Nama</label>
                    <div class="col-8">
                        <input type="text" class="form-control"  id="edit-nama">
                    </div>
                </div>
                <div class="form-group form-row">
                    <label class="col-3">Kapasistas</label>
                    <div class="col-8">
                        <input type="text" class="form-control"  id="edit-kapasistas">
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

        $.ajax({
            method:'get',
            url:api+'/v1/meja',
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
                    let  qrcode='<img src="http://barcodes4.me/barcode/qr/google.png?value='+link+'/menu/'+a.id+'">'
                    data.row.add([
                        a.nama,
                        a.kapasistas,
                        qrcode,
                        action
                    ]).draw(false)
                })
            }
        })

      function tambahmodal(){
          $("#tambah-modal").modal('show')
      }
      function tambah_meja(){
          let data={}
          data.nama=$('#add-nama').val()
          data.kapasistas=$('#add-kapasistas').val()
          $.ajax({
              method:"post",
              url:api+'/v1/meja',
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
          $('#meja-id').val(id)
          $.ajax({
              method:'get',
              url:api+'/v1/meja/'+id,
              headers:{
                  Authorization:'Bearer '+localStorage.getItem('token'),
                  Accept:'application/json'
              },
              success:res=>{
                  $('#edit-nama').val(res.data.nama)
                  $('#edit-kapasistas').val(res.data.kapasistas)
              }
          })
      }
      function edit_meja(){
            let id=$("#meja-id").val()
            let data={}
            data.nama=$('#edit-nama').val()
            data.kapasistas=$('#edit-kapasistas').val()
            $.ajax({
                method:'put',
                url:api+'/v1/meja/'+id,
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
              url:api+'/v1/meja/'+id,
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
