@extends('layout.admin')
@section('isi')

<script src="{{asset('datatable.min.js')}}"></script>
<link rel="stylesheet" href="{{asset('datatable.min.css')}}">
@endsection
@section('content')
<input type="hidden" id="id-bahan" value="{{$id}}">
<ol class="breadcrumb">
    <li class="breadcrumb-item">Bahan</li>
     <li class="breadcrumb-item active" id="nama"></li>
</ol>
<div class="row">
    <div class="col-12">
          <div class="card">
            <div class="card-header">
                Data Bahan
            </div>
            <div class="card-body">
                <div class="row">
                    <span class="col-2"> Nama: </span><span id="nama-bahan" class="col-10"></span>
                    <span class="col-2 mt-3"> Stok :</span><span id="stok-bahan" class="col-10 mt-3"></span>
                    <div class="btn-group mt-3 col-12">
                        <button class="btn btn-primary col-2" onclick="edit_modal()">Edit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                Data Masuk
            </div>
            <div class="card-body">
               <div class="btn-group col-12">
                    <div class="btn btn-success" onclick="nambahdata()" id="btn-tambah">Tambah Data Stok</div>
                </div>
                <div class="col-12 d-none" id="data-input">
                    <form onsubmit="return data_add()">
                    <div class="row">

                            <input type="number"  id="masuk-jumlah" class="form-control col-3 mr-1" placeholder="jumlah bahan" step="any">
                            <input type="text"  id="masuk-keterangan" class="form-control col-7 mr-1" placeholder="catatan">
                            <button class="btn btn-info col-1">+</button>
                        </form>
                    </div>
                </div>
                <div class="col-12 table-responsive mt-3">
                    <table class="table table-striped" id="data-masuk">
                        <thead>
                            <th>Jumlah</th>
                             <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Action</th>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card">
            <div class="card-header">Data Keluar</div>
            <div class="card-body">
                <div class="btn-group col-12">
                    <div class="btn btn-danger" onclick="kurangdata()" id="btn-minus">Kurangi Stok</div>
                </div>
                <div class="col-12 d-none" id="data-input-keluar">
                    <form onsubmit="return data_out()">
                    <div class="row">
                            <input type="number"  id="keluar-jumlah" class="form-control col-3 mr-1" placeholder="jumlah bahan" step="any">
                            <input type="text"  id="keluar-keterangan" class="form-control col-7 mr-1" placeholder="catatan">
                            <button class="btn btn-info col-1">-</button>
                        </form>
                    </div>
                </div>
                <div class="col-12 table-responsive mt-3">
                    <table class="table table-striped" id="data-keluar">
                        <thead>
                            <th>Jumlah</th>
                             <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Action</th>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="masuk-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Masuk Stok bahan </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group form-row">
                <label class="col-2">Nama bahan</label>
                <div class="col-8">
                    <input type="text" id="masuk-bahan" class="form-control" readonly>
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
                        <input type="number" step="any" class="form-control" id="masuk-jumlah-in" readonly>
                    </div>
                </div>
                <div class="form-group form-row">
                    <label class="col-2">Deskripsi</label>
                    <div class="col-8">
                        <textarea  id="masuk-keterangan-in" class="form-control" readonly></textarea>
                    </div>
                </div>
            </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Jenis bahan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="form-horizontal " onsubmit="return editbahan();">
                <div class="form-group form-row">
                    <label class="col-2">kode:</label>
                    <div class="col-8">
                        <input type="text" class="form-control" id="edit-kode" disabled>
                    </div>
                </div>
                <div class="form-group form-row">
                    <label class="col-2">Nama :</label>
                    <div class="col-8">
                        <input type="text" class="form-control" id="edit-nama">
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
          <h5 class="modal-title">Keluar Stok bahan </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group form-row">
                <label class="col-2">Nama bahan</label>
                <div class="col-8">
                    <input type="text" id="keluar-bahan" class="form-control" readonly>
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
                        <input type="text" step="any" class="form-control" id="keluar-jumlah-out" readonly>
                    </div>
                </div>
                <div class="form-group form-row">
                    <label class="col-2">Deskripsi</label>
                    <div class="col-8">
                        <textarea  id="keluar-keterangan-out" class="form-control" readonly></textarea>
                    </div>
                </div>
            </div>
      </div>
    </div>
  </div>

<script>
let id=$('#id-bahan').val()
$.ajax({
    method:"get",
    url:api+'/v1/bahan/'+id,
    headers:{
        Authorization:'Bearer '+localStorage.getItem('token'),
        Accept:'application/json'
    },
    success:res=>{
        console.log(res.data)
        let data=res.data
        $('#nama').text(data.nama)
        $('#nama-bahan').text(data.nama)
        $('#stok-bahan').text(data.stok)
        masuk=$('#data-masuk').DataTable()
        data.masuk.forEach(a => {
            let action='<div class="btn-group">'
            action=action+'<button class="btn btn-primary" onclick="detail_in('+a.id+')"><i class="fa fa-eye"></i></button>'
            action=action+'<button class="btn btn-danger" onclick="hapus_in('+a.id+')"><i class="fa fa-trash"></i></button>'
            action=action+'</div>'
            masuk.row.add([
                a.jumlah,
                a.nama,
                a.created_at,
                action
            ]).draw(false)
        });
        let out=$('#data-keluar').DataTable()
        data.keluar.forEach(a=>{

            let action='<div class="btn-group">'
            action=action+'<button class="btn btn-primary" onclick="detail_out('+a.id+')"><i class="fa fa-eye"></i></button>'
            action=action+'<button class="btn btn-danger" onclick="hapus_out('+a.id+')"><i class="fa fa-trash"></i></button>'
            action=action+'</div>'

            out.row.add([
                a.jumlah,
                a.nama,
                a.created_at,
                action
            ]).draw(false)
    })
    }


})
function edit_modal(){
    $('#edit-modal').modal('show')
    $.ajax({
        method:"Get",
        url:api+'/v1/bahan/'+id,
        headers:{
            Authorization:'Bearer '+localStorage.getItem('token'),
            Accept:'application/json'
        },
        success:res=>{
            $('#edit-nama').val(res.data.nama)
            $('#edit-kode').val(res.data.kode)
        }
    })
}
function editbahan(){
    let data={}
    data.nama=$("#edit-nama").val()

    $.ajax({
        method:'put',
        url:api+'/v1/bahan/'+id,
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
function data_add(){
    let data={}
    data.jumlah=$('#masuk-jumlah').val()
    data.keterangan=$('#masuk-keterangan').val()
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
function nambahdata(){
    $('#btn-tambah').addClass('d-none')
    $('#data-input').removeClass('d-none')
}
function kurangdata(){
    $('#btn-minus').addClass('d-none')
    $('#data-input-keluar').removeClass('d-none')
}
function data_out(){
    let data={}
    data.jumlah=$("#keluar-jumlah").val()
    data.keterangan=$('#keluar-keterangan').val()
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

       function detail_out(id){
           $('#keluar-modal').modal('show')
           $.ajax({
               method:"get",
               url:api+'/v1/bahan/keluar/'+id,
               headers:{
                   Authorization:'Bearer '+localStorage.getItem('token'),
                   Accept:'application/json'
               },
               success:res=>{
                   console.log(res.data)
                   $('#keluar-bahan').val(res.data.bahan.nama)
                   $('#keluar-nama').val(res.data.nama)
                   $('#keluar-jumlah-out').val(res.data.jumlah)
                   if(res.data.catatan!=null){

                   $('#keluar-keterangan-out').text(res.data.catatan)
                   }
               }
           })
       }
       function detail_in(id){
           $('#masuk-modal').modal('show')
           $.ajax({
               method:"get",
               url:api+'/v1/bahan/masuk/'+id,
               headers:{
                   Authorization:"Bearer "+localStorage.getItem('token'),
                   Accept:'application/json'
               },
               success:res=>{
                   console.log(res)
                   $('#masuk-bahan').val(res.data.bahan.nama)
                   $('#masuk-nama').val(res.data.nama)
                   $('#masuk-jumlah-in').val(res.data.jumlah)
                   if(res.data.keterangan!=null){
                   $('#masuk-keterangan-in').text(res.data.keterangan)
                   }
               }
           })
       }
       function hapus_in(id){
        $.ajax({
               method:"DELETE",
               url:api+'/v1/bahan/masuk/'+id,
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

       }
       function hapus_out(id){
           $.ajax({
               method:"DELETE",
               url:api+'/v1/bahan/keluar/'+id,
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
       }

    </script>
@endsection

