@extends('layout')

@section('content')

  @include('_navbar')

  <div class="xl:w-1/2 mx-auto mt-5 mb-20">

    <h1 class="mt-10 text-5xl font-bold text-gray-800">Create New Post</h1>

    <div class="mt-3 flex gap-4 items-center ">
      <a href="{{ route('posts.index') }}" class="flex items-center gap-2 border-2 rounded-lg px-4 py-2 bg-gray-100 hover:bg-gray-200">
        <x-fas-arrow-left class="h-6 text-gray-400 hover:text-blue-500"/>
        Back to Dashboard
      </a>
    </div>
    
    <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data" class="mt-10">
      @csrf
      <div class="mb-3">
        <label for="title" class="block text-xl text-gray-800 font-medium ">Title</label>
        <input type="text" class="border-2 w-full h-11 rounded-md shadow-md shadow-pink-500/15 border-pink-500/40 outline-pink-500" id="title" name="title" value="{{ old('title') }}" required autofocus>
        @error('title')
        <div class="text-red-500">
          {{ $message }}
        </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="slug" class="block text-xl text-gray-800 font-medium ">Slug</label>
        <input type="text" class="border-2 w-full h-11 rounded-md shadow-md shadow-pink-500/15 border-pink-500/40 outline-pink-500" id="slug" name="slug" value="{{ old('slug') }}" required>
        @error('slug')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>

      <div class="mb-3">
        <label class="block text-xl text-gray-800 font-medium ">Body</label>
        @error('body')
        <small class="text-danger d-block mb-1">
          {{ $message }}
        </small>
        @enderror
        <textarea class="border-2 w-full rounded-md shadow-md shadow-pink-500/15 border-pink-500/40 outline-pink-500" name="body" id="body" cols="50" rows="50">
        </textarea>
      </div>

      <button type="submit" class="rounded-lg w-1/3 bg-pink-500 mt-3 py-3 px-6 font-sans text-md font-bold uppercase text-white shadow-xl shadow-pink-500/30 transition-all hover:shadow-lg hover:shadow-pink-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none" >Create</button>
    </form>
  </div>

  <script>
    const slug = document.querySelector('#slug');
    const title = document.querySelector('#title');

    title.addEventListener('keyup',function(){
      fetch('/dashboard/posts/check-slug?title='+ title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });
  </script>

@endsection