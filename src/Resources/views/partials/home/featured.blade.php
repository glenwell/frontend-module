@if(isset($featuredPosts) && $featuredPosts->count() >= 2)
    <section class="featured-posts">
        <div class="section-title">
            <h2>
                <span>Featured</span>
                <a class="d-block pull-right morefromcategory" href="/" marked="1"> More &nbsp; <i class="fa fa-angle-right"></i> </a>
                <div class="clearfix"></div>
            </h2>
        </div>
        <div class="card-columns listfeaturedtag">
            @foreach ($featuredPosts as $featuredPost)
                <!-- begin post -->
                <div class="card">
                    <div class="row">
                        <div class="col-md-5 wrapthumbnail">
                            @php
                                $imageParams = ["template" => "dynamic", "params" => ["w" => 210, "h" => 260]];
                            @endphp
                            <a href="{{url('story/'.$featuredPost->slug)}}" class="thumbnail" style="background-image:url({{ filter_var($featuredPost->image, FILTER_VALIDATE_URL) ? $featuredPost->image : Voyager::image($featuredPost->image, "", $imageParams) }});">
                            </a>
                        </div>
                        <div class="col-md-7">
                            @include('frontend::partials.post.card', ['post' => $featuredPost])
                        </div>
                    </div>
                </div>
                <!-- end post -->
            @endforeach
        </div>
    </section> 
@endif