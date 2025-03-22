<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\tempimage;
use Illuminate\Http\Request;
use Image;

class tempimagecontroller extends Controller
{
    public function create(Request $request){
        $image = $request->image;
        
        if(!empty($image)){
            $ext = $image->getClientOriginalExtension();
            $newName = time().'.'.$ext;

            $tempimage = new tempimage();
            $tempimage->name = $newName;
            $tempimage->save();

            $image->move(public_path().'/temp',$newName);

            // generate thumbnail
            $sourcepath = public_path().'/temp/'.$newName;
            $destpath = public_path().'/temp/thumb/'.$newName;
            $image = Image::make($sourcepath);
            $image->fit(300,275);
            $image->save($destpath);
            

            return response()->json([
                'status' => true,
                'image_id' => $tempimage->id,
                'ImagePath' => asset('/temp/thumb/'.$newName),
                'message' => 'image uploaded successfully'
            ]);
            
        }
    }
}
