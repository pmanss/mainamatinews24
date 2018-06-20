<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\breakingnews;
use App\ComposeNews;
use DB;
class BreakingnewsController extends Controller
{
    public function index() {
        $com=  ComposeNews::orderBy('id', 'DESC')->get();
        $json = $this->tableJson();
        return view('admin.pages.breakingnews', ['com_news'=>$com , 'data'=>$json ]);
    }
    public function tableJson() {
        $json = DB::table('breakingnews')
               ->join('compose_news', 'breakingnews.com_news_id', '=', 'compose_news.id')
//                ->where('compose_news.id','=', 'breakingnews.com_news_id')
                ->select('breakingnews.*', 'compose_news.heading as heading')
                ->orderBy('breakingnews.id', 'DESC')
                ->get();
        return $json;
    }
    public function create(Request $request) {

        $this->validate($request, [
            'com_news_id' => 'required',
           
        ]);
        //echo $request->status;        die();
        $news = new breakingnews;
        $news->com_news_id = $request->com_news_id;
        $news->status = $request->status ? $request->status:0;
        $news->save();

        

        return back()->with('status', ' Added Successfully!');
    }
    public function destroy($id) {
        $json = breakingnews::find($id);
        $json->delete();
        return back()->with('status', 'Deleted Successfully!');
    }
}
