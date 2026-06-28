<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
</head>
<body>
    <h1>Edit Buku</h1>
    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Judul</label>
            <input type="text" name="title" id="title" value="{{ $book->title }}">
        </div>
        <div>
            <label for="author">Penulis</label>
            <input type="text" name="author" id="author" value="{{ $book->author }}">
        </div>
        <div>
            <label for="publisher">Penerbit</label>
            <input type="text" name="publisher" id="publisher" value="{{ $book->publisher }}">
        </div>
        <div>
            <label for="year">Tahun</label>
            <input type="text" name="year" id="year" value="{{ $book->year }}">
        </div>
        <div>
            <label for="description">Deskripsi</label>
            <input type="text" name="description" id="description" value="{{ $book->description }}">
        </div>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>