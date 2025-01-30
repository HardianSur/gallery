{{-- @dd($data) --}}
@extends('components.main')

@section('container')
    <div class="mx-10 my-8 md:mx-20 md:my-16">
        <div class="lg:w-2/5 sm:w-3/5 w-11/12 bg-gray-100 dark:bg-gray-800 rounded-xl mx-auto border p-10 shadow-sm">
            <div class="inline-flex items-center justify-between w-full">
                <h3 class="font-bold text-xl sm:text-2xl text-gray-800 dark:text-white">Notifications</h3>
            </div>
            {{-- <p class="mt-8 font-medium text-gray-500 text-sm sm:text-base dark:text-white">Today</p> --}}
            @foreach ($data as $val)
                <a href="{{ url('photo/detail') . '/' . $val->data['photo_id'] }}">
                    <div class="mt-2 px-6 py-4 bg-white rounded-lg shadow w-full">
                        <div class=" inline-flex items-center justify-between w-full">
                            <div class="inline-flex items-center">
                                @if ($val->data['type'] == 'like')
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        class="size-6 mr-3 fill-red-600">
                                        <path
                                            d="m11.645 20.91-.007-.003-.022-.012a15.247 15.247 0 0 1-.383-.218 25.18 25.18 0 0 1-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0 1 12 5.052 5.5 5.5 0 0 1 16.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 0 1-4.244 3.17 15.247 15.247 0 0 1-.383.219l-.022.012-.007.004-.003.001a.752.752 0 0 1-.704 0l-.003-.001Z" />
                                    </svg>
                                    <h3 class="font-bold text-base text-gray-800">Like</h3>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="size-6 mr-3">
                                        <path fill-rule="evenodd"
                                            d="M4.804 21.644A6.707 6.707 0 0 0 6 21.75a6.721 6.721 0 0 0 3.583-1.029c.774.182 1.584.279 2.417.279 5.322 0 9.75-3.97 9.75-9 0-5.03-4.428-9-9.75-9s-9.75 3.97-9.75 9c0 2.409 1.025 4.587 2.674 6.192.232.226.277.428.254.543a3.73 3.73 0 0 1-.814 1.686.75.75 0 0 0 .44 1.223ZM8.25 10.875a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25ZM10.875 12a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Zm4.875-1.125a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <h3 class="font-bold text-base text-gray-800">Comment</h3>
                                @endif
                            </div>
                            <p class="text-xs text-gray-500">
                                {{ \Carbon\Carbon::parse($val->data['time'])->diffForHumans() }}
                            </p>
                        </div>
                        <p class="mt-1 text-sm">
                            {{ $val->data['message'] }}
                        </p>
                    </div>
                </a>
            @endforeach

            {{-- <button
                class="inline-flex text-sm bg-white justify-center px-4 py-2 mt-12 w-full text-red-500 items-center rounded font-medium
                    shadow border focus:outline-none transform active:scale-75 transition-transform duration-700 hover:bg-red-500
                    hover:text-white hover:-translate-y-1 hover:scale-110 dark:hover:bg-white dark:text-gray-800 dark:hover:text-gray-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 sm:mr-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Clear all notifications
            </button> --}}
        </div>
    </div>
@endsection
