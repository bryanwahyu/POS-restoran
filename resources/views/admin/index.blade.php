@extends('layout.admin')
@section('isi')
<script src="{{asset('chart.min.js')}}"></script>
@endsection
@section('content')
    <div class="row">
        <div class="col-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Header</div>
                <div class="card-body">
                  <h5 class="card-title">Primary card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
              </div>
            </div>
            <div class="col-3">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-header">Header</div>
                    <div class="card-body">
                      <h5 class="card-title">Primary card title</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                  </div>
                </div>
                <div class="col-3">
                    <div class="card text-white bg-primary mb-3">
                        <div class="card-header">Header</div>
                        <div class="card-body">
                          <h5 class="card-title">Primary card title</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-3">
                        <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                            <div class="card-header">Header</div>
                            <div class="card-body">
                              <h5 class="card-title">Primary card title</h5>
                              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                          </div>
                        </div>
                    <div class="col-4">
                        <div class="card">

                            <div class="card-header">
                                Data Menu Populer
                            </div>
                            <div class="card-body">
                                <table id="Menu" class="table table-striped">
                                    <thead class="thead-dark">
                                        <th>Menu</th>
                                        <th>Jumlah</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Ayam</td>
                                            <td>40</td>
                                        </tr>

                                        <tr>
                                            <td>Ayam</td>
                                            <td>40</td>
                                        </tr>

                                        <tr>
                                            <td>Ayam</td>
                                            <td>40</td>
                                        </tr>
                                        <tr>
                                            <td>Ayam</td>
                                            <td>40</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card">
                            <div class="card-header">
                                Data Bahan
                            </div>
                            <div class="card-body">
                                <table class="table" id="databahan">
                                    <thead>
                                        <th>Bahan</th>
                                        <th>Category</th>
                                        <th>Stok</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Ayam</td>
                                            <td>Daging</td>
                                            <td>10</td>
                                        </tr>
                                        <tr>
                                            <td>Sapi</td>
                                            <td>Daging</td>
                                            <td>10</td>
                                        </tr>
                                        <tr>
                                            <td>APA AJA</td>
                                            <td>Bumbu</td>
                                            <td>20</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card">
                            <div class="card-header">Data Order</div>
                            <div class="card-body">
                                <canvas id="order-pie">

                                </canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                laporan penjualan
                            </div>
                            <div class="card-body">
                                <input type="month"  id="Bulan" class="form-control">
                                <canvas id="laporan"></canvas>
                            </div>

                        </div>
                    </div>
        </div>
        <script>
            let lpaoran_line=$('#laporan')
            let order_pie=$('#order-pie')
            let data1 = {
    datasets: [{
        data: [10, 20, 30],

    backgroundColor: [
                'rgb(26, 214, 13)',
                'rgb(235, 52, 110)',
                'rgb(52, 82, 235)',
    ],

    }],
   labels: [
        'Red',
        'Yellow',
        'Blue'
    ],
    // These labels appear in the legend and in the tooltips when hovering different arcs

};
let data2={
			type: 'line',
			data: {
				labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
				datasets: [{
					label: 'Order',
                	data: [
					    150,
						200,
						100,
						80,
						30,
				        90,
						70
					],
					fill: false,
				}
                ]
			},
			options: {
				responsive: true,
				title: {
					display: true,
					text: 'Chart.js Line Chart'
				},
				tooltips: {
					mode: 'index',
					intersect: false,
				},
				hover: {
					mode: 'nearest',
					intersect: true
				},
				scales: {
					xAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Month'
						}
					}],
					yAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Value'
						}
					}]
				}
			}
		};


            let pie=new Chart(order_pie,{
                type:'pie',
                data:data1
            })
            var myLineChart = new Chart(lpaoran_line, {
             type: 'line',
             data: data2
          });
          
        </script>
@endsection
