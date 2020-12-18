@extends('layout.admin')
@section('content')
<ol class="breadcrumb">
        <li class="breadcrumb-active">Order</li>
</ol>
<div class="row">
    <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Data
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-bordered" id="data">
                                <thead>
                                    <th>No Transaksi</th>
                                    <th>Meja</th>
                                    <th>Nama</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    let table=$('#data').DataTable()

    $.ajax({
        method:'GET',
        url:api+'/v1/order',
        headers:{
            Authorization:'Bearer '+localStorage.getItem('token'),
            Accept:'application/json'
        },
        success:res=>{
            console.log(res)
            }
    })

</script>
@endsection
