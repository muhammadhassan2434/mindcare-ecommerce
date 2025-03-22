<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\productimages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Image;

class productimagescontroller extends Controller
{
    public function update(Request $request)
    {
        $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $sourcePath = $image->getPathName();

        $productimage = new productimages();
        $productimage->product_id = $request->product_id;
        $productimage->image = 'NULL';
        $productimage->save();

        $imageName = $request->product_id.'-'.$productimage->id.'-'.time().'.'.$ext;
        $productimage->image = $imageName;
        $productimage->save();

         //large image
         
         $destPath =  public_path() . '/uploads/product/large/' . $imageName;
         $image = Image::make($sourcePath);
         $image->resize(1400, null, function ($constraint) {
             $constraint->aspectRatio();
         });
         $image->save($destPath);


         // small image
         $destPath =  public_path() . '/uploads/product/small/' . $imageName;
         $image = Image::make($sourcePath);
         $image->fit(300, 300);
         $image->save($destPath);


         return response()->json([
            'status' => true,
            'image_id' => $productimage->id,
            'imagePath' => asset('uploads/product/small/'.$productimage->image),
            'message' => 'image saved succesfully',
         ]);
    }

    public function destory(Request $request){
        $productimage = productimages::find($request->id);

        if(empty($productimage)){
            return response()->json([
                'status' => false,
                'message' => 'image not found',
            ]);
        }
        // delete images from folder
        File::delete(public_path('uploads/product/large/'.$productimage->image));
        File::delete(public_path('uploads/product/small/'.$productimage->image));

        $productimage->delete();

        return response()->json([
            'status' => true,
            'message' => 'image deleted successfully',
        ]);
    }
}
