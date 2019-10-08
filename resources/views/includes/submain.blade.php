<section id="submain">
        @include('includes.searchPosts')
   <?php $i = 0; ?>
        <h1 class="p-rank__title">アクセスランキング</h1>
        @foreach ($topPosts as $topPost)
        <div class="p-rank">
            <div class="p-rank__flex">
                <div class="p-rank__container1">
                    <span class="p-rank__number">{{ ++$i }}位</span>
                    <span class="p-rank__area">{{ $topPost->area->name }}</span>
                    <div class="p-rank__shop">
                        <a href="/posts/{{$topPost->id}}">{{$topPost->name}}</a>
                    </div>
                </div>
                <div>
                    <img src="{{ url('/images/posts/'.$topPost->photo['filename']) }}" class="p-rank__img">
                </div>
            </div>
        </div>
        @endforeach

</section>
