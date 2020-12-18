@extends('layout.kasir')
@section('content')
<div class="row">
    <div class="row col-12" id="data-meja">

    </div>
</div>
<script>
$.ajax({
    method:"get",
    url:api+'/v1/meja',
    headers:{
        Authorization:'Bearer '+localStorage.getItem('token'),
        Accept:'application/json'
    },
    success:res=>{
        console.log(res)
        let html='';
        res.data.forEach(a => {
            html+='<div class="col-2">'
            html+='<div class="card" onclick="detail_meja('+a.id+'")>'
            html+='<div class="card-header text-white bg-primary">'
            html+=a.nama
            html+='</div>'
            html+='<div class="card-body">'
            html+='<div class="row">'
            html+='<span class="col-6">Order</span>'
            html+='<span class="col-6">'+a.order.length+'</span>'
            html+='</div>'
            html+='</div>'
            html+='</div>'
            html+='</div>'
        });
        $("#data-meja").html(html)
    }
})


</script>

@endsection
