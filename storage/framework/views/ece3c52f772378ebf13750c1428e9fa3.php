<?php $__env->startSection('title', 'Dirga News'); ?>

<?php $__env->startSection('content'); ?>
    <div class="flex items-center justify-between mb-5">
        <p class="text-sm text-slate-500">Kelola berita dan artikel Dirga News.</p>
        <a href="<?php echo e(route('admin.news.create')); ?>"
           class="inline-flex items-center gap-2 rounded-lg bg-sky-600 hover:bg-sky-700 text-white text-sm font-medium px-4 py-2 transition">
            <?php echo $__env->make('admin.components.icon', ['name' => 'plus'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            Tambah Berita
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-slate-50 text-slate-600 text-left">
                    <tr>
                        <th class="px-4 py-3 font-medium">Thumbnail</th>
                        <th class="px-4 py-3 font-medium">Judul</th>
                        <th class="px-4 py-3 font-medium">Penulis</th>
                        <th class="px-4 py-3 font-medium">Tanggal Publish</th>
                        <th class="px-4 py-3 font-medium">Status</th>
                        <th class="px-4 py-3 font-medium text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <?php $__empty_1 = true; $__currentLoopData = $newsList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="hover:bg-slate-50">
                            <td class="px-4 py-3">
                                <?php if($news->thumbnail): ?>
                                    <img src="<?php echo e($news->thumbnail_url); ?>" alt="<?php echo e($news->judul); ?>" class="w-14 h-14 rounded-lg object-cover">
                                <?php else: ?>
                                    <div class="w-14 h-14 rounded-lg bg-slate-100 flex items-center justify-center text-slate-300">
                                        <?php echo $__env->make('admin.components.icon', ['name' => 'photo'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td class="px-4 py-3 max-w-xs">
                                <p class="font-medium text-slate-800 line-clamp-2"><?php echo e($news->judul); ?></p>
                                <p class="text-xs text-slate-400">/<?php echo e($news->slug); ?></p>
                            </td>
                            <td class="px-4 py-3 text-slate-600"><?php echo e($news->penulis); ?></td>
                            <td class="px-4 py-3 text-slate-600"><?php echo e($news->tanggal_publish->format('d M Y')); ?></td>
                            <td class="px-4 py-3">
                                <span class="text-xs px-2 py-1 rounded-full <?php echo e($news->status === 'publish' ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-100 text-slate-500'); ?>">
                                    <?php echo e(ucfirst($news->status)); ?>

                                </span>
                                <?php if($news->status !== 'publish'): ?>
                                    <p class="mt-1 text-[11px] text-amber-600">Belum tampil di website publik</p>
                                <?php endif; ?>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center justify-end gap-1">
                                    <a href="<?php echo e(route('admin.news.edit', $news)); ?>"
                                       class="p-2 rounded-lg text-sky-600 hover:bg-sky-50" title="Edit">
                                        <?php echo $__env->make('admin.components.icon', ['name' => 'pencil'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                    </a>
                                    <form method="POST" action="<?php echo e(route('admin.news.destroy', $news)); ?>"
                                          onsubmit="return confirm('Hapus berita ini?');">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="p-2 rounded-lg text-red-600 hover:bg-red-50" title="Hapus">
                                            <?php echo $__env->make('admin.components.icon', ['name' => 'trash'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="6" class="px-4 py-10 text-center text-slate-400">Belum ada berita. Klik "Tambah Berita" untuk membuat yang pertama.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <?php if($newsList->hasPages()): ?>
            <div class="px-4 py-3 border-t border-slate-100">
                <?php echo e($newsList->links()); ?>

            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/enb/Herd/sakadirgantarabali/resources/views/admin/news/index.blade.php ENDPATH**/ ?>