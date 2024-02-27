@extends('layout')

@section('content')

  @include('_navbar')

  <div class="xl:w-1/2 mx-auto mt-10 mb-20 p-0">
    <h1 class="text-5xl font-bold text-gray-700">Dashboard</h1>
    <button class="flex items-center gap-2 mt-3 border-2 rounded-lg px-4 py-2 bg-gray-100 hover:bg-gray-200">
      <x-fas-circle-plus class="h-6 text-gray-500 cursor-pointer "/>  
      <a href="{{ route('posts.create') }}" class="text-lg font-bold text-gray-700">Create New Post</a> 
    </button>
    <table class="mt-5 xl:w-full table-auto">
      <thead class="bg-slate-700">
        <tr class="whitespace-nowrap">
          <th class="border border-slate-600  font-semibold p-4 text-slate-200 text-left">No</th>
          <th class="border border-slate-600  font-semibold p-4 text-slate-200 text-left">Judul</th>
          <th class="border border-slate-600  font-semibold p-4 text-slate-200 text-left">Update at</th>
          <th class="border border-slate-600  font-semibold p-4 text-slate-200 text-left">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($posts as $post)
        <tr>
          <td class="border border-slate-300 p-4 text-slate-500">{{ $loop->iteration }}</td>
          <td class="border border-slate-300 p-4 text-slate-500">{{ $post->title }}</td>
          <td class="border border-slate-300 p-4 text-slate-500 whitespace-nowrap">{{ $post->updated_at->diffForHumans() }}</td>
          <td class="border border-slate-300 p-4 text-slate-500">
            <div class="flex gap-4 items-center">
              <a href="{{ route('posts.show',['post'=>$post->slug]) }}">
                <x-fas-eye class="h-6 text-blue-400 hover:text-blue-500"/> 
              </a>
              <a href="{{ route('posts.edit',['post'=>$post->slug]) }}">
                <x-fas-pen class="h-6 text-orange-400 hover:text-orange-500 cursor-pointer"/>
              </a>
              <x-fas-trash class="h-6 text-red-400 hover:text-red-500 cursor-pointer"/>
            </div>

          </td>
        </tr>    
        @endforeach
      </tbody>
    </table>
  </div>

@endsection