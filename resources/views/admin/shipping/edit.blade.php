@extends('admin.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Shipping Managment</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{route('category.index')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    @include('admin.mesage')
    <!-- Default box -->
    <div class="container-fluid">
        <form action="{{ route('shipping.update',$shippingCharge->id) }}" method="POST">

            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <select name="country" id="country" class="form-control">
                                    <option value="">Select a country</option>
                                    @if($countries->isNotEmpty())
                                    @foreach ($countries as $country)
                                    <option {{ ($shippingCharge->country_id == $country->id ? 'selected' : '') }}
                                        value="{{$country->id}}">{{$country->name}}</option>
                                    @endforeach
                                    @endif
                                    <option {{ ($shippingCharge->country_id == 'rest_of_world' ? 'selected' : '') }}
                                        value="rest_of_world">Rest of world</option>
                                </select>
                                <span class="text-danger">
                                    @error('country')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <input value="{{ $shippingCharge->amount }}" type="text" name="amount" id="amount"
                                    class="form-control" placeholder="Amount">
                                <span class="text-danger">
                                    @error('amount')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <button class="btn btn-primary" name="submit">Update</button>

                            </div>
                        </div>
                    </div>
                </div>
        </form>
    </div>

</section>
<!-- /.content -->
@endsection

@section('customjs')

@endsection