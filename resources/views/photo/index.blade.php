{{-- @dd($data->liked) --}}
@extends('components.main')

@section('container')
    <section class="container mx-auto p-10 md:p-20 antialiased ">
        <article class="  shadow-lg mx-auto w-full" id="main-section">
            <div class="lg:grid lg:grid-cols-2 lg:gap-8 xl:gap-16 p-4">
                <div class="shrink-0 w-full lg:max-w-lg mx-auto">
                    <img class="w-full dark:hidden" src="{{ url("storage/$data->path") }}" alt="" />
                </div>

                <div class="mt-6 sm:mt-8 lg:mt-0">
                    <div class="flex justify-between items-center w-full">
                        <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                            {{ $data->title }}
                        </h1>
                        <a href="{{ url("photo/detail/download/$data->id") }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                            </svg>
                        </a>
                    </div>
                    <div class="mt-4 sm:items-center sm:gap-4 sm:flex">
                        <p class="text-gray-500 dark:text-gray-400">
                            {{ $data->description }}
                        </p>
                    </div>

                    <div class="mt-6 sm:gap-4 sm:items-center sm:flex sm:mt-8">
                        <div class="flex justify-between items-center w-full">
                            <div class="flex items-center">
                                <img src="{{ url("storage/".$data->user->avatar) }}" alt="Avatar"
                                    class="w-8 h-8 rounded-full mr-2 object-cover">
                                <div class="flex flex-col">

                                    <span class="text-gray-800 font-semibold text-xs">{{ $data->user->username }}</span>
                                    <span class="text-gray-600 text-xs">{{ $data->created }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-end gap-2" id="end-section">
                            <button data-value="{{ $data->id }}" id="like-button"
                                class="flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor"
                                    class="size-6 {{ $data->liked != null ? 'fill-red-600 stroke-red-600' : 'hover:fill-red-600 hover:stroke-red-600' }}">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                </svg>
                                <span class="text-gray-800 font-semibold text-xs ms-1"
                                    id="like-count">{{ $data->like_total }}</span>
                            </button>
                        </div>

                    </div>

                    <hr class="my-2 md:my-4 border-gray-200 dark:border-gray-800" />

                    <div class="max-w-2xl mx-auto px-4">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">Discussion (<span id="comment-counter"></span>)</h2>
                        </div>
                        <form class="mb-6 form-master">
                            <input type="hidden" name="id" id="id" value="{{ $data->id }}">
                            <div
                                class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                                <label for="comment" class="sr-only">Your comment</label>
                                <textarea id="comment" rows="6"
                                    class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                                    placeholder="Write a comment..." required></textarea>
                            </div>
                            <button type="submit"
                                class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                                Post comment
                            </button>
                        </form>
                        <div class="space-y-4 p-4 max-h-96 overflow-y-auto pr-2 bg-slate-200" id="comment-section">

                            <!-- Comment -->
                            <div class="p-4 bg-gray-50 rounded-lg">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="font-semibold">John Doe</p>
                                        <p class="text-sm text-gray-500">2 hours ago</p>
                                    </div>
                                </div>
                                <p class="mt-2 text-gray-700">This is a great post! Thanks for sharing.</p>

                                <!-- Reply Button -->
                                <button class="mt-2 text-sm text-blue-500 hover:underline"
                                    onclick="replyTo('John Doe')">Reply</button>
                                <div id="replyInput" class="hidden mt-4">
                                    <textarea class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-300"
                                        placeholder="Write your reply..."></textarea>
                                    <button class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Post
                                        Reply</button>
                                </div>

                                <!-- Replies -->
                                <div class="mt-4 pl-4 border-l-2 border-gray-200 space-y-2">
                                    <div class="p-3 bg-gray-100 rounded-lg">
                                        <div>
                                            <p class="font-semibold">Jane Smith</p>
                                            <p class="text-sm text-gray-500">1 hour ago</p>
                                        </div>
                                        <p class="mt-1 text-gray-700">I totally agree, John!</p>
                                        <button class="mt-2 text-sm text-blue-500 hover:underline"
                                            onclick="replyTo('Jane Smith')">Reply</button>
                                    </div>
                                </div>
                            </div>

                            <!-- Another Comment -->
                            <div class="p-4 bg-gray-50 rounded-lg">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="font-semibold">Alice Johnson</p>
                                        <p class="text-sm text-gray-500">3 hours ago</p>
                                    </div>
                                </div>
                                <p class="mt-2 text-gray-700">Interesting perspective!</p>
                                <button class="mt-2 text-sm text-blue-500 hover:underline"
                                    onclick="replyTo('Alice Johnson')">Reply</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </article>
    </section>

    <script>
        $(document).ready(function() {
            const id = $('#id').val();
            loadComment();

            $('.form-master').on('submit', function(e) {
                e.preventDefault();
                var token = $('meta[name="csrf-token"]').attr('content');
                // var id = $('#id').val();
                console.log(id);

                $.ajax({
                    type: "POST",
                    url: `{{ url('photo/detail/comment') }}/${id}`,
                    data: {
                        content: $('#comment').val(),
                        _token: token
                    },
                    dataType: "json",
                    success: function(response) {
                        $('#comment').val('')
                        loadComment();
                    },
                    error: function(xhr, status, error) {
                        $('#comment').val('')
                        if (xhr.status === 401) {
                            $("#login-modal-button").click();
                        }
                    }
                });
            });


            function loadComment() {
                $.ajax({
                    type: "GET",
                    url: `{{ url('photo/detail/comment') }}/${id}`,
                    dataType: "json",
                    success: function(response) {
                        var commentContainer = $('#comment-section');
                        commentContainer.empty();

                        $('#comment-counter').text(response.data[1]);

                        response.data[0].forEach(function(data) {

                            var replyHTML = ``;

                            if (data.reply) {
                                var replyHTML = data.reply.map((r) => `
                        <div class="p-3 bg-gray-100 rounded-lg">
                            <div>
                                <p class="font-semibold">${r.user.username}</p>
                                <p class="text-sm text-gray-500">${r.created}</p>
                            </div>
                            <p class="mt-1 text-gray-700">${r.content}</p>
                        </div>
                        `).join('');
                            }

                            var comment = `
                                    <div class="p-4 bg-gray-50 rounded-lg">
                                        <div class="flex items-center justify-between">
                                            <div>
                                            <p class="font-semibold">${data.user.username}</p>
                                            <p class="text-sm text-gray-500">${data.created}</p>
                                            </div>
                                        </div>
                                        <p class="mt-2 text-gray-700">${data.content}</p>
                                        <button class="mt-2 text-sm text-blue-500 hover:underline reply-btn" data-id="${data.id}">
                                            Reply
                                        </button>

                                        <!-- Reply Input -->
                                        <div class="hidden mt-4 reply-input" id="reply-input-${data.id}">
                                            <textarea
                                                class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-300"
                                                placeholder="Write your reply..."
                                            ></textarea>
                                            <button class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 post-reply-btn"
                                                data-id="${data.id}">
                                                Post Reply
                                            </button>
                                        </div>
                                        <div class="mt-4 pl-4 border-l-2 border-gray-200 space-y-2 reply-section">
                                            ${replyHTML}
                                        </div>
                                    </div>
                                    `;
                            commentContainer.append(comment);
                            initFlowbite();
                        });
                    },
                    error: function(xhr, status, error) {
                        console.log("Terjadi error:", xhr);
                    }
                });
            }

            $('#main-section').on('click', '#like-button', function() {
                var id = $(this).data('value');
                var svg = $(this).find('svg');
                var likeCountSpan = $('#like-count');

                var token = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: "POST",
                    url: `{{ url('photo/like') }}/${id}`,
                    data: {
                        _token: token
                    },
                    dataType: "json",
                    success: function(response) {
                        console.log(response);

                        if (response.message === "liked") {
                            svg.removeClass("hover:fill-red-600 hover:stroke-red-600").addClass(
                                "fill-red-600 stroke-red-600");
                            likeCountSpan.text(parseInt(likeCountSpan.text()) + 1);
                        } else if (response.message === "unliked") {
                            svg.removeClass("fill-red-600 stroke-red-600").addClass(
                                "hover:fill-red-600 hover:stroke-red-600");
                            likeCountSpan.text(parseInt(likeCountSpan.text()) - 1);
                        }
                    },
                    error: function(xhr, status, error) {
                        if (xhr.status === 401) {
                            $("#login-modal-button").click();
                        }
                        console.log("Terjadi error:", xhr);
                    }
                });
            });

            $('#comment-section').on('click', '.reply-btn', function() {
                var commentId = $(this).data('id');
                $(`#reply-input-${commentId}`).removeClass('hidden');
            });

            $('#comment-section').on('click', '.post-reply-btn', function(e) {
                var commentId = $(this).data('id');
                var replyContent = $(`#reply-input-${commentId} textarea`).val();
                var token = $('meta[name="csrf-token"]').attr('content');

                if (!replyContent.trim()) {
                    alert('Reply cannot be empty.');
                    return;
                }

                $.ajax({
                    type: "POST",
                    url: `{{ url('photo/detail/comment') }}/${id}`,
                    data: {
                        reply: commentId,
                        content: replyContent,
                        _token: token,
                    },
                    dataType: "json",
                    success: function(response) {
                        $(`#reply-input-${commentId}`).addClass('hidden');
                        loadComment();
                    },
                    error: function(xhr, status, error) {
                        alert(xhr.responseJSON);
                        console.log("Terjadi error:", xhr);
                    },
                });
            });
        });
    </script>
@endsection
