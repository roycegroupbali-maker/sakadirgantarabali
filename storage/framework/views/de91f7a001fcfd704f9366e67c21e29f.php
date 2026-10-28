<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-5 flex items-center gap-4">
            <div class="w-12 h-12 rounded-lg bg-sky-100 text-sky-600 flex items-center justify-center">
                <?php echo $__env->make('admin.components.icon', ['name' => 'newspaper'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </div>
            <div>
                <p class="text-2xl font-bold text-slate-800"><?php echo e($stats['total_berita']); ?></p>
                <p class="text-sm text-slate-500">Total Berita</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-5 flex items-center gap-4">
            <div class="w-12 h-12 rounded-lg bg-violet-100 text-violet-600 flex items-center justify-center">
                <?php echo $__env->make('admin.components.icon', ['name' => 'photo'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </div>
            <div>
                <p class="text-2xl font-bold text-slate-800"><?php echo e($stats['total_galeri']); ?></p>
                <p class="text-sm text-slate-500">Total Galeri</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-5 flex items-center gap-4">
            <div class="w-12 h-12 rounded-lg bg-emerald-100 text-emerald-600 flex items-center justify-center">
                <?php echo $__env->make('admin.components.icon', ['name' => 'users'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </div>
            <div>
                <p class="text-2xl font-bold text-slate-800"><?php echo e($stats['total_anggota']); ?></p>
                <p class="text-sm text-slate-500">Total Anggota</p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-5">
            <div class="flex items-center justify-between mb-4">
                <h3 class="font-semibold text-slate-800">Berita Terbaru</h3>
                <a href="<?php echo e(route('admin.news.index')); ?>" class="text-sm text-sky-600 hover:underline">Lihat semua</a>
            </div>
            <?php if($beritaTerbaru->isEmpty()): ?>
                <p class="text-sm text-slate-400">Belum ada berita.</p>
            <?php else: ?>
                <ul class="divide-y divide-slate-100">
                    <?php $__currentLoopData = $beritaTerbaru; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $berita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="py-2.5 flex items-center justify-between gap-3">
                            <div class="min-w-0">
                                <p class="text-sm font-medium text-slate-700 truncate"><?php echo e($berita->judul); ?></p>
                                <p class="text-xs text-slate-400"><?php echo e($berita->tanggal_publish->format('d M Y')); ?> &middot; <?php echo e($berita->penulis); ?></p>
                            </div>
                            <span class="text-xs px-2 py-1 rounded-full <?php echo e($berita->status === 'publish' ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-100 text-slate-500'); ?>">
                                <?php echo e(ucfirst($berita->status)); ?>

                            </span>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            <?php endif; ?>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-5">
            <div class="flex items-center justify-between mb-4">
                <h3 class="font-semibold text-slate-800">Anggota Terbaru</h3>
                <a href="<?php echo e(route('admin.members.index')); ?>" class="text-sm text-sky-600 hover:underline">Lihat semua</a>
            </div>
            <?php if($anggotaTerbaru->isEmpty()): ?>
                <p class="text-sm text-slate-400">Belum ada data anggota.</p>
            <?php else: ?>
                <ul class="divide-y divide-slate-100">
                    <?php $__currentLoopData = $anggotaTerbaru; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $anggota): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="py-2.5 flex items-center justify-between gap-3">
                            <div class="min-w-0">
                                <p class="text-sm font-medium text-slate-700 truncate"><?php echo e($anggota->nama); ?></p>
                                <p class="text-xs text-slate-400"><?php echo e($anggota->nomor_anggota); ?> &middot; <?php echo e($anggota->krida ?? '-'); ?></p>
                            </div>
                            <span class="text-xs px-2 py-1 rounded-full
                                <?php echo e($anggota->status === 'Aktif' ? 'bg-emerald-100 text-emerald-700' : ($anggota->status === 'Alumni' ? 'bg-sky-100 text-sky-700' : 'bg-slate-100 text-slate-500')); ?>">
                                <?php echo e($anggota->status); ?>

                            </span>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/enb/Herd/sakadirgantarabali/resources/views/admin/dashboard.blade.php ENDPATH**/ ?>