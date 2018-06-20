<div class="container" style="padding-bottom: 20px;">
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
               <div class="newstiker">
                  <p>
                     <span>শিরোনাম</span> 
                     <marquee direction="left" behavior="scroll" direction="left" onmouseover="this.stop();"
                        onmouseout="this.start();"> 
                        @if(isset($breakingnews))
                        @foreach($breakingnews as $news)
                        <a href="{{url('news-post/'.$news->com_news_id.'/'.$news->heading)}}"> {{$news->heading}} </a> 
                        @endforeach
                        @endif
                     </marquee>
                  </p>
               </div>
            </div>
         </div>
      </div>