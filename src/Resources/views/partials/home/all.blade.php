<section class="recent-posts">
    <div class="section-title">
        <h2><span>All Stories</span></h2>
    </div>
    <div class="card-columns listrecent">
        @foreach ($posts as $post)
            <!-- begin post -->
            <div class="card">
                @php
                    $imageParams = ["template" => "dynamic", "params" => ["w" => 210, "h" => 260]];
                    $avatarParams = ["template" => "dynamic", "params" => ["w" => 200, "h" => 200]];
                @endphp
                
                <a href="{{url($post->slug)}}">
                    <img class="img-fluid" src="{{ filter_var($post->image, FILTER_VALIDATE_URL) ? $post->image : Voyager::image($post->image, "", $imageParams) }}" alt="">
                </a>

                <div class="card-block">
                    <h2 class="card-title"><a href="{{url($post->slug)}}">{{$post->title}}</a></h2>
                    <h4 class="card-text" style="height: 65px;">{{str_limit($post->excerpt, 130)}}</h4>
                    <div class="metafooter">
                        <div class="wrapfooter">
                            @if(isset($post->author->name))
                                <span class="meta-footer-thumb">
                                    <a href="{{url($post->author->id)}}">
                                        <img class="author-thumb" src="{{ filter_var($post->author->avatar, FILTER_VALIDATE_URL) ? $post->author->avatar : Voyager::image($post->author->avatar, "", $imageParams) }}" alt="Sal">
                                    </a>
                                </span>
                            @endif
                            <span class="author-meta">
                                @if(isset($post->author->name))
                                    <span class="post-name">
                                        <a href="{{url($post->author->id)}}">{{isset($post->author->name) ? $post->author->name : "None"}}</a>
                                    </span><br/>
                                @endif
                                <span class="post-date">{{\Carbon\Carbon::parse($post->created_at)->toFormattedDateString()}}</span>{{-- <span class="dot"></span><span class="post-read">6 min read</span> --}}
                            </span>
                            <span class="post-read-more">
                                <a href="{{url($post->slug)}}" title="Read Story">
                                    <svg class="svgIcon-use" width="25" height="25" viewbox="0 0 25 25">
                                        <path d="M19 6c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2v14.66h.012c.01.103.045.204.12.285a.5.5 0 0 0 .706.03L12.5 16.85l5.662 4.126a.508.508 0 0 0 .708-.03.5.5 0 0 0 .118-.285H19V6zm-6.838 9.97L7 19.636V6c0-.55.45-1 1-1h9c.55 0 1 .45 1 1v13.637l-5.162-3.668a.49.49 0 0 0-.676 0z" fill-rule="evenodd"></path>
                                    </svg>
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end post -->
        @endforeach
    </div>
</section>