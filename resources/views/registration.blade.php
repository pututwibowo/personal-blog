@extends("layout")

@section("content")

  @include('_navbar')

  <div class="xl:w-1/3 mx-auto mt-5 mb-20">
    <div class="mt-10">
      @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
      @endif

      @if(session()->has('loginFailed'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('loginFailed') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
      @endif

        
      <form class="bg-white rounded-md shadow-2xl p-5">
        @csrf
        <h1 class="text-gray-800 font-bold text-2xl mb-1">Registration</h1>
        <p class="text-sm font-normal text-gray-600 mb-8">Welcome Back </p>
        {{-- Name --}}
        <div class="flex items-center border-2 mb-5 py-2 px-3 rounded-2xl">
          <x-fas-user class="ms-1 h-4 text-gray-500"/>
          <input id="name" class=" pl-2 w-full outline-none border-none" type="text" name="name" placeholder="Name" />
        </div>
        {{-- Email --}}
        <div class="flex items-center border-2 mb-5 py-2 px-3 rounded-2xl">
          <x-fas-at class="ms-1 h-4 text-gray-500"/>
          <input id="email" class=" pl-2 w-full outline-none border-none" type="email" name="email" placeholder="Email Address" />
        </div>
        {{-- Password --}}
        <div class="flex items-center border-2 mb-5 py-2 px-3 rounded-2xl ">
          <x-fas-lock class="ms-1 h-4 text-gray-500"/>
          <input class="pl-2 w-full outline-none border-none" type="password" name="password" id="password" placeholder="Password" />
        </div>
        {{-- Confirm Password --}}
        <div class="flex items-center border-2 mb-8 py-2 px-3 rounded-2xl ">
          <x-fas-lock class="ms-1 h-4 text-gray-500"/>
          <input class="pl-2 w-full outline-none border-none" type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" />
        </div>

        <button type="submit" class="block w-full bg-pink-500 mt-5 py-2 rounded-2xl hover:bg-pink-600 hover:-translate-y-1 transition-all duration-500 text-white font-semibold mb-2">Register</button>
        <div class="flex justify-between mt-4">

          {{-- <span class="text-sm ml-2 hover:text-pink-500 cursor-pointer hover:-translate-y-1 duration-500 transition-all">Forgot Password ?</span> --}}

          <a href="/login" class="text-sm ml-2 pb-2 ">Have an account yet? <span class="text-blue-500 font-bold underline underline-offset-4">Login</span></a>
        </div>
      </form>

    </div>
  </div>

@endsection