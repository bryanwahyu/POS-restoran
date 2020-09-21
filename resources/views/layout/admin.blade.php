<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS</title>
     <link rel="stylesheet" href="{{asset('bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
@yield('isi')
    <script src="{{asset('jquery.min.js')}}" charset="utf-8"></script>
</head>
<body>

		<!--wrapper start-->
		<div class="wrapper">
			<!--header menu start-->
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
			<!--header menu end-->
			<!--sidebar start-->
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
							<li class="item" id="meja">
								<a href="#" class="menu-btn">
									<i class="fas fa-info-circle"></i><span>Meja</span>
								</a>
							</li>
							<li class="item" id="profile">
								<a href="#profile" class="menu-btn">
									<i class="fas fa-user-circle"></i><span>User Manajemen</span>
								</a>
							</li>
							<li class="item" id="gudang">
								<a href="#gudang" class="menu-btn">
									<i class="fas fa-door-open"></i><span>Gudang <i class="fas fa-chevron-down drop-down"></i></span>
								</a>
								<div class="sub-menu">
									<a href="#kopi"><i class="fas fa-coffee"></i><span>Kopi</span></a>
									<a href="#food-and-beverage"><i class="fas fa-cocktail"></i><span>Food and Beverage</span></a>
								</div>
							</li>
					</ul>

				</div>
			</div>
			<!--sidebar end-->
            <script>
                let url="{{url('admin')}}"
                let api="{{url('api')}}"
                let link="{{url('')}}"
            </script>

            <!--main container start-->
			<div class="main-container">
				@yield('content')
			</div>
			<!--main container end-->
		</div>
		<!--wrapper end-->

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

</body>
</html>
