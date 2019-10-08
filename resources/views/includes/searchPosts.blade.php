<div class="posts-search">
    <form action="/posts/filter/" method="GET">
        @csrf
        <div class="input-group">
            <input type="text" class="form-control" name="name">
            <span class="input-group-btn">
                <button class="btn btn-pink" type="submit">
                    <i class="fa fa-search fa-fw"></i>Search
                </button>
            </span>
        </div>
    </form>
</div>
