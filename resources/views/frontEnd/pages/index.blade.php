@extends('frontEnd.layouts.master')
@section('title','mainamatinews24')
@section('breaking_news')
@include('frontEnd.include.breaking_news')
@endsection
@section('content')
      <section class="cardd-area">
         <div class="container">
            <div class="row">
               <div class="card-warp section-margin" style="margin-bottom: 15px;">
                  <div class="col-md-5 col-sm-5 col-xs-12">
                     <div class="cardd-area-one">
                        <div class="card-parent">
                           <div class="card">
                              <a href="{{url('news-post/'.$latesttakeone->id.'/'.$latesttakeone->heading)}}"> <img
                                 class="card-img-top"
                                 src="{{ URL::asset('upload/news/'.$latesttakeone->thumbnail) }}"
                                 alt="{{$latesttakeone->heading}}"> </a>
                              <div class="card-body">
                                 <h2 class="card-title"> <a href="{{url('news-post/'.$latesttakeone->id.'/'.$latesttakeone->heading)}}" class="text-dark"> {{$latesttakeone->heading}} </a></h2>
                                 <p class="card-text"> 
                                       {!! str_limit(strip_tags($latesttakeone->content), $limit = 205, $end = '') !!}
                                    </p>
                                 <a href="{{url('news-post/'.$latesttakeone->id.'/'.$latesttakeone->heading)}}" class="cardd-btn">বিস্তারিত</a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-12">
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
                  </div>
                  <div class="col-md-3  col-sm-3 col-xs-12">
                     <div class="add1"></div>
                     <div class="todays_news" style="width: 100% !important; margin-bottom: 10px;"> <a href="" class="btn btn-success"
                        style="width: 100% !important; background: green !important; font-size: 18px;"> আজকের সব খবর </a></div>
                     <div class="common">
                        <ul>
                           @if(isset($todayComposeNews))
                           @foreach($todayComposeNews as $todays_news)
                           <li> <a href="{{url('news-post/'.$todays_news->id.'/'.$todays_news->heading)}}"> {{$todays_news->heading}}</a></li>
                           @endforeach
                           @endif
                        </ul>
                     </div>
                     
               </div>
               <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12" style="padding: 5px 0px; text-align: center;"></div>
               </div>
            </div>
         </div>
      </section>
      <section class="cardd-two">
         <div class="container">
            <div class="row"></div>
            <div class="cardd-two-warp section-margin">
               <div class="row">
                  <div class="col-md-9">
                     <div class="row">
                        <div class="col-md-4 blue">
                           <div class="section-title ">
                              @if(isset($nationalone))<h3><a href="{{url('category/'.$nationalone->cid.'/subcategory/'.$nationalone->scid.'/'.$nationalone->sname)}}">{{$nationalone->sname}}</a></h3>@endif
                           </div>
                           
                           <div class="single-cardd">
                              @if(isset($nationalone))
                              <div class="cardd-img"> <a href="{{url('news-post/'.$nationalone->id.'/'.$nationalone->heading)}}"> <img
                                 src="{{ URL::asset('upload/news/'.$nationalone->thumbnail) }}"
                                 alt="{{$nationalone->heading}}"
                                 class="img-responsive"> </a>
                              </div>
                              <div class="cardd-tw-caption">
                                 <h2> <a href="{{url('news-post/'.$nationalone->id.'/'.$nationalone->heading)}}"> {{$nationalone->heading}} </a></h2>
                              </div>
                              @endif
                              <div class="option-cardd">
                                 <ul class="list-unstyled">
                                    @if(isset($national))
                                    @foreach($national as $nat)
                                    <li>
                                       <a href="{{url('news-post/'.$nat->id.'/'.$nat->heading)}}">
                                          <img src="{{ URL::asset('upload/news/'.$nat->thumbnail) }}"
                                             alt="{{$nat->heading}}"
                                             class="img-responsive">
                                          <p>{{$nat->heading}}</p>
                                       </a>
                                    </li>
                                    @endforeach
                                    @endif
                                 </ul>
                              </div>
                           </div>
                           
                        </div>
                        <div class="col-md-4 blue">
                           <div class="section-title section-title-2">
                              @if(isset($politicsone))<h3><a href="{{url('category/'.$politicsone->cid.'/subcategory/'.$politicsone->scid.'/'.$politicsone->sname)}}">{{$politicsone->sname}}</a></h3>@endif
                           </div>
                           <div class="single-cardd">
                               @if(isset($politicsone))
                              <div class="cardd-img"> <a href="{{url('news-post/'.$politicsone->id.'/'.$politicsone->heading)}}"> <img
                                 src="{{ URL::asset('upload/news/'.$politicsone->thumbnail) }}"
                                 alt="{{$politicsone->heading}}"
                                 class="img-responsive"> </a>
                              </div>
                              <div class="cardd-tw-caption">
                                 <h2> <a href="{{url('news-post/'.$politicsone->id.'/'.$politicsone->heading)}}">{{$politicsone->heading}} </a></h2>
                              </div>
                               @endif
                              <div class="option-cardd">
                                 <ul class="list-unstyled">
                                    @if(isset($politics))
                                    @foreach($politics as $pol)
                                    <li>
                                       <a href="{{url('news-post/'.$pol->id.'/'.$pol->heading)}}">
                                          <img src="{{ URL::asset('upload/news/'.$pol->thumbnail) }}"
                                             alt="{{$pol->heading}}"
                                             class="img-responsive">
                                          <p>{{$pol->heading}}</p>
                                       </a>
                                    </li>
                                    @endforeach
                                    @endif
                                 </ul>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4 blue">
                           <div class="section-title ">
                              @if(isset($internationalone))<h3><a href="{{url('category/'.$internationalone->cid.'/'.$internationalone->cname)}}">{{$internationalone->cname}}</a></h3>@endif
                           </div>
                           <div class="single-cardd">
                              @if(isset($internationalone))
                              <div class="cardd-img"> <a href="{{url('news-post/'.$internationalone->id.'/'.$internationalone->heading)}}"> <img
                                 src="{{ URL::asset('upload/news/'.$internationalone->thumbnail) }}"
                                 alt="{{$internationalone->heading}}"
                                 class="img-responsive"> </a>
                              </div>
                              <div class="cardd-tw-caption">
                                 <h2> <a href="{{url('news-post/'.$internationalone->id.'/'.$internationalone->heading)}}">{{$internationalone->heading}} </a></h2>
                              </div>
                               @endif
                              <div class="option-cardd">
                                 <ul class="list-unstyled">
                                    @if(isset($international))
                                    @foreach($international as $int)
                                    <li>
                                       <a href="{{url('news-post/'.$int->id.'/'.$int->heading)}}">
                                          <img src="{{ URL::asset('upload/news/'.$int->thumbnail) }}"
                                             alt="{{$int->heading}}"
                                             class="img-responsive">
                                          <p>{{$int->heading}}</p>
                                       </a>
                                    </li>
                                    @endforeach
                                    @endif
                                 
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="exc-area section-margin">
                        <div class="opinion_and">
                        @if(isset($tradeone)) <a href="{{url('category/'.$tradeone->cid.'/'.$tradeone->cname)}}">{{$tradeone->cname}}
                        </a>@endif
                     </div>
                        <div class="option-cardd">
                           <ul class="list-unstyled">
                              @if(isset($trade))
                              @foreach($trade as $tra) 
                              <li>
                                 <a href="{{url('news-post/'.$tra->id.'/'.$tra->heading)}}">
                                    <img src="{{ URL::asset('upload/news/'.$tra->thumbnail) }}"
                                       alt="{{$tra->heading}}"
                                       class="img-responsive">
                                    <p>{{$tra->heading}}</p>
                                 </a>
                              </li>
                              @endforeach
                              @endif
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section>
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                <a id="add_link_2" target="_blank" href=""><img id="image-position-id-2" src="http://placehold.it/960x150" style="margin-bottom: 10px;" /></a>
               </div>
               <div class="col-md-6">
                 <a id="add_link_3" target="_blank" href=""><img id="image-position-id-3" src="http://placehold.it/960x150" style="margin-bottom: 10px;" /></a>
               </div>
            </div>
         </div>
      </section>
      <section class="cardd-raea-three">
         <div class="container">
            <div class="row">
               <div class="col-md-9">
                  <div class="row">
                     <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="cardd-4-title section-title ">
                          @if(isset($whole_banglaone)) <h3><a href="{{url('category/'.$whole_banglaone->cid.'/'.$whole_banglaone->cname)}}">{{$whole_banglaone->cname}}</a></h3>@endif
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6 col-sm-6 col-sx-12">
                        <div class="sp-top-post">
                           @if(isset($whole_banglaone))
                           <div class="sp-tp-img"> 
                              <a href="{{url('news-post/'.$whole_banglaone->id.'/'.$whole_banglaone->heading)}}">  
                                 <img class="card-img-top" src="{{ URL::asset('upload/news/'.$whole_banglaone->thumbnail) }}" alt="{{$whole_banglaone->heading}}" class="img-responsive" >
                              </a>
                           </div>
                           <div class="sp-caption">
                              <h2> <a href="{{url('news-post/'.$whole_banglaone->id.'/'.$whole_banglaone->heading)}}"> {{$whole_banglaone->heading}} </a></h2>
                              <p> <a href="{{url('news-post/'.$whole_banglaone->id.'/'.$whole_banglaone->heading)}}">  {!! str_limit(strip_tags($whole_banglaone->content), $limit = 205, $end = '') !!} </a></p>
                           </div>
                           @endif
                        </div>
                     </div>

                     <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="row">
                           @if(isset($whole_bangla))
                           @foreach($whole_bangla as $bangla)
                           <div class="col-md-6 col-sm-5 col-xs-12">
                              <div class="small-card">
                                 <div class="small-cd-img"> 
                                    <a href="{{url('news-post/'.$bangla->id.'/'.$bangla->heading)}}"> 
                                       <img src="{{ URL::asset('upload/news/'.$bangla->thumbnail) }}" alt="{{$bangla->heading}}" class="img-responsive" > 
                                    </a>
                              </div>
                                 <div class="sm-cd-caption">
                                    <h3> <a href="{{url('news-post/'.$bangla->id.'/'.$bangla->heading)}}">  {{$bangla->heading}}</a></h3>
                                 </div>
                              </div>
                           </div>
                           @endforeach
                           @endif
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="section-margin">
                     <div class="cardd-4-title section-title section-title-2">
                        @if(isset($jobone))<h3> <a href="{{url('category/'.$jobone->cid.'/subcategory/'.$jobone->scid.'/'.$jobone->sname)}}"> {{$jobone->sname}} </a></h3>@endif
                     </div>
                     @if(isset($job))
                           @foreach($job as $jd)
                     <div class="sp-warp">
                        <div class="sp-img"> <a href="{{url('news-post/'.$jd->id.'/'.$jd->heading)}}"> <img
                           src="{{ URL::asset('upload/news/'.$jd->thumbnail) }}"
                           alt="{{$jd->heading}}"
                           class="img-responsive"></a></div>
                        <div class="sp-text">
                           <h3> <a href="{{url('news-post/'.$jd->id.'/'.$jd->heading)}}"> {{$jd->heading}} </a></h3>
                        </div>
                     </div>
                     @endforeach
                           @endif
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="cardd-raea-three">
         <div class="container">
            <div class="row">
               <div class="col-md-9">
                  <div class="row">
                     <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="cardd-4-title section-title section-title-2">
                           @if(isset($sportone))<h3><a href="{{url('category/'.$sportone->cid.'/'.$sportone->cname)}}">{{$sportone->cname}}</a></h3>@endif
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6 col-sm-6 col-sx-12">
                        @if(isset($sportone))
                        <div class="sp-top-post">
                           <div class="sp-tp-img"> <a href="{{url('news-post/'.$sportone->id.'/'.$sportone->heading)}}"> <img
                              src="{{ URL::asset('upload/news/'.$sportone->thumbnail) }}"
                              alt="{{$sportone->heading}}"
                              class="img-responsive"> </a></div>
                           <div class="sp-caption">
                              <h2> <a href="{{url('news-post/'.$sportone->id.'/'.$sportone->heading)}}"> {{$sportone->heading}}</a></h2>
                              <p> <a href="{{url('news-post/'.$sportone->id.'/'.$sportone->heading)}}"> {!! str_limit(strip_tags($sportone->content), $limit = 205, $end = '') !!} </a></p>
                           </div>
                        </div>
                        @endif
                     </div>
                     <div class="col-md-6 col-sm-5 col-xs-12">
                        @if(isset($sport))
                           @foreach($sport as $sp)
                        <div class="sp-warp">
                           <div class="sp-img"> <a href="{{url('news-post/'.$sp->id.'/'.$sp->heading)}}"> <img
                              src="{{ URL::asset('upload/news/'.$sp->thumbnail) }}"
                              alt="{{$sp->heading}}"
                              class="img-responsive"> </a></div>
                           <div class="sp-text">
                              <h3> <a href="{{url('news-post/'.$sp->id.'/'.$sp->heading)}}"> {{$sp->heading}}</a></h3>
                           </div>
                        </div>
                        @endforeach
                           @endif
                     </div>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="section-margin">
                     <div class="cardd-4-title section-title ">
                      <h3> <a href=""> জেলার খবর </a></h3>
                     </div>
                     <form  method="post" class="form-horizontal" action="{{url('country')}}">
                        {!! csrf_field() !!}
                        <div class="form-group">
                             <div class="col-xs-12 ">
                                 <select id="div" name="divid" class="form-control">
                                     <option >বিভাগ নির্বাচন করুন</option>
                                    @if(isset($division))
                                    @foreach($division as $divis)
                                       <option value="<?= $divis->id; ?>"><?= $divis->name; ?></option>
                                    @endforeach
                                    @endif
                                 </select>
                             </div>
                        </div>
                        <div class="form-group">
                           <div class="col-xs-12 ">
                              <select id="dist" name="disid" class="form-control">
                                  <option >জেলা নির্বাচন করুন</option>
                                  
                              </select>
                           </div>
                        </div>
                         <div class="form-group">
                             <div class="col-xs-5 col-xs-offset-2">
                                 <button type="submit" class="btn btn-outline-success btn-block">আপনার জেলার খবর পড়ুন</button>
                             </div>
                         </div>
                     </form>
                     <div class="clearfix"></div>
                     <div class="add">
                        <a id="add_link_4" target="_blank" href=""><img id="image-position-id-4" src="http://placehold.it/150x150" style="padding-top: 20px;" /></a>
                     </div>
                      
                  </div>
                              
               </div>
            </div>
         </div>
      </section>
      <section class="cardd-raea-three">
         <div class="container">
            <div class="row">
               <div class="col-md-9">
                  <div class="row">
                     <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="cardd-4-title section-title ">
                           @if(isset($entertainmentone))<h3><a href="{{url('category/'.$entertainmentone->cid.'/'.$entertainmentone->cname)}}">{{$entertainmentone->cname}}</a></h3>@endif
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6 col-sm-5 col-xs-12">
                        @if(isset($entertainment))
                           @foreach($entertainment as $enter)
                        <div class="sp-warp">
                           <div class="sp-img"> <a href="{{url('news-post/'.$enter->id.'/'.$enter->heading)}}"> <img
                              src="{{ URL::asset('upload/news/'.$enter->thumbnail) }}"
                              alt="{{$enter->heading}}"
                              class="img-responsive"> </a></div>
                           <div class="sp-text">
                              <h3> <a href="{{url('news-post/'.$enter->id.'/'.$enter->heading)}}"> {{$enter->heading}}</a></h3>
                           </div>
                        </div>
                         @endforeach
                           @endif
                     </div>
                     <div class="col-md-6 col-sm-6 col-sx-12">
                        @if(isset($entertainmentone))
                        <div class="sp-top-post">
                           <div class="sp-tp-img"> <a href="{{url('news-post/'.$entertainmentone->id.'/'.$entertainmentone->heading)}}"> <img
                              src="{{ URL::asset('upload/news/'.$entertainmentone->thumbnail) }}"
                              alt="'{{$entertainmentone->heading}}"
                              class="img-responsive"> </a></div>
                           <div class="sp-caption">
                              <h2> <a href="{{url('news-post/'.$entertainmentone->id.'/'.$entertainmentone->heading)}}">{{$entertainmentone->heading}} </a></h2>
                              <p> <a href="{{url('news-post/'.$entertainmentone->id.'/'.$entertainmentone->heading)}}"> {!! str_limit(strip_tags($entertainmentone->content), $limit = 205, $end = '') !!}</a></p>
                           </div>
                        </div>
                        @endif
                     </div>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="section-margin">
                     <div class="cardd-4-title section-title section-title-2">
                        @if(isset($livinglifeone)) <h3> <a href="{{url('category/'.$livinglifeone->cid.'/'.$livinglifeone->cname)}}">{{$livinglifeone->cname}} </a></h3>@endif
                     </div>
                     @if(isset($livinglife))
                           @foreach($livinglife as $life)
                     <div class="sp-warp">
                        <div class="sp-img"> <a href="{{url('news-post/'.$life->id.'/'.$life->heading)}}"> <img
                           src="{{ URL::asset('upload/news/'.$life->thumbnail) }}"
                              alt="'{{$life->heading}}"
                           class="img-responsive"> </a></div>
                        <div class="sp-text">
                           <h3> <a href="{{url('news-post/'.$life->id.'/'.$life->heading)}}">{{$life->heading}} </a></h3>
                        </div>
                     </div>
                      @endforeach
                           @endif
                  </div>
                  <div class="clearfix"></div>
                     <div class="add">
                         <a id="add_link_5" target="_blank" href=""><img id="image-position-id-5" src="http://placehold.it/150x150" style="padding-top: 20px;" /></a>
                     </div>
                  </div>
               </div>

            </div>
         </div>
      </section>
      <section class="cardd-two">
         <div class="container" style="padding-top: 20px;">
            <div class="row"></div>
            <div class="cardd-two-warp section-margin">
               <div class="row">
                  <div class="col-md-12">
                     <div class="row">
                        <div class="col-md-3 blue">
                           @if(isset($eduone))
                           <div class="section-title ">
                              <h3> <a href="{{url('category/'.$eduone->cid.'/'.$eduone->cname)}}"> {{ $eduone->cname }} </a></h3>
                           </div>
                           <div class="single-cardd">
                              <div class="cardd-img"> <a href="{{url('news-post/'.$eduone->id.'/'.$eduone->heading)}}"> <img
                                 src="{{ URL::asset('upload/news/'.$eduone->thumbnail) }}"
                                 alt="{{ $eduone->heading }}"
                                 class="img-responsive"> </a>
                              </div>
                              <div class="cardd-tw-caption">
                                 <h2> <a href="{{url('news-post/'.$eduone->id.'/'.$eduone->heading)}}"> {{ $eduone->heading }} </a></h2>
                              </div>
                              @endif
                              <div class="option-cardd">
                                 <ul class="list-unstyled">
                                    @if(isset($edu))
                                    @foreach($edu as $edudata)
                                    <li>
                                       <a href="{{url('news-post/'.$edudata->id.'/'.$edudata->heading)}}">
                                          <img src="{{ URL::asset('upload/news/'.$edudata->thumbnail) }}"
                                          alt="{{$edudata->heading}}"
                                          class="img-responsive">
                                          <p>{{$edudata->heading}}</p>
                                       </a>
                                    </li>
                                    @endforeach
                                    @endif
                                 </ul>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-3 blue">
                           @if(isset($lifestyleone))
                           <div class="section-title section-title-2">
                              <h3><a href="{{url('category/'.$lifestyleone->cid.'/'.$lifestyleone->cname)}}">{{ $lifestyleone->cname }}</a></h3>
                           </div>
                           <div class="single-cardd">
                              <div class="cardd-img"> <a href="{{url('news-post/'.$lifestyleone->id.'/'.$lifestyleone->heading)}}"> <img
                                 src="{{ URL::asset('upload/news/'.$lifestyleone->thumbnail) }}"
                                 alt="{{ $lifestyleone->cname }}"
                                 class="img-responsive"> </a>
                              </div>
                              <div class="cardd-tw-caption">
                                 <h2> <a href="{{url('news-post/'.$lifestyleone->id.'/'.$lifestyleone->heading)}}"> {{ $lifestyleone->heading }} </a></h2>
                              </div>
                               @endif
                              <div class="option-cardd">
                                 <ul class="list-unstyled">
                                    @if(isset($lifestyle))
                                    @foreach($lifestyle as $style)
                                    <li>
                                       <a href="{{url('news-post/'.$style->id.'/'.$style->heading)}}">
                                          <img src="{{ URL::asset('upload/news/'.$style->thumbnail) }}"
                                          alt="{{$style->heading}}"
                                          class="img-responsive">
                                          <p>{{$style->heading}}</p>
                                       </a>
                                    </li>
                                    @endforeach
                                    @endif
                                    
                                 </ul>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-3 blue">
                           @if(isset($sciencetechnologyone))
                           <div class="section-title ">
                              <h3> <a href="{{url('category/'.$sciencetechnologyone->cid.'/'.$sciencetechnologyone->cname)}}"> {{ $sciencetechnologyone->cname }} </a></h3>
                           </div>
                           <div class="single-cardd">
                              <div class="cardd-img"> <a href="{{url('news-post/'.$sciencetechnologyone->id.'/'.$sciencetechnologyone->heading)}}"> <img
                                 src="{{ URL::asset('upload/news/'.$sciencetechnologyone->thumbnail) }}"
                                 alt="{{ $sciencetechnologyone->heading }}"
                                 class="img-responsive"> </a>
                              </div>
                              <div class="cardd-tw-caption">
                                 <h2> <a href="{{url('news-post/'.$sciencetechnologyone->id.'/'.$sciencetechnologyone->heading)}}"> {{ $sciencetechnologyone->heading }} </a></h2>
                              </div>
                              @endif
                              <div class="option-cardd">
                                 <ul class="list-unstyled">
                                    @if(isset($sciencetechnology))
                                    @foreach($sciencetechnology as $science)
                                    <li>
                                       <a href="{{url('news-post/'.$science->id.'/'.$science->heading)}}">
                                          <img src="{{ URL::asset('upload/news/'.$science->thumbnail) }}"
                                          alt="{{$science->heading}}"
                                          class="img-responsive">
                                          <p>{{$science->heading}}</p>
                                       </a>
                                    </li>
                                    @endforeach
                                    @endif
                                 </ul>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-3 blue">
                           @if(isset($healthone))
                           <div class="section-title section-title-2">
                              <h3><a href="{{url('category/'.$healthone->cid.'/'.$healthone->cname)}}">{{ $healthone->cname }}</a></h3>
                           </div>
                           <div class="single-cardd">
                              <div class="cardd-img"> <a href="{{url('news-post/'.$healthone->id.'/'.$healthone->heading)}}"> <img
                                 src="{{ URL::asset('upload/news/'.$healthone->thumbnail) }}"
                                 alt="{{ $healthone->cname }}"
                                 class="img-responsive"> </a>
                              </div>
                              <div class="cardd-tw-caption">
                                 <h2> <a href="{{url('news-post/'.$healthone->id.'/'.$healthone->heading)}}"> {{ $healthone->heading }} </a></h2>
                              </div>
                               @endif
                              <div class="option-cardd">
                                 <ul class="list-unstyled">
                                    @if(isset($health))
                                    @foreach($health as $healthdata)
                                    <li>
                                       <a href="{{url('news-post/'.$healthdata->id.'/'.$healthdata->heading)}}">
                                          <img src="{{ URL::asset('upload/news/'.$healthdata->thumbnail) }}"
                                          alt="{{$healthdata->heading}}"
                                          class="img-responsive">
                                          <p>{{$healthdata->heading}}</p>
                                       </a>
                                    </li>
                                    @endforeach
                                    @endif
                                    
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="photo_gallery">
         <div class="container" style="padding-bottom: 20px;">
            <div class="row">
               <div class="col-lg-12">
                  <h3 style="font-size: 19px;" class="block_title gallary_title"> <a href="#"> ফটো গ্যালারী </a></h3>
               </div>
            </div>
            <div class="row">
               <div class="col-lg-8 col-md-8 col-sm-8">
                  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                     <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="4"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="5"></li>
                     </ol>
                     <div class="carousel-inner" role="listbox">
                        @if(isset($top_gallery))
                        <?php $i = 1; ?>
                        @foreach($top_gallery as $gallery)
                        
                        <?php 
                           if($i=='1')
                           {
                              $gClass = 'class="item active"';
                           }
                           else{
                              $gClass = 'class="item"';  
                           }
                        ?>
                        <div <?= $gClass?> >
                           <div class="video_content">
                              <div class="v_content1_img"> <a href="{{url('news-post/'.$gallery->id.'/'.$gallery->heading)}}" > <img
                                 src="{{ URL::asset('upload/news/'.$gallery->thumbnail) }}"
                                 class="img-responsive"  alt="{{$gallery->heading}}"> </a></div>
                              <p> <a  href="{{url('news-post/'.$gallery->id.'/'.$gallery->heading)}}"> {{$gallery->heading}} </a></p>
                           </div>
                        </div>
                        <?php $i++; ?>
                        @endforeach
                        @endif

                     </div>
                     <a class="left carousel-control" href="#carousel-example-generic" role="button"
                        data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#carousel-example-generic" role="button"
                        data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
                  </div>
               </div>
               <div class="col-md-offset-1 col-lg-3 col-md-3 col-sm-3">
                  <div class="row">
                     <div class="todays_news" style="margin-right: 15px;">
                       
                        <a href="archives.html" class="btn btn-success"
                           style="width: 100% !important; background: green !important; font-size: 18px;"> আর্কাইভ নিউজ </a>
                           <table id="calendar-demo" class="calendar"></table>
                     </div>

                  </div>
               </div>
            </div>
         </div>
      </section>

@endsection
@section('css')
   <style type="text/css">
      .common {height: 450px;overflow: scroll; }
      .common ul{list-style: none;}
      .common ul li{border-bottom: 1px solid #ddd;}
      .common ul li a{color: #000;}
      .common ul li a:hover{color: red;}

      .btn-outline-success{
            color:#5cb85c;
            background-image:none;
            background-color:transparent;
            border-color:#5cb85c;
            width: 160px;
         }
         .btn-outline-success:hover{
            color:#fff;
            background-color:#5cb85c;
         }
         div.aw-widget-current-inner a.aw-toggle{display: none}
         .section-title h3 a{color: #fff !important;}
      </style>
@endsection
@section('js')
<script type="text/javascript">

//adds
var addsJSON=jQuery.parseJSON('<?php echo json_encode($adds); ?>');

$(window).load(function(){
   $.each(addsJSON,function(key,row){
      //console.log(row);
      if(row.id==1)
      {
         $("#image-position-id-1").attr("src","{{ URL::asset('upload/adds') }}/"+row.add_image);
         $("a#add_link_1").attr("href", row.add_link);
         
      }
      else if(row.id==2)
      {
         $("#image-position-id-2").attr("src","{{ URL::asset('upload/adds') }}/"+row.add_image);
         $("a#add_link_2").attr("href", row.add_link);
      }
      else if(row.id==3)
      {
         $("#image-position-id-3").attr("src","{{ URL::asset('upload/adds') }}/"+row.add_image);
         $("a#add_link_3").attr("href", row.add_link);
      }
      else if(row.id==4)
      {
         $("#image-position-id-4").attr("src","{{ URL::asset('upload/adds') }}/"+row.add_image);
         $("a#add_link_4").attr("href", row.add_link);
      }
      else if(row.id==5)
      {
         $("#image-position-id-5").attr("src","{{ URL::asset('upload/adds') }}/"+row.add_image);
         $("a#add_link_5").attr("href", row.add_link);
      }
   });
});
// ajax load District

$("#div").click(function () {

    var div = $(this).val();
    if (div == null || div == 0)
    {
        var loadingscid = '<option value="0">বিভাগ নির্বাচন করুন</option>';
        $("#dist").html(loadingscid);
    } else
    {
        var loadingscid = '<option value="0">Loading Please Wait...</option>';
        $("#dist").html(loadingscid);
        $.post("{{url('User/ajax/districtData')}}", {'div': div, '_token': '<?php echo csrf_token(); ?>'}, function (divdata) {
            //console.log(cdata);
            var loadingscid = '<option value="0">জেলা নির্বাচন করুন</option>';
            $.each(divdata, function (index, val) {
                //console.log(val);
                loadingscid += '<option value="' + val.id + '">' + val.name + '</option>';
            });
            var getlength = divdata.length;
            //console.log(getlength);
            if (getlength == 0)
            {
                var loadingscid = '<option value="0">বিভাগ নির্বাচন করুন</option>';
                $("#dist").html(loadingscid);
            } else
            {
                $("#dist").html(loadingscid);
            }
        });
    }
});

$(".calendar-container").click(function(){
   $(".calendar-curr-month").each(function(){
      var $currMonth= $(this).text();
      //alert($currMonth);
   $(".selected").each(function(){
      var $curDate= $(this).text();
      var calendarDate = ($curDate + ' ' +$currMonth);
      //alert(calendarDate);
      var month = new Array();
                  month[0] = "January";
                  month[1] = "February";
                  month[2] = "March";
                  month[3] = "April";
                  month[4] = "May";
                  month[5] = "June";
                  month[6] = "July";
                  month[7] = "August";
                  month[8] = "September";
                  month[9] = "October";
                  month[10] = "November";
                  month[11] = "December";
                  var date = new Date($currMonth + ' ' +$curDate )
                  var str = date.getFullYear() + '-' + month[date.getMonth()] + '-' + date.getDate()
                  //alert(str); die();
//new
                  //var dateString = '13-Dec-2015';
                  var date = new Date(str);
                  var month = date.getMonth() + 1;
                  month = ('0' + month).slice(-2);
                  var dateArray = str.split('-');
                  date = dateArray[0]+'-'+month+'-'+dateArray[2];
                  //alert(date); 
                  //die();

                  //var myKeyVals = { A1984 : 1, A9873 : 5, A1674 : 2, A8724 : 1, A3574 : 3, A1165 : 5 }

                  window.location.href="{{url('news/date/')}}/"+date;

                  
      });
   });
});
</script>
                
@endsection