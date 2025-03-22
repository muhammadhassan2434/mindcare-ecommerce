@extends('admin.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Sub Category</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{route('sub-category.index')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="container-fluid">
        <form action="{{ route('subcategory.update',$sub_category->id) }}" method="post">
            @csrf
            <div class="card">
                <div class="card-body">								
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="name">Category</label>
                                <select name="category_id" id="sub_category" class="form-control">
                                    @if($categories->isNotEmpty())
                                    <option value="">Select a category</option>
                                    @foreach ($categories as $data)
                                    <option {{ ($sub_category->category_id == $data->id) ? 'Selected' :'' }} value="{{ $data->id }}">{{ $data->name }}</option>
                                    @endforeach
                                        
                                    @endif
                                </select>
                                <span class=" text-danger">
                                    @error('category')
                                        {{ $message }}
                                    @enderror    
                                    </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input type="text" value="{{old('name')}}{{$sub_category->name}}" name="name" id="name" class="form-control" placeholder="Name" >
                                <span class=" text-danger">
                                @error('name')
                                    {{ $message }}
                                @enderror    
                                </span>	
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="slug">Slug</label>
                                <input type="text" value="{{old('slug')}}{{$sub_category->slug}}" name="slug" id="slug" class="form-control" placeholder="Slug">	
                                <span class=" text-danger">
                                    @error('slug')
                                        {{ $message }}
                                    @enderror    
                                    </span>
                            </div>
                        </div>									
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="status">status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1" {{ ($sub_category->status == 1) ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ ($sub_category->status == 0) ? 'selected' : '' }}>Block</option>
                                </select>
                            </div>
                        </div>	
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="showhome">show on Home</label>
                                <select name="showhome" id="showhome" class="form-control">
                                    <option value="Yes" {{ ($sub_category->showhome == "yes") ? 'selected' : '' }}>Yes</option>
                                    <option value="No" {{ ($sub_category->showhome == 'No') ? 'selected' : '' }}>No</option>
                                </select>
                            </div>
                        </div>								
                    </div>
                </div>							
            </div>
            <div class="pb-5 pt-3">
                <button type="submit" class="btn btn-primary" name="submit">Update</button>
                <a href="{{ route('sub-category.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
            </div>
        </form>
    </div>
    <!-- /.card -->
</section>
<!-- /.content -->

@endsection

@section('customjs')

@endsection