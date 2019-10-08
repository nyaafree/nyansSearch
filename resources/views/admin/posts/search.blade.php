@extends('layouts.admin')
@section('content')

   @if (Session::has('flash_admin'))
   <div class="u-flash_message">
      {{ Session('flash_admin')}}
   </div>
   @endif


    @component('admin.includes.main')
    @component('admin.includes.title')
        口コミ検索結果一覧
    @endcomponent


    @include('admin.includes.searchForm')

    <a href="{{url('/admin/posts')}}">>>全ての口コミを見る</a>

    @if ($posts)
        <div class="u-posts-result">全<strong>{{count($posts)}}</strong>件の口コミが見つかりました</div>
        @include('admin.includes.postList')

    @else
        <div>入力されたキーワードでは口コミは見つかりませんでした</div>
    @endif

    @endcomponent




@endsection
