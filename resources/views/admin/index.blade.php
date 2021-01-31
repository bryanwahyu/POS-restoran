@extends('layout.admin')
@section('isi')
<script src="{{asset('chart.min.js')}}"></script>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-3 col-md-6">
                        <div class="d-flex">
                          <div class="wrapper">
                            <h3 class="mb-0 font-weight-semibold">32,451</h3>
                            <h5 class="mb-0 font-weight-medium text-primary">Visits</h5>
                            <p class="mb-0 text-muted">+14.00(+0.50%)</p>
                          </div>
                          <div class="wrapper my-auto ml-auto ml-lg-4">
                            <canvas height="50" width="100" id="stats-line-graph-1"></canvas>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-6 mt-md-0 mt-4">
                        <div class="d-flex">
                          <div class="wrapper">
                            <h3 class="mb-0 font-weight-semibold">15,236</h3>
                            <h5 class="mb-0 font-weight-medium text-primary">Impressions</h5>
                            <p class="mb-0 text-muted">+138.97(+0.54%)</p>
                          </div>
                          <div class="wrapper my-auto ml-auto ml-lg-4">
                            <canvas height="50" width="100" id="stats-line-graph-2"></canvas>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-6 mt-md-0 mt-4">
                        <div class="d-flex">
                          <div class="wrapper">
                            <h3 class="mb-0 font-weight-semibold">7,688</h3>
                            <h5 class="mb-0 font-weight-medium text-primary">Conversation</h5>
                            <p class="mb-0 text-muted">+57.62(+0.76%)</p>
                          </div>
                          <div class="wrapper my-auto ml-auto ml-lg-4">
                            <canvas height="50" width="100" id="stats-line-graph-3"></canvas>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-6 mt-md-0 mt-4">
                        <div class="d-flex">
                          <div class="wrapper">
                            <h3 class="mb-0 font-weight-semibold">1,553</h3>
                            <h5 class="mb-0 font-weight-medium text-primary">Downloads</h5>
                            <p class="mb-0 text-muted">+138.97(+0.54%)</p>
                          </div>
                          <div class="wrapper my-auto ml-auto ml-lg-4">
                            <canvas height="50" width="100" id="stats-line-graph-4"></canvas>
                          </div>
                        </div>
                      </div>
                    </div>
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
