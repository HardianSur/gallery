{{-- @dd($photos) --}}
@extends('components.main')

@section('container')
    <section class="mx-10 my-8 md:mx-20 md:my-16">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden w-full group cursor-pointer p-4">
            <div>
                <div class="flex justify-between">
                    <h1 class="text-2xl font-bold md:text-4xl hover:cursor-pointer">{{ $data->title }}</h1>
                    <div class="flex items-center gap-2">
                        <span class="text-gray-600 font-semibold text-xs">{{ $data->user->username }}</span>
                        <img class="w-8 h-8 rounded-full"
                            src="{{ $data->user->avatar ? url('storage/' . $data->user->avatar) : asset('asset/images/Default_pfp.svg') }}"
                            alt="Jese Leos">
                    </div>
                </div>
                <p class="mt-2 text-xs text-slate-600">{{ $data->description }}</p>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-lg overflow-hidden w-full cp-4 mt-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 p-4">
                @foreach ($photos as $photo)
                <div>
                    <figure class="relative max-w-sm transition-all duration-300 group cursor-pointer inset-shadow-sm hover:shadow-2xl">
                        <a href="{{ url("photo/detail/$photo->id") }}">
                            <img class="h-auto max-w-full rounded-lg" src="{{ url("storage/$photo->path") }}" alt="">
                        </a>
                        <figcaption class="absolute px-2 text-sm text-white font-semibold bottom-6 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <p>{{ $photo->title }}</p>
                        </figcaption>
                    </figure>
                </div>
                @endforeach
            </div>
            <div class="p-4">
                {{ $photos->links() }}
            </div>
        </div>
    </section>
@endsection
