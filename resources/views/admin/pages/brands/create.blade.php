@extends('admin.layouts.master')

@section('content')
          <div class="pagetitle">
      <h1>Brands </h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
           <li class="breadcrumb-item"><a href="{{route('admin.brands.index')}}">Brands</a></li>
          <li class="breadcrumb-item active">create</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    @include('admin.partials.flash')
    
      <div class="card">
            <div class="card-body">
              <h5 class="card-title">Brand Information</h5>

              <!-- Vertical Form -->
                       
                    <div class="tile">
                        <form  class="row g-3" action="{{ route('admin.brands.store') }}" method="POST" role="form" enctype="multipart/form-data">
                            @csrf
                                                       
                            <div class="tile-body">
                                <div class="form-group col-md-12  mb-3">
                                    <label class="control-label" for="name">Name</label>
                                    <input
                                        class="form-control @error('name') is-invalid @enderror"
                                        type="text"
                                        placeholder="Enter category name"
                                        id="name"
                                        name="name"
                                        value="{{ old('name') }}"
                                    />
                                    <div class="invalid-feedback active">
                                        <i class="fa fa-exclamation-circle fa-fw"></i> @error('name') <span>{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                                            
                                <div class="form-group  mb-3">
                                    <label class="control-label" for="description">Description</label>
                                    <textarea name="description" id="description" rows="8" class="form-control"></textarea>
                                </div> 

                                <div class="form-group  mb-3">
                                    <label class="control-label" for="image">Image Upload</label>
                                    <input class="form-control" type="file" name="image" id="image" accept=".png, .jpg, .jpeg">
                                </div>                   
                               
                            </div>
                            <div class="tile-footer">
                                <div class="row d-print-none mt-2">
                                    <div class="col-12 text-center">
                                        <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
                                        <a class="btn btn-danger" href="{{ route('admin.brands.index') }}"><i class="fa fa-fw fa-lg fa-arrow-left"></i>Go Back</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div> 
            
          </div>
     </div>
@endsection
