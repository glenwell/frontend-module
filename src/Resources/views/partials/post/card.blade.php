<div class="card-block">
    <h2 class="card-title">
        <a href="{{url('story/'.$post->slug)}}">{{str_limit($post->title, 60)}}</a>
    </h2>
    @if(!isset($noExcerpt))
        <h4 class="card-text">
            {{str_limit($post->excerpt, $excerptLimit ?? 100)}}
        </h4>
    @endif
    <div class="metafooter">
        <div class="wrapfooter">
            @if(isset($post->author->name))
                <span class="meta-footer-thumb">
                    <a href="{{url('author/'.$post->author->id)}}">
                        <img class="author-thumb" src="{{ filter_var($post->author->avatar, FILTER_VALIDATE_URL) ? $post->author->avatar : Voyager::image($post->author->avatar, "", ["template" => "dynamic", "params" => ["w" => 200, "h" => 200]]) }}" alt="Sal">
                    </a>
                </span>
            @endif
            <span class="author-meta">
                @if(isset($post->author->name))
                    <span class="post-name">
                        <a href="{{url('author/'.$post->author->id)}}">{{isset($post->author->name) ? $post->author->name : "None"}}</a>
                    </span><br/>
                @endif
                <span class="post-date">{{\Carbon\Carbon::parse($post->created_at)->toFormattedDateString()}}</span>{{-- <span class="dot"></span><span class="post-read">6 min read</span> --}}
            </span>
            {{-- <span class="post-read-more">
                <a href="{{url($post->slug)}}" title="Read Story">
                    Hello
                </a>
            </span> --}}
        </div>
    </div>
</div>