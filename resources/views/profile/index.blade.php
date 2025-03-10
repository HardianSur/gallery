@extends('components.main')

@section('container')
    <div class="py-8 px-4 mx-auto max-w-full lg:py-16 lg:px-4 border-white ">
        <section class="flex justify-center items-center gap-8 mb-6 lg:mb-16 md:grid-cols-2">

            <div class="w-11/12 p-6 flex flex-col items-center justify-center">
                <div class="mb-0">
                    <a href="#">
                        <img class="w-44 h-44 rounded-full"
                            src="{{ $user->avatar ? url('storage/' . $user->avatar) : asset('asset/images/Default_pfp.svg') }}"
                            alt="Jese Leos">
                    </a>
                </div>
                <div class="mt-1">
                    <h1 class="text-3xl font-bold">{{ $user->name }}</h1>
                </div>
                <div class="mt-3">
                    <h3 class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            class="size-5 bg-slate-200 rounded">
                            <path fill-rule="evenodd"
                                d="M2.75 4a.75.75 0 0 1 .75.75v4.5h5v-4.5a.75.75 0 0 1 1.5 0v10.5a.75.75 0 0 1-1.5 0v-4.5h-5v4.5a.75.75 0 0 1-1.5 0V4.75A.75.75 0 0 1 2.75 4ZM13 8.75a.75.75 0 0 1 .75-.75h1.75a.75.75 0 0 1 .75.75v5.75h1a.75.75 0 0 1 0 1.5h-3.5a.75.75 0 0 1 0-1.5h1v-5h-1a.75.75 0 0 1-.75-.75Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="font-medium">{{ $user->username }}</span>
                    </h3>
                </div>
                @if ($myProfile)
                <div class="mt-2">
                    <button data-modal-target="update-modal" data-modal-toggle="update-modal"
                        class="w-full px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                        Edit Profile
                    </button>
                </div>
                @endif
            </div>
        </section>

        <section id="buttonContainer" class="flex justify-center gap-2 mb-11">
            <button class="w-fit px-2 py-2 text-black border-b-2 border-black font-medium text-xl "
                id="album-button">Album</button>
            <button
                class="w-fit px-2 py-2 text-slate-600 hover:text-black  hover:border-b-2 hover:border-black font-medium text-xl "
                id="photo-button">Photo</button>

        </section>

        <section id="main-section">
            <div id="album-section">
                @if ($myProfile)
                <div class="grid grid-cols-1 gap-2 mx-6 mb-3 max-w-fit">
                    <div>
                        <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" data-value="add-album"
                            class="flex items-center gap-2 bg-gray-800 rounded-lg py-1 px-2 text-sm text-white font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm.75-11.25a.75.75 0 0 0-1.5 0v2.5h-2.5a.75.75 0 0 0 0 1.5h2.5v2.5a.75.75 0 0 0 1.5 0v-2.5h2.5a.75.75 0 0 0 0-1.5h-2.5v-2.5Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>Album</span>
                        </button>
                    </div>
                </div>
                @endif
                <div class="grid grid-cols-1 md:grid-cols-6 gap-4 mx-6" id="card-album-container">

                </div>
            </div>
            <div id="photo-section">
                @if ($myProfile)
                <div class="flex justify-between gap-2 mx-6 mb-3 max-w-fit">
                    <div>
                        <button data-modal-target="photo-modal" data-modal-toggle="photo-modal" data-value="add-photo"
                            class="flex items-center gap-1 bg-gray-800 rounded-lg py-1 px-2 text-sm text-white font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm.75-11.25a.75.75 0 0 0-1.5 0v2.5h-2.5a.75.75 0 0 0 0 1.5h2.5v2.5a.75.75 0 0 0 1.5 0v-2.5h2.5a.75.75 0 0 0 0-1.5h-2.5v-2.5Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>Photo</span>
                        </button>
                    </div>
                    <div class="flex items-center gap-1">
                        <div>
                            <div class="max-w-sm mx-auto">
                                <select id="order"
                                    class="bg-gray-800 rounded-lg py-1 px-2 text-sm text-white font-medium focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected value="">Order By</option>
                                    <option value="1">Upload</option>
                                    <option value="2">Like</option>
                                    <option value="3">Comment</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <div class="max-w-sm mx-auto">
                                <select id="sort"
                                    class="bg-gray-800 rounded-lg py-1 px-2 text-sm text-white font-medium focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected value="">Sort By</option>
                                    <option value="asc">Ascending</option>
                                    <option value="desc">Descending</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                <div class="grid grid-cols-1 md:grid-cols-6 gap-4 mx-6" id="card-photo-container">

                </div>
            </div>

        </section>

        @if ($myProfile)
            @include('profile.modal')
        @endif

    </div>

    <script>
        $(document).ready(function() {
            const user_id = @json($user->id);
            const myProfile = @json($myProfile);

            $('#photo-button').click(function() {
                loadPhotoCards();
                myProfile && getAlbumOptions();
                $('#album-section').hide();
                $('#photo-section').show();
            });

            $('#album-button').click(function() {
                loadAlbumCards();
                $('#photo-section').hide();
                $('#album-section').show();
            });

            $('#album-button').click();

            $('#buttonContainer button').click(function() {
                $('#buttonContainer button').addClass('text-slate-600');
                $('#buttonContainer button').removeClass('text-black border-b-2 border-black');

                $(this).removeClass('text-slate-600');
                $(this).addClass('text-black border-b-2 border-black');
            });

            function loadAlbumCards() {
                $.ajax({
                    url: `{{ url('album/retrieve_by_user/${user_id}') }}`,
                    method: 'GET',
                    success: function(response) {
                        if (response) {
                            var cardContainer = $('#card-album-container');
                            var cardHtml = ``;
                            cardContainer.empty();

                            if (myProfile) {
                                response.data.forEach(function(card) {
                                    cardHtml += `
                                        <div class="w-full max-h-52 md:w-48 md:max-h-64 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 card-item">
                                            <a href="{{ url('album/detail') }}/${card.id}">
                                                <img class="rounded-t-lg w-full max-h-28" src="${card.latest_photo ? '{{ url('storage/') }}/' + card.latest_photo.path : '{{ asset('asset/images/default-album.jpg') }}'}" alt="" />
                                            </a>
                                            <div class="p-2 grid grid-cols-2">
                                                <div>
                                                <a href="{{ url('album/detail') }}/${card.id}">
                                                    <span class="mb-2 text-sm font-semibold tracking-tight text-gray-900 dark:text-white">${card.title}</span>
                                                </a>
                                                </div>
                                                <div class="flex justify-end">
                                                <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="inline-flex items-end text-xs font-medium text-end text-black  mt-auto pr-1" data-element="btn_edit" data-value="${card.id}" >
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                                                        <path d="m5.433 13.917 1.262-3.155A4 4 0 0 1 7.58 9.42l6.92-6.918a2.121 2.121 0 0 1 3 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 0 1-.65-.65Z" />
                                                        <path d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0 0 10 3H4.75A2.75 2.75 0 0 0 2 5.75v9.5A2.75 2.75 0 0 0 4.75 18h9.5A2.75 2.75 0 0 0 17 15.25V10a.75.75 0 0 0-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5Z" />
                                                    </svg>
                                                </button>
                                                <button class="inline-flex items-end text-xs font-medium text-end text-black  mt-auto" data-element="btn_delete" data-value="${card.id}" data-title="${card.title}">
                                                    <svg class="w-[20px] h-[20px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                        <path fill-rule="evenodd" d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z" clip-rule="evenodd"/>
                                                    </svg>
                                                </button>
                                                </div>
                                            </div>
                                        </div>
                                    `;
                                });
                            }else{
                                response.data.forEach(function(card) {
                                    cardHtml += `
                                        <div class="w-full max-h-52 md:w-48 md:max-h-64 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 card-item">
                                            <a href="{{ url('album/detail') }}/${card.id}">
                                                <img class="rounded-t-lg w-full max-h-28" src="${card.latest_photo ? '{{ url('storage/') }}/' + card.latest_photo.path : '{{ asset('asset/images/default-album.jpg') }}'}" alt="" />
                                            </a>
                                            <div class="p-2 grid grid-cols-2">
                                                <div>
                                                <a href="{{ url('album/detail') }}/${card.id}">
                                                    <span class="mb-2 text-sm font-semibold tracking-tight text-gray-900 dark:text-white">${card.title}</span>
                                                </a>
                                                </div>
                                            </div>
                                        </div>
                                    `;
                                });
                            }

                            cardContainer.html(cardHtml);
                            initFlowbite();

                        } else {
                            console.log("No cards available or error with data.");
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log("Error: " + error);
                    }
                });
            }
            //END OF ALBUM FUNCTION

            //PHOTO FUNCTION
            function loadPhotoCards() {
                var order = $('#order').val();
                var sort = $('#sort').val();

                $.ajax({
                    url: `{{ url('photo/retrieve_by_user/${user_id}') }}`,
                    method: 'GET',
                    data: { order: order, sort: sort },
                    success: function(response) {
                        if (response) {
                            var cardContainer = $('#card-photo-container');
                            cardContainer.empty();

                            if(myProfile){
                                response.data.forEach(function(card) {
                                    var cardHtml = `
                                        <div class="w-max-sm w-full max-h-52 md:w-48 md:max-h-64 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 card-item">
                                            <a href="{{ url('photo/detail') }}/${card.id}">
                                                <img class="rounded-t-lg w-full max-h-28" src="{{ url('storage/${card.path}') }}" alt="${card.title}" />
                                            </a>
                                            <div class="m-2">
                                                <div class="flex justify-start items-center gap-0.5">
                                                    <div class="flex items-center">
                                                        <button data-value="${card.id}" id="like-button">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" fill="currentColor" class="size-5 fill-slate-900">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                                            </svg>
                                                        </button>
                                                        <span class="text-gray-800 font-semibold text-xs" id="like-count">${card.like_total}</span>
                                                    </div>
                                                    <div class="flex items-center">
                                                        <button>
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                                                                <path fill-rule="evenodd" d="M10 3c-4.31 0-8 3.033-8 7 0 2.024.978 3.825 2.499 5.085a3.478 3.478 0 0 1-.522 1.756.75.75 0 0 0 .584 1.143 5.976 5.976 0 0 0 3.936-1.108c.487.082.99.124 1.503.124 4.31 0 8-3.033 8-7s-3.69-7-8-7Zm0 8a1 1 0 1 0 0-2 1 1 0 0 0 0 2Zm-2-1a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm5 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z" clip-rule="evenodd" />
                                                            </svg>
                                                        </button>
                                                        <span class="text-gray-800 font-semibold text-xs">${card.comment_total}</span>
                                                    </div>
                                                </div>
                                                <div class="grid grid-cols-1">
                                                    <div>
                                                    <a href="{{ url('photo/detail') }}/${card.id}">
                                                        <span class="mb-2 text-sm font-semibold tracking-tight text-gray-900 dark:text-white">${card.title}</span>
                                                    </a>
                                                    </div>
                                                    <div class="flex justify-between">
                                                    <button data-modal-target="photo-modal" data-modal-toggle="photo-modal" class="inline-flex items-end text-xs font-medium text-end text-black  mt-auto pr-1" data-element="btn_edit" data-value="${card.id}" >
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                                                            <path d="m5.433 13.917 1.262-3.155A4 4 0 0 1 7.58 9.42l6.92-6.918a2.121 2.121 0 0 1 3 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 0 1-.65-.65Z" />
                                                            <path d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0 0 10 3H4.75A2.75 2.75 0 0 0 2 5.75v9.5A2.75 2.75 0 0 0 4.75 18h9.5A2.75 2.75 0 0 0 17 15.25V10a.75.75 0 0 0-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5Z" />
                                                        </svg>
                                                    </button>
                                                    <button class="inline-flex items-end text-xs font-medium text-end text-black  mt-auto" data-element="btn_delete" data-value="${card.id}" data-title="${card.title}">
                                                        <svg class="w-[20px] h-[20px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                            <path fill-rule="evenodd" d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z" clip-rule="evenodd"/>
                                                        </svg>
                                                    </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    `;
                                    cardContainer.append(cardHtml);
                                    initFlowbite();
                                });
                            }else{
                                response.data.forEach(function(card) {
                                    var cardHtml = `
                                        <div class="w-max-sm w-full max-h-52 md:w-48 md:max-h-64 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 card-item">
                                            <a href="{{ url('photo/detail') }}/${card.id}">
                                                <img class="rounded-t-lg w-full max-h-28" src="{{ url('storage/${card.path}') }}" alt="${card.title}" />
                                            </a>
                                            <div class="m-2">
                                                <div class="flex justify-start items-center gap-0.5">
                                                    <div class="flex items-center">
                                                        <button data-value="${card.id}" id="like-button">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" fill="currentColor" class="size-5 fill-slate-900">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                                            </svg>
                                                        </button>
                                                        <span class="text-gray-800 font-semibold text-xs" id="like-count">${card.like_total}</span>
                                                    </div>
                                                    <div class="flex items-center">
                                                        <button>
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                                                                <path fill-rule="evenodd" d="M10 3c-4.31 0-8 3.033-8 7 0 2.024.978 3.825 2.499 5.085a3.478 3.478 0 0 1-.522 1.756.75.75 0 0 0 .584 1.143 5.976 5.976 0 0 0 3.936-1.108c.487.082.99.124 1.503.124 4.31 0 8-3.033 8-7s-3.69-7-8-7Zm0 8a1 1 0 1 0 0-2 1 1 0 0 0 0 2Zm-2-1a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm5 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z" clip-rule="evenodd" />
                                                            </svg>
                                                        </button>
                                                        <span class="text-gray-800 font-semibold text-xs">${card.comment_total}</span>
                                                    </div>
                                                </div>
                                                <div class="grid grid-cols-1">
                                                    <div>
                                                    <a href="{{ url('photo/detail') }}/${card.id}">
                                                        <span class="mb-2 text-sm font-semibold tracking-tight text-gray-900 dark:text-white">${card.title}</span>
                                                    </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    `;
                                    cardContainer.append(cardHtml);
                                    initFlowbite();
                                });
                            }
                        } else {
                            console.log("No cards available or error with data.");
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log("Error: " + error);
                    }
                });
            }

            @if ($myProfile)
                @include('profile.crud-script')
            @endif
        });
    </script>
@endsection
