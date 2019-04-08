@if(isset($recentPosts) && $recentPosts->count() == 5)
    <section class="recent-posts">
        <div class="section-title">
            <h2>
                <span>Recent</span>
            </h2>
        </div>
        <div class="row listrecent">
            <!-- begin post -->
            <div class="col-lg-4 col-md-12 col-sm-12 padr10">
                @if(isset($recentPosts[0]))
                    @php
                        $imageParams = ["template" => "dynamic", "params" => ["w" => 800, "h" => 450]];
                    @endphp
                    <div class="card highlighted">
                        <a href="{{url('story/'.$recentPosts[0]->slug)}}" class="thumbimage" style="background-image:url({{ filter_var($recentPosts[0]->image, FILTER_VALIDATE_URL) ? $recentPosts[0]->image : Voyager::image($recentPosts[0]->image, "", $imageParams) }})">
                        </a>
                        @include('frontend::partials.post.card', ['post' => $recentPosts[0], 'excerptLimit' => 130])
                    </div>
                @endif
            </div>
            <!-- end post -->
            <div class="col-lg-8 col-md-12 col-sm-12">
                <div class="row">
                    @foreach ($recentPosts as $index => $recentPost)
                        @if($index != 0)
                            @php
                                $imageParams = ["template" => "dynamic", "params" => ["w" => 800, "h" => 450]];
                            @endphp
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <div class="card post height262">
                                    <a class="thumbimage" href="{{url('story/'.$recentPost->slug)}}" style="background-image:url({{ filter_var($recentPost->image, FILTER_VALIDATE_URL) ? $recentPost->image : Voyager::image($recentPost->image, "", $imageParams) }});" marked="1"></a>
                                    @include('frontend::partials.post.card', ['post' => $recentPost, 'noExcerpt' => true])
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endif