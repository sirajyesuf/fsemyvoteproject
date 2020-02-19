
   
    <!--================Blog Area =================-->
    
    <hr>

    <section class="blog_area section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                       
@if(count($public_elections)==0)
<div class=" alert alert-info">
 NO PUBLIC ELECTION  POSTED NOW!

</div>
 
@endif



                      @foreach($public_elections as $public_election)
                        <article class="blog_item">
                            <div class="blog_item_img">
                                <img class="card-img rounded-0" src="{{asset('storage/'.$public_election->logo)}}">
                                
                            </div>

                            <div class="blog_details">
                                <a class="d-inline-block" href="{{route('voters.public.index',['election'=>$public_election->id])}}">

                                    <h2>{{$public_election->title}}</h2>
                                </a>
                                <p>{{$public_election->description}}</p>
                                <ul class="blog-info-link">
                                    <li>
                                        {{$public_election->end_date}}(enddate)
                                    </li>
                                   
                                </ul>
                            </div>
                        </article>
                        @endforeach

                        


                        <nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination">
                            
                            
                                    <div class="row">
              <div class="col-12 text-center">
                  {{$public_elections->links()}}
 
              </div>
              
            </div>
                            </ul>

                        </nav>
                       


                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <form action="#">
                               <div class="form-group">
                                  <div class="input-group mb-3">
                                     <input type="text" class="form-control" placeholder='Search Keyword'
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'">
                                     <div class="input-group-append">
                                        <button class="btn" type="button"><i class="ti-search"></i></button>
                                     </div>
                                  </div>
                               </div>
                               <button class="button rounded-0 primary-bg text-white w-100 btn_1" type="submit">Search</button>
                            </form>
                         </aside>

                        <aside class="single_sidebar_widget post_category_widget">
<!--                             side post
 -->                        </aside>

                        <aside class="single_sidebar_widget popular_post_widget">
<!--                             //smallsidepost
 -->                        </aside>
                       
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->

   
    