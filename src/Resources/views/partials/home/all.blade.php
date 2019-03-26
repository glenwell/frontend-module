@if(isset($posts) && $posts->count() >= 3)
<section class="recent-posts">
    <div class="section-title">
        <h2><span>All Stories</span></h2>
    </div>
    <div class="card-columns listrecent">
        @foreach ($posts as $post)
            <!-- begin post -->
            <div class="card" style="height:505px;">
                @php
                    $imageParams = ["template" => "dynamic", "params" => ["w" => 360, "h" => 240]];
                @endphp
                
                <a href="{{url('story/'.$post->slug)}}">
                    <img class="img-fluid" src="{{ filter_var($post->image, FILTER_VALIDATE_URL) ? $post->image : Voyager::image($post->image, "", $imageParams) }}" alt="">
                </a>

                @include('frontend::partials.post.card', ['post' => $post, 'excerptLimit' => 130])
            </div>
            <!-- end post -->
        @endforeach
    </div>
</section>
@endif