<x-layout>
  <a href="/" class="inline-block text-black ml-4 mb-4">
    <i class="fa-solid fa-arrow-left"></i> Back
  </a>
  <div class="mx-4">
    <x-card class="p-10">
      <div class="flex flex-col md:flex-row items-center md:items-start justify-center text-center md:text-left">
        <img class="w-64 md:w-96 mr-0 md:mr-8 mb-6 md:mb-0" src="{{ $ad->imageUrl }}" alt="" />

        <div class="flex flex-col items-center md:items-start justify-center space-y-4">
          <h3 class="text-2xl mb-2">{{ $ad->title }}</h3>
          <div class="text-xl font-bold mb-4">{{ $ad->price }}</div>
          <div class="text-lg flex items-center">
            <i class="fa-solid fa-location-dot mr-2"></i> <span>Location: {{$ad->location}}</span>
          </div>
          <div class="text-lg flex items-center">
            <i class="fa-solid fa-door-open mr-2"></i> <span>Rooms: {{$ad->rooms}}</span>
          </div>
          <div class="text-lg flex items-center">
            <i class="fa-solid fa-ruler-combined mr-2"></i> <span>Size: {{$ad->size}}</span>
          </div>
          <div class="text-lg flex items-center">
            <i class="fa-solid fa-building mr-2"></i> <span>Type: {{$ad->type}}</span>
          </div>
          <div class="text-lg flex items-center">
            <i class="fa-solid fa-calendar-alt mr-2"></i> <span>End Date: {{$ad->endDate}}</span>
          </div>
        </div>
      </div>
    </x-card>
  </div>
</x-layout>
