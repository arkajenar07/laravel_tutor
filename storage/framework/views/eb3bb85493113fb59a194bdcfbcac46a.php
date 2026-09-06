<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap');

        .font-outfit{
            font-family: 'Outfit', sans-serif;
        }

    </style>
</head>
<body class="font-outfit">
    <div class="flex justify-start items-start">
        <?php if (isset($component)) { $__componentOriginal2880b66d47486b4bfeaf519598a469d6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2880b66d47486b4bfeaf519598a469d6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.sidebar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2880b66d47486b4bfeaf519598a469d6)): ?>
<?php $attributes = $__attributesOriginal2880b66d47486b4bfeaf519598a469d6; ?>
<?php unset($__attributesOriginal2880b66d47486b4bfeaf519598a469d6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2880b66d47486b4bfeaf519598a469d6)): ?>
<?php $component = $__componentOriginal2880b66d47486b4bfeaf519598a469d6; ?>
<?php unset($__componentOriginal2880b66d47486b4bfeaf519598a469d6); ?>
<?php endif; ?>
        <div class="flex flex-col items-start w-full h-screen p-12 ml-[18%] bg-white mt-5 mb-5 mr-5 rounded-xl">
            <h1 class="text-[36px] font-semibold text-[#121212]">Daftar Buku</h1>
            <!-- Search Bar -->
            <div class="flex w-full h-fit overflow-auto justify-between mt-5 mb-5 gap-2">
                <a class="bg-blue-500 text-white px-4 py-2 rounded-md" href="<?php echo e(route('books.create')); ?>">Tambah Buku</a>
                <form action="<?php echo e(route('books.index')); ?>" method="GET" class="flex w-fit h-fit gap-2">
                    <?php echo csrf_field(); ?>
                    <input type="text" name="search" placeholder="Cari buku" class="border border-slate-200 rounded-md px-4 py-2">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Cari</button>
                </form>
            </div>
            <table class="w-full mt-5 rounded-lg shadow-md shadow-slate-200">
                <thead class="">
                    <tr class="">
                        <!-- Sorting -->
                        <th class="text-slate-500 font-bold">
                            Cover
                        </th>
                        <th class="text-slate-500 font-bold">
                            Judul
                            <a href="<?php echo e(route('books.index', ['sort_by' => 'title', 'sort_order' => 'asc'])); ?>">↑</a>
                            <a href="<?php echo e(route('books.index', ['sort_by' => 'title', 'sort_order' => 'desc'])); ?>">↓</a>
                        </th>
                        <th class="text-slate-500 font-bold">
                            Penulis
                            <a href="<?php echo e(route('books.index', ['sort_by' => 'author', 'sort_order' => 'asc'])); ?>">↑</a>
                            <a href="<?php echo e(route('books.index', ['sort_by' => 'author', 'sort_order' => 'desc'])); ?>">↓</a>
                        </th>
                        <th class="text-slate-500 font-bold">
                            Penerbit
                            <a href="<?php echo e(route('books.index', ['sort_by' => 'publisher', 'sort_order' => 'asc'])); ?>">↑</a>
                            <a href="<?php echo e(route('books.index', ['sort_by' => 'publisher', 'sort_order' => 'desc'])); ?>">↓</a>
                        </th>
                        <th class="text-slate-500 font-bold">
                            Tahun
                            <a href="<?php echo e(route('books.index', ['sort_by' => 'year', 'sort_order' => 'asc'])); ?>">↑</a>
                            <a href="<?php echo e(route('books.index', ['sort_by' => 'year', 'sort_order' => 'desc'])); ?>">↓</a>
                        </th>
                        <th class="text-slate-500 font-bold">
                            Deskripsi
                            <a href="<?php echo e(route('books.index', ['sort_by' => 'description', 'sort_order' => 'asc'])); ?>">↑</a>
                            <a href="<?php echo e(route('books.index', ['sort_by' => 'description', 'sort_order' => 'desc'])); ?>">↓</a>
                        </th>
                        <th class="text-slate-500 font-bold">
                            Stock
                            <a href="<?php echo e(route('books.index', ['sort_by' => 'stock', 'sort_order' => 'asc'])); ?>">↑</a>
                            <a href="<?php echo e(route('books.index', ['sort_by' => 'stock', 'sort_order' => 'desc'])); ?>">↓</a>
                        </th>
                        <th class="text-slate-500 font-bold">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="">
                    <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="">
                             <td class="flex justify-center items-center p-2">
                                <?php if($book->cover): ?>
                                    <img src="<?php echo e(asset('storage/' . $book->cover)); ?>" alt="" class="w-fit h-36 rounded-md shadow-sm shadow-slate-200">
                                <?php else: ?>
                                    <span>Tidak ada cover</span>
                                <?php endif; ?>
                            </td>

                            <td class="text-center font-semibold text-slate-700"><?php echo e($book->title); ?></td>
                            <td class="text-center font-semibold text-slate-700"><?php echo e($book->author); ?></td>
                            <td class="text-center font-semibold text-slate-700"><?php echo e($book->publisher); ?></td>
                            <td class="text-center font-semibold text-slate-700"><?php echo e($book->year); ?></td>
                            <td class="text-center font-semibold text-slate-700"><?php echo e($book->description); ?></td>
                            <td class="text-center font-semibold text-slate-700"><?php echo e($book->stock); ?></td>


                            <td class="p-2">
                                <div class="flex justify-center items-center gap-2">
                                    <a class="bg-blue-500 text-white px-4 py-2 rounded-md" href="<?php echo e(route('books.show', $book->id)); ?>">Lihat</a>
                                    <a class="bg-yellow-500 px-4 py-2 rounded-md" href="<?php echo e(route('books.edit', $book->id)); ?>">Edit</a>
                                    <form action="<?php echo e(route('books.destroy', $book->id)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button class="bg-red-500 px-4 py-2 rounded-md text-white w-full" type="submit">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html><?php /**PATH C:\Users\ARKA JENAR\UKK_Kelas 13\lara-course\resources\views/books/index.blade.php ENDPATH**/ ?>