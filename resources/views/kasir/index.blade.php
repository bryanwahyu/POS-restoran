@extends('layout.kasir')
@section('content')
  <!-- Content Row -->
  <div class="row">

    <!-- Content Column -->
    <div class="col-lg-6 mb-4">

      <!-- Member card -->
      <div class="card shadow mb-4">
        <div class="col-xs-12" style="padding: 20px;">
            <div class="well well-sm">
              <div class="row" style="padding-top: 15px;">
                  <div class="col-sm-6 col-md-2">
                      <img src="img/users.png" alt="" class="img-rounded img-responsive"/>
                  </div>
                  <div class="col-sm-6 col-md-8">
                      <h5><strong>Mamank Kesbor</strong></h5>
                      <h6 class="card-subtitle mb-2 text-muted">Gold Card Member</h6>
                      <h6 class="card-subtitle mb-2 text-muted">+62 094029409</h6>
                  </div>
              </div>
              <div class="row no-gutters align-items-center" style="padding-top: 10px;">
               <div class="col mr-2">
                <div class="h6 mb-0 font-weight-bold">Payment Method</div>
                 </div>
                  <div class="col-auto">
                 <i class="font-weight-bold text-gray-500">Latest Delivered Location</i>
                 </div>
                 </div>
                </div>
                <div class="row no-gutters align-items-center">
               <div class="col mr-2">
                <div class="p mb-0 font-weight-200">Credit Card</div>
                 </div>
                  <div class="col-auto">
                 <button type="button" class="btn btn-secondary">Jl. Anjay Mabar</button>
                 </div>
                 </div>

                  <div class="row no-gutters align-items-center">
               <div class="col mr-2">
                <div class="p mb-0 font-weight-200"></div>
                 </div>
                  <div class="col-auto">
                 <button type="button" class="btn btn-secondary">Jl. Anjay Mabar</button>
                 </div>
                 </div>

                 <div class="row no-gutters align-items-center">
               <div class="col mr-2">
                <div class="h6 mb-0 font-weight-bold">Receipt Type</div>
                 </div>
                  <div class="col-auto">
                 <button type="button" class="btn btn-secondary">Jl. Mabar skuyy</button>
                 </div>
                 </div>
                <div class="p mb-0 font-weight-200">Print Receipt</div>
                 </div>
                </div>
                </div>




    <!-- Content Column -->
    <div class="col-lg-6 mb-4">


     <!-- Member Discount-->
     <div class="card shadow mb-4">
        <div class="card-header py-3">
                    <ul class="nav nav-tabs card-header-tabs pull-right mynav"  id="myTab" role="tablist">
              <li class="nav-item">
                  <a class="nav-link mynav"><i class="fa fa-usd" aria-hidden="true"></i>Discount Amount</a>
              </li>
              <li class="nav-item ml-auto">
                  <a class="nav-link mynav active"><i class="fa fa-user" aria-hidden="true"></i>Member Discount</a>
              </li>
          </ul>
        </div>
        <div class="card-body" style="height: 70%;">
         <div class="money2">
          <i class="fa fa-money " style="font-size:80px;color:#cacbd7;padding-right: 10px; padding-bottom: 30px;">10%</i>
          </div>
        </div>
      </div>

    </div>

    <div class="col-lg-6">


     <!-- Delivery-->
     <div class="card shadow mb-4">
        <div class="card-header py-3">
                    <ul class="nav nav-tabs card-header-tabs pull-right mynav"  id="myTab" role="tablist">
              <li class="nav-item">
                  <a class="nav-link mynav"><i class="fa fa-cutlery" aria-hidden="true"></i>Dine In</a>
              </li>
              <li class="nav-item ml-auto">
                  <a class="nav-link mynav"><i class="fa fa-shopping-bag" aria-hidden="true"></i>Take Out</a>
              </li>
              <li class="nav-item ml-auto">
                  <a class="nav-link mynav active"><i class="fa fa-motorcycle" aria-hidden="true"></i>Delivery</a>
              </li>
          </ul>
        </div>
        <div class="card-body" style="height: 70%;">
          <div class="table-wrapper-scroll-y my-custom-scrollbar">
            <table class="table table-bordered table-striped mb-0" style="height: 173px;">
              <thead>
                <tr>
                  <th scope="col">Name</th>
                  <th scope="col">Tel</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Jhony Ahmad</td>
                  <td>+62 89689657</td>
                </tr>
              </tbody>

              <thead>
                <tr>
                  <th scope="col">Street</th>
                  <th scope="col">City/Town</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Jl. Kedamaian 26</td>
                  <td>Magelang</td>
                </tr>
              </tbody>

              <thead>
                <tr>
                  <th scope="col">State</th>
                  <th scope="col">Zip Code</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>IDN</td>
                  <td>12988</td>
                </tr>
              </tbody>
            </table>
          </div>

        </div>
      </div>

    </div>

    <div class="col-lg-6">


    <!-- Cash -->
     <div class="card shadow mb-4">
        <div class="card-header py-3">
                    <ul class="nav nav-tabs card-header-tabs pull-right mynav"  id="myTab" role="tablist">
              <li class="nav-item">
                  <a class="nav-link mynav active"><i class="fa fa-money" aria-hidden="true"></i>Cash</a>
              </li>
              <li class="nav-item ml-auto">
                  <a class="nav-link mynav"><i class="fa fa-credit-card-alt" aria-hidden="true"></i>Credit Card</a>
              </li>
              <li class="nav-item ml-auto">
                  <a class="nav-link mynav"><i class="fa fa-credit-card" aria-hidden="true"></i>Easy Card</a>
              </li>
          </ul>
        </div>
        <div class="card-body" style="height: 70%;">
         <div class="money">
          <i class="fa fa-bitcoin" style="font-size:50px;color:#cacbd7;padding-right: 10px;"></i>
          <i class="fa fa-cny" style="font-size:50px;color:#cacbd7;padding-right: 10px;"></i>
          <i class="fa fa-dollar" style="font-size:50px;color:#40dbcc;padding-right: 10px;"></i>
          <i class="fa fa-jpy" style="font-size:50px;color:#cacbd7;padding-right: 10px;"></i>
          <form style="padding-top: 50px;">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Enter amount here" id="text">
            </div>
          </form>
          </div>
        </div>
      </div>

    </div>

    <div class="col">


    <!-- Print Receipt -->
     <div class="card shadow mb-4">
        <div class="card-header py-3">
                    <ul class="nav nav-tabs card-header-tabs pull-right mynav"  id="myTab" role="tablist">
              <li class="nav-item">
                  <a class="nav-link mynav active">Receipt</a>
              </li>
              <li class="nav-item ">
                  <a class="nav-link mynav">Scan Barcode</a>
              </li>
              <li class="nav-item ">
                  <a class="nav-link mynav">Vat Number</a>
              </li>
          </ul>
        </div>
        <div class="card-body" style="height: 70%;">
         <div class="money2">
          <i class="fa fa-print" style="font-size:80px;color:#cacbd7;padding-right: 10px;"> <p class="pr ml-auto">(Print Receipt Details)</p></i>
          </div>
        </div>
      </div>

    </div>


      </div>
      </div>
    </div>
  </div>

</div>

@endsection
