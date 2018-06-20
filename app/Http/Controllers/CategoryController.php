<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $cat = category::all();
        return view('admin.pages.category',['cat' => $cat]);
        
    }

    public function create(Request $request) {
        $this->validate($request, [
            'name' => 'required',
        ]);
//        echo $request->name;
//        exit();
        $category = new Category;
        $category->name = $request->name;
        $category->save();

        return redirect('Admin/category')->with('status', 'Page Name Added Successfully!');
    }

    public function show($id) {
        //echo "string"; die();
        $data = category::find($id);
        return view('admin.pages.category',['data' => $data]);
    }
    
    public function update(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required',
        ]);
//        echo $request->name;
//        exit();
        $category = category::find($id);
        $category->name = $request->name;
        $category->save();

        return redirect('Admin/category')->with('status', 'Updated Successfully !');
    }

    public function destroy($id) {
        $json=category::find($id);
        $json->delete();
         return redirect('Admin/category')->with('status', 'Page Name Deleted Successfully!');
    }
}
