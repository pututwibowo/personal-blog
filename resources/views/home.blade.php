@extends('layout')

@section('content')

  @include('_navbar')

  <div class="xl:w-1/2 mx-auto mt-5">
    <div class="mt-16">
      @include('_header')
    </div>
    <div class="mt-3">
      <h2 class="-mb-3 text-4xl font-bold">My Plants</h2>
      <div class="mt-4 p-4 text-justify rounded-lg shadow-lg shadow-pink-500/10 transition-all hover:shadow-lg hover:shadow-pink-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Etiam dignissim diam quis enim lobortis scelerisque fermentum dui faucibus. </p>
      </div>
      <div class=" mt-4 p-4 text-justify rounded-lg shadow-lg shadow-pink-500/10 transition-all hover:shadow-lg hover:shadow-pink-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none">
        <p>Etiam dignissim diam quis enim lobortis scelerisque fermentum dui faucibus. </p>
      </div>
      <div class="mt-4 p-4 text-justify  rounded-lg shadow-lg shadow-pink-500/10 transition-all hover:shadow-lg hover:shadow-pink-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none">
        <p>Volutpat maecenas volutpat blandit aliquam etiam erat velit scelerisque. Nisl tincidunt eget nullam non nisi est. </p>
      </div>
    </div>
  </div>
  

 



@endsection