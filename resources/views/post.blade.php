@extends('layout')

@section('content')

  @include('_navbar')

  <div class="xl:w-1/2 mx-auto mt-5 mb-20">
    <div class="mt-16">
      <h1 class="text-5xl font-bold text-gray-800">{{ $post->title}}</h1>
      <p class="text-md mt-2 text-gray-400">{{ $post->updated_at->diffForHumans() }}</p>
    </div>
    <div class="text-lg mt-8 text-justify text-gray-800 leading-relaxed">
      {!! $post->body !!}
    </div>
  </div>

@endsection