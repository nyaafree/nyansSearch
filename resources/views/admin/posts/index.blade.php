@extends('layouts.admin')
@section('content')

   @if (Session::has('flash_admin'))
   <div class="u-flash_message">
      {{ Session('flash_admin')}}
   </div>
   @endif


    @component('admin.includes.main')
    @component('admin.includes.title')
        投稿口コミー覧
    @endcomponent


    @include('admin.includes.searchForm')
    @include('admin.includes.postList')
        {{ $posts->links() }}
    @endcomponent




@endsection
