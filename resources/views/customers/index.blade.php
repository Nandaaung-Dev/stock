@extends('layouts.customer')

@section('content')
<div class="container mx-auto">
    <div class="flex justify-between my-10">
        <h2 class="font-normal text-xl mb-2">What are you looking for?</h2>
        <a href="#" class="text-md text-blue-500" >View More</a>
    </div>
    <!-- grid container -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-x-6 gap-y-10">
        <!-- product card -->
        @foreach ($items as $item)

        {{-- {{ $item->image }} --}}
            <div class="max-w-sm rounded overflow-hidden shadow-lg">
                <img class="w-full" src="{{ url('storage/images/items/'.$item->image) }}">
                <div class="px-1 py-4">
                    <div class="flex justify-between items-center">
                        <h3 class="font-bold text-xl mb-2">{{$item->name}}</h3>
                        <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded">{{$item->condition}}</span>
                    </div>
                    <p class="text-blue-800">&dollar; {{$item->price}}</p>
                    <div class="px-1 py-2 flex justify-start items-center">
                        <div class="relative w-10 h-10 overflow-hidden bg-gray-100 rounded-full mr-2">
                            <svg class="absolute w-12 h-12 text-gray-400 -left-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                        </div>
                        <p>{{$item->owner_name}}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
