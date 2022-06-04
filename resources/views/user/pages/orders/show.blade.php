@extends('user.layouts.master')
@section('content')
     <div class="pagetitle">
      <h1>Brands </h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
           <li class="breadcrumb-item"><a href="{{route('user.orders.index')}}">Orders</a></li>
          <li class="breadcrumb-item active">show</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
  
         
  <div class="card">
            <div class="card-body">
               <div class="card-header-flex">
              <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <section class="invoice">
                    <div class="row mb-4">
                        <div class="col-6">
                            <h2 class="page-header"><i class="fa fa-globe"></i> {{ $order->order_number }}</h2>
                        </div>
                        <div class="col-6">
                            <h5 class="text-right">Date: {{ $order->created_at->toFormattedDateString() }}</h5>
                        </div>
                    </div>
                    <div class="row invoice-info">
                        <div class="col-4">Placed By
                            <address><strong>{{ $order->user->fullName }}</strong><br>Email: {{ $order->user->email }}</address>
                        </div>
                        <div class="col-4">Ship To
                            <address><strong>{{ $order->first_name }} {{ $order->last_name }}</strong><br>{{ $order->address }}<br>{{ $order->city }}, {{ $order->country }} {{ $order->post_code }}<br>{{ $order->phone_number }}<br></address>
                        </div>
                        <div class="col-4">
                            <b>Order ID:</b> {{ $order->order_number }}<br>
                            <b>Amount:</b> {{ config('settings.currency_symbol') }}{{ round($order->grand_total, 2) }}<br>
                            <b>Payment Method:</b> {{ $order->payment->payment_method }}<br>
                            <b>Payment Status:</b> {{ $order->payment->payment_status}}<br>
                            <b>Order Status:</b> {{ $order->status }}<br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Qty</th>
                                    <th>Product</th>
                                    <th>SKU #</th>
                                    <th>Qty</th>
                                    <th>Subtotal</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($order->items as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->product->name }}</td>
                                            <td>{{ $item->product->sku }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ generalSetting('currency_symbol') }}{{ round($item->price, 2) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
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