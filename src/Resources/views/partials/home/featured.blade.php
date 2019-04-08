@if(isset($featuredPosts) && $featuredPosts->count() >= 2)
    <section class="featured-posts">
        <div class="section-title">
            <h2>
                <span>Featured</span>
                {{-- <a class="d-block pull-right morefromcategory" href="/" marked="1"> More &nbsp; <i class="fa fa-angle-right"></i> </a>
                <div class="clearfix"></div> --}}
            </h2>
        </div>
        <div class="row listfeaturedtag">
            @foreach ($featuredPosts as $featuredPost)
                <div class="col-md-6">
                    <!-- begin post -->
                    <div class="card">
                        <div class="row">
                            <div class="col-md-5 wrapthumbnail">
                                @php
                                    $imageParams = ["template" => "dynamic", "params" => ["w" => 450, "h" => 800]];
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
                </div>
            @endforeach
        </div>
    </section> 
@endif