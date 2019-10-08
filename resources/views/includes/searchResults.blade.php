@if ($searchPosts)
    <section id="main">
        <h3 class="title">検索結果</h3>
        <div class="flex-main">
        @foreach ($searchPosts as $searchPost)
            <div class="c-post">
                    <div>
                        <img src="{{ url( '/images/posts/'.$searchPost->photo['filename']) }}" class="c-post__img">
                    </div>
                    <a href="{{ url('/posts/'.$searchPost->id) }}" class="c-post__link">
                        <h1 class="c-post__name">{{ $searchPost->name }}</h1>
                    </a>
                    <div class="c-post__container1">
                         <div class="c-post__date">{{$searchPost->created_at->diffForHumans() }}</div>
                        <div class="c-post__area">{{ $searchPost->area->name }}</div>
                    </div>
                <div class="c-post__review">{!! str_limit(html_entity_decode($searchPost->review),50) !!}...read more</div>

            </div>
        @endforeach
        </div>


    </section>
@endif

