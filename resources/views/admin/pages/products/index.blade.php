@extends('admin.layouts.master')
@section('content')
      <div class="pagetitle">
      <h1>Products </h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
           <li class="breadcrumb-item"><a href="{{route('admin.products.index')}}">Products</a></li>
          <li class="breadcrumb-item active">list</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    @include('admin.partials.flash')
     <div class="card">
            <div class="card-body">
               <div class="d-flex card-header-flex">
                 <h5 class="card-title flex">Products</h5>                 
                  <a href="{{ route('admin.products.create') }}" class="btn btn-primary pull-right">Add Product</a>
                     </div>
    <div class="row">
        <div class="col-md-12">
            
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                        <tr>
                            <th> Image </th>
                            <th> Name </th> 
                             <th> SKU </th>                            
                            <th class="text-center"> Categories </th>
                            <th class="text-center"> Brand </th>
                            <th class="text-center"> Price </th>
                            <th class="text-center"> Status </th>
                            <th class="text-center"> Stock </th>                            
                            <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                                <tr>
                                     <td>
                                    @if($product->image)
                  <img src="{{ asset('images/product/'.$product->image) }}" style="height: 100px; width: 100px;">
                                    @endif
                                    </td>                                                              
                                    <td>{{ $product->name }}</td>
                                       <td>{{ $product->sku }}</td>  
                                    <td>
                                        @if(isset($product->categories) &&  count($product->categories))
                                        @foreach($product->categories as $category)
                                            <p><span class="badge bg-secondary">{{ $category->name }}</span></p>
                                        @endforeach
                                         @endif
                                    </td>
                                     <td>

                                        @if(isset($product->brand))
                                            <p><span class="badge bg-light text-dark">{{ @$product->brand->name ? $product->brand->name : '' }}</span></p>
                                        @endif
                                    </td>
                                    <td>{{ config('settings.currency_symbol') }}{{ $product->price }}</td>
                                    <td class="text-center">
                                        @if ($product->status == 1)
                                            <span class="badge rounded-pill bg-success">Active</span>
                                        @else
                                            <span class="badge rounded-pill bg-danger">Not Active</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $product->stock }}
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Second group">
                                            <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-primary"><i class="bi bi-pencil"></i></a>
                                            <a href="{{ route('admin.products.delete', $product->id) }}" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $products->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
@endpush