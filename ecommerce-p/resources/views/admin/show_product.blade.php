

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Dashboard</title>

    @include('admin.css')
   
<style type="text/css">
   .center{
      margin: auto;
      width: 50%;
      border: 2px solid black;
      text-align: center;
      margin-top: 40px;
   }
  td {
    color: black
   }
   th{
    background-color: maroon;
   }
   .font_size{
    color: black;
    text-align: center;
    font-size: 40px;
    padding-top: 20px;
   }
  .img_size{
    width: 150px;
    height: 150px;
  }
  .th_design{
    padding: 30px;
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
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">

              @if(session()->has('message'))

              <div class="alert alert-success">
   
                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                  {{ session()->get('message') }}
              </div>
   
             @endif

                  <h2 class="font_size">All Products</h2>


                <table class="center">
                    <tr>
                        <th class="th_design">Product Title</th>
                        <th class="th_design">Description</th>
                        <th class="th_design">Quantity</th>
                        <th class="th_design">Price</th>
                        <th class="th_design">Image</th>
                        <th class="th_design">Delete</th>
                        <th class="th_design">Edit</th>
                    </tr>
                  
               @foreach ($product as $product)
                   
           
                    <tr>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->price }}</td>
                        <td>
                            <img class="img_size" src="/product/{{ $product->image }}" alt="" srcset="">
                        </td>
                        <td>
                          <a onclick="return confirm('Are you sure you want to delete this')" href="{{ url('/delete_product', $product->id) }}" class="btn btn-danger">Delete</a>
                        </td>

                          <td>
                            <a href="{{ url('/update_product', $product->id) }}" class="btn btn-success">Edit</a>
                          </td>
                    </tr>
               @endforeach
                </table>

            </div>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

@include('admin.js')

  </body>
</html>