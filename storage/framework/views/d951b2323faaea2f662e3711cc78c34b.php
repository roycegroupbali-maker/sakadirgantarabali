<?php $__env->startSection('title', 'Pangkalan'); ?>

<?php $__env->startSection('content'); ?>
    <div class="flex items-center justify-between mb-5">
        <p class="text-sm text-slate-500">Kelola daftar pangkalan beserta titik lokasinya di peta sebaran.</p>
        <a href="<?php echo e(route('admin.pangkalan.create')); ?>"
           class="inline-flex items-center gap-2 rounded-lg bg-sky-600 hover:bg-sky-700 text-white text-sm font-medium px-4 py-2 transition">
            <?php echo $__env->make('admin.components.icon', ['name' => 'plus'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            Tambah Pangkalan
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-slate-50 text-slate-600 text-left">
                    <tr>
                        <th class="px-4 py-3 font-medium">Nama Pangkalan</th>
                        <th class="px-4 py-3 font-medium">Kota/Kabupaten</th>
                        <th class="px-4 py-3 font-medium">Koordinat (Lat, Lng)</th>
                        <th class="px-4 py-3 font-medium">Jumlah Anggota</th>
                        <th class="px-4 py-3 font-medium text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <?php $__empty_1 = true; $__currentLoopData = $pangkalanList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="hover:bg-slate-50">
                            <td class="px-4 py-3 font-medium text-slate-800"><?php echo e($item->nama); ?></td>
                            <td class="px-4 py-3 text-slate-600"><?php echo e($item->kota); ?></td>
                            <td class="px-4 py-3 text-slate-500 font-mono text-xs"><?php echo e($item->lat); ?>, <?php echo e($item->lng); ?></td>
                            <td class="px-4 py-3 text-slate-600"><?php echo e($item->members_count); ?></td>
                            <td class="px-4 py-3">
                                <div class="flex items-center justify-end gap-1">
                                    <a href="<?php echo e(route('admin.pangkalan.edit', $item)); ?>"
                                       class="p-2 rounded-lg text-sky-600 hover:bg-sky-50" title="Edit">
                                        <?php echo $__env->make('admin.components.icon', ['name' => 'pencil'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                    </a>
                                    <form method="POST" action="<?php echo e(route('admin.pangkalan.destroy', $item)); ?>"
                                          onsubmit="return confirm('Hapus pangkalan ini?<?php echo e($item->members_count > 0 ? ' '.$item->members_count.' anggota yang terdaftar di pangkalan ini akan kehilangan data pangkalannya.' : ''); ?>');">
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
                            <td colspan="5" class="px-4 py-10 text-center text-slate-400">Belum ada data pangkalan. Klik "Tambah Pangkalan" untuk menambahkan yang pertama.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <?php if($pangkalanList->hasPages()): ?>
            <div class="px-4 py-3 border-t border-slate-100">
                <?php echo e($pangkalanList->links()); ?>

            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/enb/Herd/sakadirgantarabali/resources/views/admin/pangkalan/index.blade.php ENDPATH**/ ?>