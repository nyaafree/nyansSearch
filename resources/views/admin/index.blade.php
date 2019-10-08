@extends('layouts.admin')
@section('content')
  @component('admin.includes.main')

    @if (Session::has('flash_admin'))
       <div class="u-flash_message">
           {{ Session('flash_admin')}}
       </div>
    @endif
  @endcomponent
@endsection
