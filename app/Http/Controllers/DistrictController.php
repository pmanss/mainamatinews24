<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\division;
use App\district;
use DB;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function index() {
        $div = division::all();
        $json = $this->tableJson();
        return view('admin.pages.district', ['div' => $div, 'dis' => $json]);
    }

    public function create(Request $request) {
        $this->validate($request, [
            'name' => 'required',
        ]);
//        echo $request->name;
//        exit();
        $category = new District;
        $category->disid = $request->disid;
        $category->name = $request->name;
        $category->save();

        return redirect('Admin/district')->with('status', 'Added Successfully!');
    }

    private function tableJson()
    {
        $json = DB::table('districts')
                ->join('divisions', 'districts.disid', '=', 'divisions.id')
                ->select('districts.*', 'divisions.name as divname')
                ->get();

        return $json;
    }

    public function show($id) {
        //echo "string"; die();
        $div = division::all();
        $jsondata = district::find($id);
        $json = $this->tableJson();
        return view('admin.pages.district',['dis' => $json,'div' => $div, 'edit'=>$jsondata]);
    }
    
    public function update(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required',
        ]);
//        echo $request->name;
//        exit();
        $category = district::find($id);
        $category->name = $request->name;
        $category->save();

        return redirect('Admin/district')->with('status', 'Updated Successfully !');
    }

    public function destroy($id) {
        $json=district::find($id);
        $json->delete();
         return redirect('Admin/district')->with('status', 'Deleted Successfully!');
    }
}
