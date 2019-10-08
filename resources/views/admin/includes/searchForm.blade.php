<div class="container">
    <form action="/admin/posts/filter" method="POST">
        @csrf
        <div class="input-group u-input-group">
            <input type="text" class="form-control" name="name">
            <span class="input-group-btn">
                <button class="btn u-btn-search" type="submit">
                    <i class="fa fa-search fa-fw"></i>Search
                </button>
            </span>
        </div>
    </form>
</div>
