

<!DOCTYPE html>
<html lang="en">
  <head>

    <base href="/public">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Dashboard</title>

    @include('admin.css')

<style type="text/css">
        .div_center{
            text-align: center;
            padding-top: 40px;
        }
        .size_product {
            color: black;
            font-size: 40px;
            padding-bottom: 40px
        }
       .text_color{
            color: black;
            padding-bottom: 20px;
        }
        label {
            display: inline-block;
            width: 200px;
            color: black;
        }
        .input_submit{
            color: black !important;
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

                <div class="div_center">
                    <h1 class="size_product">EDIT Product</h1>
              <form action="{{ url('/update_product_confirm', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <label >Product Title :</label>
                    <input type="text" name="title" class="text_color" id="" required="" value="{{ $product->title }}">
                </div>
                <br>
                <div>
                    <label >Product Description :</label>
                    <input type="text" name="description" class="text_color" id="" required="" value="{{ $product->description }}">
                </div>
                <br>
                <div>
                    <label >Product price :</label>
                    <input type="number" name="price" class="text_color" id=""  required="" value="{{ $product->price }}">
                </div>
                <br>
                <div>
                    <label >Product Quantity</label>
                    <input type="number" name="quantity" min="0" class="text_color" id=""  required="" value="{{ $product->quantity }}">
                </div>
                <br>


                <div>
                    <label >Current Image Here :</label>
                    <img style="margin: auto" height="100" width="100" src="/product/{{ $product->image }}" alt="">
                </div>
             <br>
                <div>
                    <label >Change Image Here :</label>
                    <input type="file" name="image" class="text_color" id=""   >
                </div>

                <br>

                  <div>
                     <input type="submit" class="btn btn-primary input_submit" value="Update" name="submit">
                    </div>
                </form>

                </div>
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