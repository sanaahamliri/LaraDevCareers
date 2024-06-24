<x-layout>
  @if (!Auth::check())
    @include('partials._hero')
  @endif

  @include('partials._search')

  <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

    @unless(count($ads) == 0)

    @foreach($ads as $ad)
    <x-listing-card :ad="$ad" />
    @endforeach

    @else
    <p>No listings found</p>
    @endunless

  </div>

  
  <div class="mt-6 p-4">
    {{$ads->links()}}
  </div>
</x-layout>