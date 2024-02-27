@extends('layout')

@section('content')

  @include('_navbar')

  <div class="xl:w-1/2 mx-auto mt-5 mb-20">
    <div class="mt-10">
      <h1 class="text-5xl font-bold text-gray-800">{{ $post->title}}</h1>
      <p class="text-md mt-2 text-gray-400">{{ $post->updated_at->diffForHumans() }}</p>
    </div>
    <div class="mt-3 flex gap-4 items-center ">
      <a href="{{ route('posts.index') }}" class="flex items-center gap-2 border-2 rounded-lg px-4 py-2 bg-gray-100 hover:bg-gray-200">
        <x-fas-arrow-left class="h-6 text-gray-400 hover:text-blue-500"/>
        Back to Dashboard
      </a>
      <a href="{{ route('posts.show',['post'=>$post->slug]) }}">
        <x-fas-eye class="h-6 text-blue-400 hover:text-blue-500"/> 
      </a>
      
      <x-fas-pen class="h-6 text-orange-400 hover:text-orange-500 cursor-pointer"/>
      <x-fas-trash class="h-6 text-red-400 hover:text-red-500 cursor-pointer"/>
    </div>
    @if($post->image)
      <img src="/storage/{{ $post->image }}" class="my-5 h-96">
    @endif
    <div class="text-lg mt-8 text-justify text-gray-800 leading-relaxed">
      {!! $post->body !!}
    </div>
  </div>
@endsection