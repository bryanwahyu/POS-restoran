@extends('layout.admin')
@section('isi')
<script src="{{asset('datatable.min.js')}}"></script>
<link rel="stylesheet" href="{{asset('datatable.min.css')}}">
@endsection

@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-active">Kopi</li>
</ol>
<div class="row">
    <div class="col-12 mt-3 mb-3">
     <button  onclick="tambahmodal()" class="btn btn-primary">Tambah</button>

    </div>
    <div class="col-12">
        <div class="table-responsive">
            <table id="data" class="table table-stripped">
                <thead>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Jenis Kopi</th>
                    <th>Stok Kopi</th>
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
          <h5 class="modal-title">Tambah Jenis Kopi Baru</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="form-horizontal " onsubmit="return addkopi();">
                <div class="form-group form-row">
                    <label class="col-2">kode:</label>
                    <div class="col-8">
                        <input type="text" class="form-control" id="add-kode" onchange="cek_kode()">
                    </div>
                </div>
                <div class="form-group form-row">
                    <label class="col-2">asal :</label>
                    <div class="col-8">
                        <input type="text" class="form-control" id="add-asal" readonly>
                    </div>
                </div>
                <div class="form-group form-row">
                    <label class="col-2">Jenis :</label>
                    <div class="col-8">
                        <select class="form-control" id="add-jenis"  readonly>
                            <option value="Arabica">Arabica</option>
                            <option value="Robusta">Robusta</option>
                            <option value="Blend">Blend</option>
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
  <div class="modal fade" id="masuk-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">isi Stok Kopi </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="form-horizontal " onsubmit="return masukkopi();">
                <div class="form-group form-row">
                    <input type="hidden" id="id-kopi">
                    <label class="col-2">kode:</label>
                    <div class="col-8">
                        <input type="text" class="form-control" id="masuk-kode" readonly>
                    </div>
                </div>
                <div class="form-group form-row">
                    <label class="col-2">jumlah :</label>
                    <div class="col-8">
                        <input type="number" class="form-control" id="masuk-jumlah">
                    </div>
                </div>
                <div class="form-group form-row">
                    <label class="col-2">Deskripsi</label>
                    <div class="col-8">
                        <textarea  id="masuk-keterangan" class="form-control"></textarea>
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

  <div class="modal fade" id="keluar-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Keluar Stok Kopi </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="form-horizontal " onsubmit="return keluarkopi();">
                <div class="form-group form-row">
                    <label class="col-2">kode:</label>
                    <div class="col-8">
                        <input type="text" class="form-control" id="keluar-kode" readonly>
                    </div>
                </div>
                <div class="form-group form-row">
                    <label class="col-2">jumlah :</label>
                    <div class="col-8">
                        <input type="number" step="any" class="form-control" id="keluar-jumlah">
                    </div>
                </div>
                <div class="form-group form-row">
                    <label class="col-2">Deskripsi</label>
                    <div class="col-8">
                        <textarea  id="keluar-keterangan" class="form-control"></textarea>
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

      function addkopi(){
          data={}
          data.asal=$('#add-asal').val()
          data.kode=$('#add-kode').val()
          data.jenis=$('#add-jenis').val()

          $.ajax({
              method:"post",
              url:api+'/v1/kopi',
              data:JSON.stringify(data),
              contentType:"application/json",
              headers:{
                  Authorization:"Bearer "+localStorage.getItem('token'),
                  Accept:"application/json"
              },
              success:res=>{
                  alert(res.pesan)
                  window.location.reload()
              },

          })
          return false;
      }
      function cek_kode(){
          let kode=$('#add-kode').val()
            $.ajax({
                method:"get",
                url:api+'/v1/kopi/cek/'+kode,
                headers:{
                    Authorization:"Bearer "+localStorage.getItem('token'),
                    Accept:"application/json"
                },
                success:res=>{
                        if(res.kode==200){
                          $('#add-kode').attr('readonly',true)
                          $('#add-asal').removeAttr('readonly')
                          $('#add-jenis').removeAttr('readonly')
                        }
                        else{
                            alert('kode sudah digunakan')
                        }
                }
            })
      }
       $.ajax({
           method:'GET',
           url:api+'/v1/kopi',
           headers:{
               Authorization:"Bearer "+localStorage.getItem('token'),
               Accept:'application/json'
           },
           success:res=>{
               let data=$('#data').DataTable()
               res.data.forEach(a =>{
                let action='<div class="btn-group"><button class="btn btn-info" onclick="detail('+a.id+')"><i class="fa fa-eye"></i></button>'
                    action=action+'<button class="btn btn-success" onclick="tambahkopi('+a.id+',`'+a.kode+'`)"> <i class="fa fa-plus"></i></button>'
                    action=action+'<button class="btn btn-danger" onclick="kurangkopi('+a.id+',`'+a.kode+'`)"> <i class="fa fa-minus"></i></button>'
                    action=action+'<button class="btn btn-warning" onclick="hapuskopi('+a.id+')"> <i class="fa fa-trash"></i></button></div>'
                data.row.add([
                    a.kode,
                    a.asal,
                    a.jenis,
                    a.stok,
                    action
                ]).draw(false)
               });

           }
       })
       function  tambahkopi(id,kode){
           $('#masuk-modal').modal('show')
           $('#masuk-kode').val(kode)
           $('#id-kopi').val(id)
       }
       function masukkopi(){
            let data={}
            data.jumlah=$("#masuk-jumlah").val()
            data.keterangan=$('#masuk-keterangan').val()
            let id=$('#id-kopi').val()
            $.ajax({
                method:"Post",
                url:api+'/v1/kopi/masuk/'+id,
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
            return false;
       }
       function kurangkopi(id,kode){
           $('#id-kopi').val(id)
           $('#keluar-kode').val(kode)
           $('#keluar-modal').modal('show')
       }
       function keluarkopi(){
            let data={}
            data.jumlah=$("#keluar-jumlah").val()
            data.keterangan=$('#keluar-keterangan').val()
            let id=$('#id-kopi').val()

            $.ajax({
                method:"Post",
                url:api+'/v1/kopi/keluar/'+id,
                data:JSON.stringify(data),
                contentType:'application/json',
                headers:{
                    Authorization:'Bearer '+localStorage.getItem('token'),
                    Accept:'application/json'
                },
                success:res=>{

                    alert(res.pesan)
                    if(res.kode==200){
                        window.location.reload()
                    }
                }

            })
            return false;
       }
       function hapuskopi(id){
           $.ajax({
               method:'delete',
               url:api+'/v1/kopi/'+id,
               headers:{
                   Authorization:'Bearer '+localStorage.getItem('token'),
                   Accept:'application/json',
               },
               success:res=>{
                   alert(res.pesan)
                   window.location.reload()
               }
           })
       }
       function detail(id){
           window.location.replace(url+'/gudang/kopi/'+id)
       }
    </script>

@endsection
