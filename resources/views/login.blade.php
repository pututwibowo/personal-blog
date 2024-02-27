@extends("layout")

@section("content")

  @include('_navbar')

  <div class="xl:w-1/3 mx-auto mt-5 mb-20">
    <div class="mt-10">
      @if(session()->has('success'))
        <div class="text-lg font-bold text-green-600" role="alert">
          {{ session('success') }}
        </div>
      @endif
      
      @if(session()->has('loginFailed'))
        <div class="text-lg font-bold text-red-600" role="alert">
          {{ session('loginFailed') }}
        </div>
      @endif

        
      <form action="/login" method="POST" class="bg-white rounded-md shadow-2xl p-5">
        @csrf
        <h1 class="text-gray-800 font-bold text-2xl mb-1">Login</h1>
        <p class="text-sm font-normal text-gray-600 mb-8">Welcome Back </p>
        <div class="flex items-center border-2 mb-6 py-2 px-3 rounded-2xl">
          <x-fas-at class="ms-1 h-4 text-gray-500"/>
          <input id="email" class=" pl-2 w-full outline-none border-none" type="email" name="email" placeholder="Email Address" />
        </div>
        <div class="flex items-center border-2 mb-6 py-2 px-3 rounded-2xl ">
          <x-fas-lock class="ms-1 h-4 text-gray-500"/>
          <input class="pl-2 w-full outline-none border-none" type="password" name="password" id="password" placeholder="Password" />
        </div>
        <button type="submit" class="block w-full bg-pink-500 mt-5 py-2 rounded-2xl hover:bg-pink-600 hover:-translate-y-1 transition-all duration-500 text-white font-semibold mb-2">Login</button>
        <div class="flex justify-between mt-4">
          {{-- <span class="text-sm ml-2 hover:text-pink-500 cursor-pointer hover:-translate-y-1 duration-500 transition-all">Forgot Password ?</span> --}}

          <a href="/registration" class="text-sm ml-2 pb-2 ">Have an account yet? <span class="text-blue-500 font-bold underline underline-offset-4">Register</span></a>
        </div>
      </form>

    </div>
  </div>

@endsection