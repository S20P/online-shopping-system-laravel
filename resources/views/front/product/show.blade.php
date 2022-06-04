@extends('layouts.frontend')
@section('content')

<section class="section-pagetop bg-dark">
    <div class="container clearfix">
        <h2 class="title-page">Product Show</h2>
    </div>
</section>
<section class="section-content bg padding-y">
    <div class="container">
        <div id="code_prod_complex">
            <div class="row">
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
                                <a href="" class="btn btn-sm btn-success float-right"><i class="fa fa-cart-arrow-down"></i> Buy Now</a>
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
                            </div>
                        </figure>
            </div>
        </div>
    </div>
</section>
@endsection