<?php $__env->startSection('title', 'Pendaftaran Anggota Baru'); ?>

<?php $__env->startSection('content'); ?>
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-6">
        <div class="bg-white rounded-xl border border-slate-200 p-4">
            <p class="text-2xl font-bold text-slate-800"><?php echo e($stats['total']); ?></p>
            <p class="text-xs text-slate-500">Total Pendaftar</p>
        </div>
        <div class="bg-white rounded-xl border border-slate-200 p-4">
            <p class="text-2xl font-bold text-amber-600"><?php echo e($stats['menunggu']); ?></p>
            <p class="text-xs text-slate-500">Menunggu Verifikasi</p>
        </div>
        <div class="bg-white rounded-xl border border-slate-200 p-4">
            <p class="text-2xl font-bold text-sky-600"><?php echo e($stats['dihubungi']); ?></p>
            <p class="text-xs text-slate-500">Dihubungi</p>
        </div>
        <div class="bg-white rounded-xl border border-slate-200 p-4">
            <p class="text-2xl font-bold text-emerald-600"><?php echo e($stats['diterima']); ?></p>
            <p class="text-xs text-slate-500">Diterima</p>
        </div>
    </div>

    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-5">
        <form method="GET" class="flex flex-1 max-w-lg gap-2">
            <div class="relative flex-1">
                <span class="absolute inset-y-0 left-3 flex items-center text-slate-400">
                    <?php echo $__env->make('admin.components.icon', ['name' => 'search'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </span>
                <input type="text" name="q" value="<?php echo e(request('q')); ?>" placeholder="Cari nama, kode, atau email..."
                       class="w-full rounded-lg border border-slate-300 pl-10 pr-3 py-2 text-sm focus:border-sky-500 focus:ring-sky-500">
            </div>
            <select name="status" class="rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-sky-500 focus:ring-sky-500">
                <option value="">Semua Status</option>
                <?php $__currentLoopData = \App\Models\Registration::STATUS_OPTIONS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($status); ?>" <?php if(request('status') === $status): echo 'selected'; endif; ?>><?php echo e($status); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <button type="submit" class="rounded-lg border border-slate-300 text-slate-600 hover:bg-slate-50 px-3 py-2 text-sm">Cari</button>
        </form>

        <a href="<?php echo e(route('admin.pendaftaran.pdf', request()->only(['q', 'status']))); ?>"
           class="inline-flex items-center justify-center gap-2 rounded-lg bg-sky-600 hover:bg-sky-700 text-white text-sm font-medium px-4 py-2 transition">
            <?php echo $__env->make('admin.components.icon', ['name' => 'download'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            Unduh PDF
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-slate-50 text-slate-600 text-left">
                    <tr>
                        <th class="px-4 py-3 font-medium">Kode</th>
                        <th class="px-4 py-3 font-medium">Nama</th>
                        <th class="px-4 py-3 font-medium">Kontak</th>
                        <th class="px-4 py-3 font-medium">Pangkalan Tujuan</th>
                        <th class="px-4 py-3 font-medium">Krida</th>
                        <th class="px-4 py-3 font-medium">Status</th>
                        <th class="px-4 py-3 font-medium text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <?php $__empty_1 = true; $__currentLoopData = $registrationList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $registration): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="hover:bg-slate-50 align-top">
                            <td class="px-4 py-3 font-mono text-xs text-slate-500">
                                <?php echo e($registration->kode_pendaftaran); ?>

                                <p class="mt-1 text-[11px] text-slate-400"><?php echo e($registration->created_at->translatedFormat('d M Y, H:i')); ?></p>
                            </td>
                            <td class="px-4 py-3 font-medium text-slate-800">
                                <?php echo e($registration->nama); ?>

                                <p class="mt-1 text-xs font-normal text-slate-400"><?php echo e($registration->asal_sekolah); ?></p>
                            </td>
                            <td class="px-4 py-3 text-slate-600">
                                <p><?php echo e($registration->email); ?></p>
                                <p class="text-xs text-slate-400"><?php echo e($registration->no_hp); ?></p>
                            </td>
                            <td class="px-4 py-3 text-slate-600"><?php echo e($registration->pangkalan?->nama ?? '-'); ?></td>
                            <td class="px-4 py-3 text-slate-600"><?php echo e($registration->krida ?? '-'); ?></td>
                            <td class="px-4 py-3">
                                <form method="POST" action="<?php echo e(route('admin.pendaftaran.update', $registration)); ?>" class="flex flex-col gap-1">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PATCH'); ?>
                                    <select name="status" onchange="this.form.submit()"
                                            class="text-xs rounded-lg border border-slate-300 px-2 py-1.5 focus:border-sky-500 focus:ring-sky-500">
                                        <?php $__currentLoopData = \App\Models\Registration::STATUS_OPTIONS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($status); ?>" <?php if($registration->status === $status): echo 'selected'; endif; ?>><?php echo e($status); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </form>
                            </td>
                            <td class="px-4 py-3">
                                <form method="POST" action="<?php echo e(route('admin.pendaftaran.destroy', $registration)); ?>"
                                      onsubmit="return confirm('Hapus data pendaftaran ini?');" class="flex justify-end">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="p-2 rounded-lg text-red-600 hover:bg-red-50" title="Hapus">
                                        <?php echo $__env->make('admin.components.icon', ['name' => 'trash'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="7" class="px-4 py-10 text-center text-slate-400">Belum ada pendaftar yang masuk dari halaman "Ayo Gabung".</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <?php if($registrationList->hasPages()): ?>
            <div class="px-4 py-3 border-t border-slate-100">
                <?php echo e($registrationList->links()); ?>

            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/enb/Herd/sakadirgantarabali/resources/views/admin/pendaftaran/index.blade.php ENDPATH**/ ?>