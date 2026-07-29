<?php echo csrf_field(); ?>
<?php if(isset($member)): ?>
    <?php echo method_field('PUT'); ?>
<?php endif; ?>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <div class="lg:col-span-2 bg-white rounded-xl border border-slate-200 p-5 space-y-5">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div>
                <label for="nama" class="block text-sm font-medium text-slate-700 mb-1">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" value="<?php echo e(old('nama', $member->nama ?? '')); ?>" required
                       class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-sky-500 focus:ring-sky-500 <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-400 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="mt-1 text-xs text-red-600"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div>
                <label for="nomor_anggota" class="block text-sm font-medium text-slate-700 mb-1">Nomor Anggota</label>
                <input type="text" id="nomor_anggota" name="nomor_anggota" value="<?php echo e(old('nomor_anggota', $member->nomor_anggota ?? '')); ?>" required
                       class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-sky-500 focus:ring-sky-500 <?php $__errorArgs = ['nomor_anggota'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-400 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                <?php $__errorArgs = ['nomor_anggota'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="mt-1 text-xs text-red-600"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div>
                <label for="jenis_kelamin" class="block text-sm font-medium text-slate-700 mb-1">Jenis Kelamin</label>
                <?php $jk = old('jenis_kelamin', $member->jenis_kelamin ?? ''); ?>
                <select id="jenis_kelamin" name="jenis_kelamin" required
                        class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-sky-500 focus:ring-sky-500 <?php $__errorArgs = ['jenis_kelamin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-400 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <option value="" disabled <?php if($jk === ''): echo 'selected'; endif; ?>>Pilih jenis kelamin</option>
                    <option value="Laki-laki" <?php if($jk === 'Laki-laki'): echo 'selected'; endif; ?>>Laki-laki</option>
                    <option value="Perempuan" <?php if($jk === 'Perempuan'): echo 'selected'; endif; ?>>Perempuan</option>
                </select>
                <?php $__errorArgs = ['jenis_kelamin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="mt-1 text-xs text-red-600"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div>
                <label for="status" class="block text-sm font-medium text-slate-700 mb-1">Status</label>
                <?php $status = old('status', $member->status ?? 'Aktif'); ?>
                <select id="status" name="status" required
                        class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-sky-500 focus:ring-sky-500 <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-400 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <option value="Aktif" <?php if($status === 'Aktif'): echo 'selected'; endif; ?>>Aktif</option>
                    <option value="Alumni" <?php if($status === 'Alumni'): echo 'selected'; endif; ?>>Alumni</option>
                    <option value="Non Aktif" <?php if($status === 'Non Aktif'): echo 'selected'; endif; ?>>Non Aktif</option>
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
                <label for="tempat_lahir" class="block text-sm font-medium text-slate-700 mb-1">Tempat Lahir</label>
                <input type="text" id="tempat_lahir" name="tempat_lahir" value="<?php echo e(old('tempat_lahir', $member->tempat_lahir ?? '')); ?>"
                       class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-sky-500 focus:ring-sky-500 <?php $__errorArgs = ['tempat_lahir'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-400 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                <?php $__errorArgs = ['tempat_lahir'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="mt-1 text-xs text-red-600"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Tanggal Lahir</label>
                <?php
                    $tglLahirVal = old('tanggal_lahir', isset($member) && $member->tanggal_lahir ? $member->tanggal_lahir->format('Y-m-d') : '');
                    [$tlTahun, $tlBulan, $tlTanggal] = $tglLahirVal ? explode('-', $tglLahirVal) : ['', '', ''];
                    $tlTahun = ltrim($tlTahun ?? '', '0') ?: $tlTahun;
                ?>
                
                <div class="grid grid-cols-3 gap-2">
                    <select id="tanggal_lahir_tgl" class="w-full rounded-lg border border-slate-300 px-2 py-2 text-sm focus:border-sky-500 focus:ring-sky-500">
                        <option value="">Tgl</option>
                        <?php for($d = 1; $d <= 31; $d++): ?>
                            <option value="<?php echo e(sprintf('%02d', $d)); ?>" <?php if((int) $tlTanggal === $d): echo 'selected'; endif; ?>><?php echo e($d); ?></option>
                        <?php endfor; ?>
                    </select>
                    <select id="tanggal_lahir_bln" class="w-full rounded-lg border border-slate-300 px-2 py-2 text-sm focus:border-sky-500 focus:ring-sky-500">
                        <option value="">Bulan</option>
                        <?php $__currentLoopData = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bi => $bn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e(sprintf('%02d', $bi + 1)); ?>" <?php if((int) $tlBulan === $bi + 1): echo 'selected'; endif; ?>><?php echo e($bn); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <select id="tanggal_lahir_thn" class="w-full rounded-lg border border-slate-300 px-2 py-2 text-sm focus:border-sky-500 focus:ring-sky-500">
                        <option value="">Tahun</option>
                        <?php for($y = now()->year; $y >= now()->year - 80; $y--): ?>
                            <option value="<?php echo e($y); ?>" <?php if((string) $tlTahun === (string) $y): echo 'selected'; endif; ?>><?php echo e($y); ?></option>
                        <?php endfor; ?>
                    </select>
                </div>
                <input type="hidden" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo e($tglLahirVal); ?>">
                <?php $__errorArgs = ['tanggal_lahir'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="mt-1 text-xs text-red-600"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div>
                <label for="agama" class="block text-sm font-medium text-slate-700 mb-1">Agama</label>
                <input type="text" id="agama" name="agama" value="<?php echo e(old('agama', $member->agama ?? '')); ?>"
                       class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-sky-500 focus:ring-sky-500 <?php $__errorArgs = ['agama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-400 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                <?php $__errorArgs = ['agama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="mt-1 text-xs text-red-600"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div>
                <label for="no_hp" class="block text-sm font-medium text-slate-700 mb-1">No. HP</label>
                <input type="text" id="no_hp" name="no_hp" value="<?php echo e(old('no_hp', $member->no_hp ?? '')); ?>"
                       class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-sky-500 focus:ring-sky-500 <?php $__errorArgs = ['no_hp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-400 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                <?php $__errorArgs = ['no_hp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="mt-1 text-xs text-red-600"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-slate-700 mb-1">Email</label>
                <input type="email" id="email" name="email" value="<?php echo e(old('email', $member->email ?? '')); ?>"
                       class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-sky-500 focus:ring-sky-500 <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-400 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="mt-1 text-xs text-red-600"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div>
                <label for="asal_sekolah" class="block text-sm font-medium text-slate-700 mb-1">Asal Sekolah</label>
                <input type="text" id="asal_sekolah" name="asal_sekolah" value="<?php echo e(old('asal_sekolah', $member->asal_sekolah ?? '')); ?>"
                       class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-sky-500 focus:ring-sky-500 <?php $__errorArgs = ['asal_sekolah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-400 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                <?php $__errorArgs = ['asal_sekolah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="mt-1 text-xs text-red-600"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div>
                <label for="pangkalan_id" class="block text-sm font-medium text-slate-700 mb-1">Pangkalan</label>
                <?php $pangkalanId = old('pangkalan_id', $member->pangkalan_id ?? ''); ?>
                <select id="pangkalan_id" name="pangkalan_id"
                        class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-sky-500 focus:ring-sky-500 <?php $__errorArgs = ['pangkalan_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-400 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <option value="">Belum ditentukan</option>
                    <?php $__currentLoopData = $pangkalanList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($p->id); ?>" <?php if((string) $pangkalanId === (string) $p->id): echo 'selected'; endif; ?>><?php echo e($p->nama); ?> (<?php echo e($p->kota); ?>)</option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php $__errorArgs = ['pangkalan_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="mt-1 text-xs text-red-600"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <p class="mt-1 text-xs text-amber-600">Penting: anggota tanpa Pangkalan tidak akan tampil di Data Anggota maupun Peta Sebaran di website publik.</p>
                <?php if($pangkalanList->isEmpty()): ?>
                    <p class="mt-1 text-xs text-amber-600">Belum ada data pangkalan. <a href="<?php echo e(route('admin.pangkalan.create')); ?>" class="underline">Tambahkan pangkalan</a> dulu supaya anggota bisa muncul di peta sebaran.</p>
                <?php endif; ?>
            </div>

            <div>
                <label for="angkatan" class="block text-sm font-medium text-slate-700 mb-1">Angkatan</label>
                <?php $angkatan = old('angkatan', $member->angkatan ?? ''); ?>
                <input type="text" id="angkatan" name="angkatan" list="angkatan-suggestions" value="<?php echo e($angkatan); ?>"
                       placeholder="Contoh: Angkatan XXIII (2027)"
                       class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-sky-500 focus:ring-sky-500 <?php $__errorArgs = ['angkatan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-400 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                <datalist id="angkatan-suggestions">
                    <?php $__currentLoopData = \App\Models\Member::ANGKATAN_OPTIONS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $opt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($opt); ?>"></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </datalist>
                <p class="mt-1 text-xs text-slate-400">Bebas diisi/diedit — ketik angkatan baru jika belum ada di saran.</p>
                <?php $__errorArgs = ['angkatan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="mt-1 text-xs text-red-600"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div>
                <label for="jenjang" class="block text-sm font-medium text-slate-700 mb-1">Jenjang</label>
                <?php $jenjang = old('jenjang', $member->jenjang ?? ''); ?>
                <select id="jenjang" name="jenjang"
                        class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-sky-500 focus:ring-sky-500 <?php $__errorArgs = ['jenjang'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-400 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <option value="">Belum ditentukan</option>
                    <?php $__currentLoopData = \App\Models\Member::JENJANG_OPTIONS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $opt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($opt); ?>" <?php if($jenjang === $opt): echo 'selected'; endif; ?>><?php echo e($opt); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php $__errorArgs = ['jenjang'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="mt-1 text-xs text-red-600"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div>
                <label for="krida" class="block text-sm font-medium text-slate-700 mb-1">Krida</label>
                <input type="text" id="krida" name="krida" value="<?php echo e(old('krida', $member->krida ?? '')); ?>"
                       class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-sky-500 focus:ring-sky-500 <?php $__errorArgs = ['krida'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-400 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                <?php $__errorArgs = ['krida'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="mt-1 text-xs text-red-600"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div>
                <label for="jabatan" class="block text-sm font-medium text-slate-700 mb-1">Jabatan</label>
                <input type="text" id="jabatan" name="jabatan" value="<?php echo e(old('jabatan', $member->jabatan ?? '')); ?>"
                       class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-sky-500 focus:ring-sky-500 <?php $__errorArgs = ['jabatan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-400 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                <?php $__errorArgs = ['jabatan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="mt-1 text-xs text-red-600"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>

        <div>
            <label for="alamat" class="block text-sm font-medium text-slate-700 mb-1">Alamat</label>
            <textarea id="alamat" name="alamat" rows="3"
                      class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-sky-500 focus:ring-sky-500 <?php $__errorArgs = ['alamat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-400 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"><?php echo e(old('alamat', $member->alamat ?? '')); ?></textarea>
            <?php $__errorArgs = ['alamat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="mt-1 text-xs text-red-600"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
    </div>

    <div class="space-y-5">
        <div class="bg-white rounded-xl border border-slate-200 p-4">
            <label for="foto" class="block text-sm font-medium text-slate-700 mb-1">Foto Anggota</label>
            <?php if(isset($member) && $member->foto): ?>
                <img src="<?php echo e($member->foto_url); ?>" alt="Foto saat ini" class="w-full h-40 object-cover rounded-lg mb-2">
            <?php endif; ?>
            <input type="file" id="foto" name="foto" accept=".jpg,.jpeg,.png,.webp"
                   class="w-full text-sm text-slate-600 file:mr-3 file:rounded-lg file:border-0 file:bg-slate-100 file:px-3 file:py-2 file:text-sm file:font-medium file:text-slate-700 hover:file:bg-slate-200 <?php $__errorArgs = ['foto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-400 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
            <p class="mt-1 text-xs text-slate-400">Format jpg, jpeg, png, webp. Maks 2MB.</p>
            <?php $__errorArgs = ['foto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="mt-1 text-xs text-red-600"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="flex items-center gap-2">
            <button type="submit" class="flex-1 rounded-lg bg-sky-600 hover:bg-sky-700 text-white text-sm font-medium py-2.5 transition">
                Simpan
            </button>
            <a href="<?php echo e(route('admin.members.index')); ?>" class="flex-1 text-center rounded-lg border border-slate-300 text-slate-600 hover:bg-slate-50 text-sm font-medium py-2.5 transition">
                Batal
            </a>
        </div>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
<script>
(function () {
    const tgl = document.getElementById('tanggal_lahir_tgl');
    const bln = document.getElementById('tanggal_lahir_bln');
    const thn = document.getElementById('tanggal_lahir_thn');
    const hidden = document.getElementById('tanggal_lahir');

    function syncTanggalLahir() {
        if (tgl.value && bln.value && thn.value) {
            hidden.value = `${thn.value}-${bln.value}-${tgl.value}`;
        } else {
            hidden.value = '';
        }
    }

    [tgl, bln, thn].forEach(el => el.addEventListener('change', syncTanggalLahir));
    // Pastikan tersinkron juga tepat sebelum form dikirim (jaga-jaga).
    hidden.closest('form')?.addEventListener('submit', syncTanggalLahir);
})();
</script>
<?php $__env->stopPush(); ?><?php /**PATH /Users/enb/Herd/sakadirgantarabali/resources/views/admin/members/_form.blade.php ENDPATH**/ ?>