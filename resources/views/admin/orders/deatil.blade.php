@extends('admin.layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Order: # {{ $order->id }}</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('orders.index') }}" class="btn btn-primary">Back</a> <!-- Corrected the curly braces -->
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header pt-3">
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                <h1 class="h5 mb-3">Shipping Address</h1>
                                <address>
                                    <strong>{{ $order->first_name . ' '. $order->last_name }}</strong><br>
                                    {{ $order->address }}, {{ $order->zip }}, {{ $order->countryName }}<br>
                                    {{ $order->city }}<br>
                                    Phone: {{ $order->mobile }}<br>
                                    Email: {{ $order->email }}
                                </address>
                            </div>
                            <div class="col-sm-4 invoice-col">
                                <br>
                                <b>Order ID:</b> {{ $order->id }}<br>
                                <b>Total:</b> ${{ number_format($order->grand_total, 2) }}<br>
                                <b>Status:</b>
                                @if($order->status == 'pending')
                                <span class="text-danger">Pending</span>
                            @elseif($order->status == 'shipped')
                                <span class="text-info">Shipped</span>
                            @elseif($order->status == 'delivered')
                                <span class="text-success">Delivered</span>
                            @elseif($order->status == 'cancelled')
                                <span class="text-danger">Cancelled</span>
                            @else
                                <span class="text-warning">Unknown Status</span>
                            @endif
                            
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-3">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th width="100">Price</th>
                                    <th width="100">Qty</th>
                                    <th width="100">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orderItems as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>${{ number_format($item->price, 2) }}</td>
                                    <td>{{ $item->qty }}</td>
                                    <td>${{ number_format($item->total, 2) }}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <th colspan="3" class="text-right">Subtotal:</th>
                                    <td>${{ number_format($order->sub_total, 2) }}</td>
                                </tr>
                                <tr>
                                    <th colspan="3" class="text-right">Shipping:</th>
                                    <td>${{ number_format($order->shipping, 2) }}</td>
                                </tr>
                                <tr>
                                    <th colspan="3" class="text-right">Grand Total:</th>
                                    <td>${{ number_format($order->grand_total, 2) }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <form action="{{ route('orders.update', $order->id) }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <h2 class="h4 mb-3">Order Status</h2>
                            <div class="mb-3">
                                <select name="status" id="status" class="form-control">
                                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                                    <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                                    <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="shipped_date">Shipped Date</label>
                                <input type="date" name="shipped_date" id="shipped_date" class="form-control" value="{{ $order->shipped_date ? date('Y-m-d', strtotime($order->shipped_date)) : '' }}">

                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                    
                </div>
                {{-- <div class="card">
                    <div class="card-body">
                        <h2 class="h4 mb-3">Send Invoice Email</h2>
                        <div class="mb-3">
                            <select name="status" id="status" class="form-control">
                                <option value="">Customer</option>
                                <option value="">Admin</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary">Send</button>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <!-- /.card -->
</section>
@endsection

@section('customjs')
<script>
    // $(document).ready(function(){
    //     $('#shipped_date').datetimepicker({
    //         format: 'Y-m-d H:i:s',
    //     });
    // });
</script>
@endsection
