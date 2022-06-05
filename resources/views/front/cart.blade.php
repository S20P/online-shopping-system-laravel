@extends('layouts.frontend')
@section('content')

  <div class="cart-wrap">
    <div class="container">
          <div class="row">
          <div class="col-lg-8">
              <div class="main-heading">Shopping Cart</div>
                @if ($message = Session::get('success'))
                          <div class="p-4 mb-3 bg-green-400 rounded">
                              <p class="text-green-800">{{ $message }}</p>
                          </div>
                      @endif
              <div class="table-cart">
                      <table>
                          <thead>
                              <tr>
                                  <th>Product</th>
                                  <th>Price</th>
                                  <th>Quantity</th>
                                  <th>Total</th>
                                  <th></th>
                              </tr>
                          </thead>
                          <tbody>
                             @foreach ($cartItems as $item)
                              <tr>
                                  <td>
                                    <div class="display-flex align-center">
                                        <div class="img-product">
                                            @php                                 
                                        $product = \App\Models\Products::where('id', $item->id)->first();

                                    @endphp
                                    @if($product->image)
                  <img src="{{ asset('images/product/'.$product->image) }}"  class="w-20 rounded mCS_img_loaded" alt="Thumbnail" style="height: auto;
    max-height: 100px;
    width: 80px;">
                                    @endif
                                        
                                        </div>
                                        <div class="name-product">
                                           {{ $item->name }}
                                           
                                        </div>                                       
                                      </div>
                                  </td>
                                   <td>
                                    <div class="price">
                                            {{ generalSetting('currency_symbol') }} {{ $item->price  }}
                                        </div>
                                 </td>
                                  <td class="product-count">
                                 <form action="{{ route('cart.update') }}" method="POST" class="flex">
                                      @csrf
                                      <input type="hidden" name="id" value="{{ $item->id}}" >
                                    <input type="number" name="quantity" value="{{ $item->quantity }}" 
                                    class="w-6 text-center bg-gray-300" />
                                    <button type="submit" class="flex text-white bg-black">update</button>
                                    </form>
                                  </td>
                                 <td>
                                    <div class="price">
                                            {{ generalSetting('currency_symbol') }} {{ $item->price * $item->quantity }}
                                        </div>
                                 </td>
                                  <td>
                                <form action="{{ route('cart.remove') }}" method="POST">
                                  @csrf
                                  <input type="hidden" value="{{ $item->id }}" name="id">
                                  <button class="text-white bg-black">x</button>
                              </form>
                                  </td>
                              </tr>
                         @endforeach
                             
                          </tbody>
                      </table>
                    
              </div>
              <!-- /.table-cart -->
          </div>
          <!-- /.col-lg-8 -->
          <div class="col-lg-4">
              <div class="cart-totals">
                  <h3>Cart Totals</h3>
                  <form action="#" method="get" accept-charset="utf-8">
                      <table>
                          <tbody>
                              <tr>
                                  <td>Subtotal</td>
                                  <td class="subtotal">{{ generalSetting('currency_symbol') }} {{ Cart::getSubTotal() }}</td>
                              </tr>
                              <tr>
                                  <td>Shipping</td>
                                  <td class="free-shipping">Free Shipping</td>
                              </tr>
                              <tr class="total-row">
                                  <td>Total</td>
                                  <td class="price-total">{{ generalSetting('currency_symbol') }} {{ Cart::getTotal() }}</td>
                              </tr>
                          </tbody>
                      </table>
                      <div class="btn-cart-totals">
                         <form action="{{ route('cart.clear') }}" method="POST">
                            @csrf
                            <button class="update round-black-btn">Remove All Cart</button>
                          </form>

                          

<a href="{{ route('checkout.index') }}" class="btn btn-success checkout round-black-btn">Proceed To Checkout</a>
                      </div>
                      <!-- /.btn-cart-totals -->
                  </form>
                  <!-- /form -->
              </div>
              <!-- /.cart-totals -->
          </div>
          <!-- /.col-lg-4 -->
      </div>
    </div>
  </div>



@endsection