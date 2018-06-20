<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\advertisement;
use App\AddsPosition;
use DB;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    public function index() {
        $AddsPosition = AddsPosition::all();
        $json = $this->tableJson();
        //dd($json);
        return view('admin.pages.advertisement', ['adds_position' => $AddsPosition, 'adds' => $json]);
    }


    private function tableJson()
    {
        $json = DB::table('advertisements')
                // ->leftjoin('adds_positions', 'advertisements.adds_position_id', '=', 'adds_positions.id')
                // ->select('advertisements.*', 'adds_positions.name as apname','adds_positions.id')
                ->orderBy('advertisements.id', 'ASC')
                ->get();

        return $json;
    }

    public function create(Request $request) {
        
       $this->validate($request, [
            'add_title' => 'required',
            'add_link' => 'required',
            'add_image' => 'required',
        ]);
       // echo $request->isactive;
       // exit();

       $isactive = $request->isactive ? 1 : 0;



    //    $filename = time().'.'.$request->add_image->getClientOriginalExtension();
  		// $request->add_image->move(public_path('upload/adds'), $filename);
        $filename="";
        if (!empty($request->file('add_image'))) {
            $img = $request->file('add_image');
            $upload = 'upload/adds';
            //$filename=$img->getClientOriginalName();
            $filename = time() . "." . $img->getClientOriginalExtension();
            $success = $img->move($upload, $filename);
        }

        // echo $filename; die();
        $advertisement = new Advertisement;
        $advertisement->add_title = $request->add_title;
        $advertisement->add_link = $request->add_link;
        $advertisement->add_image = $filename;
        $advertisement->adds_position_id = $request->adds_position_id;
        $advertisement->isactive = $isactive;
        $advertisement->save();

        return redirect('Admin/advertisement')->with('status', ' Added Successfully!');
    }

    public function show($id) {
        $AddsPosition = AddsPosition::all();
        $jsonData = advertisement::find($id);
        $json = $this->tableJson();
        return view('admin.pages.advertisement', ['adds' => $json,'adds_position' => $AddsPosition,'edit'=>$jsonData]);
    }

    public function update(Request $request, $id) {
     
        $filename=$request->eximage;
         // echo $filename; print_r($request->eximage); die();
        if (!empty($request->file('add_image'))) {
            $img = $request->file('add_image');
            $upload = 'upload/adds';
            //$filename=$img->getClientOriginalName();
            $filename = time() . "." . $img->getClientOriginalExtension();
            $success = $img->move($upload, $filename);
        }
        $isactive = $request->isactive ? 1 : 0;

        // echo $filename; die();
        $advertisement = Advertisement::find($id);
        $advertisement->add_title = $request->add_title;
        $advertisement->add_link = $request->add_link;
        $advertisement->add_image = $filename;
        $advertisement->adds_position_id = $request->adds_position_id;
        $advertisement->isactive = $isactive;
        $advertisement->save();

       

        return redirect('Admin/advertisement')->with('status', 'Updated Successfully !');
    }

    public function destroy($id) {
        $json = advertisement::find($id);
        $json->delete();
        return redirect('Admin/advertisement')->with('status', 'Deleted Successfully!');
    }
}
