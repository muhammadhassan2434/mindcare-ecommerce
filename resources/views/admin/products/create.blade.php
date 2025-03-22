@extends('admin.layouts.app')


@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create Product</h1>
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
    <form id="product-form" action="{{ route('products.store') }}" method="post">
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
                                            placeholder="Title">
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
                                            placeholder="slug">
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
                                        <textarea name="short_description" id="" cols="100" rows="" placeholder="Short description"></textarea>
                                    </div>
                                    
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="description">Description</label> <br>
                                        <textarea name="description" id="description" cols="100" rows=""
                                            class="summernote" placeholder="Description"></textarea>
                                    </div>
                                    
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="description">shipping and returns</label> <br>
                                        <textarea name="shipping_returns" id="shipping_returns" cols="100" rows=""
                                            class="summernote" placeholder="Shipping and returns"></textarea>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <label for="images">Images</label>
                        <div id="image-upload" class="dropzone"></div>
                        @error('images')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                    </div>
                    <div class="row" id="product-gallery">

                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h2 class="h4 mb-3">Pricing</h2>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="price">Price</label>
                                        <input type="text" name="price" id="price" class="form-control"
                                            placeholder="Price">
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
                                            placeholder="Compare Price">
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
                                        <input type="text" name="sku" id="sku" class="form-control" placeholder="sku">
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
                                            placeholder="Barcode">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="hidden" name="track_qty" id="" value="No">
                                            <input class="custom-control-input" type="checkbox" id="track_qty"
                                                name="track_qty" value="yes" checked>
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
                                            placeholder="Qty">
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
                                    <option value="1">Active</option>
                                    <option value="0">Block</option>
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
                                    <option value="{{$category->id}}">{{$category->name }}</option>

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
                                    <option value="{{$subcategories->id}}">{{$subcategories->name }}</option>

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
                                    <option value="{{$brand->id}}">{{$brand->name }}</option>

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
                                    <option value="No">No</option>
                                    <option value="yes">Yes</option>
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
                <button type="submit" class="btn btn-primary">Create</button>
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


</script>
<script>
    Dropzone.options.imageUpload = {
        url: "{{ route('products.store') }}",
        maxFilesize: 2,
        acceptedFiles: 'image/*',
        addRemoveLinks: true,
        autoProcessQueue: false,
        parallelUploads: 10,
        uploadMultiple: true,
        paramName: "images",
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        init: function() {
            var myDropzone = this;

            // Form submit event
            document.getElementById('product-form').addEventListener('submit', function(e) {
                e.preventDefault();
                e.stopPropagation();
                
                if (myDropzone.getQueuedFiles().length > 0) {
                    myDropzone.processQueue(); // Uploads the images
                } else {
                    this.submit(); // Submits the form if no images are uploaded
                }
            });

            // Append form data to the request
            myDropzone.on("sendingmultiple", function(file, xhr, formData) {
                $("#product-form").serializeArray().forEach(function(field) {
                    formData.append(field.name, field.value);
                });
            });

            // Success handling
            myDropzone.on("successmultiple", function(files, response) {
                window.location.href = "{{ route('product.index') }}"; // Redirect on success
            });

            // Error handling
            myDropzone.on("errormultiple", function(files, response) {
                alert('Error: ' + response.message); // Display the error message
            });
        }
    };
</script>
 
@endsection


