@extends('layout')

@section('content')

  @include('_navbar')

  <div class="xl:w-1/2 mx-auto mt-5 mb-20 p-0">
    <table class="xl:w-full table-auto">
      <thead class="bg-slate-700">
        <tr>
          <th class="border border-slate-600  font-semibold p-4 text-slate-200 text-left">No</th>
          <th class="border border-slate-600  font-semibold p-4 text-slate-200 text-left">Judul</th>
          <th class="border border-slate-600  font-semibold p-4 text-slate-200 text-left">Update_at</th>
          <th class="border border-slate-600  font-semibold p-4 text-slate-200 text-left">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($posts as $post)
        <tr>
          <td class="border border-slate-300 p-4 text-slate-500">{{ $loop->iteration }}</td>
          <td class="border border-slate-300 p-4 text-slate-500">{{ $post->title }}</td>
          <td class="border border-slate-300 p-4 text-slate-500">{{ $post->updated_at->diffForHumans() }}</td>
          <td class="border border-slate-300 p-4 text-slate-500">
            <div class="flex gap-4 items-center">
              <x-fas-pen class="h-6 text-gray-500 hover:text-gray-700 cursor-pointer"/>
              <x-fas-trash class="h-6 text-gray-500 hover:text-gray-700 cursor-pointer"/>
              <x-fas-eye class="h-6 text-gray-500 hover:text-gray-700 cursor-pointer"/>   
            </div>

          </td>
        </tr>    
        @endforeach
      </tbody>
    </table>
  </div>

@endsection