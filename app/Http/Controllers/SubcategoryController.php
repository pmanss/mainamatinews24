<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\category;
use App\subcategory;
use DB;
use Illuminate\Http\Request;

class SubcategoryController extends Controller {

    public function index() {
        $cat = category::all();
        $json = $this->tableJson();
        return view('admin.pages.sub_category', ['cat' => $cat, 'subcat' => $json]);
    }


    private function tableJson()
    {
        $json = DB::table('subcategories')
                ->join('categories', 'subcategories.cid', '=', 'categories.id')
                ->select('subcategories.*', 'categories.name as cname')
                ->get();

        return $json;
    }

    public function create(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'cid' => 'required',
        ]);
//        echo $request->name;
//        exit();
        $subcategory = new Subcategory;
        $subcategory->name = $request->name;
        $subcategory->cid = $request->cid;
        $subcategory->save();

        return redirect('Admin/sub_category')->with('status', 'Sub Page Name Added Successfully!');
    }

    public function show($id) {
        $cat = category::all();
        $jsonData = subCategory::find($id);
        $json = $this->tableJson();
        return view('admin.pages.sub_category', ['subcat' => $json, 'cat' => $cat,'edit'=>$jsonData]);
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required',
            'cid' => 'required',
        ]);
//        echo $request->name;
//        exit();
        $subcategory = subCategory::find($id);
        $subcategory->name = $request->name;
        $subcategory->cid = $request->cid;
        $subcategory->save();

        return redirect('Admin/sub_category')->with('status', 'Updated Successfully !');
    }

    public function destroy($id) {
        $json = subcategory::find($id);
        $json->delete();
        return redirect('Admin/sub_category')->with('status', 'Sub Page Name Deleted Successfully!');
    }

}
