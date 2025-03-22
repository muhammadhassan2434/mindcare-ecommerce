<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\brands;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class brandController extends Controller
{
    public function index(Request $req){
        $brands = brands::latest();
        if (!empty($req->get('keyword'))) {
            $brands = $brands->where('name', 'like', '%' . $req->get('keyword') . '%');
        }
        $brands = $brands->paginate(10);

        return view('admin.brands.list' , ['data' => $brands]);
    }
    public function create(){
        return view('admin.brands.create');
    }


    public function store(Request $request){
       $request->validate([
        'name' => 'required',
        'slug' => 'required|unique:brands',
       ]);

       $brands = DB::table('brands')
       ->insert([
        'name' => $request->name,
        'slug' => $request->slug,
        'status' => $request->status,
       ]); 

       if($brands){
           return redirect()->route('brands.index');
        }else{
            echo ' error';
        }
    }
    
    public function edit($id, Request $request){
        $brands = brands::find($id);
        
        if(empty($brands)){
            return redirect()->route('brands.index');
        }

        return view('admin.brands.edit', ['data' => $brands]);
    }

    public function update($id,Request $request){
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:brands',
           ]);

        $brands = DB::table('brands')
        ->where('id',$id)
       ->update([
        'name' => $request->name,
        'slug' => $request->slug,
        'status' => $request->status,
       ]);

       if($brands){
        return redirect()->route('brands.index');
       }
       else{
        echo 'erorr';
       }
    }

    public function destroy($id){
        $delete = DB::table('brands')
        ->where('id', $id)
        ->delete();
        if($delete){
           
            return redirect()->route('brands.index');
        }
    }
}
