<header class="border-b-2 flex px-10 py-3">
  <h1 class="me-auto text-3xl text-gray-600 font-bold">
    <a href="/about-me">Digital Garden</a>
  </h1>
  <nav class="flex items-center gap-6 me-5 text-xl text-gray-400 font-bold ">
    <a href="/">Garden</a>
    <a href="/apps">Apps</a>
    
    @auth
      <form action="/logout" method="POST" class="flex items-center text-pink-400 hover:text-pink-500 m-0">
        @csrf
        <button type="submit" class="flex gap-1 items-center">
          Logout
          <x-fas-right-from-bracket class="ms-1 h-6"/>
        </button>
      </form>
    @else
      <a href="/login" class="flex items-center text-pink-400 hover:text-pink-500">
        Login
        <x-fas-right-to-bracket class="ms-1 h-6"/>
      </a>
    @endauth
  </nav>
</header>
