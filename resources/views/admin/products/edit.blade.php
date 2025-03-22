@extends('admin.layouts.app')


@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Product</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('product.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <form action="{{ route('products.update',$product->id) }}" method="post">
        @csrf
        <!-- Default box -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="title">Title</label>
                                        <input type="text" name="title" id="title" class="form-control"
                                            placeholder="Title" value="{{ $product->title }}">
                                        <span class="text-danger">
                                            @error('title')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="slug">slug</label>
                                        <input type="text" name="slug" id="slug" class="form-control"
                                            placeholder="slug" value="{{ $product->slug }}">
                                        <span class="text-danger">
                                            @error('slug')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="description">short Description</label> <br>
                                        <textarea name="short_description" id="short_description" cols="100" rows=""
                                            class="summernote" placeholder="short description">{{ $product->short_description }}</textarea>
                                    </div>
                                    
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="description">Description</label> <br>
                                        <textarea name="description" id="description" cols="100" rows=""
                                            class="summernote" placeholder="Description">{{ $product->description }}</textarea>
                                    </div>
                                    
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="description">shipping and returns</label> <br>
                                        <textarea name="shipping_returns" id="shipping_returns" cols="100" rows=""
                                            class="summernote" placeholder="">{{ $product->shipping_returns }}</textarea>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h2 class="h4 mb-3">Media</h2>
                            <div id="image" class="dropzone dz-clickable">
                                <div class="dz-message needsclick">
                                    <br>Drop files here or click to upload.<br><br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="product-gallery">
                        @if($productimages->isNotEmpty())
                            @foreach ($productimages as $image)
                            <div class="col-md-3" id="image-row-{{ $image->id }}">
                                <div class="card">
                                <img src="{{ asset('uploads/product/small/'.$image->image) }}" class="card-img-top" alt="">
                                <input type="hidden" name="image_array[]" id="" value="{{$image->id}}">
                                <div class="card-body">
                                    <a href="javascript:void(0)" onclick="deleteimage({{$image->id}})" class="btn btn-danger">Delete</a>
                                </div>
                            </div></div>
                            @endforeach
                        @endif
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h2 class="h4 mb-3">Pricing</h2>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="price">Price</label>
                                        <input type="text" name="price" id="price" class="form-control"
                                            placeholder="Price" value="{{ $product->price }}">
                                        <span class="text-danger">
                                            @error('price')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="compare_price">Compare at Price</label>
                                        <input type="text" name="compare_price" id="compare_price" class="form-control"
                                            placeholder="Compare Price" value="{{ $product->compare_price }}">
                                        <p class="text-muted mt-3">
                                            To show a reduced price, move the product’s original price into Compare at
                                            price. Enter a lower value into Price.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h2 class="h4 mb-3">Inventory</h2>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="sku">SKU (Stock Keeping Unit)</label>
                                        <input type="text" name="sku" id="sku" class="form-control" placeholder="sku" value="{{ $product->sku }}">
                                        <span class="text-danger">
                                            @error('sku')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="barcode">Barcode</label>
                                        <input type="text" name="barcode" id="barcode" class="form-control"
                                            placeholder="Barcode" value="{{ $product->barcode }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="hidden" name="track_qty" id="" value="No">
                                            <input class="custom-control-input" type="checkbox" id="track_qty"
                                                name="track_qty" value="yes" {{ ($product->track_qty == 'yes' ? 'checked' : '') }} >
                                            <label for="track_qty" class="custom-control-label">Track Quantity</label>
                                            <span class="text-danger">
                                                @error('track_qty')
                                                {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <input type="number" min="0" name="qty" id="qty" class="form-control"
                                            placeholder="Qty" value="{{ $product->qty }}">
                                        <span class="text-danger">
                                            @error('qty')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="">Releated products</label>
                                        <div class="mb-3">
                                            <select multiple  class="releated_products w-100" name="releated_products[]" id="releated_products">
                                                @if(!empty($releatedproducts))
                                                @foreach ($releatedproducts as $releatedproduct)
                                                    <option selected value="{{ $releatedproduct->id }}">{{ $releatedproduct->title }}</option>
                                                @endforeach
                                                    
                                                @endif
                                            </select>
                                            <span class="text-danger">
                                                @error('is_featured')
                                                {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h2 class="h4 mb-3">Product status</h2>
                            <div class="mb-3">
                                <select name="status" id="status" class="form-control">
                                    <option {{ ($product->status == 1) ? 'selected' : '' }} value="1">Active</option>
                                    <option {{ ($product->status == 0) ? 'selected' : '' }} value="0">Block</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h2 class="h4  mb-3">Product category</h2>
                            <div class="mb-3">
                                <label for="category">Category</label>
                                <select name="category" id="category" class="form-control">
                                    <option value="">Select a category</option>
                                    @if ($categories->isNotEmpty())
                                    @foreach ($categories as $category)
                                    <option {{ ($product->category_id == $category->id) ? 'selected' : '' }}  value="{{$category->id}}">{{$category->name }}</option>

                                    @endforeach

                                    @endif
                                </select>
                                <span class="text-danger">
                                    @error('category')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="mb-3">
                                <label for="category">Sub category</label>
                                <select name="sub_category" id="sub_category" class="form-control">
                                    <option value="">Select a category</option>
                                    @if ($sub_category->isNotEmpty())
                                    @foreach ($sub_category as $subcategories)
                                    <option {{ ($product->sub_categories_id == $subcategories->id) ? 'selected' : '' }} value="{{$subcategories->id}}">{{$subcategories->name }}</option>

                                    @endforeach

                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h2 class="h4 mb-3">Product brand</h2>
                            <div class="mb-3">
                                <select name="brand" id="brand" class="form-control">
                                    <option value="">select a brand</option>
                                    @if ($brands->isNotEmpty())
                                    @foreach ($brands as $brand)
                                    <option {{ ($product->brand_id == $brand->id) ? 'selected' : '' }} value="{{$brand->id}}">{{$brand->name }}</option>

                                    @endforeach

                                    @endif

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h2 class="h4 mb-3">Featured product</h2>
                            <div class="mb-3">
                                <select name="is_featured" id="is_featured" class="form-control">
                                    <option {{ ($product->is_featured == 'No') ? 'selected' : '' }}  value="No">No</option>
                                    <option {{ ($product->is_featured == 'yes') ? 'selected' : '' }}  value="yes">Yes</option>
                                </select>
                                <span class="text-danger">
                                    @error('is_featured')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pb-5 pt-3">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('product.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
            </div>
        </div>
    </form>
    <!-- /.card -->
</section>
<!-- /.content -->
@endsection


@section('customjs')
<script>
    $('.releated_products').select2({
    ajax: {
        url: '{{ route('product.getproducts') }}',
        dataType: 'json',
        tags: true,
        multiple: true,
        minimumInputLength: 3,
        processResults: function (data) {
            return {
                results: data.tags
            };
        }
    }
});



    Dropzone.autoDiscover = false;    
const dropzone = $("#image").dropzone({ 
   
    url:  "{{ route('products-image.update') }}",
    maxFiles: 10,
    paramName: 'image',
    params: {'product_id': {{ $product->id }}},
    addRemoveLinks: true,
    acceptedFiles: "image/jpeg,image/png,image/gif",
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }, success: function(file, response){
        // $("#image_id").val(response.image_id);
        //console.log(response)
        var html = `<div class="col-md-3" id="image-row-${response.image_id}"><div class="card">
            
    <img src="${response.ImagePath}" class="card-img-top" alt="">
    <input type="hidden" name="image_array[]" id="" value="${response.image_id}">
    <div class="card-body">
        <a href="javascript:void(0)" onclick="deleteimage(${response.image_id})" class="btn btn-danger">Delete</a>
    </div>
</div></div>` ;
$("#product-gallery").append(html);
       
    },
    complete: function(file){
        this.removefile(file);
    }
});

function deleteimage(id){
    $("#image-row-"+id).remove();
    if(confirm("Are you sure you want to delete image?")) {
        $.ajax({
        url: '{{ route('products-image.delete') }}',
        type: 'delete',
        data: {id:id},
        success: function(response){
            if(response.status == true){
                alert(response.message)
            }
            else{
                alert(response.message)

            }
        }

    });
    }
}
</script>
@endsection


