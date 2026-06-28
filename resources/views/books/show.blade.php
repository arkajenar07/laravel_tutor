<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Detail Buku</h1>
    <div>
        <div>
            <label for="title">Judul</label>
            <p>{{ $book->title }}</p>
        </div>
        <div>
            <label for="author">Penulis</label>
            <p>{{ $book->author }}</p>
        </div>
        <div>
            <label for="publisher">Penerbit</label>
            <p>{{ $book->publisher }}</p>
        </div>
        <div>
            <label for="year">Tahun</label>
            <p>{{ $book->year }}</p>
        </div>
        <div>
            <label for="description">Deskripsi</label>
            <p>{{ $book->description }}</p>
        </div>
    </div>
    
    <a href="{{ route('books.index') }}">Back to List</a>
</body>
</html>