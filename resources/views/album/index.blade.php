{{-- @dd($data) --}}
@extends('components.main')

@section('container')
<section class="mx-10 my-8 md:mx-20 md:my-16">

    <div class="flex flex-col justify-center items-center md:grid md:grid-cols-4 gap-4" id="main-section">
        @foreach ($data as $d)

        <div class=" bg-white rounded-lg shadow-lg overflow-hidden max-w-xs w-full group cursor-pointer transform duration-500 hover:-translate-y-1">
            <a href="{{ url("album/detail/$d->id") }}">
                <img src="{{ $d->latestPhoto ? url('storage/' . $d->latestPhoto->path) : asset('asset/images/default-album.jpg') }}" alt="image ${data.title}" class="w-full h-64 object-cover">
            </a>
            <div class="px-4 pb-4 pt-1">
                <a href="{{ url("album/detail/$d->id") }}">
                <h4 class="text-lg font-bold text-gray-800 mb-2">{{ $d->title }}</h4>
                </a>
                {{-- <p class="text-gray-700 leading-tight mb-4">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam eu sapien porttitor, blandit velit ac,
                    vehicula elit. Nunc et ex at turpis rutrum viverra.
                </p> --}}
                <div class="flex justify-between items-center">
                    <div class="flex items-center">
                        <img src="{{ $d->user->avatar ? url('storage/' . $d->user->avatar) : asset('asset/images/Default_pfp.svg') }}" alt="Avatar" class="w-6 h-6 rounded-full mr-2 object-cover">

                        <span class="text-gray-800 font-semibold text-xs">{{ $d->user->username }}</span>
                    </div>
                    <span class="text-gray-600 text-xs">{{ $d->latestPhoto ? $d->latestPhoto->created_at->diffForHumans() : 'No photos yet' }}</span>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection
