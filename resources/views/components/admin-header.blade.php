<nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="{{ url('photo') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('asset/images/h-icon.png') }}" class="h-12" alt="H-Gallery Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap bg-gradient-to-r from-slate-900 to-blue-700 bg-clip-text text-transparent dark:text-white">Hardian Gallery</span>
        </a>
        <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse gap-2">
            <form action="{{ url('/auth/logout') }}" method="post">
                @csrf
                <input type="submit" value="Sign Out"
                    class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
            </form>
        </div>
    </div>
</nav>
