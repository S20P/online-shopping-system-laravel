@extends('layouts.frontend')
@section('content')

<section class="section-pagetop bg-light py-2">
    <div class="container clearfix">
        <h2 class="title-page">Product Show</h2>
    </div>
</section>

    <div class="container">
        <div class="card">
            <div class="container-fliud">
                <div class="wrapper row">
                    <div class="preview col-md-6">
                        
                        <div class="preview-pic tab-content">

                          <div class="tab-pane active" id="pic-1">
                             @if ($product->image)
                               <img  src="{{ asset('images/product/'.$product->image) }}"  alt="">
                            @else
                                <img  src="https://via.placeholder.com/176"  alt="">
                            @endif
                         </div>
                         
                        </div>
                        <ul class="preview-thumbnail nav nav-tabs">
                           <li class="active">
                            <a data-target="#pic-1" data-toggle="tab">
                             @if ($product->image)
                               <img  src="{{ asset('images/product/'.$product->image) }}"  alt="">
                            @else
                                <img  src="https://via.placeholder.com/176"  alt="">
                            @endif
                            </a>
                            </li>
                              @if(count($product->images) > 0)
                              @foreach($product->images as $item)
                      
  <li><a data-target="#pic-1" data-toggle="tab"><img src="{{ asset('images/product/'.$item->image) }}" /></a></li>
                              @endforeach

                            @endif
                         
                        </ul>
                        
                    </div>
                    <div class="details col-md-6">
                        <h3 class="product-title">{{ $product->name }}</h3>
                        <div class="rating">                           
                            <span class="review-no"><strong> SKU </strong>{{ $product->sku }}</span>
                        </div>
                        <p class="product-description">{{ $product->description }}</p>
                         @if ($product->sale_price != 0)
                                    <div class="price-wrap h5">
                                        <h4 class="price">Sale price <span> {{ generalSetting('currency_symbol') .$product->sale_price }} </span></h4>

                                       <h4 class="price"> Price <del class="price-old"><span>{{ generalSetting('currency_symbol').$product->price }}</span></del></h4>
                                    </div>
                                @else
                                    <div class="price-wrap h5">
                                        <h4 class="price">Sale price <span>{{ generalSetting('currency_symbol').$product->price }} </span></h4>
                                    </div>
                                @endif


                       @if(isset($product->brand))
                        <h5 class="sizes">Brand:
                            <span class="size" data-toggle="tooltip" title="small">{{$product->brand->name}}</span>
                        </h5>
                        @endif
                        
                        <div class="action">
                                <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" value="{{ $product->id }}" name="id">
                                    <input type="hidden" value="{{ $product->name }}" name="name">
                                    <input type="hidden" value="{{ $product->sale_price }}" name="price">
                                    <input type="hidden" value="{{ $product->image }}"  name="image">
                                    <input type="hidden" value="1" name="quantity">
                                    <button class="text-white bg-black  rounded px-2 py-2">Add To Cart</button>
                                      <button class="text-white bg-black  rounded px-2 py-2">Buy Now</button>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection