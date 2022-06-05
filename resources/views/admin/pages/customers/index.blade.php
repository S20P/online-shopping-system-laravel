@extends('admin.layouts.master')
@section('content')
     <div class="pagetitle">
      <h1>Customers </h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
           <li class="breadcrumb-item"><a href="{{route('admin.orders.index')}}">Customers</a></li>
          <li class="breadcrumb-item active">list</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    @include('admin.partials.flash')
           <div class="card">
            <div class="card-body">
               <div class="d-flex card-header-flex">
                 <h5 class="card-title flex">Customers</h5>                 
                 
                     </div>
                        <div class="row">
                            <div class="col-md-12">
                 
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                        <tr>  
                            <th> Profile Image </th>                            
                            <th scope="col"> Customer Name </th>   
                            <th scope="col"> Email </th>
                            <th scope="col"> phone </th>
                            <th scope="col"> Total Placed Orders </th>
                        </tr>
                        </thead>
                        <tbody>
                           @foreach($customers as $user)
                                <tr>
                                <td>
                                    @if(isset($user->profile->image))
                  <img src="{{ asset('images/users/'.$user->profile->image) }}" class="rounded-circle" style="height: auto; max-height: 80px; width: 80px;">
                                    
                                  @else
                                   <img src="{{asset('AdminThemes/img/user-admin.png')}}" alt="Profile" class="rounded-circle" style="height: auto; max-height: 80px; width: 80px;">
                                   @endif

                                </td>  
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ @$user->profile->phone ? $user->profile->phone : '' }}</td>
                                <td>{{$user->orders->count()}}</td>                               
                                
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $customers->links() !!}
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