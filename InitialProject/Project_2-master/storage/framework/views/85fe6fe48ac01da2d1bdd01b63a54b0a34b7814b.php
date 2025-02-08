
<style>
    .name {

        font-size: 20px;

    }
</style>
<?php $__env->startSection('content'); ?>
<div class="container card-4 mt-5">
    <div class="card">
        <?php $__currentLoopData = $resgd; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="row g-0">
            <div class="col-md-4">
                <div class="card-body">
                    <img src="<?php echo e(asset('img/'.$rg->group_image)); ?>" alt="...">
                    <h1 class="card-text-1"> Laboratory Supervisor </h1>
                    <h2 class="card-text-2">
                        <?php $__currentLoopData = $rg->user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($r->hasRole('teacher')): ?>
                        <?php if(app()->getLocale() == 'en' and $r->academic_ranks_en == 'Lecturer' and $r->doctoral_degree == 'Ph.D.'): ?>
                             <?php echo e($r->{'fname_'.app()->getLocale()}); ?> <?php echo e($r->{'lname_'.app()->getLocale()}); ?>, Ph.D.
                            <br>
                            <?php elseif(app()->getLocale() == 'en' and $r->academic_ranks_en == 'Lecturer'): ?>
                            <?php echo e($r->{'fname_'.app()->getLocale()}); ?> <?php echo e($r->{'lname_'.app()->getLocale()}); ?>

                            <br>
                            <?php elseif(app()->getLocale() == 'en' and $r->doctoral_degree == 'Ph.D.'): ?>
                            <?php echo e(str_replace('Dr.', ' ', $r->{'position_'.app()->getLocale()})); ?> <?php echo e($r->{'fname_'.app()->getLocale()}); ?> <?php echo e($r->{'lname_'.app()->getLocale()}); ?>, Ph.D.
                            <br>
                            <?php else: ?>                            
                            <?php echo e($r->{'position_'.app()->getLocale()}); ?> <?php echo e($r->{'fname_'.app()->getLocale()}); ?> <?php echo e($r->{'lname_'.app()->getLocale()}); ?>

                            <br>
                            <?php endif; ?>
                        
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </h2>
                    <h1 class="card-text-1"> Student </h1>
                    <h2 class="card-text-2">
                        <?php $__currentLoopData = $rg->user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($user->hasRole('student')): ?>
                        <?php echo e($user->{'position_'.app()->getLocale()}); ?> <?php echo e($user->{'fname_'.app()->getLocale()}); ?> <?php echo e($user->{'lname_'.app()->getLocale()}); ?>

                        <br>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </h2>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"> <?php echo e($rg->{'group_name_'.app()->getLocale()}); ?></>
                    </h5>
                    <h3 class="card-text"><?php echo e($rg->{'group_detail_'.app()->getLocale()}); ?>

                    </h3>
                </div>
                
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <!-- <div id="loadMore">
                <a href="#"> Load More </a>
            </div> -->
        </div>

    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script>
    $(document).ready(function() {
        $(".moreBox").slice(0, 1).show();
        if ($(".blogBox:hidden").length != 0) {
            $("#loadMore").show();
        }
        $("#loadMore").on('click', function(e) {
            e.preventDefault();
            $(".moreBox:hidden").slice(0, 1).slideDown();
            if ($(".moreBox:hidden").length == 0) {
                $("#loadMore").fadeOut('slow');
            }
        });
    });
</script>

<?php $__env->stopSection(); ?>
<!-- <div class="card-body-research">
                    <p>Research</p>
                    <table class="table">
                        <?php $__currentLoopData = $rg->user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                        <thead>
                            <tr>
                                <th><b class="name"><?php echo e($user->{'position_'.app()->getLocale()}); ?> <?php echo e($user->{'fname_'.app()->getLocale()}); ?> <?php echo e($user->{'lname_'.app()->getLocale()}); ?></b></th>
                            </tr>
                            <?php $__currentLoopData = $user->paper->sortByDesc('paper_yearpub'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="hidden">
                                <th>
                                    <b><math><?php echo html_entity_decode(preg_replace('<inf>', 'sub', $p->paper_name)); ?></math></b> (
                                    <link><?php $__currentLoopData = $p->teacher; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($teacher->fname_en); ?> <?php echo e($teacher->lname_en); ?>,
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__currentLoopData = $p->author; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($author->author_fname); ?> <?php echo e($author->author_lname); ?><?php if(!$loop->last): ?>,<?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></link>), <?php echo e($p->paper_sourcetitle); ?>, <?php echo e($p->paper_volume); ?>,
                                    <?php echo e($p->paper_yearpub); ?>.
                                    <a href="<?php echo e($p->paper_url); ?> " target="_blank">[url]</a> <a href="https://doi.org/<?php echo e($p->paper_doi); ?>" target="_blank">[doi]</a>
                                </th>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </thead>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                </div> -->
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/researchgroupdetail.blade.php ENDPATH**/ ?>