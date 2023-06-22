<section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
          <h2>
             Our <span>Pets</span>
          </h2>
       </div>
       <div class="row">

       @foreach ($product as $product)
          
       
          <div class="col-sm-6 col-md-4 col-lg-4">
             <div class="box">
                <div class="option_container">
                   <div class="options">
                      <a href="{{ url('/product_details', $product->id) }}" class="option1">
                     Product Details
                      </a>
                      <a href="" class="option2">
                      Add to Cart
                      </a>
                   </div>
                </div>
                <div class="img-box">
                   <img src="product/{{ $product->image }}" alt="image">
                </div>
                <div class="detail-box">
                   <h5>
                     {{$product->title}}
                   </h5>
                   <h6>
                     ₱{{ $product->price }}
                   </h6>
                </div>
             </div>
          </div>

          @endforeach 

      {{--  --}}
          
   
    </div>
 </section>