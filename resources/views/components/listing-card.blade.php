@props(['ad'])

<x-card>
  <div class="flex">
    <img class="hidden w-48 mr-6 md:block"
      src="{{ $ad['imageUrl'] }}" alt="" />
    <div>
      <h3 class="text-2xl">
        <a href="{{ route('ads.show', $ad->id) }}">{{ $ad['title'] }}</a>
      </h3>
      <div class="text-xl font-bold mb-4">{{ $ad['price'] }}</div>
      
      <div class="text-lg mt-4">
        <i class="fa-solid fa-location-dot"></i> {{ $ad['location'] }}
      </div>
    </div>
  </div>
</x-card>