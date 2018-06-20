@extends('frontEnd.layouts.master')
@if(isset($newsData)) 
   @section('title', $newsData->heading)
   @else
   @section('title')
@endif
@section('content')
      <div class="container">
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
               <div class="breadcrumb">
                  <ul>
                     @if(isset($newsData))
                     <li><a href="{{url('homePage')}}"><i class="fa fa-home"></i></a></li>
                     <li> &#187;</li>
                     <li> <a href="#" rel="category tag">{{$newsData->cname}}</a></li>
                     <li> &#187;</li>
                     <li> <a href="#" rel="category tag">{{$newsData->sname}}</a></li>
                     <li> &#187;</li>
                     <li> <a href="" rel="category tag">{{$newsData->heading}}</a></li>
                    
                     @endif
                  </ul>
               </div>
            </div>
         </div>
      </div>
      <section>
         <div class="container">
            <div class="row">
               <div class="col-md-8 col-sm-8">
                   @if(isset($newsData))
                  <div class="single-pg-item">
                     <div class="single-pg-header">
                        <h3>{{$newsData->heading}}</h3>
                        <p>
                           <i class="fa fa-pencil"></i></span> {{$newsData->rname}} |
                           <i class="fa fa-clock-o"></i> আপডেট: 

                           <?php 
                           $currentDate = date('l, F j, Y', strtotime($newsData->created_at));
                           $engDATE = array('1','2','3','4','5','6','7','8','9','0','January','February','March','April','May','June','July','August','September','October','November','December','Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday','Friday');
                           $bangDATE = array('১','২','৩','৪','৫','৬','৭','৮','৯','০','জানুয়ারী','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে','জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর','শনিবার','রবিবার','সোমবার','মঙ্গলবার','
                           বুধবার','বৃহস্পতিবার','শুক্রবার' 
                           );
                           $convertedDATE = str_replace($engDATE, $bangDATE, $currentDate);
                           echo "$convertedDATE";
                           ?>
                        </p>
                     </div>
                     <div class="single-pg-socile">
                        <ul class="list-unstyled text-right">
                           <li><a class="icon-facebook" rel="nofollow"
                                href="http://www.facebook.com/"
                                onclick="popUp=window.open(
                                  'http://www.facebook.com/sharer.php?u={{url()->current()}}',
                                  'popupwindow',
                                  'scrollbars=yes,width=800,height=400');
                                popUp.focus();
                                return false">
                                <i class="fa fa-facebook"></i>
                              </a></li>
                           
               
                           <li> 
                            <a class="icon-gplus" rel="nofollow"
                              href="http://www.plus.google.com/"
                              onclick="popUp=window.open(
                                'https://plus.google.com/share?url={{url()->current()}}',
                                'popupwindow',
                                'scrollbars=yes,width=800,height=400');
                              popUp.focus();
                              return false">
                               <i class="fa fa-google-plus"></i>
                            </a>
                           </li>
                           <li> 
                              <a class="icon-linkedin" rel="nofollow"
                                href="http://www.linkedin.com/"
                                onclick="popUp=window.open(
                                  'http://www.linkedin.com/shareArticle?url={{url()->current()}}',
                                  'popupwindow',
                                  'scrollbars=yes,width=800,height=400');
                                popUp.focus();
                                return false">
                                <i class="fa fa-linkedin"></i>
                              </a>
                       </li>
                       <li> 
                              <a class="icon-twitter" rel="nofollow"
                            href="http://twitter.com/"
                            onclick="popUp=window.open(
                              'http://twitter.com/intent/tweet?text={{url()->current()}}',
                              'popupwindow',
                              'scrollbars=yes,width=800,height=400');
                            popUp.focus();
                            return false">
                                <i class="fa fa-twitter"></i>
                              </a>
                       </li>
                           <li> <a href="javascript:void(0)" onclick="javascript:PrintElem('printarea');"> <i class="fa fa-print"></i> </a></li>
                          <script type="text/javascript">
                            
                            function facebookshare() {
                             FB.ui({
                             method: 'share',
                             href: window.location.href,
                             }, function(response){});
                             
                          </script>
                        </ul>
                     </div>
                     <div id="printarea">
                        <div class="single-pg-mg"> <img src="{{ URL::asset('upload/news/'.$newsData->thumbnail) }}" alt="{{$newsData->heading}}" class="img-responsive"></div>
                        <div class="single-pg-para paragraph">
                           {{-- {{strip_tags($newsData->content)}} --}}
                           <?= html_entity_decode($newsData->content)?>
                        </div>
                        
                     </div>
                      <div class="row">
                         <div class="col-md-6">
                          <a id="add_link_6" target="_blank" href=""><img id="image-position-id-6" src="http://placehold.it/960x150" style="margin-bottom: 10px;" /></a>
                         </div>
                         <div class="col-md-6">
                           <a id="add_link_7" target="_blank" href=""><img id="image-position-id-7" src="http://placehold.it/960x150" style="margin-bottom: 10px;" /></a>
                         </div>
                        </div>
                        <div id="disqus_thread"></div>
                        <script>
                        (function() { // DON'T EDIT BELOW THIS LINE
                        var d = document, s = d.createElement('script');
                        s.src = 'https://mainamati-news.disqus.com/embed.js';
                        s.setAttribute('data-timestamp', +new Date());
                        (d.head || d.body).appendChild(s);
                        })();
                        </script>
                        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                     
                     
                  </div>
                  @endif
                  <div class="recent-news">
                     <div class="row">
                        <div class="col-md-12">
                           <div class="cardd-4-title section-title">
                              <h3>আরও পড়ুন</h3>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="post-navigation">
                           <ul>
                              @if(isset($newsallData))
                              @foreach($newsallData as $alldata)
                              <div class="col-md-3">
                                 <div class="small-card">
                                    <div class="small-cd-img"><a href="{{url('news-post/'.$alldata->id.'/'.$alldata->heading)}}"> <img src="{{ URL::asset('upload/news/'.$alldata->thumbnail) }}" alt="{{$alldata->heading}}" class="img-responsive"> </a></div>
                                    <div class="sm-cd-caption">
                                       <h3> <a href="{{url('news-post/'.$alldata->id.'/'.$alldata->heading)}}"> {{$alldata->heading}}</a></h3>
                                    </div>
                                 </div>
                              </div>
                              @endforeach
                              @endif
                           </ul>
                        </div>

                     </div>
                  </div>
               </div>
               <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                  <div class="sidebar-option-warp">
                     <div id="exTab1">
                        <ul class="nav nav-pills">
                           <li class="active"><a href="#1a" data-toggle="tab">সর্বশেষ খবর</a></li>
                           <li><a href="#2a" data-toggle="tab">জনপ্রিয় খবর</a></li>
                        </ul>
                        <div class="tab-content">
                           <div class="tab-pane active" id="1a">
                              <ul>
                                 @if(isset($latestnews))
                                 @foreach($latestnews as $latest)
                                 <li> <a href="{{url('news-post/'.$latest->id.'/'.$latest->heading)}}">{{$latest->heading}}</a> 
                                    {{-- <span class="mins-diff"> 
                                       {{$latest->created_at}} 
                                       মিনিট আগে 
                                    </span> --}}
                                 </li>
                                 @endforeach
                                 @endif
                              </ul>
                           </div>
                           <div class="tab-pane" id="2a">
                              <ul>
                                 @if(isset($QuerypopularNews))
                                 @foreach($QuerypopularNews as $popularNews)
                                 <li> <a href="{{url('news-post/'.$popularNews->id.'/'.$popularNews->heading)}}"> {{$popularNews->heading}} </a></li>
                                 @endforeach
                                 @endif
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="clearfix"></div>
                     <div class="textwidget">
                        <p><div class="fb-page" data-href="https://www.facebook.com/Mainamati-news-203641047028040" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Mainamati-news-203641047028040" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Mainamati-news-203641047028040">Mainamati news</a></blockquote></div></p>
                     </div>
                     
                  </div>
                  <a id="add_link_5" target="_blank" href=""><img id="image-position-id-5" src="http://placehold.it/960x150" style="margin-top: 10px;" /></a>
               </div>
            </div>
         </div>
      </section>
      <style>.single-pg-para.paragraph{font-size:17px}</style>

@endsection

@section('css')
<meta property="og:url"           content=" {{url()->current()}}" />
  <meta property="og:type"          content="website" />
  <meta property="og:title"         content="{{$newsData->heading}}" />
  <meta property="og:description"   content=" {!! str_limit(strip_tags($newsData->content), $limit = 200, $end = '') !!}" />
  <meta property="og:image"         content="{{ URL::asset('upload/news/'.$newsData->thumbnail) }}" />
@endsection
@section('js')
<script type="text/javascript">
   function PrintElem(divID) {
            //Get the HTML of div
            var divElements = document.getElementById(divID).innerHTML;
            //Get the HTML of whole page
            var oldPage = document.body.innerHTML;

            //Reset the page's HTML with div's HTML only
            document.body.innerHTML = 
              "<html><head><title></title></head><body>" +
              "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>\n\
                \n\<img src='{{ asset('css/assets/logo.png') }}' style='width:50%; height:100px; margin-left:170px;'>\n\
                \n\<br/><br/>\n\
                \n\<h5> {{$newsData->heading}} </h5>\n\
                \n\<hr/>\n\
                \n\<p style='font-size:12px;'>  <i class='fa fa-pencil'></i></span> {{$newsData->rname}} | <i class='fa fa-clock-o'></i> প্রকাশিত: {{$convertedDATE}}\n\
                </div><p style='font-size:12px;'>" 
              + divElements + 
              "</p><div class='col-lg-6 col-md-6 col-sm-6 col-xs-6 text-xs-center'>\n\
                \n\<p class='margin-top-10' style='font-size:12px;'> সম্পাদক ও প্রকাশক: এস.এম.মনির <br> &copy; {{date('Y')}} সর্বস্বত্ব সংরক্ষিত</p>\n\
                \n\</div>\n\
                \n\<div class='col-lg-6 col-md-6 col-sm-6 col-xs-6 text-xs-center'>\n\
                \n\<p class='margin-top-10' style='font-size:12px;'>সেবা মানবিক উন্নয়ন কেন্দ্র, উত্তর রামপুর, কুমিল্লা।<br> ই-মেইল: info@mainamatinews24.com\n\
                \n\</div>\n\
                \n\<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 text-xs-center' style='border-top:1px solid #000000;'>\n\
                \n\<p class='margin-top-10' style='font-size:12px;'>আমাদের পত্রিকায় প্রকাশিত/প্রচারিত সংবাদ, আলোকচিত্র, ভিডিওচিত্র, অডিও বিনা অনুমতিতে ব্যবহার করা বেআইনি </p>\n\
                \n\</div>"
              + "</body>";

            //Print Page
            window.print();

            //Restore orignal HTML
            document.body.innerHTML = oldPage;

          
        }

</script>
<script type="text/javascript">

//adds
var addsJSON=jQuery.parseJSON('<?php echo json_encode($adds); ?>');

$(window).load(function(){
   $.each(addsJSON,function(key,row){
      console.log(row);
      if(row.id==1)
      {
         $("#image-position-id-1").attr("src","{{ URL::asset('upload/adds') }}/"+row.add_image);
         $("a#add_link_1").attr("href", row.add_link);
         
      }
      else if(row.id==5)
      {
         $("#image-position-id-5").attr("src","{{ URL::asset('upload/adds') }}/"+row.add_image);
         $("a#add_link_5").attr("href", row.add_link);
         
      }
      else if(row.id==6)
      {
         $("#image-position-id-6").attr("src","{{ URL::asset('upload/adds') }}/"+row.add_image);
         $("a#add_link_6").attr("href", row.add_link);
         
      }
      else if(row.id==7)
      {
         $("#image-position-id-7").attr("src","{{ URL::asset('upload/adds') }}/"+row.add_image);
         $("a#add_link_7").attr("href", row.add_link);
      }
     
   });
});
</script>
@endsection