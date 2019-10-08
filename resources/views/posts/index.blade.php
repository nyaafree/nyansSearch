@extends('layouts.app')

@section('content')
     <section id="mainpost">
         <div class="p-post">
             <div class="p-post__route">
                 Home >> {{$post->area->name }} >> <span class="title">{{$post->name }}</span>
             </div>
             <div class="p-post__show">
                 <img src=" {{url('images/posts/'.$post->photo['filename'])}}" class="p-post__img">
             </div>
             <div class="p-post__shop">
                    <a href="{{$post->url}}">{{$post->name}}</a>
             </div>
             <div class="p-post__container1">
                 <div class="p-post__imgWrap">
                     <img src=" {{url('images/posts/'.$post->photo['filename'])}}" class="p-post__img">
                 </div>
                 <div class="p-post__sub">
                     <div class="p-post__container2">
                       <div class="p-post__day">投稿日：{{$post->created_at->format('Y/m/d')}}</div>
                       <div class="p-post__area">エリア：{{$post->area->name}}</div>
                     </div>
                     <div class="p-post__detail">
                         {{$post->detail}}
                     </div>
                 </div>
             </div>
             <div class="p-post__review">
                 {!! html_entity_decode($post->review) !!}
             </div>
         </div>
     </section>
@endsection
