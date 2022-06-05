@extends('user.layouts.master')
@section('content')
     <div class="pagetitle">
      <h1>Profile </h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
           <li class="breadcrumb-item">User</li>
           <li class="breadcrumb-item"><a href="{{route('user.profile')}}">Profile</a></li>        
        </ol>
      </nav>
    </div><!-- End Page Title -->
 @include('user.partials.flash')
      <section class="section profile">
      <div class="row">
      <div class="col-xl-12">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">                 
                    <h5 class="card-title">Edit Profile</h5>
                </li>             

              </ul>
            
              <div class="row pt-2">
                <div class="col-md-12 profile-edit pt-3" id="profile-edit">
                  <!-- Profile Edit Form -->
                  <form action="{{ route('user.profile.save') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">


                        @if(isset($profile->image))
                  <img src="{{ asset('images/users/'.$profile->image) }}" class="rounded-circle" style="height: auto; max-height: 80px; width: 80px;">
                                    
                                  @else
                                   <img src="{{asset('AdminThemes/img/user-admin.png')}}" alt="Profile" class="rounded-circle" style="height: auto; max-height: 80px; width: 80px;">
                                   @endif
                        <div class="pt-2">
                      <input class="form-control" type="file" name="image" id="image" accept=".png, .jpg, .jpeg">
                        </div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label class="col-md-4 col-lg-3 col-form-label">First Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input 
                         type="text"
                         name="first_name"
                         class="form-control @error('first_name') is-invalid @enderror"
                         value="{{  @$profile->first_name ? $profile->first_name : old('first_name','') }}"
                          >
                           <div class="invalid-feedback active">
                                        <i class="fa fa-exclamation-circle fa-fw"></i> @error('first_name') <span>{{ $message }}</span> @enderror
                           </div>
                      </div>
                    </div>

                      <div class="row mb-3">
                      <label class="col-md-4 col-lg-3 col-form-label">Last Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input 
                         type="text"
                         name="last_name"
                         class="form-control @error('last_name') is-invalid @enderror"
                         value="{{  @$profile->last_name ? $profile->last_name : old('last_name','') }}"
                          >
                           <div class="invalid-feedback active">
                                        <i class="fa fa-exclamation-circle fa-fw"></i> @error('last_name') <span>{{ $message }}</span> @enderror
                           </div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                      <div class="col-md-8 col-lg-9">
                 <textarea name="about" rows="3" class="form-control"  style="height: 100px">{{  @$profile->about ? $profile->about : old('about','') }}</textarea>
                        
                      </div>
                    </div>


                   <div class="row mb-3">
                      <label class="col-md-4 col-lg-3 col-form-label">Phone</label>
                      <div class="col-md-8 col-lg-9">
                        <input 
                         type="number"
                         name="phone"
                         class="form-control @error('phone') is-invalid @enderror"
                         value="{{  @$profile->phone ? $profile->phone : old('phone','') }}"
                          >
                           <div class="invalid-feedback active">
                                        <i class="fa fa-exclamation-circle fa-fw"></i> @error('phone') <span>{{ $message }}</span> @enderror
                           </div>
                      </div>
                    </div>

                   <div class="row mb-3">
                      <label class="col-md-4 col-lg-3 col-form-label">House number</label>
                      <div class="col-md-8 col-lg-9">
                        <input 
                         type="text"
                         name="housenumber"
                         class="form-control @error('housenumber') is-invalid @enderror"
                         value="{{  @$profile->housenumber ? $profile->housenumber : old('housenumber','') }}"
                          >
                           <div class="invalid-feedback active">
                                        <i class="fa fa-exclamation-circle fa-fw"></i> @error('housenumber') <span>{{ $message }}</span> @enderror
                           </div>
                      </div>
                    </div> 


                            <div class="row mb-3">
                      <label class="col-md-4 col-lg-3 col-form-label">Address line1</label>
                      <div class="col-md-8 col-lg-9">
                        <input 
                         type="text"
                         name="addressline1"
                         class="form-control @error('addressline1') is-invalid @enderror"
                         value="{{  @$profile->addressline1 ? $profile->addressline1 : old('addressline1','') }}"
                          >
                           <div class="invalid-feedback active">
                                        <i class="fa fa-exclamation-circle fa-fw"></i> @error('addressline1') <span>{{ $message }}</span> @enderror
                           </div>
                      </div>
                    </div>

                     <div class="row mb-3">
                      <label class="col-md-4 col-lg-3 col-form-label">Address line2</label>
                      <div class="col-md-8 col-lg-9">
                        <input 
                         type="text"
                         name="addressline2"
                         class="form-control @error('addressline2') is-invalid @enderror"
                         value="{{  @$profile->addressline2 ? $profile->addressline2 : old('addressline2','') }}"
                          >
                           <div class="invalid-feedback active">
                                        <i class="fa fa-exclamation-circle fa-fw"></i> @error('addressline2') <span>{{ $message }}</span> @enderror
                           </div>
                      </div>
                    </div>


                            <div class="row mb-3">
                      <label class="col-md-4 col-lg-3 col-form-label">City</label>
                      <div class="col-md-8 col-lg-9">
                        <input 
                         type="text"
                         name="city"
                         class="form-control @error('city') is-invalid @enderror"
                         value="{{  @$profile->city ? $profile->city : old('city','') }}"
                          >
                           <div class="invalid-feedback active">
                                        <i class="fa fa-exclamation-circle fa-fw"></i> @error('city') <span>{{ $message }}</span> @enderror
                           </div>
                      </div>
                    </div>


                            <div class="row mb-3">
                      <label class="col-md-4 col-lg-3 col-form-label">State</label>
                      <div class="col-md-8 col-lg-9">
                        <input 
                         type="text"
                         name="state"
                         class="form-control @error('state') is-invalid @enderror"
                         value="{{  @$profile->state ? $profile->state : old('state','') }}"
                          >
                           <div class="invalid-feedback active">
                                        <i class="fa fa-exclamation-circle fa-fw"></i> @error('state') <span>{{ $message }}</span> @enderror
                           </div>
                      </div>
                    </div>


                            <div class="row mb-3">
                      <label class="col-md-4 col-lg-3 col-form-label">Postcode</label>
                      <div class="col-md-8 col-lg-9">
                        <input 
                         type="text"
                         name="postcode"
                         class="form-control @error('postcode') is-invalid @enderror"
                         value="{{  @$profile->postcode ? $profile->postcode : old('postcode','') }}"
                          >
                           <div class="invalid-feedback active">
                                        <i class="fa fa-exclamation-circle fa-fw"></i> @error('postcode') <span>{{ $message }}</span> @enderror
                           </div>
                      </div>
                    </div>


                            <div class="row mb-3">
                      <label class="col-md-4 col-lg-3 col-form-label">Country</label>
                      <div class="col-md-8 col-lg-9">
                        <input 
                         type="text"
                         name="country"
                         class="form-control @error('country') is-invalid @enderror"
                         value="{{  @$profile->country ? $profile->country : old('country','') }}"
                          >
                           <div class="invalid-feedback active">
                                        <i class="fa fa-exclamation-circle fa-fw"></i> @error('country') <span>{{ $message }}</span> @enderror
                           </div>
                      </div>
                    </div>


                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

              

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>
   
       
@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
@endpush