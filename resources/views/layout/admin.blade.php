<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS</title>
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
     <link rel="stylesheet" href="{{asset('bootstrap.min.css')}}">
	 <link rel="stylesheet" href="{{asset('vendor/nucleo/css/nucleo.css')}}" type="text/css">
	 <link rel="stylesheet" href="{{asset('vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" type="text/css">
	 <link rel="stylesheet" href="{{asset('css/argon.css?v=1.2.0')}}" type="text/css">
    <script src="{{asset('vendor/jquery/dist/jquery.min.js')}}" charset="utf-8"></script>
    <script src="{{asset('bootstrap.min.js')}}"></script>
    <script src="{{asset('popper.min.js') }}"></script>
@yield('isi')

</head>
<body>
	<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="{{asset('img/brand/blue.png')}}" class="navbar-brand-img" alt="...">
        </a>
      </div> 
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" href="{{url('admin/index')}}">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            <li class="nav-item" id="menu">
              <a class="nav-link" href="{{url('admin/menu')}}">
                <i class="ni ni-bullet-list-67 text-default"></i>
                <span class="nav-link-text">Menu</span>
              </a>
            </li>
            <li class="nav-item" id="meja">
              <a class="nav-link" href="{{url('admin/meja')}}">
                <i class="ni ni-key-25 text-info"></i>
                <span class="nav-link-text">Meja</span>
              </a>
            </li>
            <li class="nav-item" id="order">
              <a class="nav-link" href="{{url('admin/order')}}">
                <i class="ni ni-circle-08 text-pink"></i>
                <span class="nav-link-text">Order</span>
              </a>
            </li>
            <li class="nav-item" id="profile">
              <a class="nav-link" href="{{url('admin/user')}}">
                <i class="ni ni-send text-dark"></i>
                <span class="nav-link-text">Profile</span>
              </a>
            </li>
            <li class="nav-item" id="profile">
              <a class="nav-link" href="{{url('admin/gudang/kopi')}}">
                <i class="ni ni-send text-dark"></i>
                <span class="nav-link-text">Gudang Kopi</span>
              </a>
            </li>
            <li class="nav-item" id="profile">
              <a class="nav-link" href="{{url('/admin/gudang/stok')}}">
                <i class="ni ni-send text-dark"></i>
                <span class="nav-link-text">Gudang FnB</span>
              </a>
            </li>
            <li class="nav-item" id="profile">
              <a class="nav-link" href="{{url('admin/laporan/kopi')}}">
                <i class="ni ni-send text-dark"></i>
                <span class="nav-link-text">Keuangan</span>
              </a>
            </li>
            <li class="nav-item" id="profile">
              <a class="nav-link" href="{{url('/admin/laporan/stok')}}">
                <i class="ni ni-send text-dark"></i>
                <span class="nav-link-text">Stock</span>
              </a>
            </li>
          </ul>
          <!-- Divider -->
          <hr class="my-3">
          <!-- Heading -->
        </div>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
            <li class="nav-item d-sm-none">
              <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                <i class="ni ni-zoom-split-in"></i>
              </a>
            </li>
          </ul>
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="{{asset('img/theme/team-4.jpg')}}">
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold" id="nama-admin"></span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Welcome!</h6>
                </div>
               
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-settings-gear-65"></i>
                  <span>Settings</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" onclick="logout()" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Logout</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Default</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Default</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <!-- <a href="#" class="btn btn-sm btn-neutral">New</a>
              <a href="#" class="btn btn-sm btn-neutral">Filters</a> -->
            </div>
          </div>
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Total traffic</h5>
                      <span class="h2 font-weight-bold mb-0">350,897</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                        <i class="ni ni-active-40"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">New users</h5>
                      <span class="h2 font-weight-bold mb-0">2,356</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                        <i class="ni ni-chart-pie-35"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Sales</h5>
                      <span class="h2 font-weight-bold mb-0">924</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                        <i class="ni ni-money-coins"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Performance</h5>
                      <span class="h2 font-weight-bold mb-0">49,65%</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                        <i class="ni ni-chart-bar-32"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <script>
        let url="{{url('admin')}}"
        let api="{{url('api')}}"
        let link="{{url('')}}"
    </script>
    <div class="container-fluid mt--6">
      @yield('content')
      <!-- Footer -->
      <footer class="footer pt-0">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6">
            <div class="copyright text-center  text-lg-left  text-muted">
              &copy; {{ Date('Y') }} <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
            </div>
          </div>
          <div class="col-lg-6">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
              <li class="nav-item">
                <a href="" class="nav-link" target="_blank">About Us</a>
              </li>
              <li class="nav-item">
                <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
              </li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>
		
		<!-- <div class="wrapper">
			<div class="header">
				<div class="header-menu">
					<div class="title">Admin <span>POS</span></div>
					<div class="sidebar-btn">
						<i class="fas fa-bars"></i>
					</div>
					<ul>
						<li><a href="#"><i class="fas fa-search"></i></a></li>
						<li><a href="#"><i class="fas fa-bell"></i></a></li>
						<li><a href="#" onclick="logout()"><i class="fas fa-power-off"></i></a></li>
					</ul>
				</div>
			</div>
			<div class="sidebar">
				<div class="sidebar-menu">
					<center class="profile">
						<img src="{{asset('user.png')}}" alt="">
                    <p id="nama-admin">hai Admin</p>
					</center>
					<ul>
						<li class="item">
							<a href=" {{url('admin/index')}}" class="menu-btn">
									<i class="fas fa-table"></i><span>Home</span>
								</a>
							</li>
                            <li class="item" id="menu">
                                <a href="{{url('admin/menu')}}" class="menu-btn">
                                        <i class="fas fa-utensils"></i><span>Menu</span>
                                    </a>
                            </li>
                            <li class="item" id="meja">
                            <a href="{{url('admin/meja')}}" class="menu-btn">
									<i class="fas fa-info-circle"></i><span>Meja</span>
								</a>
                            </li>
                            <li class="item" id="order">
								<a href="{{url('admin/order')}}" class="menu-btn">
									<i class="fas fa-receipt"></i><span>Order</span>
								</a>
							</li>
							<li class="item" id="profile">
								<a href="{{url('admin/user')}}" class="menu-btn">
									<i class="fas fa-user-circle"></i><span>User Manajemen</span>
								</a>
							</li>
							<li class="item" id="gudang">
								<a href="#gudang" class="menu-btn">
									<i class="fas fa-door-open"></i><span>Gudang <i class="fas fa-chevron-down drop-down"></i></span>
								</a>
								<div class="sub-menu">
									<a href="{{url('admin/gudang/kopi')}}"><i class="fas fa-coffee"></i><span>Kopi</span></a>
                                <a href="{{url('/admin/gudang/stok')}}"><i class="fas fa-cocktail"></i><span>Food and Beverage</span></a>
								</div>
                            </li>
                            <li class="item" id="laporan">
								<a href="#laporan" class="menu-btn">
									<i class="fas fa-file"></i><span>Laporan<i class="fas fa-chevron-down drop-down"></i></span>
								</a>
								<div class="sub-menu">
									<a href="{{url('admin/laporan/kopi')}}"><i class="fas fa-balance-scale"></i><span>Keuangan</span></a>
                                <a href="{{url('/admin/laporan/stok')}}"><i class="fas fa-cocktail"></i><span>Stok</span></a>
								</div>
							</li>
					</ul>

				</div>
			</div>
            <script>
                let url="{{url('admin')}}"
                let api="{{url('api')}}"
                let link="{{url('')}}"
            </script>
			<div class="main-container">
				@yield('content')
			</div>
		</div> -->
	
		<script type="text/javascript">
		$(document).ready(function(){
			$(".sidebar-btn").click(function(){
				$(".wrapper").toggleClass("collapse");

			});
			$(function() {
				$('ul a[href~="' + location.href + '"]').parents('li').addClass('active');
			});
		});
        $.ajax({
            method:'GET',
            url:api+'/v1/auth',
            headers:{
                Authorization:"Bearer "+localStorage.getItem('token'),
                Accept:'application/json'
            },
            success:res=>{
                console.log(res)
                if(res.data.role=="admin"){
                    $("#nama-admin").text(res.data.nama)
                    // $("#nama-admin").val(res.data.nama)
                }else
                {
                    window.location.replace(link+'/kasir/index');
                }
            },
            error:res=>{
                localStorage.removeItem('token')
                window.location.replace(link)
            }
        })
     function logout(){
            localStorage.removeItem('token')
            window.location.replace(link)
        }

		</script>
  <!-- <script src="{{asset('vendor/jquery/dist/jquery.min.js')}}"></script> -->
  <script src="{{asset('vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('vendor/js-cookie/js.cookie.js')}}"></script>
  <script src="{{asset('vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
  <script src="{{asset('vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>
  <!-- Optional JS -->
  <script src="{{asset('vendor/chart.js/dist/Chart.min.js')}}"></script>
  <script src="{{asset('vendor/chart.js/dist/Chart.extension.js')}}"></script>
  <!-- Argon JS -->
  <script src="{{asset('js/argon.js?v=1.2.0')}}"></script>
</body>
</html>
