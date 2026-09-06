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
            <p><?php echo e($book->title); ?></p>
        </div>
        <div>
            <label for="author">Penulis</label>
            <p><?php echo e($book->author); ?></p>
        </div>
        <div>
            <label for="publisher">Penerbit</label>
            <p><?php echo e($book->publisher); ?></p>
        </div>
        <div>
            <label for="year">Tahun</label>
            <p><?php echo e($book->year); ?></p>
        </div>
        <div>
            <label for="description">Deskripsi</label>
            <p><?php echo e($book->description); ?></p>
        </div>
    </div>
    
    <a href="<?php echo e(route('books.index')); ?>">Back to List</a>
</body>
</html><?php /**PATH C:\Users\ARKA JENAR\UKK_Kelas 13\lara-course\resources\views/books/show.blade.php ENDPATH**/ ?>