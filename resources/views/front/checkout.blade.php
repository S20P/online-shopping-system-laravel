@extends('layouts.frontend')
@section('content')

<section class="section-pagetop bg-light">
        <div class="container clearfix">
            <h2 class="title-page">Checkout</h2>
        </div>
</section>

<section class="section-content bg padding-y">
    <div class="container">
    <div class="row">
        <div class="col-sm-12">
            @if (Session::has('error'))
                <p class="alert alert-danger">{{ Session::get('error') }}</p>
            @endif
        </div>
    </div>
    @include('user.partials.flash')
    <form action="{{ route('checkout.place.order') }}" method="POST" role="form">
    @csrf
    <div class="row">
    <div class="col-md-8">
        <div class="card">
            <header class="card-header">
                <h4 class="card-title mt-2">Billing Details</h4>
            </header>
            <article class="card-body">
                <div class="form-row">
                    <div class="col form-group">
                        <label>First name</label>
                        <input type="text" 
                         name="first_name"
                         class="form-control @error('first_name') is-invalid @enderror"
                         value="{{ old('first_name') }}">
                         <div class="invalid-feedback active">
                        <i class="fa fa-exclamation-circle fa-fw"></i> @error('first_name') <span>{{ $message }}</span> @enderror
                         </div>
                    </div>
                    <div class="col form-group">
                        <label>Last name</label>
                        <input type="text" 
                         name="last_name"
                         class="form-control @error('last_name') is-invalid @enderror"
                         value="{{ old('last_name') }}"
                         >
                          <div class="invalid-feedback active">
                        <i class="fa fa-exclamation-circle fa-fw"></i> @error('last_name') <span>{{ $message }}</span> @enderror
                         </div>
                    </div>
                </div>
                <h4>Shipping address </h4>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" 
                     name="address"
                     class="form-control @error('address') is-invalid @enderror"
                     value="{{ old('address') }}">
                      <div class="invalid-feedback active">
                        <i class="fa fa-exclamation-circle fa-fw"></i> @error('address') <span>{{ $message }}</span> @enderror
                         </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>City</label>
                        <input type="text" 
                         name="city"
                         class="form-control @error('city') is-invalid @enderror"
                         value="{{ old('city') }}">
                        <div class="invalid-feedback active">
                        <i class="fa fa-exclamation-circle fa-fw"></i> @error('city') <span>{{ $message }}</span> @enderror
                         </div>

                    </div>
                      <div class="form-group col-md-6">
                        <label>State</label>
                        <input type="text" 
                         name="state"
                         class="form-control @error('state') is-invalid @enderror"
                         value="{{ old('state') }}">
                        <div class="invalid-feedback active">
                        <i class="fa fa-exclamation-circle fa-fw"></i> @error('state') <span>{{ $message }}</span> @enderror
                         </div>

                    </div>
                    <div class="form-group col-md-6">
                        <label>Country</label>
                        <input type="text" 
                         name="country"
                         class="form-control @error('country') is-invalid @enderror"
                     value="{{ old('country') }}">
                        <div class="invalid-feedback active">
                        <i class="fa fa-exclamation-circle fa-fw"></i> @error('country') <span>{{ $message }}</span> @enderror
                         </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group  col-md-6">
                        <label>Post Code</label>
                        <input type="text"  name="post_code"
                        class="form-control @error('post_code') is-invalid @enderror"
                     value="{{ old('post_code') }}">
                        <div class="invalid-feedback active">
                        <i class="fa fa-exclamation-circle fa-fw"></i> @error('post_code') <span>{{ $message }}</span> @enderror
                         </div>
                    </div>
                    <div class="form-group  col-md-6">
                        <label>Phone Number</label>
                        <input type="text"  name="phone_number"
                        class="form-control @error('phone_number') is-invalid @enderror"
                     value="{{ old('phone_number') }}">
                        <div class="invalid-feedback active">
                        <i class="fa fa-exclamation-circle fa-fw"></i> @error('phone_number') <span>{{ $message }}</span> @enderror
                         </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Email Address</label>
                    <input type="email" class="form-control" name="email" value="{{ auth()->user()->email }}" disabled>
                    <small class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label>Order Notes</label>
                    <textarea class="form-control" name="notes" rows="6"></textarea>
                </div>
            </article>
        </div>
    </div>
    <div class="col-md-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <header class="card-header">
                        <h4 class="card-title mt-2">Your Order</h4>
                    </header>
                        @php
                              $items = Cart::getContent(); 
                        @endphp

                         <article class="card-body">
                              
                         <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                        <tr>  
                            <th scope="col"> Image </th>                                            
                            <th scope="col"> Name </th>   
                             <th scope="col"> QTY </th> 
                              <th scope="col"> Price </th>                           
                            
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $item)
                                <tr>
                                   <th scope="row">
                                    @php
                                        $product = \App\Models\Products::where('name', $item->name)->first();

                                    @endphp
                                    @if($product->image)
                  <img src="{{ asset('images/product/'.$product->image) }}" style="height: auto;
    max-height: 100px;
    width: 80px;">
                                    @endif
                                    </th>                                                            
                                    <td>{{ $item->name }}</td> 
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->getPriceSum() }}</td>                                
                                     </tr>
                                    
                            @endforeach
                             <tr>
                                         <td colspan="2" class="text-right h5 b">Total cost:</td>
                                          <td colspan="2">
                                               <dd class="text-right h5 b"> {{ generalSetting('currency_symbol') }}{{ \Cart::getSubTotal() }} </dd>
                                          </td>
                                     </tr>
                        </tbody>
                    </table> 
                    </article>
                </div>
            </div>
            <div class="col-md-12 mt-4">
                <button type="submit" class="subscribe btn btn-success btn-lg btn-block">Place Order</button>
            </div>
        </div>
    </div>
</div>
</form>
</div>
</section>

@endsection