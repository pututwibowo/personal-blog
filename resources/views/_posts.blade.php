
<h2 class="-mb-3 text-3xl text-gray-800 font-bold">My Plants</h2>
@foreach ($posts as $post)
<a href="/{{ $post->slug }}">
  <div class="mt-4 p-4 text-justify rounded-lg shadow-lg shadow-pink-500/10 transition-all hover:shadow-lg hover:shadow-pink-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none">
    <h3 class=" mb-2 text-xl font-medium text-gray-800">{{ $post->title }} </h3>
    <p class="text-gray-600">{{ $post->excerpt }}</p>
  </div>
</a>
@endforeach



