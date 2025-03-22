<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\brands;
use App\Models\category;
use App\Models\product;
use App\Models\productimages;
use App\Models\subcategory;
use App\Models\tempimage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
// use Image;
use Illuminate\Support\Str; // Import Str for string manipulation
use Illuminate\Support\Facades\Log;

class productcontroller extends Controller
{
    public function index(Request $request)
    {
        // Fetch products with associated images, ordered by the latest
        $products = product::with('product_images')
            ->latest('id');
    
        // Apply keyword search if provided
        if ($request->filled('keyword')) {
            $products = $products->where('title', 'like', '%' . $request->keyword . '%');
        }
    
        // Paginate the results
        $products = $products->paginate();
    
        // Pass the data to the view
        return view('admin.products.list', ['products' => $products]);
    }
    
    public function create()
    {
        $data = [];
        $categories = category::orderBy('name', 'ASC')->get();
        $brands = brands::orderBy('name', 'ASC')->get();
        $sub_category = DB::table('sub_category')->orderBy('name', 'ASC')->get();
        $data['categories'] = $categories;
        $data['brands'] = $brands;
        $data['sub_category'] = $sub_category;
        return view('admin.products.create', $data);
    }

  public function store(Request $request)
{
    // Validate the request
    $validatedData = $request->validate([
        'title' => 'required',
        'slug' => 'required|unique:products',
        'price' => 'required|numeric',
        'sku' => 'required|unique:products',
        'track_qty' => 'required|in:yes,No',
        'category' => 'required|numeric',
        'is_featured' => 'required|in:yes,No',
        'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate each image
    ]);

    // Additional validation if tracking quantity is enabled
    if (!empty($request->track_qty) && $request->track_qty == 'yes') {
        $validatedData['qty'] = $request->validate([
            'qty' => 'required|numeric',
        ])['qty'];
    }

    // Perform the product insertion
    $productId = DB::table('products')
        ->insertGetId([
            'title' => $request->title,
            'slug' => $request->slug,
            'description' => $request->description,
            'price' => $request->price,
            'compare_price' => $request->compare_price,
            'sku' => $request->sku,
            'barcode' => $request->barcode,
            'track_qty' => $request->track_qty,
            'qty' => $request->qty,
            'category_id' => $request->category,
            'sub_categories_id' => $request->sub_category,
            'brand_id' => $request->brand,
            'is_featured' => $request->is_featured,
            'shipping_returns' => $request->shipping_returns,
            'short_description' => $request->short_description,
            'releated_products' => (!empty($request->releated_products)) ? implode(',', $request->releated_products) : '',
        ]);

    // Check if the insertion was successful and handle image uploads
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            try {
                $destinationPath = public_path('uploads/product');

                // Create the folder if it doesn't exist
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0755, true);
                }

                $fileName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
                $image->move($destinationPath, $fileName);

                // Save the image path in the database
                productimages::create([
                    'product_id' => $productId,  // Use the correct product ID
                    'image' => 'uploads/product/' . $fileName,
                ]);
            } catch (\Exception $e) {
                Log::error('Image upload error: ' . $e->getMessage());
                return redirect()->back()->with('error', 'Failed to upload one or more images.');
            }
        }
    }

    // Redirect to the product index if insertion was successful
    return redirect()->route('product.index')->with('success', 'Product created successfully.');
}



    public function edit($id, Request $request)
    {
        $product = product::find($id);
        if (empty($product)) {
            return redirect()->route('product.index')->with('error', 'product not found');
        }

        // fetch releated products
        $releatedproducts = [];
        if ($product->releated_products != '') {
            $productarray = explode(',', $product->releated_products);

            $releatedproducts = product::whereIn('id', $productarray)->with('product_images')->get();
        }


        // fetch product images
        $productimages = productimages::where('product_id', $product->id)->get();

        $data = [];
        $data['product'] = $product;
        $categories = category::orderBy('name', 'ASC')->get();
        $brands = brands::orderBy('name', 'ASC')->get();
        $sub_category = DB::table('sub_category')->orderBy('name', 'ASC')->get();
        $data['categories'] = $categories;
        $data['brands'] = $brands;
        $data['sub_category'] = $sub_category;
        $data['productimages'] = $productimages;
        $data['releatedproducts'] = $releatedproducts;
        return view('admin.products.edit', $data);
    }

   public function update($id, Request $request)
{
    $product = product::find($id);
    if (!$product) {
        return redirect()->route('product.index')->with('error', 'Product not found.');
    }

    $request->validate([
        'title' => 'required',
        'slug' => 'required|unique:products,slug,' . $id,
        'price' => 'required|numeric',
        'sku' => 'required|unique:products,sku,' . $id,
        'track_qty' => 'required|in:yes,no',
        'category' => 'required|numeric',
        'is_featured' => 'required|in:yes,no',
        'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate each image
    ]);

    if ($request->track_qty == 'yes') {
        $request->validate([
            'qty' => 'required|numeric',
        ]);
    }

    $product->title = $request->title;
    $product->slug = $request->slug;
    $product->description = $request->description;
    $product->price = $request->price;
    $product->compare_price = $request->compare_price;
    $product->sku = $request->sku;
    $product->barcode = $request->barcode;
    $product->track_qty = $request->track_qty;
    $product->qty = $request->qty;
    $product->category_id = $request->category;
    $product->sub_categories_id = $request->sub_category;
    $product->brand_id = $request->brand;
    $product->is_featured = $request->is_featured;
    $product->shipping_returns = $request->shipping_returns;
    $product->short_description = $request->short_description;
    $product->releated_products = !empty($request->releated_products) ? implode(',', $request->releated_products) : '';

    // Handle uploaded images
   if ($request->hasFile('images')) {
    foreach ($request->file('images') as $image) {
        try {
            // Generate a unique file name
            $fileName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();

            // Define the destination path
            $destinationPath = public_path('uploads/product');

            // Ensure the directory exists
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            // Move the image to the destination folder
            $imagePath = $image->move($destinationPath, $fileName);

            if ($imagePath) {
                // Save image path to the database
                productimages::create([
                    'product_id' => $product->id, // Use the current product ID
                    'image' => 'uploads/product/' . $fileName,
                ]);
            } else {
                // Log or handle error if the file could not be moved
                Log::error('Failed to move image: ' . $image->getClientOriginalName());
                return redirect()->back()->with('error', 'Failed to upload one or more images.');
            }
        } catch (\Exception $e) {
            Log::error('Image upload error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred during image upload.');
        }
    }
}


    // Save product changes
    $product->save();

    if ($product) {
        return redirect()->route('product.index')->with('success', 'Product updated successfully.');
    } else {
        return redirect()->route('product.index')->with('error', 'Failed to update product.');
    }
}



    public function destory($id, Request $request)
    {
        $product = product::find($id);
        if (empty($product)) {
            return redirect()->route('product.index');
        }

        $productimages = productimages::where('product_id', $id)->get();

        if (!empty($productimages)) {
            foreach ($productimages as $productimage) {
                File::delete(public_path('uploads/product/large/' . $productimage->image));
                File::delete(public_path('uploads/product/small/' . $productimage->image));
            }
            productimages::where('product_id')->delete();
        }
        $product->delete();

        if ($product) {
            return redirect()->route('product.index');
        }
    }


    public function getproducts(Request $request)
    {

        $tempproduct = [];
        if ($request->term != "") {
            $products = product::Where('title', 'like', '%' . $request->term . '%')->get();

            if ($products != NULL) {
                foreach ($products as $product) {
                    $tempproduct[] = array('id' => $product->id, 'text' => $product->title);
                }
            }
        }

        return response()->json([
            'tags' => $tempproduct,
            'status' => true,
        ]);
    }
}
