<aside class="w-[15%] h-[95vh] bg-white flex flex-col fixed z-10 m-5 rounded-xl">
    <h2 class="text-black text-lg font-semibold px-6 py-4">Perpus SMAN 8 Jakarta</h2>
    <nav class="flex flex-col px-6 pb-4 justify-between flex-1">
        <ul class="flex flex-col gap-4">
            <li><a href="" class="text-gray-600 text-base font-medium">Dashboard</a></li>
            <li><a href="" class="text-gray-600 text-base font-medium">Menu Buku</a></li>
            <li><a href="" class="text-gray-600 text-base font-medium">Menu User</a></li>
            <li><a href="" class="text-gray-600 text-base font-medium">Menu User</a></li>
            <li><a href="" class="text-gray-600 text-base font-medium">Menu User</a></li>
            <li><a href="" class="text-gray-600 text-base font-medium">Menu User</a></li>
            <li><a href="" class="text-gray-600 text-base font-medium">Menu User</a></li>
        </ul>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="bg-white text-purple-900 px-4 py-2 rounded-md" type="submit">Logout</button>
        </form>
    </nav>
</aside>