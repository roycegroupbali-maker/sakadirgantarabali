<?php $__env->startSection('title', 'Detail Laporan — '.$aspiration->nomor_tiket); ?>

<?php $__env->startSection('content'); ?>
    <div class="mb-5">
        <a href="<?php echo e(route('admin.aspirasi.index')); ?>" class="text-sm text-sky-600 hover:underline">&larr; Kembali ke daftar laporan</a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
                <div class="flex items-start justify-between gap-3 mb-4">
                    <div>
                        <p class="font-mono text-xs text-slate-400 mb-1"><?php echo e($aspiration->nomor_tiket); ?></p>
                        <h2 class="text-lg font-semibold text-slate-800"><?php echo e($aspiration->judul); ?></h2>
                    </div>
                    <span class="text-xs px-2 py-1 rounded-full whitespace-nowrap
                        <?php echo e(match(true) {
                            $aspiration->status === 'Selesai' => 'bg-emerald-100 text-emerald-700',
                            $aspiration->status === 'Ditolak' => 'bg-red-100 text-red-700',
                            $aspiration->status === 'Menunggu Verifikasi' => 'bg-amber-100 text-amber-700',
                            default => 'bg-sky-100 text-sky-700',
                        }); ?>">
                        <?php echo e($aspiration->status); ?>

                    </span>
                </div>

                <dl class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm mb-5">
                    <div>
                        <dt class="text-slate-400 text-xs">Pelapor</dt>
                        <dd class="text-slate-700 font-medium"><?php echo e($aspiration->nama_publik); ?></dd>
                    </div>
                    <div>
                        <dt class="text-slate-400 text-xs">Tingkat Kerahasiaan</dt>
                        <dd class="text-slate-700 font-medium"><?php echo e($aspiration->kerahasiaan); ?></dd>
                    </div>
                    <div>
                        <dt class="text-slate-400 text-xs">Email</dt>
                        <dd class="text-slate-700"><?php echo e($aspiration->email); ?></dd>
                    </div>
                    <div>
                        <dt class="text-slate-400 text-xs">Nomor WhatsApp</dt>
                        <dd class="text-slate-700"><?php echo e($aspiration->no_hp); ?></dd>
                    </div>
                    <div>
                        <dt class="text-slate-400 text-xs">Instansi/Sekolah</dt>
                        <dd class="text-slate-700"><?php echo e($aspiration->instansi ?? '-'); ?></dd>
                    </div>
                    <div>
                        <dt class="text-slate-400 text-xs">Kota/Kabupaten</dt>
                        <dd class="text-slate-700"><?php echo e($aspiration->kota); ?></dd>
                    </div>
                    <div>
                        <dt class="text-slate-400 text-xs">Kategori</dt>
                        <dd class="text-slate-700"><?php echo e($aspiration->kategori); ?></dd>
                    </div>
                    <div>
                        <dt class="text-slate-400 text-xs">Lokasi Kejadian</dt>
                        <dd class="text-slate-700"><?php echo e($aspiration->lokasi_kejadian); ?></dd>
                    </div>
                    <div>
                        <dt class="text-slate-400 text-xs">Tanggal / Jam Kejadian</dt>
                        <dd class="text-slate-700"><?php echo e($aspiration->tanggal_kejadian->translatedFormat('d M Y')); ?><?php echo e($aspiration->jam_kejadian ? ' · '.$aspiration->jam_kejadian : ''); ?></dd>
                    </div>
                </dl>

                <div class="mb-5">
                    <dt class="text-slate-400 text-xs mb-1">Deskripsi Lengkap</dt>
                    <dd class="text-slate-700 text-sm whitespace-pre-line bg-slate-50 rounded-lg p-4 border border-slate-100"><?php echo e($aspiration->deskripsi); ?></dd>
                </div>

                <?php if(!empty($aspiration->lampiran_urls)): ?>
                    <div>
                        <dt class="text-slate-400 text-xs mb-2">File Pendukung</dt>
                        <div class="flex flex-wrap gap-2">
                            <?php $__currentLoopData = $aspiration->lampiran_urls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e($url); ?>" target="_blank"
                                   class="text-xs px-3 py-1.5 rounded-lg bg-sky-50 text-sky-700 hover:bg-sky-100 border border-sky-100">
                                    Lampiran <?php echo e($loop->iteration); ?>

                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
                <h3 class="text-sm font-semibold text-slate-700 mb-4">Riwayat / Timeline</h3>
                <div class="space-y-4">
                    <?php $__empty_1 = true; $__currentLoopData = ($aspiration->riwayat ?? []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="flex gap-3">
                            <div class="w-2 h-2 mt-1.5 rounded-full bg-sky-500 flex-shrink-0"></div>
                            <div>
                                <p class="text-sm text-slate-700"><?php echo e($item['catatan']); ?></p>
                                <p class="text-xs text-slate-400"><?php echo e($item['tanggal']); ?></p>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <p class="text-sm text-slate-400">Belum ada riwayat.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="space-y-6">
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
                <h3 class="text-sm font-semibold text-slate-700 mb-4">Perbarui Status</h3>
                <form method="POST" action="<?php echo e(route('admin.aspirasi.update', $aspiration)); ?>" class="space-y-4">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PATCH'); ?>
                    <div>
                        <label for="status" class="block text-xs font-medium text-slate-500 mb-1">Status Laporan</label>
                        <select id="status" name="status" required
                                class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-sky-500 focus:ring-sky-500">
                            <?php $__currentLoopData = \App\Models\Aspiration::STATUS_OPTIONS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($status); ?>" <?php if($aspiration->status === $status): echo 'selected'; endif; ?>><?php echo e($status); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="mt-1 text-xs text-red-600"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div>
                        <label for="catatan" class="block text-xs font-medium text-slate-500 mb-1">Catatan (opsional)</label>
                        <textarea id="catatan" name="catatan" rows="3" placeholder="Contoh: Diteruskan ke AirNav Indonesia"
                                  class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-sky-500 focus:ring-sky-500"></textarea>
                        <?php $__errorArgs = ['catatan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="mt-1 text-xs text-red-600"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <p class="mt-1 text-xs text-slate-400">Catatan akan ditambahkan ke riwayat/timeline dan dapat dilihat pelapor pada halaman "Cek Status Laporan".</p>
                    </div>
                    <button type="submit"
                            class="w-full rounded-lg bg-sky-600 hover:bg-sky-700 text-white text-sm font-medium py-2.5 transition">
                        Simpan Perubahan
                    </button>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/enb/Herd/sakadirgantarabali/resources/views/admin/aspirasi/show.blade.php ENDPATH**/ ?>