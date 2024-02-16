@extends('layout')

@section('content')

  @include('_navbar')

  <div class="xl:w-1/2 mx-auto mt-5 mb-20">
    <div class="mt-16">
      @include('_header')
    </div>
    <div class="mt-3">
      @include('_posts')
    </div>
  </div>
  

 



@endsection