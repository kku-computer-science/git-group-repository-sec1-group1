

<style>
    .name {
        font-size: 20px;
    }

    .card-text-1 {
        font-weight: bold;
    }

    .card-text-2 {
        font-size: 16px;
    }
</style>

<?php $__env->startSection('content'); ?>
<div class="container card-4 mt-5">
    <div class="card">
        <?php $__currentLoopData = $resgd; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="row g-0 shadow-sm">
            <div class="col-md-4">
                <div class="card-body">
                    <img src="<?php echo e(asset('img/'.$rg->group_image)); ?>" alt="..." class="img-fluid">
                    <h1 class="card-text-1"><?php echo e(trans('message.Lab_supervisor')); ?></h1>
                    <h2 class="card-text-2">
                        <?php $__currentLoopData = $rg->user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($r->hasRole('teacher')): ?>
                        <?php
                        $locale = app()->getLocale();
                        $locale = in_array($locale, ['en', 'th', 'zh']) ? $locale : 'en'; // Set 'en' as default if not found
                        ?>
                        <?php if($locale == 'en' && $r->academic_ranks_en == 'Lecturer' && $r->doctoral_degree == 'Ph.D.'): ?>
                        <a href="<?php echo e(route('detail', Crypt::encrypt($r->id))); ?>">
                            <?php echo e($r->{'fname_' . $locale}); ?> <?php echo e($r->{'lname_' . $locale}); ?>, Ph.D.
                        </a><br>
                        <?php elseif($locale == 'en' && $r->academic_ranks_en == 'Lecturer'): ?>
                        <a href="<?php echo e(route('detail', Crypt::encrypt($r->id))); ?>">
                            <?php echo e($r->{'fname_' . $locale}); ?> <?php echo e($r->{'lname_' . $locale}); ?>

                        </a><br>
                        <?php elseif($locale == 'en' && $r->doctoral_degree == 'Ph.D.'): ?>
                        <a href="<?php echo e(route('detail', Crypt::encrypt($r->id))); ?>">
                            <?php echo e(str_replace('Dr.', ' ', $r->{'position_' . $locale})); ?> <?php echo e($r->{'fname_' . $locale}); ?> <?php echo e($r->{'lname_' . $locale}); ?>, Ph.D.
                        </a><br>
                        <?php else: ?>
                        <?php echo e($r->{'position_' . $locale}); ?> <?php echo e($r->{'fname_' . $locale}); ?> <?php echo e($r->{'lname_' . $locale}); ?><br>
                        <?php endif; ?>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </h2>
                    <?php if(collect($rg->user)->contains(fn($user) => $user->hasRole('student'))): ?>
                    <h1 class="card-text-1">?php echo e(trans('message.student')); ?</h1>
                    <h2 class="card-text-2">
                        <?php $__currentLoopData = $rg->user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($user->hasRole('student')): ?>
                        <?php
                        $locale = app()->getLocale();
                        $locale = in_array($locale, ['en', 'th', 'zh']) ? $locale : 'en'; // Set 'en' as default if not found
                        ?>
                        <?php echo e($user->{'position_' . $locale}); ?> <?php echo e($user->{'fname_' . $locale}); ?> <?php echo e($user->{'lname_' . $locale}); ?>

                        <br>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                    </h2>
                    <?php endif; ?>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">
                        <?php
                        $locale = app()->getLocale();
                        $locale = in_array($locale, ['en', 'th', 'zh']) ? $locale : 'en'; // Set 'en' as default if not found
                        ?>
                        <?php echo e($rg->{'group_name_' . $locale}); ?>

                    </h5>
                    <h3 class="card-text">
                        <?php echo e(Str::limit($rg->{'group_desc_' . $locale}, 350)); ?>

                    </h3>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/researchgroupdetail.blade.php ENDPATH**/ ?>