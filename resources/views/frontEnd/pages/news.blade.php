@extends('frontEnd.layouts.master')
@section('title','Home')
@section('content')
      <div class="catgory-page-area">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <ol class="breadcrumb">
                     @if(isset($catdata))<li><a href="{{url('homePage')}}"><i class="fa fa-home"></i></a></li>
                     <li><a href="{{url('category/'.$catdata->id.'/'.$catdata->name)}}"> {{ $catdata->name }} </a></li>
                     @if(isset($subcatdata))<li><a href="{{url('category/'.$catdata->id.'/subcategory/'.$subcatdata->id.'/'.$subcatdata->name)}}"> {{ $subcatdata->name }} </a></li>@endif @endif
                  </ol>
               </div>
            </div>
            <section class="cardd-area">
               <div class="row">
                  <div class="col-md-9 col-sm-9 col-xs-12">
                                                                                                                                                                                                                     
                     <div class="category-it-section section-margin">
                        <div class="row">
                           @if(isset($catnewsdata))
                           @foreach($catnewsdata as $news)
                           <div class="col-md-3">
                              <div class="small-card">
                                 <div class="small-cd-img"> <a href="{{url('news-post/'.$news->id.'/'.$news->heading)}}"> <img
                                    src="{{ URL::asset('upload/news/'.$news->thumbnail) }}"
                                    alt="{{$news->heading}}"
                                    class="img-responsive"> </a></div>
                                 <div class="sm-cd-caption">
                                    <h3> <a href="{{url('news-post/'.$news->id.'/'.$news->heading)}}"> {{$news->heading}} </a></h3>
                                 </div>
                              </div>
                           </div>
                           @endforeach
                           @else
                           <code>News Not Found!!</code>
                           @endif
                        </div>
                     </div>
                     <section>
               
                  <div class="row">
                     <div class="col-md-6">
                      <a id="add_link_6" target="_blank" href=""><img id="image-position-id-6" src="http://placehold.it/960x150" style="margin-bottom: 10px;" /></a>
                     </div>
                     <div class="col-md-6">
                       <a id="add_link_7" target="_blank" href=""><img id="image-position-id-7" src="http://placehold.it/960x150" style="margin-bottom: 10px;" /></a>
                     </div>
                  </div>
               
      
                  </div>
                  <div class="col-md-3">
                     <div class="cardd-sidebar section-margin">
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
                     <a id="add_link_5" target="_blank" href=""><img id="image-position-id-5" src="http://placehold.it/960x150" style="margin-bottom: 10px;" /></a>
                  </div>
               </div>
            </section>
         </div>
      </div>
@endsection
@section('js')
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

