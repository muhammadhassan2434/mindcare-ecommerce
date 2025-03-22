@extends('admin.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Orders</h1>
            </div>
            <div class="col-sm-6 text-right">
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="container-fluid">
        <div class="card">
            <form action="" method="get"> 
            <div class="card-header">
                <div class="card-title">
                    <button type="button" onclick="window.location.href='{{route('orders.index')}}'" class="btn btn-primary">Reset</button>
                </div>
                    <div class="card-tools">
                        <div class="input-group input-group" style="width: 250px;">
                            <input type="text" value="{{ Request::get('keyword')}}" name="keyword" class="form-control float-right" placeholder="Search">
                            <div class="input-group-append">
                              <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                              </button>
                            </div>
                          </div>
                        </div>
                    </div>
                </form>
            <div class="card-body table-responsive p-0">								
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th width="60">Order#</th>
                            <th>Customer</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Amount</th>
                            <th>Date Purchased</th>
                            <th>Invoice</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($orders->isNotEmpty())
                        @foreach ($orders as $item)
                        <tr>
                            <td><a href="{{ route('orders.detail',$item->id) }}">{{$item->id}}</a></td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->mobile}}</td>
                            <td>{{$item->email}}</td>
                            <td>
                                @if($item->status == 'pending')
                                <span class="badge bg-danger">Pending</span>
                                @elseif($item->status == 'shipped')
                                <span class="badge bg-info">Shipped</span>
                                @else
                                <span class="badge bg-success">Delivered</span>
                                @endif
                                
                            </td>
                            <td>{{ number_format($item->grand_total) }}</td>
                            <td>{{ \carbon\carbon::parse($item->created_at)->format('d M,Y') }}</td>
                            <td><a href="{{ route('orders.invoice',$item->id) }}" class="btn btn-primary">Invoice</a></td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="5" class="text-danger text-center"><h1>Rcords not found</h1></td>
                        </tr>
                        @endif
                    </tbody>
                </table>										
            </div>
            <div class="card-footer clearfix">
                {{ $orders->links('pagination::bootstrap-5') }}
                
            </div>
        </div>
    </div>
    <!-- /.card -->
</section>
<!-- /.content -->
</div>

@endsection

@section('customjs')

@endsection