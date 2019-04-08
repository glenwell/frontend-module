@if(isset($categories) && $categories->count() >= 2)
    <section class="recent-posts">
        @isset($categoryTitle)
            <div class="section-title">
                <h2>
                    <span>{{$categoryTitle}}</span>
                    <a class="d-block pull-right morefromcategory" href="/categories" marked="1"> All &nbsp; <i class="fa fa-angle-right"></i></a>
                    <div class="clearfix"></div>
                </h2>
            </div>
        @endisset
    
        <div class="row listrecent">
            @foreach ($categories as $category)
                <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                    <!-- begin post -->
                    <div class="card card-category">
                        @php
                            $imageParams = ["template" => "dynamic", "params" => ["w" => 400, "h" => 400]];
                        @endphp
                        
                        <a href="{{url('categories/'.$category->slug)}}">
                            <img class="img-fluid" src="{{ filter_var($category->image, FILTER_VALIDATE_URL) ? $category->image : Voyager::image($category->image, "", $imageParams) }}" alt="">
                        </a>

                        <div class="card-block">
                            <h2 class="card-title text-center">
                                <a href="{{url('categories/'.$category->slug)}}">{{str_limit($category->name, 60)}}</a>
                            </h2>
                        </div>
                    </div>
                    <!-- end post -->
                </div>
                
            @endforeach
        </div>
    </section>
@endif