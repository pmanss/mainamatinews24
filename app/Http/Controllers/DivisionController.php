<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\division;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    public function index() {
        $div = division::all();
        return view('admin.pages.divisions',['div' => $div]);
        
    }

    public function create(Request $request) {
        $this->validate($request, [
            'name' => 'required',
        ]);
//        echo $request->name;
//        exit();
        $category = new Division;
        $category->name = $request->name;
        $category->save();

        return redirect('Admin/divisions')->with('status', 'Added Successfully!');
    }

    public function show($id) {
        //echo "string"; die();
        $data = division::find($id);
        return view('admin.pages.divisions',['data' => $data]);
    }
    
    public function update(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required',
        ]);
//        echo $request->name;
//        exit();
        $category = division::find($id);
        $category->name = $request->name;
        $category->save();

        return redirect('Admin/divisions')->with('status', 'Updated Successfully !');
    }

    public function destroy($id) {
        $json=division::find($id);
        $json->delete();
         return redirect('Admin/divisions')->with('status', 'Deleted Successfully!');
    }
    
}
