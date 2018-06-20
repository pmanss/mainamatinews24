<section class="menu-area">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="stellarnav navtwo green-nav fixme">
                           <ul>
                              <li ><a href="{{url('homePage')}}">প্রচ্ছদ</a></li>
                              @if(isset($cat))
                              @foreach($cat as $ca)
                              <li>
                                 <a href="{{url('/category/'.$ca['id'].'/'.$ca['name'])}}">{{$ca['name']}}</a>
                                 @if(!empty($ca['scat']))
                                 
                                    <ul>
                                       @foreach($ca['scat'] as $sca)
                                       <li>
                                          <a href="{{url('category/'.$ca['id'].'/subcategory/'.$sca['id'].'/'.$sca['name'])}}">{{$sca['name']}}</a>
                                       </li>
                                       @endforeach
                                    </ul>
                                 
                                 @endif

                              </li>
                              @endforeach
                              @endif
                              
                           </ul>
                        </div>
               </div>
            </div>
         </div>
      </section>