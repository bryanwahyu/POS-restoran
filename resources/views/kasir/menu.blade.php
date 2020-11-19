@extends('layout.kasir')
@section('content')
<ol class="breadcrumb">
        <li class="breadcrumb-active">Menu</li>
    </ol>
    <div class="col-12 mb-3">
        <button onclick="ordermodal()" class="btn btn-primary">Order</button>
    </div>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Makanan</li>
    </ol>
    <div class="row">
        <div class="col-3">
            <div class="card mb-3 text-center">
                <div class="fb-image">
                    <img src="https://img-global.cpcdn.com/recipes/30f824d8f1ee84f6/751x532cq70/tahu-bakso-foto-resep-utama.jpg"
                        class="card-image-top" alt="Baso Tahu" width="100%" height="180">
                    <span class="price badge badge-pill badge-danger">10.000</span>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Baso Tahu</h5>
                    <div class='ctrl d-flex justify-content-center'>
                        <div class='ctrl__button ctrl__button--decrement'>&ndash;</div>
                        <div class='ctrl__counter'>
                            <input class='ctrl__counter-input' maxlength='10' type='text' value='0'>
                            <div class='ctrl__counter-num'>0</div>
                        </div>
                        <div class='ctrl__button ctrl__button--increment'>+</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card mb-3 text-center" style="max-width: 18rem;">
                <div class="fb-image">
                    <img src="https://alampriangan.com/wp-content/uploads/2016/11/cuanki-serayu.jpg" alt="Cuanki"
                        class="card-image-top" width="100%" height="180">
                    <span class="price badge badge-pill badge-danger">15.000</span>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Cuanki</h5>
                    <div class='ctrl d-flex justify-content-center'>
                        <div class='ctrl__button ctrl__button--decrement'>&ndash;</div>
                        <div class='ctrl__counter'>
                            <input class='ctrl__counter-input' maxlength='10' type='text' value='0'>
                            <div class='ctrl__counter-num'>0</div>
                        </div>
                        <div class='ctrl__button ctrl__button--increment'>+</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card mb-3 text-center">
                <div class="fb-image">
                    <img src="https://blue.kumparan.com/image/upload/fl_progressive,fl_lossy,c_fill,q_auto:best,w_640/v1515557737/asxtrr2ga1os4abfmuoe.jpg"
                        class="card-image-top" alt="Nasi Goreng" width="100%" height="180">
                    <span class="price badge badge-pill badge-danger">15.000</span>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Nasi Goreng</h5>
                    <div class='ctrl d-flex justify-content-center'>
                        <div class='ctrl__button ctrl__button--decrement'>&ndash;</div>
                        <div class='ctrl__counter'>
                            <input class='ctrl__counter-input' maxlength='10' type='text' value='0'>
                            <div class='ctrl__counter-num'>0</div>
                        </div>
                        <div class='ctrl__button ctrl__button--increment'>+</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card mb-3 text-center" style="max-width: 18rem;">
                <div class="fb-image">
                    <img src="https://img-global.cpcdn.com/recipes/abe79242f529d9c5/751x532cq70/mie-tek-tek-foto-resep-utama.jpg"
                        alt="Mie Tektek" class="card-image-top" width="100%" height="180">
                    <span class="price badge badge-pill badge-danger">15.000</span>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Mie Tektek</h5>
                                        <div class='ctrl d-flex justify-content-center'>
                        <div class='ctrl__button ctrl__button--decrement'>&ndash;</div>
                        <div class='ctrl__counter'>
                            <input class='ctrl__counter-input' maxlength='10' type='text' value='0'>
                            <div class='ctrl__counter-num'>0</div>
                        </div>
                        <div class='ctrl__button ctrl__button--increment'>+</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Minuman</li>
    </ol>
    <div class="row">
        <div class="col-3">
            <div class="card mb-3 text-center">
                <div class="fb-image">
                    <img src="https://bakingmischief.com/wp-content/uploads/2019/07/how-to-make-a-milkshake-image-square.jpg"
                        class="card-image-top" alt="Milkshake" width="100%" height="180">
                    <span class="price badge badge-pill badge-danger">15.000</span>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Milkshake</h5>
                                        <div class='ctrl d-flex justify-content-center'>
                        <div class='ctrl__button ctrl__button--decrement'>&ndash;</div>
                        <div class='ctrl__counter'>
                            <input class='ctrl__counter-input' maxlength='10' type='text' value='0'>
                            <div class='ctrl__counter-num'>0</div>
                        </div>
                        <div class='ctrl__button ctrl__button--increment'>+</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card mb-3 text-center" style="max-width: 18rem;">
                <div class="fb-image">
                    <img src="https://cdn.futuready.com/artikel/media/2019/07/02145112/shutterstock_1139687273-854x540.jpg"
                        alt="Thai Tea" class="card-image-top" width="100%" height="180">
                    <span class="price badge badge-pill badge-danger">15.000</span>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Thai Tea</h5>
                                        <div class='ctrl d-flex justify-content-center'>
                        <div class='ctrl__button ctrl__button--decrement'>&ndash;</div>
                        <div class='ctrl__counter'>
                            <input class='ctrl__counter-input' maxlength='10' type='text' value='0'>
                            <div class='ctrl__counter-num'>0</div>
                        </div>
                        <div class='ctrl__button ctrl__button--increment'>+</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card mb-3 text-center">
                <div class="fb-image">
                    <img src="https://awsimages.detik.net.id/community/media/visual/2018/03/06/bc62b3f8-3cf7-4f0e-9a9c-653566750313.jpeg?w=700&q=90"
                        class="card-image-top" alt="Es Kopi" width="100%" height="180">
                    <span class="price badge badge-pill badge-danger">15.000</span>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Es Kopi</h5>
                                        <div class='ctrl d-flex justify-content-center'>
                        <div class='ctrl__button ctrl__button--decrement'>&ndash;</div>
                        <div class='ctrl__counter'>
                            <input class='ctrl__counter-input' maxlength='10' type='text' value='0'>
                            <div class='ctrl__counter-num'>0</div>
                        </div>
                        <div class='ctrl__button ctrl__button--increment'>+</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card mb-3 text-center" style="max-width: 18rem;">
                <div class="fb-image">
                    <img src="https://asset.kompas.com/crops/NLw1zz-GQGF_TP4CydO4ACjfQIs=/0x0:1000x667/750x500/data/photo/2020/04/24/5ea2a3cba9ace.jpg"
                        alt="Es Campur" class="card-image-top" width="100%" height="180">
                    <span class="price badge badge-pill badge-danger">15.000</span>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Es Campur</h5>
                                        <div class='ctrl d-flex justify-content-center'>
                        <div class='ctrl__button ctrl__button--decrement'>&ndash;</div>
                        <div class='ctrl__counter'>
                            <input class='ctrl__counter-input' maxlength='10' type='text' value='0'>
                            <div class='ctrl__counter-num'>0</div>
                        </div>
                        <div class='ctrl__button ctrl__button--increment'>+</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="order-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Data Pemesan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" onsubmit="">
                        <div class="form-group form-row">
                            <label class="col-3">Nama</label>
                            <div class="col-8">
                                <input type="text" class="form-control" id="add-nama">
                            </div>
                        </div>
                        <div class="form-group form-row">
                            <label class="col-3">Nomor Meja :</label>
                            <div class="col-8">
                                <input type="number" class="form-control" id="add-nomor-meja">
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
    <script src="{{asset('qty.js') }}"></script>
    <script>
        function ordermodal() {
            $("#order-modal").modal('show')
        }

</script>
@endsection
