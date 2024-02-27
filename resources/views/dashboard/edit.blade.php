
@extends('layout')

{{-- Trix editor  --}}
@prependOnce('trix-editor')
<!-- Trix Editor -->
<link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
<script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>

<style>
  trix-toolbar [data-trix-button-group="file-tools"] {
    display: none;
  }
</style>
@endprependOnce

@section('content')

  @include('_navbar')

  <div class="xl:w-1/2 mx-auto mt-5 mb-20">

    <h1 class="mt-10 text-5xl font-bold text-gray-800">Upadate Post</h1>

    <div class="mt-3 flex gap-4 items-center ">
      <a href="{{ route('posts.index') }}" class="flex items-center gap-2 border-2 rounded-lg px-4 py-2 bg-gray-100 hover:bg-gray-200">
        <x-fas-arrow-left class="h-6 text-gray-400 hover:text-blue-500"/>
        Back to Dashboard
      </a>
    </div>
    
    <form method="POST" action="{{ route('posts.update',['post'=>$post->slug]) }}" enctype="multipart/form-data" class="mt-10">
      @csrf
      @method('PUT')
      <div class="mb-3">
        <label for="title" class="block text-xl text-gray-800 font-medium ">Title</label>
        <input type="text" class="border-2 w-full h-11 rounded-md shadow-md " id="title" name="title" value="{{ old('title',$post->title)  }}" autofocus>
        @error('title')
        <div class="text-red-500">
          {{ $message }}
        </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="slug" class="block text-xl text-gray-800 font-medium ">Slug</label>
        <input type="text" class="border-2 w-full h-11 rounded-md shadow-md " id="slug" name="slug" value="{{ old('slug',$post->slug) }}" >
        @error('slug')
        <div class="text-red-500">
          {{ $message }}
        </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="image" class="block text-xl text-gray-800 font-medium">Image file input</label>
        @if($post->image)
          <img src="{{ asset('storage/' . $post->image) }}" id="img-preview" class="mb-2 w-64">
        @else
        <img id="img-preview" class="mb-2 w-64">
        @endif
        <input type="file" id="image" name="image" onchange="previewImage()">
        @error('image')
        <div class="text-red-500">
          {{ $message }}
        </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="category" class="block text-xl text-gray-800 font-medium">Category </label>
        @error('category_id')
        <div class="text-red-500">
          {{ $message }}
        </div>
        @enderror
        <select id="category" name="category_id" class="bg-gray-50 border text-gray-700 text-lg rounded-md block w-full p-2.5 @error('category_id')  border-red-500 @enderror">
          <option >Open this select menu</option>
          @foreach($categories as $category)
          <option value="{{ $category->id }}" @selected(old('category_id', $post->category_id)==$category->id)>{{ $category->name }}</option>
          @endforeach
        </select>
      </div>

      <div class="mb-3">
        <label class="block text-xl text-gray-800 font-medium">Body</label>
        @error('body')
        <div class="text-red-500">
          {{ $message }}
        </div>
        @enderror
        <input id="body" type="hidden" name="body" value="{{ old('body',$post->body) }}">
        <trix-editor input="body"></trix-editor>
      </div>


      <button type="submit" class="rounded-lg w-1/3 bg-pink-500 mt-3 py-3 px-6 font-sans text-md font-bold uppercase text-white shadow-xl shadow-pink-500/30 transition-all hover:shadow-lg hover:shadow-pink-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none" >Update</button>
    </form>
  </div>

  <script>
    const slug = document.querySelector('#slug');
    const title = document.querySelector('#title');
    title.addEventListener('keyup',function(){
      if (!(title.value=='')){
        fetch('/dashboard/posts/check-slug?title='+ title.value)
          .then(response => response.json())
          .then(data => slug.value = data.slug)
        }else{
          slug.value = ''
        }
    });

    document.addEventListener('trix-file-accept', function(e){
      e.preventDefault();
    })

    function previewImage(){
      const image = document.querySelector('#image');
      const imagePreview = document.querySelector('#img-preview');

      imagePreview.style.display ='block';

      const oFReader = new FileReader();
      oFReader.readAsDataURL(image.files[0]);

      oFReader.onload = function(oFREvent){
        imagePreview.src = oFREvent.target.result;
      }
    }

  </script>

@endsection