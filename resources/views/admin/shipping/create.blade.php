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
    <!-- Default box -->
    <div class="container-fluid">
        <form action="{{ route('shipping.store') }}" method="post">

            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <select name="country" id="country" class="form-control">
                                    <option value="">Select a country</option>
                                    @if($countries->isNotEmpty())
                                    @foreach ($countries as $country)
                                    <option value="{{$country->id}}">{{$country->name}}</option>
                                    @endforeach
                                    @endif
                                    <option value="rest_of_world">Rest of world</option>
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
                                <input type="text" name="amount" id="amount" class="form-control" placeholder="Amount">
                                <span class="text-danger">
                                    @error('amount')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <button class="btn btn-primary" name="submit">Create</button>

                            </div>
                        </div>
                    </div>
                </div>
        </form>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Amount</th>
                            <th>Action</th>
                            <th>Action</th>
                        </tr>
                        @if($shipping_charge->isNotEmpty())
                        @foreach ($shipping_charge as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ ($item->country_id == 'rest_of_world') ? 'Rest of the world' : $item->name }}</td>
                            <td>Rs{{ $item->amount }}</td>
                            <td>
                                <a href="{{ route('shipping.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('shipping.delete', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this shipping charge?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        
                        @endforeach
                        @else
                        <tr>
                            <td colspan="4">No shipping charges found</td>
                        </tr>
                        @endif

                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card -->
</section>
<!-- /.content -->
@endsection

@section('customjs')

@endsection