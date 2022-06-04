@extends('admin.layouts.master')

@section('content')

     <div class="pagetitle">
      <h1>Products</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
           <li class="breadcrumb-item"><a href="{{route('admin.products.index')}}">Products</a></li>
          <li class="breadcrumb-item active">create</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
  
    @include('admin.partials.flash')
    <form  class="row g-3" action="{{ route('admin.products.store') }}" method="POST" role="form" enctype="multipart/form-data">
        @csrf
     <div class="tile-body">
      <div class="row">
          <div class="col-md-8">
            <div class="card">          
          <div class="card-body">
              <h5 class="card-title">Product Information</h5> 
             
                    <div class="form-group mb-3">
                        <label class="control-label" for="name">Name</label>
                        <input
                            class="form-control @error('name') is-invalid @enderror"
                            type="text"
                            placeholder="Enter product name"
                            id="name"
                            name="name"
                            value="{{ old('name') }}"
                        />
                        <div class="invalid-feedback active">
                            <i class="fa fa-exclamation-circle fa-fw"></i> @error('name') <span>{{ $message }}</span> @enderror
                        </div>
                    </div>
                      
                    <div class="form-group mb-3">
                        <label class="control-label" for="sku">SKU</label>
                        <input
                            class="form-control @error('sku') is-invalid @enderror"
                            type="text"
                            placeholder="Enter product sku"
                            id="sku"
                            name="sku"
                            value="{{ old('sku') }}"
                        />
                        <div class="invalid-feedback active">
                            <i class="fa fa-exclamation-circle fa-fw"></i> @error('sku') <span>{{ $message }}</span> @enderror
                        </div>
                    </div>             
              
                    <div class="form-group mb-3">
                        <label class="control-label" for="brand_id">Brand</label>

                        <select name="brand_id" id="brand_id" class="form-select @error('brand_id') is-invalid @enderror">
                            <option value="0">Select a brand</option>
                            @foreach($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback active">
                            <i class="fa fa-exclamation-circle fa-fw"></i> @error('brand_id') <span>{{ $message }}</span> @enderror
                        </div>
                    </div>                         
                       
                    <div class="form-group mb-3">
                        <label class="control-label" for="categories">Categories</label>
                        <select name="categories[]" id="categories" class="form-select" multiple>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label class="control-label" for="price">Price</label>
                        <input
                            class="form-control @error('price') is-invalid @enderror"
                            type="text"
                            placeholder="Enter product price"
                            id="price"
                            name="price"
                            value="{{ old('price') }}"
                        />
                        <div class="invalid-feedback active">
                            <i class="fa fa-exclamation-circle fa-fw"></i> @error('price') <span>{{ $message }}</span> @enderror
                        </div>
                    </div>
              
                    <div class="form-group mb-3">
                        <label class="control-label" for="sale_price">Sales Price</label>
                        <input
                            class="form-control"
                            type="text"
                            placeholder="Enter product special price"
                            id="sale_price"
                            name="sale_price"
                            value="{{ old('sale_price') }}"
                        />
                    </div>
                               
                    <div class="form-group mb-3">
                        <label class="control-label" for="stock">Stock</label>
                        <input
                            class="form-control @error('stock') is-invalid @enderror"
                            type="number"
                            placeholder="Enter product stock"
                            id="stock"
                            name="stock"
                            value="{{ old('stock') }}"
                        />
                        <div class="invalid-feedback active">
                            <i class="fa fa-exclamation-circle fa-fw"></i> @error('stock') <span>{{ $message }}</span> @enderror
                        </div>
                    </div>
               
                    <div class="form-group mb-3">
                        <label class="control-label" for="description">Description</label>
                        <textarea name="description" id="description" rows="8" class="form-control"></textarea>
                    </div>
                    <div class="form-group  mb-3">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input"
                                       type="checkbox"
                                       id="status"
                                       name="status"
                                    />Status
                            </label>
                        </div>
                    </div>
                    <div class="form-group  mb-3">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input"
                                       type="checkbox"
                                       id="featured"
                                       name="featured"
                                    />Featured
                            </label>
                        </div>
                    </div>
                     
                    </div>
                         
             </div>          
         
          </div>
           <div class="col-md-4">
            <div class="card">
            <div class="card-body">
                <div class="form-group  mb-3 mt-3">
                        <label class="control-label" for="image">Main Image</label>
                        <input class="form-control" type="file" name="image" id="image" accept=".png, .jpg, .jpeg">
                 </div>
                 <div class="form-group  mb-3">
                        <label class="control-label" for="images">Product Gallery Images </label>
                        <input class="form-control" type="file" name="images[]" id="images" accept=".png, .jpg, .jpeg" multiple>
                 </div>  
           </div>
           </div> 
          </div>
      </div>
       </div> 
        <div class="tile-footer">
                        <div class="row d-print-none mt-2">
                            <div class="col-12 text-center">
                                <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Product</button>
                                <a class="btn btn-danger" href="{{ route('admin.products.index') }}"><i class="fa fa-fw fa-lg fa-arrow-left"></i>Go Back</a>
                            </div>
                        </div>
                    </div> 
      
     </form> 
      
@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('backend/js/plugins/select2.min.js') }}"></script>
    <script>
        $( document ).ready(function() {
            $('#categories').select2();
        });
    </script>
@endpush