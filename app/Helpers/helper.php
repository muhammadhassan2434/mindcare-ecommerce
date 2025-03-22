<?php

use App\Models\category;
use App\Models\productimages;
use App\Models\subcategory;
use Illuminate\Support\Facades\DB;


function getcategories(){
    return  Category::where('status', 1)
    ->where('showhome', 'Yes')
    ->with('sub_category') // Eager loading the sub_category relationship
    ->orderBy('name', 'ASC')
    ->orderBy('id', 'DESC')
    ->get();
}


function getProductImages($productId){
    return productimages::where('product_id', $productId)->first();
}


?>