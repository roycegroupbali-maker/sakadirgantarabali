<?php $__env->startSection('title', 'Galeri'); ?>

<?php $__env->startSection('content'); ?>
    <div class="flex items-center justify-between mb-5">
        <p class="text-sm text-slate-500">Kelola dokumentasi foto kegiatan.</p>
        <a href="<?php echo e(route('admin.gallery.create')); ?>"
           class="inline-flex items-center gap-2 rounded-lg bg-sky-600 hover:bg-sky-700 text-white text-sm font-medium px-4 py-2 transition">
            <?php echo $__env->make('admin.components.icon', ['name' => 'plus'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            Tambah Foto
        </a>
    </div>

    <?php if($galleryList->isEmpty()): ?>
        <div class="bg-white rounded-xl border border-slate-200 p-10 text-center text-slate-400">
            Belum ada foto galeri. Klik "Tambah Foto" untuk mengunggah yang pertama.
        </div>
    <?php else: ?>
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
            <?php $__currentLoopData = $galleryList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bg-white rounded-xl border border-slate-200 overflow-hidden group">
                    <div class="aspect-square bg-slate-100">
                        <img src="<?php echo e($item->foto_url); ?>" alt="<?php echo e($item->judul); ?>" class="w-full h-full object-cover">
                    </div>
                    <div class="p-3">
                        <p class="text-sm font-medium text-slate-800 line-clamp-1"><?php echo e($item->judul); ?></p>
                        <p class="text-xs text-slate-400 mb-2"><?php echo e($item->tanggal->format('d M Y')); ?></p>
                        <div class="flex items-center gap-1">
                            <a href="<?php echo e(route('admin.gallery.edit', $item)); ?>"
                               class="flex-1 inline-flex items-center justify-center gap-1 rounded-lg bg-sky-50 text-sky-600 hover:bg-sky-100 text-xs font-medium py-1.5" title="Edit">
                                <?php echo $__env->make('admin.components.icon', ['name' => 'pencil'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                Edit
                            </a>
                            <form method="POST" action="<?php echo e(route('admin.gallery.destroy', $item)); ?>"
                                  onsubmit="return confirm('Hapus foto ini?');" class="flex-1">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="w-full inline-flex items-center justify-center gap-1 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 text-xs font-medium py-1.5" title="Hapus">
                                    <?php echo $__env->make('admin.components.icon', ['name' => 'trash'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <?php if($galleryList->hasPages()): ?>
            <div class="mt-6">
                <?php echo e($galleryList->links()); ?>

            </div>
        <?php endif; ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/enb/Herd/sakadirgantarabali/resources/views/admin/gallery/index.blade.php ENDPATH**/ ?>