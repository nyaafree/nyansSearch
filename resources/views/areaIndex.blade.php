@extends('layouts.app')


@section('content')
  <div class="c-slick js-slick">
      @foreach ($posts as $post)
          <div>
              <div class="c-slick__item"
              style="background:url(/images/posts/{{ $post->photo['filename'] }})">
                  <a href="{{ url('/posts/'.$post->id) }}" class="c-slick__wrapper">
                      <div class="c-ribbon lblue">{{ $post->area->name }}</div>
                      <div class="c-ribbon special">{{ $post->name }}</div>
                  </a>
              </div>
          </div>
      @endforeach
  </div>
  <div class="u-main-flex">
      @include('includes.searchResults')
      @include('includes.submain')
  </div>

  @include('includes.sprank')



  <script>
      if(window.matchMedia( '(min-width: 1200px)' ).matches) {

          $(document).ready(function(){
          $('.js-slick').slick({
          infinite:true,
          slidesToShow: 4,
          slidesToScroll: 4,
          arrows:false,

          });
      });
      //600px以下の場合
     } else if(window.matchMedia( '(min-width: 750px)' ).matches){
        $(document).ready(function(){
        $('.js-slick').slick({
           infinite:true,
           slidesToShow: 2,
           slidesToScroll: 2,
           arrows:false,

       });
     });

    }else{
        $(document).ready(function(){
        $('.js-slick').slick({
           infinite:true,
           slidesToShow: 1,
           slidesToScroll: 1,
           arrows:false,

       });
     });
    }
  </script>
@endsection
