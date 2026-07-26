<?php $__env->startSection('title', 'Edit Foto Galeri'); ?>

<?php $__env->startSection('content'); ?>
    <form method="POST" action="<?php echo e(route('admin.gallery.update', $gallery)); ?>" enctype="multipart/form-data">
        <?php echo $__env->make('admin.gallery._form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/enb/Herd/sakadirgantarabali/resources/views/admin/gallery/edit.blade.php ENDPATH**/ ?>