

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>

    @include('admin.css')

    <style type="text/css">

   .title_deg{
    color: black;
    text-align: center;
    font-size: 25px;
    font-weight: bold;
    }
    td {
        color: black;
        border-left: 1px solid black;
        border-bottom: 1px solid black;
    }
    th{
        background-color: maroon;
        border-bottom: 1px solid black;
 
    }
 .table_deg{
    border: 2px solid grey;
    width: 70%;
    margin: auto;
    padding-top: 50px;
    text-align: center;

 }
 .img_size{
    width: 200px;
    height: 100px;
 }

    </style>


  </head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-1">
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white me-0"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.header')

        <div class="main-panel">
            <div class="content-wrapper">
                <h1 class="title_deg">All Orders</h1>
             <br><br>
           <table class="table_deg">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Product title</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Payment Status</th>
                <th>Delivery Status</th>
                <th>Image</th>
                 <th>Delivered</th>
            </tr>
             
          @foreach ($order as $order)
            
       
            <tr>
                <td>{{ $order->name }}</td>
                <td>{{ $order->email }}</td>
                <td>{{ $order->address }}</td>
                <td>{{ $order->phone }}</td>
                <td>{{ $order->product_title }}</td>
                <td>{{ $order->quantity }}</td>
                <td>{{ $order->price }}</td>
                <td>{{ $order->payment_status }}</td>
                <td>{{ $order->delivery_status }}</td>
                <td>
                   <img class="img_size" src="/product/{{ $order->image }}" alt="">
                </td>
                <td>

                    @if($order->delivery_status=='processing')

                    <a onclick="return confirm('Do you want to continue?')" href="{{ url('delivered', $order->id) }}" class="btn btn-primary">Delivered</a>

                    @else
                    
                    <p style="color:green">Delivered</p>

                    @endif

                </td>
            </tr>

            @endforeach

           </table>





            </div>
         </div>
        <!-- partial -->
        {{-- @include('admin.main_panel') --}}
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

@include('admin.js')

  </body>
</html>