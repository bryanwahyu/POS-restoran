@extends('layout.admin')
@section('isi')
<script src="{{asset('datatable.min.js')}}"></script>
<link rel="stylesheet" href="{{asset('datatable.min.css')}}">
@endsection

@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-active">Bahan</li>
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
                    <th>Stok</th>
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
          <h5 class="modal-title">Tambah Jenis bahan Baru</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="form-horizontal " onsubmit="return addbahan();">
                <div class="form-group form-row">
                    <label class="col-2">kode:</label>
                    <div class="col-8">
                        <input type="text" class="form-control" id="add-kode" onchange="cek_kode()">
                    </div>
                </div>
                <div class="form-group form-row">
                    <label class="col-2">Nama :</label>
                    <div class="col-8">
                        <input type="text" class="form-control" id="add-nama" readonly>
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
          <h5 class="modal-title">isi Stok Bahan </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="form-horizontal " onsubmit="return masukbahan();">
                <div class="form-group form-row">
                    <input type="hidden" id="id-bahan">
                    <label class="col-2">kode:</label>
                    <div class="col-8">
                        <input type="text" class="form-control" id="masuk-kode" readonly>
                    </div>
                </div>
                <div class="form-group form-row">
                    <label class="col-2">Nama:</label>
                    <div class="col-8">
                        <input type="text" class="form-control" id="masuk-nama" readonly>
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
          <h5 class="modal-title">Keluar Stok Bahan </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="form-horizontal " onsubmit="return keluarbahan();">
                <div class="form-group form-row">
                    <label class="col-2">kode:</label>
                    <div class="col-8">
                        <input type="text" class="form-control" id="keluar-kode" readonly>
                    </div>
                </div>
                <div class="form-group form-row">
                    <label class="col-2">Nama:</label>
                    <div class="col-8">
                        <input type="text" class="form-control" id="keluar-nama" readonly>
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

      function addbahan(){
          data={}
          data.nama=$('#add-nama').val()
          data.kode=$('#add-kode').val()
          $.ajax({
              method:"post",
              url:api+'/v1/bahan',
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
                url:api+'/v1/bahan/cek/'+kode,
                headers:{
                    Authorization:"Bearer "+localStorage.getItem('token'),
                    Accept:"application/json"
                },
                success:res=>{
                        if(res.kode==200){
                          $('#add-kode').attr('readonly',true)
                          $('#add-nama').removeAttr('readonly')
                        }
                        else{
                            alert('kode sudah digunakan')
                        }
                }
            })
      }
       $.ajax({
           method:'GET',
           url:api+'/v1/bahan',
           headers:{
               Authorization:"Bearer "+localStorage.getItem('token'),
               Accept:'application/json'
           },
           success:res=>{
               let data=$('#data').DataTable()
               res.data.forEach(a =>{
                let action='<div class="btn-group"><button class="btn btn-info" onclick="detail('+a.id+')"><i class="fa fa-eye"></i></button>'
                    action=action+'<button class="btn btn-success" onclick="tambahbahan('+a.id+',`'+a.kode+'`,`'+a.nama+'`)"> <i class="fa fa-plus"></i></button>'
                    action=action+'<button class="btn btn-danger" onclick="kurangbahan('+a.id+',`'+a.kode+'`,`'+a.nama+'`)"> <i class="fa fa-minus"></i></button>'
                    action=action+'<button class="btn btn-warning" onclick="hapusbahan('+a.id+')"> <i class="fa fa-trash"></i></button></div>'
                data.row.add([
                    a.kode,
                    a.nama,
                    a.stok,
                    action
                ]).draw(false)
               });

           }
       })
       function  tambahbahan(id,kode,nama){
           $('#masuk-modal').modal('show')
           $('#masuk-kode').val(kode)
           $('#masuk-nama').val(nama)
           $('#id-bahan').val(id)
       }
       function masukbahan(){
            let data={}
            data.jumlah=$("#masuk-jumlah").val()
            data.keterangan=$('#masuk-keterangan').val()
            let id=$('#id-bahan').val()
            $.ajax({
                method:"Post",
                url:api+'/v1/bahan/masuk/'+id,
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
       function kurangbahan(id,kode,nama){
           $('#id-bahan').val(id)
           $('#keluar-kode').val(kode)
           $('#keluar-nama').val(nama)
           $('#keluar-modal').modal('show')
       }
       function keluarbahan(){
            let data={}
            data.jumlah=$("#keluar-jumlah").val()
            data.keterangan=$('#keluar-keterangan').val()
            let id=$('#id-bahan').val()

            $.ajax({
                method:"Post",
                url:api+'/v1/bahan/keluar/'+id,
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
       function hapusbahan(id){
           $.ajax({
               method:'delete',
               url:api+'/v1/bahan/'+id,
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
           window.location.replace(url+'/gudang/stok/'+id)
       }
    </script>

@endsection
