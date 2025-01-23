@extends('components.main')

@section("container")

<section class="mx-10 my-8 md:mx-20 md:my-16">

    <div class="flex flex-col justify-center items-center md:grid md:grid-cols-4 gap-4" id="main-section">
        <div class=" bg-white rounded-lg shadow-lg overflow-hidden max-w-xs w-full">
            <img src="https://images.unsplash.com/photo-1454496522488-7a8e488e8606" alt="Mountain" class="w-full h-64 object-cover">
            <div class="flex justify-start  items-center gap-2 mt-2 mx-4">
                <div class="flex items-center">
                    <button >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 hover:fill-red-600 hover:stroke-red-600">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                        </svg>
                    </button>
                    <span class="text-gray-800 font-semibold text-xs">0</span>
                </div>
                <div class="flex items-center">
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                            <path fill-rule="evenodd" d="M10 3c-4.31 0-8 3.033-8 7 0 2.024.978 3.825 2.499 5.085a3.478 3.478 0 0 1-.522 1.756.75.75 0 0 0 .584 1.143 5.976 5.976 0 0 0 3.936-1.108c.487.082.99.124 1.503.124 4.31 0 8-3.033 8-7s-3.69-7-8-7Zm0 8a1 1 0 1 0 0-2 1 1 0 0 0 0 2Zm-2-1a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm5 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <span class="text-gray-800 font-semibold text-xs"><span>0</span></span>
                </div>
            </div>
            <div class="px-4 pb-4 pt-1">
                <h4 class="text-lg font-bold text-gray-800 mb-2">Beautiful Mountain View</h4>
                {{-- <p class="text-gray-700 leading-tight mb-4">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam eu sapien porttitor, blandit velit ac,
                    vehicula elit. Nunc et ex at turpis rutrum viverra.
                </p> --}}
                <div class="flex justify-between items-center">
                    <div class="flex items-center">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Avatar" class="w-6 h-6 rounded-full mr-2 object-cover">
                        <span class="text-gray-800 font-semibold text-xs">John Doe</span>
                    </div>
                    <span class="text-gray-600 text-xs">2 hours ago</span>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        retrievePhoto();

        function retrievePhoto(){
            $.ajax({
                    url: `{{ url('photo/retrieve') }}`,
                    type: "GET",
                    dataType: "Json",
                }).done(function(response) {
                    var cardContainer = $('#main-section');
                    cardContainer.empty();
                    console.log(response);
                    response.data.forEach(function(data) {
                        var likeClass = "hover:fill-red-600 hover:stroke-red-600";
                        if (data.liked) {
                            likeClass = "fill-red-600 stroke-red-600";
                        }

                            var card = `
                            <div class=" bg-white rounded-lg shadow-lg overflow-hidden max-w-xs w-full group cursor-pointer transform duration-500 hover:-translate-y-1">
                                <img src="{{ url('storage') }}/${data.path}" alt="image ${data.title}" class="w-full h-64 object-cover">
                                <div class="flex justify-start  items-center gap-2 mt-2 mx-4">
                                    <div class="flex items-center">
                                        <button data-value="${data.id}" id="like-button">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 ${likeClass}">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                            </svg>
                                        </button>
                                        <span class="text-gray-800 font-semibold text-xs" id="like-count">${data.like_total}</span>
                                    </div>
                                    <div class="flex items-center">
                                        <button>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                                                <path fill-rule="evenodd" d="M10 3c-4.31 0-8 3.033-8 7 0 2.024.978 3.825 2.499 5.085a3.478 3.478 0 0 1-.522 1.756.75.75 0 0 0 .584 1.143 5.976 5.976 0 0 0 3.936-1.108c.487.082.99.124 1.503.124 4.31 0 8-3.033 8-7s-3.69-7-8-7Zm0 8a1 1 0 1 0 0-2 1 1 0 0 0 0 2Zm-2-1a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm5 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                        <span class="text-gray-800 font-semibold text-xs">0</span>
                                    </div>
                                </div>
                                <div class="px-4 pb-4 pt-1">
                                    <a href="{{ url('photo/detail') }}/${data.id}">
                                    <h4 class="text-lg font-bold text-gray-800 mb-2">${data.title}</h4>
                                    </a>
                                    {{-- <p class="text-gray-700 leading-tight mb-4">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam eu sapien porttitor, blandit velit ac,
                                        vehicula elit. Nunc et ex at turpis rutrum viverra.
                                    </p> --}}
                                    <div class="flex justify-between items-center">
                                        <div class="flex items-center">
                                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Avatar" class="w-6 h-6 rounded-full mr-2 object-cover">
                                            <span class="text-gray-800 font-semibold text-xs">${data.user.username}</span>
                                        </div>
                                        <span class="text-gray-600 text-xs">${data.created}</span>
                                    </div>
                                </div>
                            </div>
                            `;
                        cardContainer.append(card);
                        initFlowbite();
                    });
                }).catch(error => {
                    console.log(error);
                });
        }

        $('#main-section').on('click', '#like-button', function() {
            var id = $(this).data('value');
            var svg = $(this).find('svg');
            var likeCountSpan = $(this).siblings('#like-count');

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
                    svg.removeClass("hover:fill-red-600 hover:stroke-red-600").addClass("fill-red-600 stroke-red-600");
                    likeCountSpan.text(parseInt(likeCountSpan.text()) + 1);
                } else if (response.message === "unliked") {
                    svg.removeClass("fill-red-600 stroke-red-600").addClass("hover:fill-red-600 hover:stroke-red-600");
                    likeCountSpan.text(parseInt(likeCountSpan.text()) - 1);
                }
            },
            error: function(xhr, status, error) {
                alert(xhr.responseJSON);
                console.log("Terjadi error:", xhr);
            }
            });
        });
    });
</script>

@endsection
