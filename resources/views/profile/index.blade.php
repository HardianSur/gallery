@extends('components.main')

@section('container')
    <div class="py-8 px-4 mx-auto max-w-full lg:py-16 lg:px-4 border-white ">
        <section class="flex justify-center items-center gap-8 mb-6 lg:mb-16 md:grid-cols-2">

            <div class="w-11/12 p-6 flex flex-col items-center justify-center">
                <div class="mb-0">
                    <a href="#">
                        <img class="w-44 h-44 rounded-full"
                            src="{{ auth()->user()->avatar ? url('storage/'. auth()->user()->avatar) : asset('asset/images/Default_pfp.svg')}}"
                            alt="Jese Leos">
                    </a>
                </div>
                <div class="mt-1">
                    <h1 class="text-3xl font-bold">{{ auth()->user()->name }}</h1>
                </div>
                <div class="mt-3">
                    <h3 class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            class="size-5 bg-slate-200 rounded">
                            <path fill-rule="evenodd"
                                d="M2.75 4a.75.75 0 0 1 .75.75v4.5h5v-4.5a.75.75 0 0 1 1.5 0v10.5a.75.75 0 0 1-1.5 0v-4.5h-5v4.5a.75.75 0 0 1-1.5 0V4.75A.75.75 0 0 1 2.75 4ZM13 8.75a.75.75 0 0 1 .75-.75h1.75a.75.75 0 0 1 .75.75v5.75h1a.75.75 0 0 1 0 1.5h-3.5a.75.75 0 0 1 0-1.5h1v-5h-1a.75.75 0 0 1-.75-.75Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="font-medium">{{ auth()->user()->username }}</span>
                    </h3>
                </div>
                <div class="mt-2">
                    <button data-modal-target="update-modal" data-modal-toggle="update-modal"
                        class="w-full px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                        Edit Profile
                    </button>
                </div>
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
                <div class="grid grid-cols-2 gap-2 mx-6 mb-3 max-w-fit">
                    <div>
                        <button class="bg-gray-800 rounded-lg py-1 px-2 text-sm text-white font-medium">Filter</button>
                    </div>
                    <div>
                        <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" data-value="add-album"
                            class="bg-gray-800 rounded-lg py-1 px-2 text-sm text-white font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm.75-11.25a.75.75 0 0 0-1.5 0v2.5h-2.5a.75.75 0 0 0 0 1.5h2.5v2.5a.75.75 0 0 0 1.5 0v-2.5h2.5a.75.75 0 0 0 0-1.5h-2.5v-2.5Z"
                                    clip-rule="evenodd" />
                            </svg>

                        </button>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-6 gap-4 mx-6" id="card-album-container">

                </div>
            </div>
            <div id="photo-section">
                <div class="grid grid-cols-2 gap-2 mx-6 mb-3 max-w-fit">
                    <div>
                        <button class="bg-gray-800 rounded-lg py-1 px-2 text-sm text-white font-medium ">Filter</button>
                    </div>
                    <div>
                        <button data-modal-target="photo-modal" data-modal-toggle="photo-modal" data-value="add-photo"
                            class="bg-gray-800 rounded-lg py-1 px-2 text-sm text-white font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm.75-11.25a.75.75 0 0 0-1.5 0v2.5h-2.5a.75.75 0 0 0 0 1.5h2.5v2.5a.75.75 0 0 0 1.5 0v-2.5h2.5a.75.75 0 0 0 0-1.5h-2.5v-2.5Z"
                                    clip-rule="evenodd" />
                            </svg>

                        </button>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-6 gap-4 mx-6" id="card-photo-container">

                </div>
            </div>

        </section>

        @include('profile.modal')

    </div>

    <script>
        $(document).ready(function() {

            $('#photo-button').click(function() {
                loadPhotoCards();
                getAlbumOptions();
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

            //PROFILE FUNCTIONS
            $('#form-update').on("submit", function(e) {
                e.preventDefault();
                var token = $('meta[name="csrf-token"]').attr('content');
                var form = new FormData($('#form-update')[0]);
                form.append('_token', token);

                for (var pair of form.entries()) {
                    console.log(pair[0] + ': ' + pair[1]);
                }

                $.ajax({
                    type: "POST",
                    url: "{{ url('profile/') }}" + "/{{ auth()->user()->id }}",
                    data: form,
                    processData: false,
                    contentType: false,
                    dataType: "json",
                    success: function(response) {
                        console.log(response);

                        alert(response.message);
                        location.reload();
                    },
                    error: function(xhr, status, error) {

                        if (xhr.responseJSON) {
                            var errorMessages = '';
                            Object.keys(xhr.responseJSON).forEach(function(key) {
                                const messages = xhr.responseJSON[key];
                                errorMessages += messages.join('\n') + '\n';
                            });

                            alert(errorMessages);
                        } else {
                            alert("An unknown error occurred. Please try again.");
                        }
                    }
                })
            });

            $('#avatar').change(function(event) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#avatar-preview').attr('src', e.target.result).removeClass('hidden');
                }
                reader.readAsDataURL(event.target.files[0]);
            });

            // ALBUM FUNCTION
            $('[data-modal-target="crud-modal"]').on('click', function() {
                $('#crud-modal h3').text('Tambah Album');
                $('#id').val('');
                $('#name').val('');
                $('#description').val('');
            });

            $('.form').on("submit", function(e) {
                e.preventDefault();

                var token = $('meta[name="csrf-token"]').attr('content');

                var url = "{{ url('album/') }}";
                if ($('#id').val()) {
                    url += `/` + $('#id').val();
                }

                $.ajax({
                    type: "POST",
                    url: url,
                    data: {
                        name: $('#name').val(),
                        description: $('#description').val(),
                        _token: token
                    },
                    dataType: "json",
                    success: function(response) {
                        loadAlbumCards();
                        alert('Berhasil menambah album');

                    },
                    error: function(xhr, status, error) {
                        alert(xhr.responseJSON);
                        console.log("Terjadi error:", xhr);
                    }
                })
            });

            $('#album-section').on('click', '[data-element="btn_edit"]', function() {
                var id = $(this).data('value');
                $('#crud-modal h3').text('Edit Album');


                $.ajax({
                    url: `{{ url('album/retrieve/${id}') }}`,
                    type: "GET",
                    dataType: "Json",
                }).done(function(response) {
                    $('#id').val(`${response.data.id}`);
                    $('#name').val(`${response.data.title}`);
                    $('#description').val(response.data.description ?
                        `${response.data.description}` : ``)
                }).catch(error => {
                    console.log(error);
                });
            });

            $('#album-section').on('click', 'button[data-element=btn_delete]', function(e) {
                var _selectedID = $(this).data('value');
                var title = $(this).data('title');

                if (confirm(`Anda yakin ingin menghapus album ${title}?`)) {
                    $.ajax({
                        url: "{{ url('album') }}/" + _selectedID,
                        method: "delete",
                        data: {
                            _token: "{{ csrf_token() }}"
                        }
                    }).done(function(response) {
                        alert(response.message);
                        loadAlbumCards();
                    }).fail(function(error) {
                        alert(`Error: ${error.statusText}`);
                    });
                }

            });

            function loadAlbumCards() {
                $.ajax({
                    url: "{{ url('album/retrieve') }}",
                    method: 'GET',
                    success: function(response) {
                        if (response) {
                            var cardContainer = $('#card-album-container');
                            cardContainer.empty();

                            response.data.forEach(function(card) {
                                var cardHtml = `
                                    <div class="w-full max-h-52 md:w-48 md:max-h-64 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 card-item">
                                        <a href="#">
                                            <img class="rounded-t-lg w-full" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQB4sYLadZlYBjysS4PHq5-8p-EQHj9qeYxxQ&s" alt="" />
                                        </a>
                                        <div class="p-2 grid grid-cols-2">
                                            <div>
                                            <a href="#">
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
                                cardContainer.append(cardHtml);
                                initFlowbite();
                            });
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
                $.ajax({
                    url: "{{ url('photo/retrieve_by_user') }}",
                    method: 'GET',
                    success: function(response) {
                        if (response) {
                            var cardContainer = $('#card-photo-container');
                            cardContainer.empty();

                            response.data.forEach(function(card) {
                                var cardHtml = `
                                    <div class="w-max-sm w-full max-h-52 md:w-48 md:max-h-64 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 card-item">
                                        <a href="#">
                                            <img class="rounded-t-lg w-full max-h-40" src="{{ url('storage/${card.path}') }}" alt="${card.title}" />
                                        </a>
                                        <div class="p-2 grid grid-cols-2">
                                            <div>
                                            <a href="#">
                                                <span class="mb-2 text-sm font-semibold tracking-tight text-gray-900 dark:text-white">${card.title}</span>
                                            </a>
                                            </div>
                                            <div class="flex justify-end">
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
                                `;
                                cardContainer.append(cardHtml);
                                initFlowbite();
                            });
                        } else {
                            console.log("No cards available or error with data.");
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log("Error: " + error);
                    }
                });
            }

            $('#image').change(function(event) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#preview').attr('src', e.target.result).removeClass('hidden');
                }
                reader.readAsDataURL(event.target.files[0]);
            });

            function getAlbumOptions() {
                $.ajax({
                    url: `{{ url('album/get_options') }}`,
                    type: "GET",
                    dataType: "Json",
                }).done(function(response) {
                    $('#album').empty();

                    $('#album').append('<option value="" selected>Select an album</option>');

                    $.each(response.data, function(index, album) {
                        $('#album').append('<option value="' + album.id + '">' + album.title + '</option>');
                    });
                }).catch(error => {
                    console.log(error);
                });
            }

            $('.form-photo').on("submit", function(e) {
                e.preventDefault();

                var token = $('meta[name="csrf-token"]').attr('content');

                var url = "{{ url('photo/') }}";
                if ($('#id').val()) {
                    url += `/` + $('#id').val();
                }

                var formData = new FormData();

                formData.append('title', $('#photo-title').val());
                formData.append('description', $('#photo-description').val());
                formData.append('album', $('#album').val());
                formData.append('image', $('#image')[0].files[0] ? $('#image')[0].files[0] : "");
                formData.append('_token',token);

                $.ajax({
                    type: "POST",
                    url: url,
                    data: formData,
                    processData: false,
                    contentType: false,
                    dataType: "json",
                    success: function(response) {
                        loadPhotoCards();
                        alert(response.message);

                    },
                    error: function(xhr, status, error) {
                        alert(xhr.responseJSON);
                        console.log("Terjadi error:", xhr);
                    }
                })
            });

            $('#photo-section').on('click', 'button[data-element=btn_delete]', function(e) {
                var _selectedID = $(this).data('value');
                var title = $(this).data('title');

                if (confirm(`Anda yakin ingin menghapus Photo ${title}?`)) {
                    $.ajax({
                        url: "{{ url('photo') }}/" + _selectedID,
                        method: "delete",
                        data: {
                            _token: "{{ csrf_token() }}"
                        }
                    }).done(function(response) {
                        alert(response.message);
                        loadPhotoCards();
                    }).fail(function(error) {
                        alert(`Error: ${error.statusText}`);
                    });
                }

            });

            $('#photo-section').on('click', '[data-element="btn_edit"]', function() {
                var id = $(this).data('value');
                $('#photo-modal h3').text('Edit Photo');
                $('#id').val('');
                    $('#photo-title').val('');
                    $('#photo-description').val('');
                    $('#album').val('');

                $.ajax({
                    url: `{{ url('photo/retrieve/${id}') }}`,
                    type: "GET",
                    dataType: "Json",
                }).done(function(response) {
                    $('#preview').attr('src', `{{ url('storage') }}/${response.data.path}`).removeClass('hidden');
                    $('#id').val(`${response.data.id}`);
                    $('#photo-title').val(`${response.data.title}`);
                    $('#photo-description').val(response.data.description ?
                        `${response.data.description}` : ``);
                    $('#album').val(`${response.data.album_id}`);
                }).catch(error => {
                    console.log(error);
                });
            });

        });
    </script>
@endsection
