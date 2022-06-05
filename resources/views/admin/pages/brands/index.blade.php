@extends('admin.layouts.master')
@section('content')
     <div class="pagetitle">
      <h1>Brands </h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
           <li class="breadcrumb-item"><a href="{{route('admin.brands.index')}}">Brands</a></li>
          <li class="breadcrumb-item active">list</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    @include('admin.partials.flash')
           <div class="card">
            <div class="card-body">
               <div class="d-flex card-header-flex">
                 <h5 class="card-title flex">Brands</h5>                 
                  <a href="{{ route('admin.brands.create') }}" class="btn btn-primary flex">Add Brand</a>
                     </div>
                        <div class="row">
                            <div class="col-md-12">
                 
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                        <tr>  
                            <th scope="col"> Image </th>                                            
                            <th scope="col"> Name </th>                             
                            <th scope="col" style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($brands as $brand)
                                <tr>
                                   <th scope="row">
                                    @if($brand->image)
                  <img src="{{ asset('images/brand/'.$brand->image) }}" style="height: 100px; width: 100px;">
                                    @endif
                                    </th>                                                            
                                    <td>{{ $brand->name }}</td> 
                                                                     
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Second group">
                                            <a href="{{ route('admin.brands.edit', $brand->id) }}" class="btn btn-sm btn-primary"><i class="bi bi-pencil"></i></a>
                                            <a href="{{ route('admin.brands.delete', $brand->id) }}" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $brands->links() !!}
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