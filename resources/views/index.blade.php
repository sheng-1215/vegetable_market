@extends('layout')
@extends('login')
@section('content')
    

  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="about_section">
      <!--vegetables  section start -->
      {{-- <div class="vegetables_section layout_padding">
        <div class="container">
          <div class="image_2"><img src="images/img-2.png"></div>
          <h1 class="about_taital">Our Vegetables</h1>
          <p class="lorem_text">Reader will be distracted by the readable content of a</p>
          <div class="vegetables_section_2 layout_padding">
            <div class="row">
              <div class="col">
                <div class="box_section">
                  <div class="image_4"><img src="images/img-4.png"></div>
                  <h2 class="dolor_text">$<span style="color: #ebc30a;">10</span></h2>
                  <h2 class="dolor_text">Tomato</h2>
                  <h2 class="dolor_text_1">1 kg</h2>
                  <p class="tempor_text">adipiscing elit, sed do eiusmod tempor </p>
                  <div class="buy_bt_1 active"><a href="#">Buy Now</a></div>
                </div>
              </div>
              <div class="col">
                <div class="box_section">
                  <div class="image_4"><img src="images/img-5.png"></div>
                  <h2 class="dolor_text">$<span style="color: #ebc30a;">10</span></h2>
                  <h2 class="dolor_text">Cabbage</h2>
                  <h2 class="dolor_text_1">1 kg</h2>
                  <p class="tempor_text">adipiscing elit, sed do eiusmod tempor </p>
                  <div class="buy_bt_1"><a href="#">Buy Now</a></div>
                </div>
              </div>
              <div class="col">
                <div class="box_section">
                  <div class="image_4"><img src="images/img-6.png"></div>
                  <h2 class="dolor_text">$<span style="color: #ebc30a;">10</span></h2>
                  <h2 class="dolor_text">Eggplant</h2>
                  <h2 class="dolor_text_1">1 kg</h2>
                  <p class="tempor_text">adipiscing elit, sed do eiusmod tempor </p>
                  <div class="buy_bt_1"><a href="#">Buy Now</a></div>
                </div>
              </div>
              <div class="col">
                <div class="box_section">
                  <div class="image_4"><img src="images/img-7.png"></div>
                  <h2 class="dolor_text">$<span style="color: #ebc30a;">10</span></h2>
                  <h2 class="dolor_text">Lady-finger</h2>
                  <h2 class="dolor_text_1">1 kg</h2>
                  <p class="tempor_text">adipiscing elit, sed do eiusmod tempor </p>
                  <div class="buy_bt_1"><a href="#">Buy Now</a></div>
                </div>
              </div>
              <div class="col">
                <div class="box_section">
                  <div class="image_4"><img src="images/img-8.png"></div>
                  <h2 class="dolor_text">$<span style="color: #ebc30a;">10</span></h2>
                  <h2 class="dolor_text">Bottle-Gourd</h2>
                  <h2 class="dolor_text_1">1 kg</h2>
                  <p class="tempor_text">adipiscing elit, sed do eiusmod tempor </p>
                  <div class="buy_bt_1"><a href="#">Buy Now</a></div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="box_section">
                  <div class="image_4"><img src="images/img-9.png"></div>
                  <h2 class="dolor_text">$<span style="color: #ebc30a;">10</span></h2>
                  <h2 class="dolor_text">Potato</h2>
                  <h2 class="dolor_text_1">1 kg</h2>
                  <p class="tempor_text">adipiscing elit, sed do eiusmod tempor </p>
                  <div class="buy_bt_1"><a href="#">Buy Now</a></div>
                </div>
              </div>
              <div class="col">
                <div class="box_section">
                  <div class="image_4"><img src="images/img-10.png"></div>
                  <h2 class="dolor_text">$<span style="color: #ebc30a;">10</span></h2>
                  <h2 class="dolor_text">Capsicum</h2>
                  <h2 class="dolor_text_1">1 kg</h2>
                  <p class="tempor_text">adipiscing elit, sed do eiusmod tempor </p>
                  <div class="buy_bt_1"><a href="#">Buy Now</a></div>
                </div>
              </div>
              <div class="col">
                <div class="box_section">
                  <div class="image_4"><img src="images/img-11.png"></div>
                  <h2 class="dolor_text">$<span style="color: #ebc30a;">10</span></h2>
                  <h2 class="dolor_text">Pumpkin-Patch</h2>
                  <h2 class="dolor_text_1">1 kg</h2>
                  <p class="tempor_text">adipiscing elit, sed do eiusmod tempor </p>
                  <div class="buy_bt_1"><a href="#">Buy Now</a></div>
                </div>
              </div>
              <div class="col">
                <div class="box_section">
                  <div class="image_4"><img src="images/img-12.png"></div>
                  <h2 class="dolor_text">$<span style="color: #ebc30a;">10</span></h2>
                  <h2 class="dolor_text">Green chilli</h2>
                  <h2 class="dolor_text_1">1 kg</h2>
                  <p class="tempor_text">adipiscing elit, sed do eiusmod tempor </p>
                  <div class="buy_bt_1"><a href="#">Buy Now</a></div>
                </div>
              </div>
              <div class="col">
                <div class="box_section">
                  <div class="image_4"><img src="images/img-13.png"></div>
                  <h2 class="dolor_text">$<span style="color: #ebc30a;">10</span></h2>
                  <h2 class="dolor_text">Kof-Radish</h2>
                  <h2 class="dolor_text_1">1 kg</h2>
                  <p class="tempor_text">adipiscing elit, sed do eiusmod tempor </p>
                  <div class="buy_bt_1"><a href="#">Buy Now</a></div>
                </div>
              </div>
            </div>
          </div>
          <div class="read_bt_1"><a href="#">Read More</a></div>
        </div>
      </div> --}}
      {{-- {{ session('email') }} --}}
      @error('email')
          <p style="color: red; text-align: center;">{{ $message }}</p>
      @enderror
      <div class="vegetables_section layout_padding">
        <div class="container">
            <h1 class="about_taital">Our Vegetables</h1>
            <p class="lorem_text">Browse our fresh vegetables</p>
            <div class="vegetables_section_2 layout_padding">
                <div class="row">                               
                    @foreach ($products as $product)
                        <div class="col">
                            <div class="box_section">
                                <div class="image_4"><img src="{{ $product->p_image }}"></div>
                                <h2 class="dolor_text">Rm{{ $product->p_price }}</h2>
                                <h1 class="dolor_text_1">{{ $product->p_mass }} g</h1>
                                <h2 class="dolor_text">{{ $product->p_name }}</h2>
                                <div class="buy_bt_1"><a href="{{ route('products.details', $product->id) }}">Add to Cart</a>                                
                              </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="read_bt_1"><a href="#">Read More</a></div>
        </div>

      </div>
     
  </body>
  </html>
  @endsection

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

  
  