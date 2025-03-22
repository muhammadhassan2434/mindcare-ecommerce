<?php

namespace App\Http\Controllers;

use App\Models\brands;
use App\Models\category;
use App\Models\product;
use App\Models\subcategory;
use Illuminate\Http\Request;

class shopcontroller extends Controller
{
    public function index(Request $request,$categoryslug = null,$subcategoryslug = null){
        $categoryselected = '';
        $subcategoryselected = '';
        $brandarray = [];
       

        $categories = category::orderBy('name','ASC')->with('sub_category')->where('status',1)->get();
        $brands = brands::orderBy('name','ASC')->where('status',1)->get();
        $products = product::where('status',1);
         // Apply category filter
    if (!empty($categoryslug)) {
        $category = Category::where('slug', $categoryslug)->first();
        if ($category) {
            $products = $products->where('category_id', $category->id);
            $categoryselected = $category->id;
        }
    }
        
        

        // apply filters here
        if(!empty($categoryslug)){
            $category = category::where('slug',$categoryslug)->first();
            $products =  $products->where('category_id',$category->id);
            $categoryselected = $category->id;
        }
        
        if(!empty($subcategoryslug)){
            $subcategory = subcategory::where('slug',$subcategoryslug)->first();
            $products =  $products->where('sub_categories_id',$subcategory->id);
            $subcategoryselected = $subcategory->id;
        }

        if(!empty($request->get('brand'))){
            $brandarray = explode(',',$request->get('brand'));
            $products = $products->whereIn('brand_id',$brandarray);
        }
        
        if($request->get('price_max') != '' && $request->get('price_min') != ''){
            if($request->get('price_max') == 1000){
                $products = $products->whereBetween('price',[intval($request->get('price_min')),1000000]);
            }
            else{
                $products = $products->whereBetween('price',[intval($request->get('price_min')),intval($request->get('price_max'))]);

            }

        }



        

        if($request->get('sort') != ''){
            if($request->get('sort') == 'latest'){
                $products = $products->orderBy('id','DESC');
            }
            else if($request->get('sort') == 'price_asc'){
                    $products = $products->orderBy('price','ASC');
                }
                else{
                    $products = $products->orderBy('price','DESC');   
                }
            }
            else{ 
                $products = $products->orderBy('id','DESC');
            }
        $products = $products->paginate(6);

        // $allproducts = product::where('is_featured','yes')
        //  ->orderBy('id','DESC')->take(8)
        //  ->where('status',1)->get();
        //  $data['feturedproducts'] = $allproducts;


         
         $leatest_products = product::orderBy('id','DESC')->where('status',1)
         ->take(4)->get();
         $data['leatest_products'] = $leatest_products;

        $data['categories'] = $categories;
        $data['brands'] = $brands;
        $data['leatest_products'] = $leatest_products;
        // $data['allproducts'] = $allproducts;
        $data['products'] = $products;
        $data['categoryselected'] = $categoryselected;
        $data['subcategoryselected'] = $subcategoryselected;
        $data['brandarray'] = $brandarray;
        $data['pricemax'] = (intval($request->get('price_max')) == 0 ? 1000 : $request->get('price_max'));
        $data['pricemin'] = intval($request->get('price_min'));
        $data['sort'] = $request->get('sort');

        return view('front.shop',$data);
    }

    public function product($slug)
    {
        $product = Product::where('slug', $slug)->with('product_images','category','brand')->first();
        $categories = category::all();
        if (!$product) {
            abort(404);
        }

        // Fetch related products (optional)
        $relatedProducts = Product::where('category_id', $product->category_id)
                                  ->where('id', '!=', $product->id)
                                  ->take(4)
                                  ->get();

        return view('front.product', compact('product', 'relatedProducts','categories'));
    }

    public function show_products(){
        $products = product::where('is_featured','yes')
         ->orderBy('id','DESC')->take(8)
         ->where('status',1)->get();
         $data['feturedproducts'] = $products;


         
         $leatest_products = product::orderBy('id','DESC')->where('status',1)
         ->take(4)->get();
         $data['leatest_products'] = $leatest_products;
        return view('front.shop',$data);
    }
    Public function healthAndBeauty(Request $request,$categoryslug = null,$subcategoryslug = null){
        $categoryselected = '';
        $subcategoryselected = '';
        $brandarray = [];

        $healthAndbeaty = category::where('name','Health And Beauty')->get();
         $healthAndbeaty_id = $healthAndbeaty[0]->id;

        $categories = category::orderBy('name','ASC')->with('sub_category')->where('status',1)->get();
        $brands = brands::orderBy('name','ASC')->where('status',1)->get();
        $products = product::where('category_id',$healthAndbeaty_id)->where('status',1);

        // apply filters here
        if(!empty($categoryslug)){
            $category = category::where('slug',$categoryslug)->first();
            $products =  $products->where('category_id',$category->id);
            $categoryselected = $category->id;
        }
        
        if(!empty($subcategoryslug)){
            $subcategory = subcategory::where('slug',$subcategoryslug)->first();
            $products =  $products->where('sub_categories_id',$subcategory->id);
            $subcategoryselected = $subcategory->id;
        }

        if(!empty($request->get('brand'))){
            $brandarray = explode(',',$request->get('brand'));
            $products = $products->whereIn('brand_id',$brandarray);
        }
        
        if($request->get('price_max') != '' && $request->get('price_min') != ''){
            if($request->get('price_max') == 1000){
                $products = $products->whereBetween('price',[intval($request->get('price_min')),1000000]);
            }
            else{
                $products = $products->whereBetween('price',[intval($request->get('price_min')),intval($request->get('price_max'))]);

            }

        }



        

        if($request->get('sort') != ''){
            if($request->get('sort') == 'latest'){
                $products = $products->orderBy('id','DESC');
            }
            else if($request->get('sort') == 'price_asc'){
                    $products = $products->orderBy('price','ASC');
                }
                else{
                    $products = $products->orderBy('price','DESC');   
                }
            }
            else{ 
                $products = $products->orderBy('id','DESC');
            }
        $products = $products->paginate(6);

        // $allproducts = product::where('is_featured','yes')
        //  ->orderBy('id','DESC')->take(8)
        //  ->where('status',1)->get();
        //  $data['feturedproducts'] = $allproducts;


         
         $leatest_products = product::orderBy('id','DESC')->where('status',1)
         ->take(4)->get();
         $data['leatest_products'] = $leatest_products;

        $data['categories'] = $categories;
        $data['brands'] = $brands;
        $data['leatest_products'] = $leatest_products;
        // $data['allproducts'] = $allproducts;
        $data['products'] = $products;
        $data['categoryselected'] = $categoryselected;
        $data['subcategoryselected'] = $subcategoryselected;
        $data['brandarray'] = $brandarray;
        $data['pricemax'] = (intval($request->get('price_max')) == 0 ? 1000 : $request->get('price_max'));
        $data['pricemin'] = intval($request->get('price_min'));
        $data['sort'] = $request->get('sort');


        return view('front.healthAndBeauty',$data);
    }
}
