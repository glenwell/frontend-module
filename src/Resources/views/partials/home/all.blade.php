@if(isset($posts) && $posts->count() >= 3)
<section class="recent-posts">
    <div class="section-title">
        <h2>
            <span>Great Reads</span>
            {{-- <a class="d-block pull-right morefromcategory" href="/category/category-1" marked="1"> More &nbsp; <i class="fa fa-angle-right"></i></a>
            <div class="clearfix"></div> --}}
        </h2>
    </div>
    <div class="row listrecent">
        @foreach ($posts as $post)
            <div class="col-lg-4 col-md-6 col-sm-12 card-all">
                <!-- begin post -->
                <div class="card">
                    @php
                        $imageParams = ["template" => "dynamic", "params" => ["w" => 800, "h" => 450]];
                    @endphp
                    
                    <a href="{{url('story/'.$post->slug)}}">
                        <img class="img-fluid" src="{{ filter_var($post->image, FILTER_VALIDATE_URL) ? $post->image : Voyager::image($post->image, "", $imageParams) }}" alt="">
                    </a>

                    @include('frontend::partials.post.card', ['post' => $post, 'excerptLimit' => 130])
                </div>
                <!-- end post -->
            </div>
            
        @endforeach
    </div>
</section>
@endif