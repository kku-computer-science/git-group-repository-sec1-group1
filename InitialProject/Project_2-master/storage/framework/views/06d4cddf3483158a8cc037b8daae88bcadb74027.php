
<?php $__env->startSection('content'); ?>
<div class="container card-3 ">
    <p><?php echo e(trans('message.Research_Group')); ?></p>
        <?php $__currentLoopData = $resg; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-6 col-12">
            <div class="card mb-4 d-flex flex-column h-100 shadow-sm">
                <div class="row g-0 flex-grow-1">
                    <div class="col-md-4">
                        <div class="card-body p-2 ">
                            <img src="<?php echo e(asset('img/'.$rg->group_image)); ?>" alt="..." class="img-fluid ml-0">
                        </div>
                    </div>
                    <div class="col-md-8 d-flex flex-column">
                        <div class="card-body flex-grow-1 d-flex flex-column">
                            <?php
                            $locale = app()->getLocale();
                            $locale = in_array($locale, ['en', 'th', 'zh']) ? $locale : 'en';
                            ?>
                            <h5 class="card-title"><?php echo e($rg->{'group_name_' . $locale}); ?></h5>
                            <h3 class="card-text"><?php echo e(Str::limit($rg->{'group_desc_' . $locale}, 350)); ?></h3>

                            <h2 class="card-text-1 mt-3 ml-0"><?php echo e(trans('message.Lab_supervisor')); ?></h2>
                            <h2 class="card-text-2 ml-0">
                                <?php $__currentLoopData = $rg->user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($r->hasRole('teacher')): ?>
                                <?php
                                $locale = app()->getLocale();
                                $locale = in_array($locale, ['en', 'th', 'zh']) ? $locale : 'en';
                                ?>
                                <?php if($locale == 'en' && $r->academic_ranks_en == 'Lecturer' && $r->doctoral_degree == 'Ph.D.'): ?>
                                <?php echo e($r->{'fname_' . $locale}); ?> <?php echo e($r->{'lname_' . $locale}); ?>, Ph.D.
                                <br>
                                <?php elseif($locale == 'en' && $r->academic_ranks_en == 'Lecturer'): ?>
                                <?php echo e($r->{'fname_' . $locale}); ?> <?php echo e($r->{'lname_' . $locale}); ?>

                                <br>
                                <?php elseif($locale == 'en' && $r->doctoral_degree == 'Ph.D.'): ?>
                                <?php echo e(str_replace('Dr.', ' ', $r->{'position_' . $locale})); ?> <?php echo e($r->{'fname_' . $locale}); ?> <?php echo e($r->{'lname_' . $locale}); ?>, Ph.D.
                                <br>
                                <?php else: ?>
                                <?php echo e($r->{'position_' . $locale}); ?> <?php echo e($r->{'fname_' . $locale}); ?> <?php echo e($r->{'lname_' . $locale}); ?>

                                <br>
                                <?php endif; ?>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </h2>

                            <div class="mt-auto">
                                <a href="<?php echo e(route('researchgroupdetail', ['id' => $rg->id])); ?>"
                                    class="btn btn-outline-info "><?php echo e(trans('message.details')); ?></a>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/research_g.blade.php ENDPATH**/ ?>