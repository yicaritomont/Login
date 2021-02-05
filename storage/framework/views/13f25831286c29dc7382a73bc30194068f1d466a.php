<?php $__env->startSection('content'); ?>
    <?php if(Auth::check()): ?>
    <div class="alert alert-success">
        <h2> <?php echo app('translator')->getFromJson('words.Wellcome'); ?> <?php echo e(Auth::user()->name); ?> </h2>
        <p>  <?php echo app('translator')->getFromJson('words.LastConnection'); ?> <?php echo e(Auth::user()->last_login); ?></p>
    </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>