<?php $__env->startSection('title','Dashboard'); ?>

<?php $__env->startSection('content'); ?>

<h3 style="padding-top: 10px;"><?php echo e(__('message.welcome_message')); ?></h3>
<br>
<h4>
    <?php echo e(__('message.hello')); ?> 
    <?php echo e(App::getLocale() == 'cn' 
        ? Auth::user()->{'position_en'} 
        : Auth::user()->{'position_' . App::getLocale()}); ?> 
    <?php echo e(App::getLocale() == 'cn' 
        ? Auth::user()->{'fname_en'} 
        : Auth::user()->{'fname_' . App::getLocale()}); ?> 
    <?php echo e(App::getLocale() == 'cn' 
        ? Auth::user()->{'lname_en'} 
        : Auth::user()->{'lname_' . App::getLocale()}); ?>

</h4>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('dashboards.users.layouts.user-dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/dashboards/users/index.blade.php ENDPATH**/ ?>