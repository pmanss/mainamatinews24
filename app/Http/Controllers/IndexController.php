<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\ComposeNews;
use App\AddsPosition;
use App\advertisement;
use App\RelatedNews;
use App\reporter;
use App\TopGallery;
use App\TopGalleryPosition;
use App\TopNews;
use App\TopNewsPosition;
use App\breakingnews;
use App\category;
use App\subcategory;
use App\district;
use App\division;
use Hash;
use DB;
use Carbon\Carbon;
class IndexController extends Controller
{
    public function login(){
        return view('auth.login');
    }
    public function updateUserInfo(request $request){
       //echo $request->name; die(); 
       $this->validate($request, [
            'fname'=> 'required',
            'lname'=> 'required',
            'email'=> 'required',
            'gender'=> 'required',
            'phone'=> 'required',
            'dob'=> 'required',
            'password'=> 'required|min:6|confirmed',
            'password_confirmation' => 'required|same:password'
            
        ]);
        //dd($request->fname);
        $user = User::find(\Auth::user()->id);
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address ? $request->address :0;
        $user->dob = $request->dob;
        $user->gender = $request->gender;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/Admin/user')->with('status', 'Updated Successfully !');
    }
    public function unlock(){
        return view('admin.pages.unlock');
    }
    public function country(){
        return view('admin.pages.country');
    }

    public function newuser(){
        return view('admin.pages.newuser');
    }
    public function tableJson() {
        $json = DB::table('breakingnews')
               ->join('compose_news', 'breakingnews.com_news_id', '=', 'compose_news.id')
                ->whereDate('breakingnews.created_at', '=', Carbon::today()->toDateString())
                ->select('breakingnews.*', 'compose_news.heading as heading')
                ->get();
        return $json;
    }
    public function dashboard(){
          $CountComposeNews = ComposeNews::count();
          $todayComposeNews = ComposeNews::whereDate('created_at', DB::raw('CURDATE()'))->get();
          $CounttodayComposeNews = count($todayComposeNews);
          $Countcategory = category::count();
         $json = $this->tableJson();
//         $contact = DB::table('contacts')
//                 ->whereDate('contacts.created_at', '=', Carbon::today()->toDateString())
//                 ->get();
        return view('admin.pages.dashboard',
                [
                    'CountComposeNews'=>$CountComposeNews,
                    'todayComposeNews'=>$todayComposeNews,
                    'CounttodayComposeNews'=>$CounttodayComposeNews,
                    'Countcategory'=>$Countcategory,
                    'data'=>$json
                ]);
    }

    //Front end start
    private function categoryParseData()
    {
        $data=[];
        $pureCatCheck=category::count();

        if($pureCatCheck > 0 )
        {
            $pureCat=category::all();
            foreach($pureCat as $pc){
                $sCatCheck=SubCategory::where('cid',$pc->id)->count();
                $subCatData=[];
                if($sCatCheck > 0)
                {
                    $sCat=SubCategory::where('cid',$pc->id)->get();
                    foreach($sCat as $sc)
                    {
                        $subCatData[]=['id'=>$sc->id,'name'=>$sc->name];
                    }
                }
                $data[]=['id'=>$pc->id,'name'=>$pc->name,'scat'=>$subCatData];
            }
        }

        return $data;
    }
    public function breakingnewstableJson() {
        $json = DB::table('breakingnews')
               ->join('compose_news', 'breakingnews.com_news_id', '=', 'compose_news.id')
               ->where('breakingnews.status','on')
                ->select('breakingnews.*', 'compose_news.heading as heading')
                ->orderBy('breakingnews.id', 'DESC')
                ->take(10)
                ->get();
        return $json;
    }
    
    public function homePage(){
        $cat = $this->categoryParseData();
        $breakingnews = $this->breakingnewstableJson();
        $latesttakeone = ComposeNews::take(1)->orderBy('id','DESC')->first();
        $latestnews= ComposeNews::whereNotIn('compose_news.id',[$latesttakeone->id])->take(20)->orderBy('id','DESC')->get();
        
        $nationalone=DB::table('compose_news')
                        ->leftjoin('subcategories', 'compose_news.scid', '=', 'subcategories.id')
                        ->where('scid','11')
                        ->select('compose_news.*', 'subcategories.name as sname')
                        ->take(1)
                        ->orderBy('id','DESC')
                        ->first();        
        $national = ComposeNews::where('scid','11')->whereNotIn('compose_news.id',[$nationalone->id])->take(5)->orderBy('compose_news.id', 'DESC')->get();

        $politicsone=DB::table('compose_news')
                    ->leftjoin('subcategories', 'compose_news.scid', '=', 'subcategories.id')
                    ->where('scid','12')
                    ->select('compose_news.*', 'subcategories.name as sname')
                    ->take(1)
                    ->orderBy('id','DESC')
                    ->first();
        $politics = ComposeNews::where('scid','12')->whereNotIn('compose_news.id',[$politicsone->id])->take(5)->orderBy('compose_news.id', 'DESC')->get();

        $internationalone=DB::table('compose_news')
                            ->where('cid','4')
                            ->leftjoin('categories', 'compose_news.cid', '=', 'categories.id')
                            ->select('compose_news.*', 'categories.name as cname')
                            ->take(1)
                            ->orderBy('id','DESC')
                            ->first();
        $international =ComposeNews::where('cid','4')->whereNotIn('compose_news.id',[$internationalone->id])->take(5)->orderBy('compose_news.id', 'DESC')->get();

        $trade = DB::table('compose_news')->where('cid','12')->take(6)->orderBy('compose_news.id', 'DESC')->get();
        $tradeone =DB::table('compose_news')
                    ->leftjoin('categories', 'compose_news.cid', '=', 'categories.id')
                    ->where('cid','12')
                    ->select('compose_news.*', 'categories.name as cname')
                    ->take(1)
                    ->orderBy('compose_news.id', 'DESC')
                    ->first();

        $whole_banglaone =DB::table('compose_news')
                    ->leftjoin('categories', 'compose_news.cid', '=', 'categories.id')
                    ->where('cid','17')
                    ->select('compose_news.*', 'categories.name as cname')
                    ->take(1)
                    ->orderBy('compose_news.id', 'DESC')
                    ->first();
        $whole_bangla = DB::table('compose_news')->where('cid','17')->whereNotIn('compose_news.id',[$whole_banglaone->id])->take(4)->orderBy('compose_news.id', 'DESC')->get();

        $jobone=DB::table('compose_news')
                    ->leftjoin('subcategories', 'compose_news.scid', '=', 'subcategories.id')
                    ->where('scid','15')
                    ->select('compose_news.*', 'subcategories.name as sname')
                    ->take(1)
                    ->orderBy('id','DESC')
                    ->first();
        $job = ComposeNews::where('scid','15')->take(6)->orderBy('compose_news.id', 'DESC')->get();

        $sportone =DB::table('compose_news')
                    ->leftjoin('categories', 'compose_news.cid', '=', 'categories.id')
                    ->where('cid','9')
                    ->select('compose_news.*', 'categories.name as cname')
                    ->take(1)
                    ->orderBy('compose_news.id', 'DESC')
                    ->first();
        $sport = DB::table('compose_news')->where('cid','9')->whereNotIn('compose_news.id',[$sportone->id])->take(5)->orderBy('compose_news.id', 'DESC')->get();

        $entertainmentone =DB::table('compose_news')
                    ->leftjoin('categories', 'compose_news.cid', '=', 'categories.id')
                    ->where('cid','6')
                    ->select('compose_news.*', 'categories.name as cname')
                    ->take(1)
                    ->orderBy('compose_news.id', 'DESC')
                    ->first();
        $entertainment = DB::table('compose_news')->where('cid','6')->whereNotIn('compose_news.id',[$entertainmentone->id])->take(6)->orderBy('compose_news.id', 'DESC')->get();

        $livinglifeone =DB::table('compose_news')
                    ->leftjoin('categories', 'compose_news.cid', '=', 'categories.id')
                    ->where('cid','14')
                    ->select('compose_news.*', 'categories.name as cname')
                    ->take(1)
                    ->orderBy('compose_news.id', 'DESC')
                    ->first();
        $livinglife = DB::table('compose_news')->where('cid','14')->take(6)->orderBy('compose_news.id', 'DESC')->get();

        $eduone =DB::table('compose_news')
                    ->leftjoin('categories', 'compose_news.cid', '=', 'categories.id')
                    ->where('cid','10')
                    ->select('compose_news.*', 'categories.name as cname')
                    ->take(1)
                    ->orderBy('compose_news.id', 'DESC')
                    ->first();
        $edu = DB::table('compose_news')->where('cid','10')->whereNotIn('compose_news.id',[$eduone->id])->take(6)->orderBy('compose_news.id', 'DESC')->get();

        $lifestyleone =DB::table('compose_news')
                    ->leftjoin('categories', 'compose_news.cid', '=', 'categories.id')
                    ->where('cid','7')
                    ->select('compose_news.*', 'categories.name as cname')
                    ->take(1)
                    ->orderBy('compose_news.id', 'DESC')
                    ->first();
        $lifestyle = DB::table('compose_news')->where('cid','7')->whereNotIn('compose_news.id',[$lifestyleone->id])->take(6)->orderBy('compose_news.id', 'DESC')->get();

        $sciencetechnologyone =DB::table('compose_news')
                    ->leftjoin('categories', 'compose_news.cid', '=', 'categories.id')
                    ->where('cid','11')
                    ->select('compose_news.*', 'categories.name as cname')
                    ->take(1)
                    ->orderBy('compose_news.id', 'DESC')
                    ->first();
        $sciencetechnology = DB::table('compose_news')->where('cid','11')->whereNotIn('compose_news.id',[$sciencetechnologyone->id])->take(6)->orderBy('compose_news.id', 'DESC')->get();

        $healthone =DB::table('compose_news')
                    ->leftjoin('categories', 'compose_news.cid', '=', 'categories.id')
                    ->where('cid','13')
                    ->select('compose_news.*', 'categories.name as cname')
                    ->take(1)
                    ->orderBy('compose_news.id', 'DESC')
                    ->first();
        $health = DB::table('compose_news')->where('cid','13')->whereNotIn('compose_news.id',[$healthone->id])->take(6)->orderBy('compose_news.id', 'DESC')->get();

        $district = district::all();
        $division = division::all();

        $todayComposeNews = DB::table('compose_news')
                ->whereDate('compose_news.created_at', '=', Carbon::today()->toDateString())
                ->orderBy('compose_news.id','DESC')
                ->take(30)
                ->get();

        $QuerypopularNews =  DB::table('popular_news')
                            ->leftjoin('compose_news', 'popular_news.com_news_id', '=', 'compose_news.id')
                            ->leftjoin('categories', 'compose_news.cid', '=', 'categories.id')
                            ->leftjoin('subcategories', 'compose_news.scid', '=', 'subcategories.id')
                            ->leftjoin('reporters', 'compose_news.rid', '=', 'reporters.id')
                            ->select('popular_news.*','categories.name as cname', 'subcategories.name as sname', 'reporters.name as rname', 'compose_news.id', 'compose_news.heading')
                            ->orderBy('popular_news.count', 'DESC')
                            ->take(20)
                            ->get(); 
                        
            $advertisement = DB::table('advertisements')
                            ->where('isactive',1)
                            ->orderBy('id', 'ASC')
                            ->get(); 
            $sqlgallery =  DB::table('top_galleries')
                            ->leftjoin('compose_news', 'top_galleries.com_news_id', '=', 'compose_news.id')
                            ->select('top_galleries.*','compose_news.id','compose_news.heading','compose_news.thumbnail')
                            ->orderBy('top_galleries.id', 'DESC')
                            ->take(6)
                            ->get();

            
      
        // dd($advertisement);
        return view('frontEnd.pages.index',
            [
                'cat'=>$cat,
                'breakingnews'=>$breakingnews,
                'latesttakeone'=>$latesttakeone,
                'latestnews'=>$latestnews,
                'nationalone'=>$nationalone,
                'national'=>$national,
                'politicsone'=>$politicsone,
                'politics'=>$politics,
                'internationalone'=>$internationalone,
                'international'=>$international,
                'trade'=>$trade,
                'tradeone'=>$tradeone,
                'whole_bangla'=>$whole_bangla,
                'whole_banglaone'=>$whole_banglaone,
                'job'=>$job,
                'jobone'=>$jobone,
                'sport'=>$sport,
                'sportone'=>$sportone,
                'entertainment'=>$entertainment,
                'entertainmentone'=>$entertainmentone,
                'livinglife'=>$livinglife,
                'livinglifeone'=>$livinglifeone,
                'todayComposeNews'=>$todayComposeNews,
                'eduone'=>$eduone,
                'edu'=>$edu,
                'lifestyleone'=>$lifestyleone,
                'lifestyle'=>$lifestyle,
                'sciencetechnologyone'=>$sciencetechnologyone,
                'sciencetechnology'=>$sciencetechnology,
                'healthone'=>$healthone,
                'health'=>$health,
                'district'=>$district,
                'division'=>$division,
                'QuerypopularNews'=>$QuerypopularNews,
                'adds'=>$advertisement,
                'top_gallery'=>$sqlgallery,
            ]);
    }

    public function ajaxDistrictData(Request $request) {
        $query = DB::table('districts')->where('disid', $request->div)->get();
        return response()->json($query);
    }
    public function countrydiv(Request $request){
        $this->validate($request, [
            'divid' => 'required',
            'disid' => 'required'
        ]);
        $cat = $this->categoryParseData();
        $latestnews= ComposeNews::take(20)->orderBy('id','DESC')->get();
        // $catdata = category::where('id',$id)->first();
        $countryNews = ComposeNews::where('divid',$request->divid)
                            ->where('disid',$request->disid)
                            ->orderBy('compose_news.id', 'DESC')
                            ->get();
        $QuerypopularNews =  DB::table('popular_news')
                            ->leftjoin('compose_news', 'popular_news.com_news_id', '=', 'compose_news.id')
                            ->leftjoin('categories', 'compose_news.cid', '=', 'categories.id')
                            ->leftjoin('subcategories', 'compose_news.scid', '=', 'subcategories.id')
                            ->leftjoin('reporters', 'compose_news.rid', '=', 'reporters.id')
                            ->select('popular_news.*','categories.name as cname', 'subcategories.name as sname', 'reporters.name as rname', 'compose_news.id', 'compose_news.heading')
                            ->orderBy('popular_news.count', 'DESC')
                            ->take(20)
                            ->get();
        //dd($countryNews);
         $advertisement = DB::table('advertisements')
                            ->where('isactive',1)
                            ->orderBy('id', 'ASC')
                            ->get(); 
        return view('frontEnd.pages.news',
            [
                'cat'=>$cat,
                // 'catdata'=>$catdata,
                'catnewsdata'=>$countryNews,
                'latestnews'=>$latestnews,
                'QuerypopularNews'=>$QuerypopularNews,
                'adds'=>$advertisement
            ]);
    }
    public function calendarDate($date=0){
        $latestnews= ComposeNews::take(20)->orderBy('id','DESC')->get();
        $cat = $this->categoryParseData();
        $requestDate = $date;
        $calnewsdata =   ComposeNews::whereDate('created_at',$requestDate)->orderBy('compose_news.id', 'DESC')->get();
        $QuerypopularNews =  DB::table('popular_news')
                            ->leftjoin('compose_news', 'popular_news.com_news_id', '=', 'compose_news.id')
                            ->leftjoin('categories', 'compose_news.cid', '=', 'categories.id')
                            ->leftjoin('subcategories', 'compose_news.scid', '=', 'subcategories.id')
                            ->leftjoin('reporters', 'compose_news.rid', '=', 'reporters.id')
                            ->select('popular_news.*','categories.name as cname', 'subcategories.name as sname', 'reporters.name as rname', 'compose_news.id', 'compose_news.heading')
                            ->orderBy('popular_news.count', 'DESC')
                            ->take(20)
                            ->get();
        // dd($calnewsdata);
         $advertisement = DB::table('advertisements')
                            ->where('isactive',1)
                            ->orderBy('id', 'ASC')
                            ->get(); 
        return view('frontEnd.pages.news',
            [
                'cat'=>$cat,
                'catnewsdata'=>$calnewsdata,
                'latestnews'=>$latestnews,
                'QuerypopularNews'=>$QuerypopularNews,
                'adds'=>$advertisement
                
            ]);
    }

    public function categoryNews($id=0,$any=''){
        $cat = $this->categoryParseData();
        $catdata = category::where('id',$id)->first();
        $catnewsdata =  ComposeNews::where('compose_news.cid',$id)->orderBy('compose_news.id', 'DESC')->take(12)->get();
        $latestnews= ComposeNews::take(20)->orderBy('id','DESC')->get();
        $QuerypopularNews =  DB::table('popular_news')
                            ->leftjoin('compose_news', 'popular_news.com_news_id', '=', 'compose_news.id')
                            ->leftjoin('categories', 'compose_news.cid', '=', 'categories.id')
                            ->leftjoin('subcategories', 'compose_news.scid', '=', 'subcategories.id')
                            ->leftjoin('reporters', 'compose_news.rid', '=', 'reporters.id')
                            ->select('popular_news.*','categories.name as cname', 'subcategories.name as sname', 'reporters.name as rname', 'compose_news.id', 'compose_news.heading')
                            ->orderBy('popular_news.count', 'DESC')
                            ->take(20)
                            ->get();
         $advertisement = DB::table('advertisements')
                            ->where('isactive',1)
                            ->orderBy('id', 'ASC')
                            ->get(); 
        //dd($advertisementDetail);
        return view('frontEnd.pages.news',
            [
                'cat'=>$cat,
                'catdata'=>$catdata,
                'catnewsdata'=>$catnewsdata,
                'latestnews'=>$latestnews,
                'QuerypopularNews'=>$QuerypopularNews,
                'adds'=>$advertisement
                
            ]);
    }
    public function subcategoryNews($cid=0,$scid=0,$any=''){
        $cat = $this->categoryParseData();
        $latestnews= ComposeNews::take(20)->orderBy('id','DESC')->get();
        $catdata = category::where('id',$cid)->first();
        $subcatdata = subcategory::where('id',$scid)->first();
        $catnewsdata =   ComposeNews::where('compose_news.cid',$cid)->where('compose_news.scid',$scid)->orderBy('compose_news.id', 'DESC')->take(20)->get();
        $QuerypopularNews =  DB::table('popular_news')
                            ->leftjoin('compose_news', 'popular_news.com_news_id', '=', 'compose_news.id')
                            ->leftjoin('categories', 'compose_news.cid', '=', 'categories.id')
                            ->leftjoin('subcategories', 'compose_news.scid', '=', 'subcategories.id')
                            ->leftjoin('reporters', 'compose_news.rid', '=', 'reporters.id')
                            ->select('popular_news.*','categories.name as cname', 'subcategories.name as sname', 'reporters.name as rname', 'compose_news.id', 'compose_news.heading')
                            ->orderBy('popular_news.count', 'DESC')
                            ->take(20)
                            ->get();
         $advertisement = DB::table('advertisements')
                            ->where('isactive',1)
                            ->orderBy('id', 'ASC')
                            ->get(); 
        //dd($catnewsdata);
        return view('frontEnd.pages.news',
            [
                'cat'=>$cat,
                'catdata'=>$catdata,
                'subcatdata'=>$subcatdata,
                'catnewsdata'=>$catnewsdata,
                'latestnews'=>$latestnews,
                'QuerypopularNews'=>$QuerypopularNews,
                'adds'=>$advertisement
            ]);
    }
    public function newsPostData($id=0,$any=''){
        $cat = $this->categoryParseData();
        $latestnews= ComposeNews::take(20)->orderBy('id','DESC')->get();
        $newsData = DB::table('compose_news')
                    ->leftjoin('categories', 'compose_news.cid', '=', 'categories.id')
                    ->leftjoin('subcategories', 'compose_news.scid', '=', 'subcategories.id')
                    ->leftjoin('reporters', 'compose_news.rid', '=', 'reporters.id')
                    ->where('compose_news.id',$id)
                    ->select('compose_news.*', 'categories.name as cname', 'subcategories.name as sname', 'reporters.name as rname')
                    ->orderBy('compose_news.id', 'DESC')
                    ->first();
        $newsDataa = $newsData->cid;
        $newsallData = DB::table('compose_news')->where('cid',$newsDataa)->whereNotIn('compose_news.id',[$newsData->id])->take(4)->orderBy('compose_news.id', 'DESC')->get();

        $CHKPopularNew=DB::table('popular_news')
                        ->where('com_news_id', $newsData->id)->count();

        if($CHKPopularNew<1)
        {
            $pop_news = DB::table('popular_news')->insert(
                             array(
                                    'com_news_id'     =>  $newsData->id, 
                                    'count'   =>   '1'
                             )
                        );
        }   
        else
        {
            $popular_news = DB::table('popular_news')
                            ->where('com_news_id', $newsData->id)
                            ->increment('count', 1);    
        }         
        
        $QuerypopularNews =  DB::table('popular_news')
                            ->leftjoin('compose_news', 'popular_news.com_news_id', '=', 'compose_news.id')
                            ->leftjoin('categories', 'compose_news.cid', '=', 'categories.id')
                            ->leftjoin('subcategories', 'compose_news.scid', '=', 'subcategories.id')
                            ->leftjoin('reporters', 'compose_news.rid', '=', 'reporters.id')
                            ->select('popular_news.*','categories.name as cname', 'subcategories.name as sname', 'reporters.name as rname', 'compose_news.id', 'compose_news.heading')
                            ->orderBy('popular_news.count', 'DESC')
                            ->take(20)
                            ->get();
         $advertisement = DB::table('advertisements')
                            ->where('isactive',1)
                            ->orderBy('id', 'ASC')
                            ->get(); 
        // dd($popular_news);
        return view('frontEnd.pages.news-post',
            [
                'cat'=>$cat,
                'latestnews'=>$latestnews,
                'newsData'=>$newsData,
                'newsallData'=>$newsallData,
                'QuerypopularNews'=>$QuerypopularNews,
                'adds'=>$advertisement
            ]);
    }
    
public function searchQuery(request $request){
        $latestnews= ComposeNews::take(20)->orderBy('id','DESC')->get();
        $cat = $this->categoryParseData();
        // echo 1; die();
        $serachpro = $request->search;

        //dd($serachpro);
        DB::enableQueryLog();

        $query =DB::table('compose_news')
                ->leftjoin('categories', 'compose_news.cid', '=', 'categories.id')
                ->leftjoin('subcategories', 'compose_news.scid', '=', 'subcategories.id')
                ->leftjoin('reporters', 'compose_news.rid', '=', 'reporters.id')
                ->select('compose_news.*', 'categories.name as cname', 'subcategories.name as sname', 'reporters.name as rname')
                ->where('categories.name', 'LIKE', '%' . $serachpro . '%')
                ->orWhere('subcategories.name', 'LIKE', '%' . $serachpro . '%')
                ->orWhere('compose_news.heading', 'LIKE', '%' . $serachpro . '%')
                ->get();
        $QuerypopularNews =  DB::table('popular_news')
                            ->leftjoin('compose_news', 'popular_news.com_news_id', '=', 'compose_news.id')
                            ->leftjoin('categories', 'compose_news.cid', '=', 'categories.id')
                            ->leftjoin('subcategories', 'compose_news.scid', '=', 'subcategories.id')
                            ->leftjoin('reporters', 'compose_news.rid', '=', 'reporters.id')
                            ->select('popular_news.*','categories.name as cname', 'subcategories.name as sname', 'reporters.name as rname', 'compose_news.id', 'compose_news.heading')
                            ->orderBy('popular_news.count', 'DESC')
                            ->take(20)
                            ->get();
                //dd($query);
         $advertisement = DB::table('advertisements')
                            ->where('isactive',1)
                            ->orderBy('id', 'ASC')
                            ->get(); 
                 return view('frontEnd.pages.news',
                            [
                                'cat'=>$cat,
                                'catnewsdata'=>$query,
                                'latestnews'=>$latestnews,
                                'QuerypopularNews'=>$QuerypopularNews,
                                'adds'=>$advertisement
                            ]);
    }


}
