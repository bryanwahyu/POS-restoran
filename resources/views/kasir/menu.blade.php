@extends('layout.kasir')
@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-active">Data Customer</li>
</ol>
<div class="row">
  <div class="col-12">
        <div class="form-group form-row">
            <label class="col-3">nama customer:</label>
            <div class="col-4">
                <input type="text" id="nama" class="form-control">
            </div>
        </div>
        <div class="form-group form-row">
            <label class="col-3">Meja</label>
            <div class="col-4">
                <select id="meja" class="form-control"></select>
            </div>
        </div>
  </div>
</div>
<div class="row">

    <div class="col-6">
        <ol class="breadcrumb">
            <li class="breadcrumb-active">Data orderan</li>
        </ol>
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-bordered" id="data-order">
                        <thead>
                            <th>pesenan</th>
                            <th>Jumlah</th>
                            <th>Total</th>
                            <th>Action</th>
                        </thead>
                        <tfoot>
                            <th colspan="2">Subtotal</th>
                            <th colspan="2" id="total"></th>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6">
        <ol class="breadcrumb">
            <li class="breadcrumb-active">Makanan & minuman</li>
        </ol>
        <div class="row">
            <div class="col-12" id="data-makanan">

            </div>
            <div class="col-12">
                <div class="row justify-content-end">
                    <div class="col-6">
                        <div class="form-group text">
                            <button class="btn btn-primary form-control mt-3">
                                Kirim
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <button class="btn btn-primary" onclick="sendajax()" >Kirim</button>
    </div>
</div>
 <div class="modal fade" id="pesen-menu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">detail pesanan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form onsubmit="return beli(event);">
                <div class="form-group form-row">
                    <input type="hidden" id="id-makanan">
                    <label class="col-3">Nama</label>
                    <div class="col-8">
                        <input type="text" class="form-control" id="nama-makanan" disabled>
                    </div>
                </div>
                <div class="form-group form-row">
                    <label class="col-3">Harga</label>
                    <div class="col-8">
                        <input type="text" class="form-control" id="harga-makanan" disabled>
                    </div>
                </div>
                <div class="form-group form-row">
                    <label class="col-3">jumlah</label>
                    <div class="col-3">
                        <input type="number" class="form-control" onchange="hitungtotal()" id="jumlah-makanan">
                    </div>
                    <label  class="col-3">Total</label>
                    <div class="col-3">
                       <input type="text" class="form-control" id="total-makanan" disabled>
                    </div>

                </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" type="submit">Pesan</button>
        </form>


        </div>
      </div>
    </div>
  </div>

 <div class="modal fade" id="pesen-makanan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">detail pesanan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form onsubmit="return pesanlagi_to_submit(event);">
                <div class="form-group form-row">
                    <label class="col-3">Nama</label>
                    <div class="col-8">
                        <input type="text" class="form-control" id="nama-makanan-order" disabled>
                    </div>
                </div>
                <div class="form-group form-row">
                    <label class="col-3">Harga</label>
                    <div class="col-8">
                        <input type="text" class="form-control" id="harga-makanan-order" disabled>
                    </div>
                </div>
                <div class="form-group form-row">
                    <label class="col-3">jumlah</label>
                    <div class="col-3">
                        <input type="number" class="form-control" onchange="hitungtotalorder()" id="jumlah-makanan-order">
                    </div>
                    <label  class="col-3">Total</label>
                    <div class="col-3">
                       <input type="text" class="form-control" id="total-makanan-order" disabled>
                    </div>

                </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" type="submit">Pesan</button>
        </form>


        </div>
      </div>
    </div>
  </div>

  @push('script')
  <script defer>
    let orderan=[]
    let nama_orderan=[]
    let i=0
    let subtotal=0
    $('#total').text(subtotal)
    let order=$('#data-order').DataTable()
    $.ajax({
        method:"get",
        url:api+'/v1/menu/sedia',
        headers:{
            Authorization:"Bearer "+localStorage.getItem('token'),
            Accept:'application/json'
        },
        success:res=>{
            let html=''
            res.data.forEach(a=>{
                html+='<div class="col-6">'
                html+='<div class="card" onclick="data_menu('+a.id+')">'
                html+='<div class="card-header">'
                html+=a.nama
                html+='</div>'
                html+='<div class="card-body">'
                html+='<div class="row">'
                html+='<img class="foto" src="'+a.foto+'">'
                html+='</div>'
                html+='</div>'
                html+='</div>'
                html+='</div>'
            })
            $("#data-makanan").html(html)
        }

    })
    $.ajax({
        method:"get",
        url:api+'/v1/meja',
        headers:{
            Authorization:'Bearer '+ localStorage.getItem('token'),
            Accept:'application/json'
        },
        success:res=>{
            console.log(res.data)
            let html=''
            res.data.forEach(a=>{
                html+='<option value="'+a.id+'">'+a.nama+'</option>'
            })
            $('#meja').html(html)
        }
    })

    function data_menu(id){
        $('#pesen-menu').modal('show')
        $('#id-makanan').val(id)
        $('#nama-makanan').val('')
        $('#jumlah-makanan').val(0)
        $('#total-makanan').val(0)

        $.ajax({
            method:"Get",
            url:api+'/v1/menu/'+id,
            headers:{
                Authorization:'Bearer '+localStorage.getItem('token'),
                Accept:'application/json'
            },
            success:res=>{
                $('#nama-makanan').val(res.data.nama)
                $('#harga-makanan').val(res.data.harga)
            }
        })
    }
    function hitungtotal(){
         let jum=$('#jumlah-makanan').val()
         let harga=$('#harga-makanan').val()
        $('#total-makanan').val(jum*harga)
    }
    function beli(event){
        event.preventDefault()
        let data={}
        data.nama=$('#nama-makanan').val()
        data.id=$('#id-makanan').val()
        data.jumlah=$('#jumlah-makanan').val()
        data.harga=$('#harga-makanan').val()
        let totalharga=data.jumlah*data.harga
        let button=''
        button+='<div class="btn-group">'
        button+='<button class="btn btn-success" onclick="pesanlagi('+data.id+',`'+data.nama+'`,'+data.jumlah+','+data.harga+')"> + </button>'
        button+='<button class="btn btn-danger" onclick="hapusorderan('+data.id+')">-</button>'
        button+='</div>'

        if(nama_orderan.indexOf(data.id) === -1) {
        orderan.push(data);
        nama_orderan.push(data.id)

        subtotal+=totalharga

        order.row.add([
            data.nama,
            data.jumlah,
            totalharga,
            button
        ]).draw(false)

        $('#total').text(subtotal)
        }
        else {
            alert('mohon maaf pesanan sudah ada')
        }
        $('#pesen-menu').modal('hide')

        return false;
    }
    function hapusorderan(id){

        orderan = orderan.filter(function(item){
        return item.id != id;
      });
      console.log(orderan)

        nama_orderan=nama_orderan.filter(function(e){
         return e != id;
    })

    order.clear().draw(false);

    subtotal=0
    orderan.forEach(a=>{
        let totalharga=a.jumlah*a.harga
        let button=''
        button+='<div class="btn-group">'
        button+='<button class="btn btn-success" onclick="pesanlagi('+a.id+',`'+a.nama+'`,'+a.jumlah+','+a.harga+')"> + </button>'
        button+='<button class="btn btn-danger" onclick="hapusorderan('+a.id+')">-</button>'
        button+='</div>'
        subtotal+=totalharga
        order.row.add([
            a.nama,
            a.jumlah,
            totalharga,
            button
        ]).draw()
    })
    $('#total').text(subtotal)

    }
    function pesanlagi(id,nama,jumlah,harga){
        $('#pesen-makanan').modal('show')
        $('#id-makanan').val(id)
        $('#nama-makanan-order').val(nama)
        $('#jumlah-makanan-order').val(jumlah)
        $('#harga-makanan-order').val(harga)
        $('#total-makanan-order').val(harga*jumlah)
    }
    function hitungtotalorder(){
        let jum=$('#jumlah-makanan-order').val()
        let harga=$('#harga-makanan-order').val()
        $('#total-makanan-order').val(harga*jum)
    }
    function pesanlagi_to_submit(event){
        event.preventDefault()
        let data={}
        data.id=$('#id-makanan').val();
        data.nama=$('#nama-makanan-order').val()
        data.jumlah=$('#jumlah-makanan-order').val()
        data.harga=$('#harga-makanan-order').val()

        let index=orderan.findIndex(e=>{
           return e.id = data.id
        })

        orderan[index]=data;

        subtotal=0
        order.clear().draw(false)
        orderan.forEach(a=>{

        let totalharga=a.jumlah*a.harga
        let button=''
        button+='<div class="btn-group">'
        button+='<button class="btn btn-success" onclick="pesanlagi('+a.id+',`'+a.nama+'`,'+a.jumlah+','+a.harga+')"> + </button>'
        button+='<button class="btn btn-danger" onclick="hapusorderan('+a.id+')">-</button>'
        button+='</div>'
        subtotal+=totalharga
        order.row.add([
            a.nama,
            a.jumlah,
            totalharga,
            button
        ]).draw(false)
        })

        $('#total').text(subtotal)
        $('#pesan-makanan').modal('hide')

        return false;
    }

    </script>
  @endpush
@endsection
