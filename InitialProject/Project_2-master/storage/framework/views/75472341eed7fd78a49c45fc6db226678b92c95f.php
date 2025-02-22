<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card col-md-10" style="padding: 16px;">
        <div class="card-body">
            <h4 class="card-title">รายละเอียดกลุ่มวิจัย</h4>
            <p class="card-description">ข้อมูลรายละเอียดกลุ่มวิจัย</p>
            <div class="row mt-2">
                <p class="card-text col-sm-3"><b>ชื่อกลุ่มวิจัย (ภาษาไทย)</b></p>
                <p class="card-text col-sm-9"><?php echo e($researchGroup->group_name_th); ?></p>
            </div>
            <div class="row mt-1">
                <p class="card-text col-sm-3"><b>ชื่อกลุ่มวิจัย (English)</b></p>
                <p class="card-text col-sm-9"><?php echo e($researchGroup->group_name_en); ?></p>
            </div>
            <div class="row mt-2">
                <p class="card-text col-sm-3"><b>คำอธิบายกลุ่มวิจัย (ภาษาไทย)</b></p>
                <p class="card-text col-sm-9"><?php echo e($researchGroup->group_desc_th); ?></p>
            </div>
            <div class="row mt-2">
                <p class="card-text col-sm-3"><b>คำอธิบายกลุ่มวิจัย (English)</b></p>
                <p class="card-text col-sm-9"><?php echo e($researchGroup->group_desc_en); ?></p>
            </div>
            <div class="row mt-2">
                <p class="card-text col-sm-3"><b>รายละเอียดกลุ่มวิจัย (ภาษาไทย)</b></p>
                <p class="card-text col-sm-9"><?php echo e($researchGroup->group_detail_th); ?></p>
            </div>
            <div class="row mt-2">
                <p class="card-text col-sm-3"><b>รายละเอียดกลุ่มวิจัย (ภาษาจีน)</b></p>
                <p class="card-text col-sm-9"><?php echo e($researchGroup->group_detail_cn); ?></p>
            </div>
            <div class="row mt-2">
                <p class="card-text col-sm-3"><b>รายละเอียดกลุ่มวิจัย (English)</b></p>
                <p class="card-text col-sm-9"><?php echo e($researchGroup->group_detail_en); ?></p>
            </div>
            <div class="row mt-2">
                <p class="card-text col-sm-3"><b>รายละเอียดกลุ่มวิจัย (Ch)</b></p>
                <p class="card-text col-sm-9"><?php echo e($researchGroup->group_detail_cn); ?></p>
            </div>
            <div class="row mt-3">
                <p class="card-text col-sm-3"><b>หัวหน้ากลุ่มวิจัย</b></p>
                <p class="card-text col-sm-9">
                    <?php $__currentLoopData = $researchGroup->user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if( $user->pivot->role == 1): ?>
                    <?php echo e($user->position_th); ?><?php echo e($user->fname_th); ?> <?php echo e($user->lname_th); ?>

                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></p>
            </div>
            <div class="row mt-1">
                <p class="card-text col-sm-3"><b>สมาชิกกลุ่มวิจัย</b></p>
                <p class="card-text col-sm-9">
                    <?php $__currentLoopData = $researchGroup->user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if( $user->pivot->role == 2): ?>
                    <?php echo e($user->position_th); ?><?php echo e($user->fname_th); ?> <?php echo e($user->lname_th); ?>,
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></p>
            </div>

            <div class="form-group">
                <p class="mb-3"><b>เพิ่มงานวิจัยที่เกี่ยวข้อง</b></p>

                <div id="research-container" class="mb-3">
                    <!-- ฟอร์มจะถูกเพิ่มที่นี่ -->
                </div>

                <button type="button" id="add-btn2" class="btn btn-success btn-sm mt-2">
                    <i class="mdi mdi-plus"></i> เพิ่มงานวิจัย
                </button>
            </div>


            <a class="btn btn-primary mt-5" href="<?php echo e(route('researchGroups.index')); ?>"> Back</a>
        </div>
    </div>
    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script>
// $(document).ready(function() {

//     /* When click New customer button */
//     $('#new-customer').click(function() {
//         $('#btn-save').val("create-customer");
//         $('#customer').trigger("reset");
//         $('#customerCrudModal').html("Add New Customer EiEi");
//         $('#crud-modal').modal('show');
//     });
//     /* When click New customer button */
//     $('#new-customer2').click(function() {
//         $('#btn-save').val("create-customer");
//         $('#customer').trigger("reset");
//         $('#customerCrudModal').html("Add New Customer EiEi");
//         $('#crud-modal').modal('show');
//     });



    
// });

document.getElementById("add-btn2").addEventListener("click", function() {
    let container = document.getElementById("research-container");
    let div = document.createElement("div");
    div.classList.add("research-item", "mb-3");

    div.innerHTML = `
        <div class="card p-3 border">
            <label>ชื่อโปรเจค</label>
            <input type="text" name="re_title[]" class="form-control" required>

            <label>คำอธิบาย</label>
            <textarea name="re_desc[]" class="form-control" required></textarea>

            <label>วันที่ตีพิมพ์</label>
            <input type="date" name="public_date[]" class="form-control" required>

            <label>แหล่งที่มา</label>
            <input type="text" name="source_url[]" class="form-control">

            <label>ประเภทงานวิจัย</label>
            <input type="text" name="re_type[]" class="form-control" required>

            <button type="button" class="btn btn-danger btn-sm mt-2 remove">
                <i class="mdi mdi-minus"></i> ลบ
            </button>
        </div>
    `;

    container.appendChild(div);

    // เพิ่ม Event ให้ปุ่มลบ
    div.querySelector(".remove").addEventListener("click", function() {
        this.closest(".research-item").remove();
    });
});
</script>

<style>
/* ปรับแต่งให้กล่องฟอร์มแยกจากหัวข้อ */
#research-container {
    margin-top: 10px;
}

.research-item {
    width: 100%;
    max-width: 600px; /* กำหนดความกว้างของฟอร์ม */
}
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboards.users.layouts.user-dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/research_groups/show.blade.php ENDPATH**/ ?>