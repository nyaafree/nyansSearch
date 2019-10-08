@if ($postsOther)
    <section id="main">
        <h3 class="title">最新の口コミ</h3>
        <div class="flex-main">
        @foreach ($postsOther as $postOther)
            <div class="c-post">
                    <div>
                        <img src="{{ url( '/images/posts/'.$postOther->photo['filename']) }}" class="c-post__img">
                    </div>
                    <a href="{{ url('/posts/'.$postOther->id) }}" class="c-post__link">
                        <h1 class="c-post__name">{{ $postOther->name }}</h1>
                    </a>
                    <div class="c-post__container1">
                         <div class="c-post__date">{{$postOther->created_at->diffForHumans() }}</div>
                        <div class="c-post__area">{{ $postOther->area->name }}</div>
                    </div>
                <div class="c-post__review">{!! str_limit(html_entity_decode($postOther->review),50) !!}...read more</div>

            </div>
        @endforeach
        </div>

        {{ $postsOther->links() }}
    </section>
@endif

