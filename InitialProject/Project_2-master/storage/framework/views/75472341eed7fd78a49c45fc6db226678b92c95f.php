<?php $__env->startSection('content'); ?>
<div class="container">
<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <?php endif; ?>
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
            
            <!-- หน้าเพิ่มงานวิจัยที่เกี่ยวข้อง -->
            <form action="<?php echo e(route('relatedResearch.store', ['id' => $researchGroup->id])); ?>" method="POST" onsubmit="return validateForm()">
                <?php echo csrf_field(); ?>
                <?php if(Auth::user()->can('update',$researchGroup)): ?>
                <div class="form-group row">
                    <p class="col-sm-3 pt-4"><b>เพิ่มงานวิจัยที่เกี่ยวข้อง</b></p>
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label><b>ชื่องานวิจัย</b></label>
                            <input name="re_title" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label><b>คำอธิบาย</b></label>
                            <textarea name="re_desc" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label><b>วันที่ตีพิมพ์</b></label>
                            <input type="date" name="public_date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label><b>URL</b></label>
                            <input type="text" name="source_url" class="form-control">
                        </div>
                        <div class="form-group ">
                            <label for="exampleInputpaper_type" class="col-sm-3 col-form-label"><b>ประเภทของเอกสาร</b></label>
                            <div class="col-sm-9">
                                <select class="custom-select my-select"  name="re_type">
                                    <option value="Journal">Journal</option>
                                    <option value="Conference Proceeding">Conference Proceeding</option>
                                    <option value="Book Series">Book Series</option>
                                    <option value="Book">Book</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                        <p class="col-sm-3 pt-4"><b>สมาชิกกลุ่มวิจัย</b></p>
                            <div class="col-sm-10">
                                <table class="table" id="dynamicAddRemove">
                                    <thead>
                                        <tr>
                                            <th>ชื่อสมาชิก</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="userTableBody">
                                        <tr>
                                        <td>
                                        <select class="form-control user-select" name="user_ids[]" multiple="multiple">
                                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($user->id); ?>"><?php echo e($user->fname_th); ?> <?php echo e($user->lname_th); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        </td>
                                        </tr>
                                    </tbody>
                                </table>

                                
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" name="and_author" value="1">
                                        และคณะ
                                    </label>
                                </div>
                               
                            </div>
                        </div>
                    
                        <div class="form-group">
                            <input type="hidden" name="re_group_id" value="<?php echo e($researchGroup->id); ?>">
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">บันทึก</button>
                    </div>
                </div>
                <?php endif; ?>
            </form>
            
           <!-- แสดงผลงานวิจัยที่เกี่ยวข้อง -->
            <div class="form-group row">
                <p class="col-sm-3 pt-4"><b>งานวิจัยที่เกี่ยวข้อง</b></p>
                <div class="col-sm-8">
                    <ul style="list-style: none; padding: 0;">
                        <?php $__currentLoopData = $relatedResearch->sortByDesc('public_date'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $research): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #ddd; padding: 10px 0;">
                            <div>
                                [<strong><?php echo e($research->re_type); ?></strong>]
                                <strong><?php echo e($research->re_title); ?></strong><br>
                                <span style="margin-left: 20px;">
                                    <?php
                                        $userNames = $research->users->map(fn($user) => $user->fname_en . ' ' . $user->lname_en)->join(', ');
                                    ?>
                                    <?php echo e($userNames ?: 'ไม่ระบุ'); ?>

                                    <?php if($research->and_author == 1): ?>
                                        <span> และคณะ</span>
                                    <?php endif; ?>
                                </span><br>
                                <span style="margin-left: 20px;"><?php echo e($research->re_desc); ?></span><br>
                                <span style="margin-left: 20px;">
                                    <?php echo e($research->public_date); ?> | 
                                    <a href="<?php echo e($research->source_url); ?>" target="_blank">[url]</a>
                                </span>
                            </div>
                            <?php if(Auth::user()->can('update',$researchGroup)): ?>
                            <!-- ปุ่มลบ -->
                            <form action="<?php echo e(route('relatedResearch.destroy', ['id' => $researchGroup->id, 'relatedResearchId' => $research->id])); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger btn-sm">ลบ</button>
                            </form>
                            <?php endif; ?>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>




            <a class="btn btn-primary mt-5" href="<?php echo e(route('researchGroups.index')); ?>"> Back</a>
        </div>
    </div>

    <style>
.select2-container--default .select2-selection--multiple {
    border: 1px solid #ced4da;
    border-radius: 4px;
    padding: 5px;
}
    </style>
    
<?php $__env->stopSection(); ?>




<?php $__env->startSection('javascript'); ?>
<script>
$(document).ready(function() {

    /* When click New customer button */
    $('#new-customer').click(function() {
        $('#btn-save').val("create-customer");
        $('#customer').trigger("reset");
        $('#customerCrudModal').html("Add New Customer EiEi");
        $('#crud-modal').modal('show');
    });
    /* When click New customer button */
    $('#new-customer2').click(function() {
        $('#btn-save').val("create-customer");
        $('#customer').trigger("reset");
        $('#customerCrudModal').html("Add New Customer EiEi");
        $('#crud-modal').modal('show');
    });
});


document.addEventListener("DOMContentLoaded", function () {
    let addButton = document.getElementById("add-btn2");
    let userTableBody = document.getElementById("userTableBody");

    // ฟังก์ชันตรวจสอบค่าที่ซ้ำกัน
    function checkDuplicateSelections() {
        let selects = userTableBody.querySelectorAll('select[name="user_ids[]"]');
        let selectedValues = new Set();

        selects.forEach(select => {
            Array.from(select.selectedOptions).forEach(option => {
                if (selectedValues.has(option.value)) {
                    alert("ไม่สามารถเลือกสมาชิกซ้ำกันได้");
                    option.selected = false; // ยกเลิกการเลือก
                } else {
                    selectedValues.add(option.value);
                }
            });
        });
    }

    // เพิ่ม Event Listener ให้กับ select ทุกตัว
    function addSelectChangeListener(select) {
        select.addEventListener("change", function () {
            checkDuplicateSelections();
        });
    }

    // เพิ่มแถวใหม่
    addButton.addEventListener("click", function () {
        let newRow = document.createElement("tr");
        newRow.innerHTML = `
            <td>
                <select class="form-control user-select" name="user_ids[]" multiple="multiple">
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($user->id); ?>"><?php echo e($user->fname_th); ?> <?php echo e($user->lname_th); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </td>
            <td>
                <button type="button" class="btn btn-danger remove-btn">ลบ</button>
            </td>
        `;

        userTableBody.appendChild(newRow);

        // เรียกใช้ Select2 สำหรับ select ใหม่
        $(newRow.querySelector('.user-select')).select2({
            placeholder: "เลือกสมาชิก",
            allowClear: true
        });

        // เพิ่ม Event Listener ให้กับ select ใหม่
        let newSelect = newRow.querySelector('select[name="user_ids[]"]');
        addSelectChangeListener(newSelect);

        // เพิ่ม Event ให้ปุ่มลบ
        newRow.querySelector(".remove-btn").addEventListener("click", function () {
            userTableBody.removeChild(newRow);
            checkDuplicateSelections(); // ตรวจสอบค่าที่ซ้ำกันอีกครั้งหลังจากลบแถว
        });
    });

    // เพิ่ม Event Listener ให้กับ select ที่มีอยู่แล้ว
    let existingSelects = userTableBody.querySelectorAll('select[name="user_ids[]"]');
    existingSelects.forEach(select => {
        $(select).select2({
            placeholder: "เลือกสมาชิก",
            allowClear: true
        });
        addSelectChangeListener(select);
    });
});

$(document).ready(function() {
        $('.user-select').select2({
            placeholder: "เลือกผู้ใช้",
            // allowClear: true
        });
    });


</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboards.users.layouts.user-dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/research_groups/show.blade.php ENDPATH**/ ?>