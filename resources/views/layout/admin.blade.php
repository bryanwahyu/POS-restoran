<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS</title>
    <link rel="stylesheet" href="{{asset('vendor/iconfonts/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/css/vendor.bundle.addons.css')}}">
    <link rel="stylesheet" href="{{asset('css/laystyle.css')}}">
    <link rel="stylesheet" href="{{asset('css/destyle.css')}}">
    <script src="{{asset('vendor/jquery/dist/jquery.min.js')}}" charset="utf-8"></script>
@yield('isi')
  <style>
      ul.nav li a
      {
          text-decoration:none;
      }
      ul.nav li.active
      {
          background:#0228d6;
          padding:2px 6px;
      }
</style>
</head>
<body>
<div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
          <a class="navbar-brand brand-logo" href="index.html">
            <img style="height: 75%;width: 100%;" src="{{asset('img/logo.png')}}" alt="logo" /> </a>
          <a class="navbar-brand brand-logo-mini" href="index.html">
            <img src="{{asset('img/logo.png')}}" alt="logo" /> </a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <img class="img-xs rounded-circle" src="{{asset('img/users.png')}}" alt="Profile image"> </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                  <img class="img-md rounded-circle" src="{{asset('img/users.png')}}" alt="Profile image">
                  <p class="mb-1 mt-3 font-weight-semibold" id="nama-admin"></p>
                </div>
                <a class="dropdown-item">My Profile</a>
                <a class="dropdown-item" onclick="logout()">Sign Out<i class="dropdown-item-icon ti-power-off"></i></a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
             <script>
                let url="{{url('admin')}}"
                let api="{{url('api')}}"
                let link="{{url('')}}"
            </script>
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="profile-image">
                  <img class="img-xs rounded-circle" src="{{asset('img/users.png')}}" alt="profile image">
                  <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                  <p class="profile-name" id="nama-admin"></p>
                  <p class="designation">Premium user</p>
                </div>
              </a>
            </li>
            <li class="nav-item nav-category">Main Menu</li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('admin/index')}}">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Gudang</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{url('admin/gudang/kopi')}}">Kopi</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{url('admin/gudang/stok')}}">F n B</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('admin/menu')}}">
                <i class="menu-icon typcn typcn-shopping-bag"></i>
                <span class="menu-title">Menu</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('admin/meja')}}">
                <i class="menu-icon typcn typcn-th-large-outline"></i>
                <span class="menu-title">Meja</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('admin/order')}}">
                <i class="menu-icon typcn typcn-bell"></i>
                <span class="menu-title">Order</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('admin/profile')}}">
                <i class="menu-icon typcn typcn-user-outline"></i>
                <span class="menu-title">Profile</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Laporan</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{url('admin/laporan/kopi')}}">Keuangan</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{url('admin/laporan/stok')}}">F n B</a>
                  </li>
                </ul>
              </div>
            </li>
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <!-- Page Title Header Starts-->
            <div class="row page-title-header">
              <div class="col-12">
                <div class="page-header">
                  <h4 class="page-title">@if(isset($title))
                   {{ $title }}
                  @else
                    {{ Request::segment(2) }}
                  @endif
                </h4>
                </div>
              </div>
            </div>
            <!-- Page Title Header Ends-->
            @yield('content')

          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="container-fluid clearfix">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates</a> from Bootstrapdash.com</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
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
    <script src="{{asset('bootstrap.min.js')}}"></script>
    <script src="{{asset('popper.min.js') }}"></script>
    <!-- <script src="{{asset('vendor/js/vendor.bundle.base.js')}}"></script> -->
    <!-- <script src="{{asset('vendor/js/vendor.bundle.addons.js')}}"></script> -->
    <script src="{{asset('js/off-canvas.js')}}"></script>
    <script src="{{asset('js/misc.js')}}"></script>
    <!-- endinject -->
    <script src="{{asset('vendor/js-cookie/js.cookie.js')}}"></script>
</body>
</html>
