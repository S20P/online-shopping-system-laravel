@extends('user.layouts.master')
@section('content')
     <div class="pagetitle">
      <h1>Orders </h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
           <li class="breadcrumb-item"><a href="{{route('user.orders.index')}}">Orders</a></li>
          <li class="breadcrumb-item active">list</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
   
           <div class="card">
            <div class="card-body">
               <div class="d-flex card-header-flex">
                 <h5 class="card-title flex">Orders</h5>                 
                 
                     </div>
                        <div class="row">
                            <div class="col-md-12">
                 
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                        <tr>  
                            <th scope="col"> Order Number </th>                                            
                            <th scope="col"> Placed By </th>   
                            <th scope="col"> Total Amount </th>
                            <th scope="col"> Items Qty </th>
                            <th scope="col"> Status </th>
                                                                      
                            <th scope="col" style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                        </tr>
                        </thead>
                        <tbody>
                           @foreach($orders as $order)
                                <tr>
                                    <td>{{ $order->order_number }}</td>
                                <td>{{ $order->user->name }}</td>
                                <td class="text-center">{{generalSetting('currency_symbol')}} {{ $order->grand_total }}</td>
                                <td class="text-center">{{ $order->item_count }}</td>
                              
                                <td class="text-center">
                                    <span class="badge rounded-pill bg-success">{{ $order->status }}</span>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Second group">
                                        <a href="{{ route('user.orders.show', $order->id) }}" class="btn btn-sm btn-primary"><i class="bi bi-eye"></i></a>
                                    </div>
                                </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $orders->links() !!}
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