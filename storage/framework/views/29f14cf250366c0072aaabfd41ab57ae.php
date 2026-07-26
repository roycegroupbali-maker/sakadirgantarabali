<?php $__env->startSection('title', 'Aspirasi & Laporan'); ?>

<?php $__env->startSection('content'); ?>
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-6">
        <div class="bg-white rounded-xl border border-slate-200 p-4">
            <p class="text-2xl font-bold text-slate-800"><?php echo e($stats['total']); ?></p>
            <p class="text-xs text-slate-500">Total Laporan</p>
        </div>
        <div class="bg-white rounded-xl border border-slate-200 p-4">
            <p class="text-2xl font-bold text-amber-600"><?php echo e($stats['menunggu']); ?></p>
            <p class="text-xs text-slate-500">Menunggu Verifikasi</p>
        </div>
        <div class="bg-white rounded-xl border border-slate-200 p-4">
            <p class="text-2xl font-bold text-sky-600"><?php echo e($stats['diproses']); ?></p>
            <p class="text-xs text-slate-500">Diproses</p>
        </div>
        <div class="bg-white rounded-xl border border-slate-200 p-4">
            <p class="text-2xl font-bold text-emerald-600"><?php echo e($stats['selesai']); ?></p>
            <p class="text-xs text-slate-500">Selesai</p>
        </div>
    </div>

    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-5">
        <form method="GET" class="flex flex-1 flex-wrap max-w-2xl gap-2">
            <div class="relative flex-1 min-w-[180px]">
                <span class="absolute inset-y-0 left-3 flex items-center text-slate-400">
                    <?php echo $__env->make('admin.components.icon', ['name' => 'search'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </span>
                <input type="text" name="q" value="<?php echo e(request('q')); ?>" placeholder="Cari nama, judul, atau tiket..."
                       class="w-full rounded-lg border border-slate-300 pl-10 pr-3 py-2 text-sm focus:border-sky-500 focus:ring-sky-500">
            </div>
            <select name="kategori" class="rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-sky-500 focus:ring-sky-500">
                <option value="">Semua Kategori</option>
                <?php $__currentLoopData = $kategoriList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kategori): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($kategori); ?>" <?php if(request('kategori') === $kategori): echo 'selected'; endif; ?>><?php echo e($kategori); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <select name="status" class="rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-sky-500 focus:ring-sky-500">
                <option value="">Semua Status</option>
                <?php $__currentLoopData = \App\Models\Aspiration::STATUS_OPTIONS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($status); ?>" <?php if(request('status') === $status): echo 'selected'; endif; ?>><?php echo e($status); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <button type="submit" class="rounded-lg border border-slate-300 text-slate-600 hover:bg-slate-50 px-3 py-2 text-sm">Cari</button>
        </form>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-slate-50 text-slate-600 text-left">
                    <tr>
                        <th class="px-4 py-3 font-medium">Tiket</th>
                        <th class="px-4 py-3 font-medium">Laporan</th>
                        <th class="px-4 py-3 font-medium">Kategori</th>
                        <th class="px-4 py-3 font-medium">Kerahasiaan</th>
                        <th class="px-4 py-3 font-medium">Status</th>
                        <th class="px-4 py-3 font-medium text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <?php $__empty_1 = true; $__currentLoopData = $aspirationList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aspiration): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="hover:bg-slate-50 align-top">
                            <td class="px-4 py-3 font-mono text-xs text-slate-500">
                                <?php echo e($aspiration->nomor_tiket); ?>

                                <p class="mt-1 text-[11px] text-slate-400"><?php echo e($aspiration->created_at->translatedFormat('d M Y')); ?></p>
                            </td>
                            <td class="px-4 py-3">
                                <p class="font-medium text-slate-800"><?php echo e($aspiration->judul); ?></p>
                                <p class="text-xs text-slate-400"><?php echo e($aspiration->nama_publik); ?> · <?php echo e($aspiration->kota); ?></p>
                            </td>
                            <td class="px-4 py-3 text-slate-600"><?php echo e($aspiration->kategori); ?></td>
                            <td class="px-4 py-3">
                                <span class="text-xs px-2 py-1 rounded-full
                                    <?php echo e($aspiration->kerahasiaan === 'Publik' ? 'bg-slate-100 text-slate-600' : ($aspiration->kerahasiaan === 'Rahasia' ? 'bg-amber-100 text-amber-700' : 'bg-violet-100 text-violet-700')); ?>">
                                    <?php echo e($aspiration->kerahasiaan); ?>

                                </span>
                            </td>
                            <td class="px-4 py-3">
                                <span class="text-xs px-2 py-1 rounded-full
                                    <?php echo e(match(true) {
                                        $aspiration->status === 'Selesai' => 'bg-emerald-100 text-emerald-700',
                                        $aspiration->status === 'Ditolak' => 'bg-red-100 text-red-700',
                                        $aspiration->status === 'Menunggu Verifikasi' => 'bg-amber-100 text-amber-700',
                                        default => 'bg-sky-100 text-sky-700',
                                    }); ?>">
                                    <?php echo e($aspiration->status); ?>

                                </span>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center justify-end gap-1">
                                    <a href="<?php echo e(route('admin.aspirasi.show', $aspiration)); ?>"
                                       class="p-2 rounded-lg text-sky-600 hover:bg-sky-50" title="Lihat Detail">
                                        <?php echo $__env->make('admin.components.icon', ['name' => 'eye'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                    </a>
                                    <form method="POST" action="<?php echo e(route('admin.aspirasi.destroy', $aspiration)); ?>"
                                          onsubmit="return confirm('Hapus laporan ini?');">
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
                            <td colspan="6" class="px-4 py-10 text-center text-slate-400">Belum ada laporan yang masuk dari halaman Layanan Aspirasi.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <?php if($aspirationList->hasPages()): ?>
            <div class="px-4 py-3 border-t border-slate-100">
                <?php echo e($aspirationList->links()); ?>

            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/enb/Herd/sakadirgantarabali/resources/views/admin/aspirasi/index.blade.php ENDPATH**/ ?>