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
        <div class="form-group form-row">
            <label  class="col-3">No Transaksi</label>
            <div class="col-4">
                <input type="text" class="form-control" id="no-transaksi" disabled>
            </div>
        </div>
  </div>
</div>
<div class="row">

    <div class="col-6">
        <ol class="breadcrumb">
            <li class="breadcrumb-active">Data orderan</li>
        </ol>
        <div class="row table-responsive">
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
    <div class="col-6">
        <ol class="breadcrumb">
            <li class="breadcrumb-active">Makanan & minuman</li>
        </ol>
        <div class="row">
             <div class="col-12" id="data-makanan">

             </div>
        </div>
    </div>
</div>
<script>
let order=$('#data-order').DataTable()

</script>
@endsection
