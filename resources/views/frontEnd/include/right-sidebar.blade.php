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