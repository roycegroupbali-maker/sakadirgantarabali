<?php echo csrf_field(); ?>
<?php if(isset($pangkalan)): ?>
    <?php echo method_field('PUT'); ?>
<?php endif; ?>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <div class="lg:col-span-2 bg-white rounded-xl border border-slate-200 p-5 space-y-5">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div>
                <label for="nama" class="block text-sm font-medium text-slate-700 mb-1">Nama Pangkalan</label>
                <input type="text" id="nama" name="nama" value="<?php echo e(old('nama', $pangkalan->nama ?? '')); ?>" required
                       placeholder="Contoh: Pangkalan SMAN 1 Denpasar"
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
                <label for="kota" class="block text-sm font-medium text-slate-700 mb-1">Kota/Kabupaten</label>
                <input type="text" id="kota" name="kota" value="<?php echo e(old('kota', $pangkalan->kota ?? '')); ?>" required
                       placeholder="Contoh: Denpasar"
                       class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-sky-500 focus:ring-sky-500 <?php $__errorArgs = ['kota'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-400 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                <?php $__errorArgs = ['kota'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="mt-1 text-xs text-red-600"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div>
                <label for="lat" class="block text-sm font-medium text-slate-700 mb-1">Titik Lintang (Latitude)</label>
                <input type="text" inputmode="decimal" id="lat" name="lat" value="<?php echo e(old('lat', $pangkalan->lat ?? '')); ?>" required
                       placeholder="-8.6595"
                       class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm font-mono focus:border-sky-500 focus:ring-sky-500 <?php $__errorArgs = ['lat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-400 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                <?php $__errorArgs = ['lat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="mt-1 text-xs text-red-600"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div>
                <label for="lng" class="block text-sm font-medium text-slate-700 mb-1">Titik Bujur (Longitude)</label>
                <input type="text" inputmode="decimal" id="lng" name="lng" value="<?php echo e(old('lng', $pangkalan->lng ?? '')); ?>" required
                       placeholder="115.2166"
                       class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm font-mono focus:border-sky-500 focus:ring-sky-500 <?php $__errorArgs = ['lng'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-400 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                <?php $__errorArgs = ['lng'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="mt-1 text-xs text-red-600"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>

        <p class="text-xs text-slate-400">
            Tips: klik kanan lokasi di Google Maps lalu pilih koordinat yang muncul di bagian atas menu — akan
            tersalin sebagai "lat, lng" yang tinggal ditempel ke dua kolom di atas.
        </p>
    </div>

    <div class="space-y-5">
        <div class="bg-white rounded-xl border border-slate-200 p-4">
            <p class="text-sm font-medium text-slate-700 mb-2">Pratinjau Lokasi</p>
            <div id="map-preview" class="w-full h-48 rounded-lg bg-slate-100"></div>
            <p class="mt-2 text-xs text-slate-400">Pratinjau akan update otomatis sesuai koordinat yang diisi.</p>
        </div>

        <div class="flex items-center gap-2">
            <button type="submit" class="flex-1 rounded-lg bg-sky-600 hover:bg-sky-700 text-white text-sm font-medium py-2.5 transition">
                Simpan
            </button>
            <a href="<?php echo e(route('admin.pangkalan.index')); ?>" class="flex-1 text-center rounded-lg border border-slate-300 text-slate-600 hover:bg-slate-50 text-sm font-medium py-2.5 transition">
                Batal
            </a>
        </div>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    (function () {
        const latInput = document.getElementById('lat');
        const lngInput = document.getElementById('lng');
        const defaultLat = parseFloat(latInput.value) || -8.4095;
        const defaultLng = parseFloat(lngInput.value) || 115.1889;

        const map = L.map('map-preview', { attributionControl: false }).setView([defaultLat, defaultLng], latInput.value ? 13 : 9);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

        let marker = L.marker([defaultLat, defaultLng], { draggable: true }).addTo(map);

        function syncInputsFromMarker(latlng) {
            latInput.value = latlng.lat.toFixed(7);
            lngInput.value = latlng.lng.toFixed(7);
        }

        marker.on('dragend', () => syncInputsFromMarker(marker.getLatLng()));
        map.on('click', (e) => {
            marker.setLatLng(e.latlng);
            syncInputsFromMarker(e.latlng);
        });

        function syncMarkerFromInputs() {
            const lat = parseFloat(latInput.value);
            const lng = parseFloat(lngInput.value);
            if (!isNaN(lat) && !isNaN(lng)) {
                marker.setLatLng([lat, lng]);
                map.setView([lat, lng], map.getZoom());
            }
        }

        latInput.addEventListener('change', syncMarkerFromInputs);
        lngInput.addEventListener('change', syncMarkerFromInputs);

        setTimeout(() => map.invalidateSize(), 100);
    })();
</script>
<?php $__env->stopPush(); ?>
<?php /**PATH /Users/enb/Herd/sakadirgantarabali/resources/views/admin/pangkalan/_form.blade.php ENDPATH**/ ?>