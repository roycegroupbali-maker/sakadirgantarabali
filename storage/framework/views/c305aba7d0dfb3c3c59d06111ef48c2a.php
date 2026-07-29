<?php $__env->startSection('title', 'Edit Anggota'); ?>

<?php $__env->startSection('content'); ?>
    <form method="POST" action="<?php echo e(route('admin.members.update', $member)); ?>" enctype="multipart/form-data">
        <?php echo $__env->make('admin.members._form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/enb/Herd/sakadirgantarabali/resources/views/admin/members/edit.blade.php ENDPATH**/ ?>