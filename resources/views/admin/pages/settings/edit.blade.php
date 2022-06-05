@extends('admin.layouts.master')
@section('content')
     <div class="pagetitle">
      <h1>Settings</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{route('admin.settings.edit')}}">Settings</a></li>
          <li class="breadcrumb-item active">edit</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    @include('admin.partials.flash')
      <form  class="row g-3" action="{{ route('admin.settings.update') }}" method="POST" role="form" enctype="multipart/form-data">
        @csrf
     <div class="tile-body">
      <div class="row">
          <div class="col-md-8">
            <div class="card">
            <div class="card-body">
              <h5 class="card-title">General Settings</h5>
                 <input type="hidden" name="id" value="{{ $setting->id }}">
                                <div class="form-group mb-3">
                                    <label class="control-label" for="name">Currency</label>
                                    <input
                                        class="form-control"
                                        type="text"
                                        placeholder="Enter currency"
                                        id="currency"
                                        name="setting_info[currency]"
                                        value="{{ old('currency', isset($setting->setting_info['currency']) ? $setting->setting_info['currency'] : '') }}"
                                    />                                 
                                    
                                </div>
                                 <div class="form-group mb-3">
                                    <label class="control-label" for="name">Currency symbol</label>
                                    <input
                                        class="form-control"
                                        type="text"
                                        placeholder="Enter currency symbol"
                                        id="currency_symbol"
                                        name="setting_info[currency_symbol]"
                                        value="{{ old('currency_symbol', isset($setting->setting_info['currency_symbol']) ? $setting->setting_info['currency_symbol'] : '') }}"
                                    />                                 
                                    
                                </div>
                                                      
                  
           </div>
           </div>
           </div>
           <div class="col-md-4">
            <div class="card">
            <div class="card-body">
                <div class="form-group  mb-3 mt-3">
                        <label class="control-label" for="image">Logo Image</label>

                         @if(isset($setting->setting_info['logo']))
                         <div class="py-4 px-2">
                          <img src="{{ asset($setting->setting_info['logo']) }}" style="height: 50px; width: 50px;">
                          </div>
                                    @endif

                        <input type="hidden"  name="setting_info[logo]"
                                        value="{{ old('logo', isset($setting->setting_info['logo']) ? $setting->setting_info['logo'] : '') }}">
                        <input class="form-control" type="file" name="image" id="image" accept=".png, .jpg, .jpeg">
                 </div>
                 
           </div>
           </div> 
          </div>     
      </div> 
     </div>  
      <div class="tile-footer">
                                <div class="row d-print-none mt-2">
                                    <div class="col-12 text-center">
                                        <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
                                        <a class="btn btn-danger" href="{{ route('admin.settings.edit') }}"><i class="fa fa-fw fa-lg fa-arrow-left"></i>Go Back</a>
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