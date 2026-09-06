<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
    @vite('resources/css/app.css')
</head>
<body class="font-outfit">
    <div class="flex justify-start items-start">
        <x-sidebar/>
        <div class="flex flex-col p-12 bg-white ml-[18%] mt-5 mb-5 mr-5 rounded-xl w-full">
            <h1 class="mb-4 text-[36px] font-semibold text-[#121212]">Update Buku</h1>
            <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-5">
                @csrf
                @method('PUT')
                <div class="flex flex-col gap-2">
                    <label for="title" class="font-semibold text-slate-700">Judul</label>
                    <input type="text" name="title" id="title" value="{{ $book->title }}" class="p-2 rounded-md border border-slate-200">
                </div>
                <div class="flex flex-col gap-2">
                    <label for="author" class="font-semibold text-slate-700">Penulis</label>
                    <input type="text" name="author" id="author" value="{{ $book->author }}" class="p-2 rounded-md border border-slate-200">
                </div>
                <div class="flex flex-col gap-2">
                    <label for="publisher" class="font-semibold text-slate-700">Penerbit</label>
                    <input type="text" name="publisher" id="publisher" value="{{ $book->publisher }}" class="p-2 rounded-md border border-slate-200">
                </div>
                <div class="flex flex-col gap-2">
                    <label for="year" class="font-semibold text-slate-700">Tahun</label>
                    <input type="text" name="year" id="year" value="{{ $book->year }}" class="p-2 rounded-md border border-slate-200">
                </div>
                <div class="flex flex-col gap-2">
                    <label for="description" class="font-semibold text-slate-700">Deskripsi</label>
                    <input type="text" name="description" id="description" value="{{ $book->description }}" class="p-2 rounded-md border border-slate-200">
                </div>

                <div class="flex flex-col gap-2">
                    <label for="cover" class="font-semibold text-slate-700">Cover</label>
                    <input type="file" name="cover" id="cover" value="{{ $book->cover }}" class="p-2 rounded-md border border-slate-200">
                </div>

                <div class="flex flex-col gap-2">
                    <label for="stock" class="font-semibold text-slate-700">Stock</label>
                    <input type="text" name="stock" id="stock" value="{{ $book->stock }}" class="p-2 rounded-md border border-slate-200">
                </div>

                <button type="submit" class="bg-violet-800 text-white px-4 py-2 rounded-lg">Update</button>
            </form>
            <a href="{{ route('books.index') }}"  class="bg-slate-700 text-white px-4 py-2 rounded-lg mt-2 hover:bg-slate-800 transition-all cursor-pointer text-center">Back to List</a>
        </div>
    </div>
</body>
</html>