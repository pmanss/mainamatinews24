<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ComposeNews;
use App\category;
use App\subcategory;
use App\reporter;
use App\division;
use App\district;
use App\TopNewsPosition;
use App\TopNews;
use App\TopGalleryPosition;
use App\TopGallery;
use App\RelatedNews;
use DB;
use View;
use Illuminate\Http\Request;

class ComposeNewsController extends Controller {

    public function index() {
        $cat = category::all();
        $subcat = $this->ajaxsubcat();
        $rep = reporter::all();
        $div = division::all();
        $dist = district::all();
        $top_news_positions = TopNewsPosition::all();
        $top_gallery_positions = TopGalleryPosition::all();
        $json = $this->tableJson();
        $tableRelatedNewsJson = $this->tableRelatedNewsJson();
        return view('admin.pages.news_article', 
            [
                'cat' => $cat, 
                'subcat' => $subcat, 
                'rep' => $rep, 
                'div' => $div, 
                'dist' => $dist, 
                'top_news_positions' => $top_news_positions, 
                'top_gallery_positions' => $top_gallery_positions, 
                'com_news' => $json,
                'relns'=>$tableRelatedNewsJson
            ]);
    }
    private function tableJson() {
        $json = DB::table('compose_news')
                ->leftjoin('categories', 'compose_news.cid', '=', 'categories.id')
                ->leftjoin('subcategories', 'compose_news.scid', '=', 'subcategories.id')
                ->leftjoin('reporters', 'compose_news.rid', '=', 'reporters.id')
                ->select('compose_news.*', 'categories.name as cname', 'subcategories.name as sname', 'reporters.name as rname')
                ->orderBy('compose_news.id', 'DESC')
                ->get();
        //dd($json);        
        return $json;
    }
    public function newslist() {
        $cat = category::all();
        $subcat = $this->ajaxsubcat();
        $rep = reporter::all();
        $div = division::all();
        $dist = district::all();
        $top_news_positions = TopNewsPosition::all();
        $top_gallery_positions = TopGalleryPosition::all();
        $json = $this->tableJson();
        return view('admin.pages.news_article_list', ['cat' => $cat, 'subcat' => $subcat, 'rep' => $rep, 'div' => $div, 'dist' => $dist, 'top_news_positions' => $top_news_positions, 'top_gallery_positions' => $top_gallery_positions, 'com_news' => $json]);
    }

    public function ajaxDistrict(Request $request) {
        $query = DB::table('districts')->where('disid', $request->div)->get();
        return response()->json($query);
    }

    public function ajaxsubcat() {
        $query = subcategory::all();
        return $query;
    }

    
    private function tableTopGalleryJson($id=0)
    {
        $json = DB::table('top_gallery_positions')
                ->select(DB::Raw('id,name,(SELECT COUNT(top_galleries.id) FROM top_galleries WHERE top_galleries.top_gallery_pos_id=top_gallery_positions.id AND top_galleries.com_news_id='.$id.') chk_status'))
                ->get();
        return $json;
    }
    private function tableTopSixJson($id=0)
    {
        $json = DB::table('top_news_positions')
                ->select(DB::Raw('id,name,(SELECT COUNT(top_news.id) FROM top_news WHERE top_news.top_news_pos_id=top_news_positions.id AND top_news.com_news_id='.$id.') chk_news_status'))
                ->get();
        
        
        return $json;
    }
    private function tableRelatedNewsJson($id=0)
    {
        // $json = DB::table('compose_news')
        //         ->select(DB::Raw('id,heading,(SELECT COUNT(related_news.com_news_id) from related_news WHERE related_news.com_news_id = compose_news.id and related_news.com_news_id = '.$id.') check_rel_news'))
        //         ->get();
        $sqlQuery = "SELECT 
                    compose_news.id,
                    compose_news.heading,
                    (SELECT COUNT(related_news.id) FROM related_news WHERE related_news.com_news_id=".$id." AND related_news.relatednews=compose_news.id) as relatednews 
                    FROM compose_news WHERE id!='".$id."' ORDER BY id DESC LIMIT 100
                    ";
                $json = DB::select(DB::raw($sqlQuery));
        //dd($json);
        return $json;
    }
    private function tableSubCatJson($id=0)
    {
        //$cat = category::find($id);
        $json = DB::table('subcategories')
                ->get();
        //dd($json);
        return $json;
    }
    public function create(Request $request) {

        $this->validate($request, [
            'heading' => 'required',
            'rid' => 'required',
            'content' => 'required',
            'cid' => 'required',
            'thumbnail' => 'required',
        ]);

        $filename = "";
        if (!empty($request->file('thumbnail'))) {
            $img = $request->file('thumbnail');
            $upload = 'upload/news';
            //$filename=$img->getClientOriginalName();
            $filename = time() . "." . $img->getClientOriginalExtension();
            $success = $img->move($upload, $filename);
        }
        //dd($request->rel_news_id);
        // echo $filename; die();
        $news = new ComposeNews;
        $news->heading = $request->heading;
        $news->rid = $request->rid;
        $news->spid = $request->spid ? $request->spid : 0;
        $news->divid = $request->divid ? $request->divid : 0;
        $news->disid = $request->disid ? $request->disid : 0;
        $news->content = $request->content;
        $news->cid = $request->cid;
        $news->scid = $request->scid ? $request->scid : 0;
        $news->thumbnail = $filename;
        $news->save();

        $news_id = $news->id;
        if (isset($request->top_news_pos_id)) {
            $top_news = new TopNews;
            $top_news->com_news_id = $news_id ? $news_id : 0;
            $top_news->top_news_pos_id = $request->top_news_pos_id ? $request->top_news_pos_id : 0;
            $top_news->save();
        }
        if (isset($request->top_gallery_pos_id)) {
            $top_gallery = new TopGallery;
            $top_gallery->com_news_id = $news_id ? $news_id : 0;
            $top_gallery->top_gallery_pos_id = $request->top_gallery_pos_id ? $request->top_gallery_pos_id : 0;
            $top_gallery->save();
        }
        if (count($request->rel_news_id) != 0) {
            foreach ($request->rel_news_id as $index => $td):
                $rln = new RelatedNews();
                $rln->com_news_id = $news_id ? $news_id : 0;
                $rln->relatednews = $td ? $td : 0;
                $rln->save();
            endforeach;
        }

        return redirect('Admin/news_article')->with('status', ' Added Successfully!');
    }

    public function show($id) {
        $json_data = ComposeNews::find($id);
        $cat = category::all();
        $subcat = $this->tableSubCatJson($id);
        $re = reporter::all();
        $div = division::all();
        $dist = district::all();
        $reln = RelatedNews::find($id);
        $top_news_positions = $this->tableTopSixJson($id);
        
        $json = $this->tableJson();
        $top_gallery_positions = $this->tableTopGalleryJson($id);
        $tableRelatedNewsJson = $this->tableRelatedNewsJson($id);
        
       //dd($reln);
        return view('admin.pages.news_article', ['cat' => $cat, 
            'subcat' => $subcat, 
            'rep' => $re, 
            'div' => $div, 
            'dist' => $dist, 
            'top_news_positions' => $top_news_positions, 
            'top_gallery_positions' => $top_gallery_positions,
            'relns'=>$tableRelatedNewsJson,
            'com_news' => $json,
            'edit' => $json_data]);
    }

    public function update(Request $request, $id) {

        $filename=$request->eximage;
        if (!empty($request->file('thumbnail'))) {
            $img = $request->file('thumbnail');
            $upload = 'upload/news';
            //$filename=$img->getClientOriginalName();
            $filename = time() . "." . $img->getClientOriginalExtension();
            $success = $img->move($upload, $filename);
        }
        $news =ComposeNews::find($id);
        $news->heading = $request->heading;
        $news->rid = $request->rid;
        $news->spid = $request->spid ? $request->spid : 0;
        $news->divid = $request->divid ? $request->divid : 0;
        $news->disid = $request->disid ? $request->disid : 0;
        $news->content = $request->content;
        $news->cid = $request->cid;
        $news->scid = $request->scid ? $request->scid : 0;
        $news->thumbnail = $filename;
        $news->save();

        $news_id = $news->id;
        if (isset($request->top_news_pos_id)) {
            $top_news = TopNews::find($id);;
            $top_news->com_news_id = $news_id ? $news_id : 0;
            $top_news->top_news_pos_id = $request->top_news_pos_id ? $request->top_news_pos_id : 0;
            $top_news->save();
        }
        if (isset($request->top_gallery_pos_id)) {
            $top_gallery = TopGallery::find($id);;
            $top_gallery->com_news_id = $news_id ? $news_id : 0;
            $top_gallery->top_gallery_pos_id = $request->top_gallery_pos_id ? $request->top_gallery_pos_id : 0;
            $top_gallery->save();
        }
        if (count($request->rel_news_id) != 0) {
            foreach ($request->rel_news_id as $index => $td):
                $rln = RelatedNews::find($id);;
                $rln->com_news_id = $news_id ? $news_id : 0;
                $rln->relatednews = $td ? $td : 0;
                $rln->save();
            endforeach;
        }

        return redirect('Admin/news/article/list')->with('status', 'Updated Successfully !');
    }

    public function destroy($id) {
        $cleanadds = DB::table('top_news')->where('com_news_id', '=', $id)->delete();
        $cleanadds = DB::table('top_galleries')->where('com_news_id', '=', $id)->delete();
        $cleanadds = DB::table('related_news')->where('com_news_id', '=', $id)->delete();
        $json = ComposeNews::find($id);
        $json->delete();
        return redirect('/Admin/news/article/list/')->with('status', 'Deleted Successfully!');
    }

}
