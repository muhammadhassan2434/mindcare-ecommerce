<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class subcategoryController extends Controller
{
    public function index(Request $req)
    {
        $sub_cat = DB::table('sub_category')
            ->select('sub_category.*', 'categories.name as categoryName')
            ->latest('id')
            ->leftJoin('categories', 'categories.id', 'sub_category.category_id')
            ->paginate(10);
        if (!empty($req->get('keyword'))) {
            $sub_cat = DB::table('sub_category')->where('category.name', 'like', '%' . $req->get('keyword') . '%');
        }
        // ->get();
        return view('admin.sub_category.list', ['data' => $sub_cat]);
    }


    public function create()
    {
        $category = category::orderBy('name', 'ASC')->get();
        return view('admin.sub_category.create', ['data' => $category]);
    }

    public function store(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'slug' => 'required|unique:sub_category',
            'category_id' => 'required',
            'status' => 'required',
            'showhome' => 'required'
        ]);

        $sub_cat = DB::table('sub_category')
            ->insert([
                'name' => $req->name,
                'slug' => $req->slug,
                'category_id' => $req->category_id,
                'status' => $req->status,
                'showhome' => $req->showhome,
            ]);

        if ($sub_cat) {
            return redirect()->route('sub-category.index');
        } else {
            echo 'something wents wrong try later';
        }
    }

    public function edit($id, Request $req)
    {
        $sub_category = DB::table('sub_category')->find($id);
        if(empty($sub_category)){
            // $req->session()->flash('error','record not found');
            return redirect()->route('sub-category.index');
        }

        $categories = category::orderBy('name', 'ASC')->get();
        $data['categories'] = $categories;
        $data['sub_category'] = $sub_category;
        return view('admin.sub_category.edit' ,$data);
    }



    public function update($id, Request $req)
    { 
        $update = DB::table('sub_category')
        ->where('id',$id)
        ->update([
            'name' => $req->name,
            'slug' => $req->slug,
            'category_id' => $req->category_id,
            'status' => $req->status,
            'showhome' => $req->showhome,
        ]);

        if($update){
            return redirect()->route('sub-category.index');
        }
    }


    public function destory($id)
    {
        $delete = DB::table('sub_category')
        ->where('id', $id)
        ->delete();
        if($delete){
           
            return redirect()->route('sub-category.index');
        }
    }
}
