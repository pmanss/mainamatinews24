<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\reporter;
use Illuminate\Http\Request;

class ReporterController extends Controller {

    public function index() {
        $rep = reporter::all();
        return view('admin.pages.reporter',['rep' => $rep]);
        
    }

    public function create(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);
//        echo $request->name;
//        exit();
        $reporter = new Reporter;
        $reporter->name = $request->name;
        $reporter->address = $request->address;
        $reporter->phone = $request->phone;
        $reporter->email = $request->email;
        $reporter->save();

        return redirect('Admin/reporter')->with('status', 'Reporter Added Successfully!');
    }

    public function show($id) {
        $rep = reporter::all();
        $data = reporter::find($id);
        return view('admin.pages.reporter',['rep' => $rep,'data' => $data]);
    }
    
    
    

    public function update(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);
//        echo $request->name;
//        exit();
        $reporter = Reporter::find($id);
        $reporter->name = $request->name;
        $reporter->address = $request->address;
        $reporter->phone = $request->phone;
        $reporter->email = $request->email;
        $reporter->save();

        return redirect('Admin/reporter')->with('status', 'Updated Successfully !');
    }

    public function destroy($id) {
        $json=Reporter::find($id);
        $json->delete();
         return redirect('Admin/reporter')->with('status', 'Reporter Deleted Successfully!');
    }

}
