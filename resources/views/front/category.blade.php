@extends('layouts.frontend')
@section('content')

<section class="section-pagetop bg-light">
    <div class="container clearfix">
        <h2 class="title-page">{{ $category->name }}</h2>
    </div>
</section>
<section class="section-content bg padding-y">
    <div class="container">
        <div id="code_prod_complex">
            <div class="row">
                @forelse($category->products as $product)
                    <div class="col-md-4">
                       <figure class="card card-product">
                            @if ($product->image)
                                <div class="img-wrap padding-y"><img src="{{ asset('images/product/'.$product->image) }}" width="100px" alt=""></div>
                            @else
                                <div class="img-wrap padding-y"><img src="https://via.placeholder.com/176"  width="100px" alt=""></div>
                            @endif
                            <figcaption class="info-wrap">
                                <h4 class="title"><a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a></h4>
                            </figcaption>
                            <div class="bottom-wrap">
                                
                                @if ($product->sale_price != 0)
                                    <div class="price-wrap h5">
                                        <span class="price"> {{ generalSetting('currency_symbol') .$product->sale_price }} </span>
                                        <del class="price-old"> {{ generalSetting('currency_symbol').$product->price }}</del>
                                    </div>
                                @else
                                    <div class="price-wrap h5">
                                        <span class="price"> {{ generalSetting('currency_symbol').$product->price }} </span>
                                    </div>
                                @endif
                                     <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" value="{{ $product->id }}" name="id">
                                    <input type="hidden" value="{{ $product->name }}" name="name">
                                    <input type="hidden" value="{{ $product->sale_price }}" name="price">
                                    <input type="hidden" value="{{ $product->image }}"  name="image">
                                    <input type="hidden" value="1" name="quantity">
                                    <button class="px-4 py-2 text-white bg-dark rounded">Add To Cart</button>
                                      <button class="px-4 py-2 text-white bg-dark rounded">Buy Now</button>
                                </form>
                            </div>
                        </figure>
                    </div>
                @empty
                    <p>No Products found in {{ $category->name }}.</p>
                @endforelse
            </div>
        </div>
    </div>
</section>


@endsection