<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\category;
use App\Http\Controllers\Controller;
use App\Models\category as ModelsCategory;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Psy\Command\WhereamiCommand;

use function Laravel\Prompts\alert;

class categorycontroller extends Controller
{
    public function index(Request $req)
    {
        $categories = ModelsCategory::latest();
        if (!empty($req->get('keyword'))) {
            $categories = $categories->where('name', 'like', '%' . $req->get('keyword') . '%');
        }
        $categories = $categories->paginate(10);
        return view('admin.category.list', ['data' => $categories]);
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories',
            'showhome' => 'required',
        ]);

        $fileName = '';
        if ($req->hasFile('image')) {
            $fileName = $req->getSchemeAndHttpHost() . "/admin-assests/img/cat_img/" . time() . '.' . $req->image->extension();
            $req->image->move(public_path('/admin-assests/img/cat_img/'), $fileName);
        }

        $store = DB::table('categories')
            ->insert([
                'name' => $req->name,
                'slug' => $req->slug,
                'image' => $fileName,
                'status' => $req->status,
                'showhome' => $req->showhome,
            ]);
        if ($store) {
            return  redirect()->route('category.index');
        } else {
            echo 'something went wrong ';
        }
    }

    public function edit($id, Request $req)
    {
        $find_data = DB::table('categories')
            ->find($id);
        return view('admin.category.edit', ['data' => $find_data]);
    }


    public function update($id,Request $req)
    {
        $fileName = '';
        if ($req->hasFile('image')) {
            $fileName = $req->move_uploaded_file  . time() . '.' . $req->image->extension();
            $req->image->move(public_path('/admin-assests/img/cat_img/'), $fileName);
        }

        $update = DB::table('categories')
        ->where('id',$id)
            ->update([
                'name' => $req->name,
                'slug' => $req->slug,
                'image' => $fileName,
                'status' => $req->status,
                'showhome' => $req->showhome,
            ]);
        if ($update) {
            return  redirect()->route('category.index');
        } else {
            echo 'something went wrong ';
        }
    }

    public function destory($id)
    {
        $delete = DB::table('categories')
        ->where('id', $id)
        ->delete();
        if($delete){
           
            return redirect()->route('category.index');
        }
    }
}
