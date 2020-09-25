@extends('layout.admin')
@section('isi')

<script src="{{asset('datatable.min.js')}}"></script>
<link rel="stylesheet" href="{{asset('datatable.min.css')}}">
@endsection
@section('content')
<input type="hidden" id="id-kopi" value="{{$id}}">
<ol class="breadcrumb">
    <li class="breadcrumb-item">Kopi</li>
     <li class="breadcrumb-item active" id="nama"></li>
</ol>
<div class="row">
    <div class="col-12">
          <div class="card">
            <div class="card-header">
                Data Kopi
            </div>
            <div class="card-body">
                <div class="row">
                    <span class="col-2"> Daerah : </span><span id="asal-kopi" class="col-10"></span>
                    <span class="col-2 mt-3"> Jenis  : </span><span id="jenis-kopi" class="col-10 mt-3"></span>
                    <span class="col-2 mt-3"> Stok :</span><span id="stok-kopi" class="col-10 mt-3"></span>
                    <div class="btn-group mt-3 col-12">
                        <button class="btn btn-primary" onclick="edit_modal()">Edit</button>
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

                            <input type="number"  id="masuk-jumlah" class="form-control col-3 mr-1" placeholder="jumlah kopi" step="any">
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

                            <input type="number"  id="keluar-jumlah" class="form-control col-3 mr-1" placeholder="jumlah kopi" step="any">
                            <input type="text"  id="keluar-keterangan" class="form-control col-7 mr-1" placeholder="catatan">
                            <button class="btn btn-info col-1">-</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<script>
let id=$('#id-kopi').val()
$.ajax({
    method:"get",
    url:api+'/v1/kopi/'+id,
    headers:{
        Authorization:'Bearer '+localStorage.getItem('token'),
        Accept:'application/json'
    },
    success:res=>{
        console.log(res.data)
        let data=res.data
        $('#nama').text(data.asal)
        $('#asal-kopi').text(data.asal)
        $('#jenis-kopi').text(data.jenis)
        $('#stok-kopi').text(data.stok)
        masuk=$('#data-masuk').DataTable()
        data.masuk.forEach(a => {
            let action='<div class="btn-group">'
            action=action+'<button class="btn btn-primary" onclick="detail('+a.id+')"><i class="fa fa-eye"></i></button>'
            action=action+'<button class="btn btn-danger" onclick="hapus('+a.id+')"><i class="fa fa-trash"></i></button>'
            action=action+'</div>'
            masuk.row.add([
                a.jumlah,
                a.nama,
                a.created_at,
                action
            ]).draw(false)
        });
    }


})
function data_add(){
    let data={}
    data.jumlah=$('#masuk-jumlah').val()
    data.keterangan=$('#masuk-keterangan').val()
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
function nambahdata(){
    $('#btn-tambah').addClass('d-none')
    $('#data-input').removeClass('d-none')
}
</script>
@endsection
