

<style>
    .name {
        font-size: 20px;
    }

    .card-text-2 {
        font-size: 16px;
    }

    .no-job-openings {
        display: none;
    }

    table {
        width: 100%;
        text-align: center;
        border-collapse: collapse;
        padding: 0;
    }

    th, td {
        padding: 12px; 
        text-align: center; 
        vertical-align: middle;
        border: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    td {
        font-size: 14px;
    }

    table th:nth-child(1), table td:nth-child(1) {
        width: 30%;
    }

    table th:nth-child(2), table td:nth-child(2),
    table th:nth-child(3), table td:nth-child(3),
    table th:nth-child(4), table td:nth-child(4), {
        width: 15%;
    }

    table th:nth-child(5), table td:nth-child(5),
    table th:nth-child(6), table td:nth-child(6) {
        width: 20%;
    }

    .card-body {
        padding-top: 0px;
    }

    .table {
        margin-top: 0px;
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
                        <?php elseif($locale == 'th' && isset($r->{'fname_th'}) && isset($r->{'lname_th'})): ?>
                        <a href="<?php echo e(route('detail', Crypt::encrypt($r->id))); ?>">
                            <?php echo e($r->{'fname_th'}); ?> <?php echo e($r->{'lname_th'}); ?>

                        </a><br>
                        <?php elseif($locale == 'th' && isset($r->{'fname_th'}) && isset($r->{'lname_th'}) && isset($r->{'position_th'})): ?>
                        <a href="<?php echo e(route('detail', Crypt::encrypt($r->id))); ?>">
                            <?php echo e($r->{'position_th'}); ?> <?php echo e($r->{'fname_th'}); ?> <?php echo e($r->{'lname_th'}); ?>

                        </a><br>
                        <?php else: ?>
                        <?php echo e($r->{'position_' . $locale}); ?> <?php echo e($r->{'fname_' . $locale}); ?> <?php echo e($r->{'lname_' . $locale}); ?><br>
                        <?php endif; ?>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </h2>
                    <?php if(collect($rg->user)->contains(fn($user) => $user->hasRole('student'))): ?>
                    <h1 class="card-text-1">Student</h1>
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

<div class="container card-4 mt-5">
    <div class="card">
        <h4 class="card-text-1">เปิดรับสมัคร</h4>
        <div class="row g-0">
            <div class="card-body">
                <?php if($projectApplications->isEmpty()): ?>
                    <p class="no-job-openings">ไม่พบข้อมูลการรับสมัคร</p>
                <?php else: ?>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ชื่อโปรเจ็ค</th>
                                <th>ตำแหน่ง</th>
                                <th>จำนวนที่รับ</th>
                                <th>เงินเดือน</th>
                                <th>สิ้นสุดวันรับสมัคร</th>
                                <th>รายละเอียด</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $projectApplications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($app->project_title); ?></td>
                                <td>ผู้ช่วย</td>
                                <td>3 คน</td>
                                <td>35,000 บาท</td>
                                <td>10/04/2025</td>
                                <td>
                                    <a href="<?php echo e(route('researchgroupdetail', ['id' => $researchGroup->id])); ?>" class="btn btn-outline-info "><?php echo e(trans('message.details')); ?></a>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/researchgroupdetail.blade.php ENDPATH**/ ?>