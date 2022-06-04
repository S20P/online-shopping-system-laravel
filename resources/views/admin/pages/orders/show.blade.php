@extends('admin.layouts.master')
@section('content')
     <div class="pagetitle">
      <h1>Brands </h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
           <li class="breadcrumb-item"><a href="{{route('admin.orders.index')}}">Orders</a></li>
          <li class="breadcrumb-item active">show</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
  
           <div class="card">
            <div class="card-body">
               <div class="d-flex card-header-flex">                               
                 
              </div>  

                 <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                        <tr>
                            <th> Order Number </th>
                            <th> Placed By </th>
                            <th class="text-center"> Total Amount </th>
                            <th class="text-center"> Items Qty </th>
                            <th class="text-center"> Payment Status </th>
                            <th class="text-center"> Status </th>
                            <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->order_number }}</td>
                                <td>{{ $order->user->fullName }}</td>
                                <td class="text-center">{{ generalSetting('currency_symbol') }}{{ $order->grand_total }}</td>
                                <td class="text-center">{{ $order->item_count }}</td>
                                <td class="text-center">
                                    @if ($order->payment_status == 1)
                                        <span class="badge badge-success">Completed</span>
                                    @else
                                        <span class="badge badge-danger">Not Completed</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <span class="badge badge-success">{{ $order->status }}</span>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Second group">
                                        <a href="{{ route('admin.orders.show', $order->order_number) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
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