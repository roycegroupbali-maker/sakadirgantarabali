<?php $__env->startSection('title', 'Data Anggota'); ?>

<?php $__env->startSection('content'); ?>
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-5">
        <form method="GET" class="flex flex-1 max-w-lg gap-2">
            <div class="relative flex-1">
                <span class="absolute inset-y-0 left-3 flex items-center text-slate-400">
                    <?php echo $__env->make('admin.components.icon', ['name' => 'search'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </span>
                <input type="text" name="q" value="<?php echo e(request('q')); ?>" placeholder="Cari nama atau nomor anggota..."
                       class="w-full rounded-lg border border-slate-300 pl-10 pr-3 py-2 text-sm focus:border-sky-500 focus:ring-sky-500">
            </div>
            <select name="status" class="rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-sky-500 focus:ring-sky-500">
                <option value="">Semua Status</option>
                <?php $__currentLoopData = ['Aktif', 'Alumni', 'Non Aktif']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($status); ?>" <?php if(request('status') === $status): echo 'selected'; endif; ?>><?php echo e($status); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <button type="submit" class="rounded-lg border border-slate-300 text-slate-600 hover:bg-slate-50 px-3 py-2 text-sm">Cari</button>
        </form>

        <a href="<?php echo e(route('admin.members.create')); ?>"
           class="inline-flex items-center justify-center gap-2 rounded-lg bg-sky-600 hover:bg-sky-700 text-white text-sm font-medium px-4 py-2 transition">
            <?php echo $__env->make('admin.components.icon', ['name' => 'plus'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            Tambah Anggota
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-slate-50 text-slate-600 text-left">
                    <tr>
                        <th class="px-4 py-3 font-medium">Foto</th>
                        <th class="px-4 py-3 font-medium">Nama</th>
                        <th class="px-4 py-3 font-medium">No. Anggota</th>
                        <th class="px-4 py-3 font-medium">Pangkalan</th>
                        <th class="px-4 py-3 font-medium">Krida</th>
                        <th class="px-4 py-3 font-medium">Jabatan</th>
                        <th class="px-4 py-3 font-medium">Status</th>
                        <th class="px-4 py-3 font-medium text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <?php $__empty_1 = true; $__currentLoopData = $memberList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="hover:bg-slate-50">
                            <td class="px-4 py-3">
                                <?php if($member->foto): ?>
                                    <img src="<?php echo e($member->foto_url); ?>" alt="<?php echo e($member->nama); ?>" class="w-10 h-10 rounded-full object-cover">
                                <?php else: ?>
                                    <div class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center text-slate-300">
                                        <?php echo $__env->make('admin.components.icon', ['name' => 'users'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td class="px-4 py-3 font-medium text-slate-800"><?php echo e($member->nama); ?></td>
                            <td class="px-4 py-3 text-slate-600"><?php echo e($member->nomor_anggota); ?></td>
                            <td class="px-4 py-3 text-slate-600">
                                <?php echo e($member->pangkalan?->nama ?? '-'); ?>

                                <?php if (! ($member->pangkalan_id)): ?>
                                    <p class="mt-1 text-[11px] text-amber-600">Belum tampil di website (pilih Pangkalan)</p>
                                <?php endif; ?>
                            </td>
                            <td class="px-4 py-3 text-slate-600"><?php echo e($member->krida ?? '-'); ?></td>
                            <td class="px-4 py-3 text-slate-600"><?php echo e($member->jabatan ?? '-'); ?></td>
                            <td class="px-4 py-3">
                                <span class="text-xs px-2 py-1 rounded-full
                                    <?php echo e($member->status === 'Aktif' ? 'bg-emerald-100 text-emerald-700' : ($member->status === 'Alumni' ? 'bg-sky-100 text-sky-700' : 'bg-slate-100 text-slate-500')); ?>">
                                    <?php echo e($member->status); ?>

                                </span>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center justify-end gap-1">
                                    <a href="<?php echo e(route('admin.members.edit', $member)); ?>"
                                       class="p-2 rounded-lg text-sky-600 hover:bg-sky-50" title="Edit">
                                        <?php echo $__env->make('admin.components.icon', ['name' => 'pencil'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                    </a>
                                    <form method="POST" action="<?php echo e(route('admin.members.destroy', $member)); ?>"
                                          onsubmit="return confirm('Hapus anggota ini?');">
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
                            <td colspan="8" class="px-4 py-10 text-center text-slate-400">Tidak ada data anggota yang cocok.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <?php if($memberList->hasPages()): ?>
            <div class="px-4 py-3 border-t border-slate-100">
                <?php echo e($memberList->links()); ?>

            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/enb/Herd/sakadirgantarabali/resources/views/admin/members/index.blade.php ENDPATH**/ ?>