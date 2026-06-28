<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
</head>
<body>
    <h1>Tambah Buku</h1>
    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div>
            <label for="title">Judul</label>
            <input type="text" name="title" id="title">
        </div>
        <div>
            <label for="author">Penulis</label>
            <input type="text" name="author" id="author">
        </div>
        <div>
            <label for="publisher">Penerbit</label>
            <input type="text" name="publisher" id="publisher">
        </div>
        <div>
            <label for="year">Tahun</label>
            <input type="text" name="year" id="year">
        </div>
        <div>
            <label for="description">Deskripsi</label>
            <input type="text" name="description" id="description">
        </div>

        <button type="submit">Tambah</button>
    </form>
    
    <a href="{{ route('books.index') }}">Back to List</a>
</body>
</html>