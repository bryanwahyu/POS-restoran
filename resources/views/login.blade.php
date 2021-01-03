<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login to POS</title>

  <!-- Custom fonts for this template-->
  <!-- <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css"> -->
<!--   <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100&display=swap" rel="stylesheet"> -->

  <!-- Custom styles for this template-->
  <link href="{{asset('css/login.css')}}" rel="stylesheet">

</head>

<body>
  <div class="login_form">
    <div class="details">
      <div class="welcome">Welcome</div>
      <form onsubmit=" return login()">
        <div class="wrap">
          <label>Username</label>
          <input type="Text" class="input" id="username" placeholder="Enter username">
          </div>
        <div class="wrap">
          <label>Password</label>
          <input type="password" class="input" id="password" placeholder="Password">
          </div>
        <div class="wrap">
           <div id="loader" class="box fade">
            <span class="flashing-circle"></span>
            <span class="flashing-circle"></span>
            <span class="flashing-circle"></span>
          </div>
          </div>
        <button type="submit" class="button"><h1 class="sign">Sign in!</h1></button>
      </form>
    </div>
      <img class="logo" src="{{asset('img/logologin.png')}}">
    <div class="details-two">
     <h1 class="back">Welcome back!</h1>
      <p class="log">Log in and use the apps.</p>
    </div>
    
  </div>
 
  <!-- <div class="container">

    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image">
                <img src="{{asset('img/logologin.png')}}">
              </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>
                  <form class="user" onsubmit=" return login()">
                    <div class="form-group">
                      <input type="Text" class="form-control form-control-user" id="username" aria-describedby="emailHelp" placeholder="Enter username">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                    <hr>
                </form>

                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div> -->

  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('js/sb-admin-2.min.js')}}"></script>

  <script>
      let api="{{url('api')}}"
      let url="{{url('')}}"
$('#loader').addClass('show');
      function login(e){
        let data={}
        data.username=$('#username').val()
        data.password=$('#password').val()
        $('#loader').addClass('show');
        $.ajax({
            method:'post',
            url:api+'/v1/login',
            contentType:"application/json",
            headers:{
            },
            data:JSON.stringify(data),
            success:res=>{
                console.log(res)
                $("#loader").removeClass('show');
                localStorage.setItem('token',res.token)
                if(res.kode == 203){
                  alert(res.pesan)
                }
                else if(res.data.role=="admin"){
                    window.location.replace(url+'/admin/index')
                }else if(res.data.role=="kasir")
                {
                    window.location.replace(url+'/kasir/index')
                }
            }
        })
        return false;
      }
    </script>
</body>

</html>
