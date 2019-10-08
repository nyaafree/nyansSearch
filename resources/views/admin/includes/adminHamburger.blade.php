<nav class="c-hamburger js-toggle-sp-menu-target">
        <ul class="c-hamburger__menu">
          <li class="c-hamburger__list js-nav-close"><a href="{{ url('/admin') }}"><i class="fa fa-fw fa-rocket"></i>管理画面トップ</a></li>
          <li class="c-hamburger__list js-nav-close"><a class="p-submenu__link" href="{{ url('/admin/posts') }}">レビュー投稿一覧</a></li>
          <li class="c-hamburger__list js-nav-close"><a class="p-submenu__link" href="{{ url('/admin/posts/create') }}">レビューを投稿</a></li>
          <li class="c-hamburger__list js-nav-close"><a href="{{ url('admin/areas') }}"><i class="far fa-map"></i>エリア編集</a></li>
          <li class="c-hamburger__list js-nav-close"><a class="p-submenu__link" href="{{ url('/admin/users') }}">ユーザー一覧</a></li>
          <li class="c-hamburger__list js-nav-close"><a class="p-submenu__link" href="{{ url('/admin/users/create') }}">新規ユーザー登録</a></li>
        </ul>
</nav>

