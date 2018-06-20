<section class="topbar-three">
         <div class="container">
            <div class="row">
               <div class="header-tp">
                  <div class="col-md-12">
                     <div class="header-top-left">
                        <div class="header-tp-menu">
                           <p>
                             <div class="chat-up" align="center"> 
                             	
                             		
                             		<script type="text/javascript" src="http://english-date.appspot.com/index5.php"></script>
                             		|
                             		
                             		<script type="text/javascript" src="http://bangladate.appspot.com/index2.php"></script>
                             	
                             </div>

                           </p>
                        </div>
                     </div>
                     <div class="header-top-right">
                        <div class="Version-bar">
                           <div class="Version-btn"> <a href="#" class="btn btn-success">বাংলা দেখা না গেলে</a> <a href="#" class="btn btn-success">English Version</a></div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="topbar-three-wap">
                  <div class="col-md-3">
                     <div class="home-logo"> <a href="{{url('homePage')}}"> <img src="{{ asset('css/assets/logo.png') }}" alt=""> </a></div>
                  </div>
                  <div class="col-md-6">
                   
                    <a id="add_link_1" target="_blank" href=""> <img id="image-position-id-1" src="http://placehold.it/960x150" style="padding-top: 20px;" />
                    </a>
                      
                  </div>
                  <div class="col-md-3">
                     <div class="header-socile">
                        <ul class="list-unstyled">
                           <li><a href="" target="_blank"><i
                              class="fa fa-facebook-square"></i></a></li>
                           <li><a href="" target="_blank"><i
                              class="fa fa-twitter-square"></i></a></li>
                           <li><a href="" target="_blank"><i
                              class="fa fa-youtube-square"></i></a></li>
                           <li><a href="" target="_blank"><i
                              class="fa fa-google-plus-square"></i></a></li>
                           <li><a href="" target="_blank"><i
                              class="fa fa-linkedin-square"></i></a></li>
                        </ul>
                        <div class="header-search">
                           
                          <form action="{{url('search')}}" method="post">
                                {!! csrf_field() !!}
                              <div class="input-group"> <input type="text" class="form-control" name="search"
                                 value=""
                                 placeholder="খবর অনুসন্ধান করুন"
                                 required
                                 /> <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button></div>
                          </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>