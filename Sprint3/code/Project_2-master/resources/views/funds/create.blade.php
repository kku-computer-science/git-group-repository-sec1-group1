@extends('dashboards.users.layouts.user-dash-layout')

@section('content')
<style>
    .my-select {
        background-color: #fff;
        color: #212529;
        border: #000 0.2 solid;
        border-radius: 10px;
        padding: 4px 10px;
        width: 100%;
        font-size: 14px;
    }
</style>
<div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong><?php echo e(__('message.whoops')); ?></strong> <?php echo e(__('message.errors')); ?><br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
<<<<<<< HEAD:InitialProject/Project_2-master/storage/framework/views/be5a68f5431cf8eccdad84444058003887c20ddf.php
    <?php endif; ?>
    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><?php echo e(__('message.add_research_fund')); ?></h4>
                <p class="card-description"><?php echo e(__('message.fill_in_fund_details')); ?></p>
                <form class="forms-sample" action="<?php echo e(route('funds.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
=======
    @endif
    <!-- <a class="btn btn-primary" href="{{ route('funds.index') }}"> Back </a> -->
    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">เพิ่มทุนวิจัย</h4>
                <p class="card-description">กรอกข้อมูลรายละเอียดทุนงานวิจัย</p>
                <form class="forms-sample" action="{{ route('funds.store') }}" method="POST">
                    @csrf
>>>>>>> 3c970bd496dce06fb35ebb87c21098d1251a0559:Sprint3/code/Project_2-master/resources/views/funds/create.blade.php
                    <div class="form-group row">
                        <label for="exampleInputfund_type" class="col-sm-2 "><?php echo e(__('message.fund_type_label')); ?></label>
                        <div class="col-sm-4">
                            <select name="fund_type" class="custom-select my-select" id="fund_type" onchange='toggleDropdown(this);' required>
                                <option value="" disabled selected >---- <?php echo e(__('message.please_specify_fund_type')); ?> ----</option>
                                <option value="ทุนภายใน"><?php echo e(__('message.internal_fund')); ?></option>
                                <option value="ทุนภายนอก"><?php echo e(__('message.external_fund')); ?></option>
                            </select>
                        </div>
                    </div>
                    <div id="fund_code">
                        <div class="form-group row">
                            <label for="exampleInputfund_level" class="col-sm-2 "><?php echo e(__('message.fund_level_label')); ?></label>
                            <div class="col-sm-4">
                                <select name="fund_level" class="custom-select my-select">
                                    <option value="" disabled selected >---- <?php echo e(__('message.please_specify_fund_level')); ?> ----</option>
                                    <option value=""><?php echo e(__('message.not_specified')); ?></option>
                                    <option value="สูง"><?php echo e(__('message.high')); ?></option>
                                    <option value="กลาง"><?php echo e(__('message.medium')); ?></option>
                                    <option value="ล่าง"><?php echo e(__('message.low')); ?></option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputfund_name" class="col-sm-2 "><?php echo e(__('message.fund_name_label')); ?></label>
                        <div class="col-sm-8">
                            <input type="text" name="fund_name" class="form-control" placeholder="<?php echo e(__('message.fund_name_placeholder')); ?>">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="exampleInputsupport_resource" class="col-sm-2 "><?php echo e(__('message.support_resource_label')); ?></label>
                        <div class="col-sm-8">
                            <input type="text" name="support_resource" class="form-control" placeholder="<?php echo e(__('message.support_resource_placeholder')); ?>">
                        </div>
                    </div>
<<<<<<< HEAD:InitialProject/Project_2-master/storage/framework/views/be5a68f5431cf8eccdad84444058003887c20ddf.php
                    <button type="submit" class="btn btn-primary me-2"><?php echo e(__('message.submit')); ?></button>
                    <a class="btn btn-light" href="<?php echo e(route('funds.index')); ?>"><?php echo e(__('message.cancel')); ?></a>
=======
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <a class="btn btn-light" href="{{ route('funds.index')}}">Cancel</a>
>>>>>>> 3c970bd496dce06fb35ebb87c21098d1251a0559:Sprint3/code/Project_2-master/resources/views/funds/create.blade.php
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    const ac = document.getElementById("fund_code");

    function toggleDropdown(selObj) {
        ac.style.display = selObj.value === "ทุนภายใน" ? "block" : "none";
    }
</script>
<<<<<<< HEAD:InitialProject/Project_2-master/storage/framework/views/be5a68f5431cf8eccdad84444058003887c20ddf.php
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboards.users.layouts.user-dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/funds/create.blade.php ENDPATH**/ ?>
=======
@endsection
>>>>>>> 3c970bd496dce06fb35ebb87c21098d1251a0559:Sprint3/code/Project_2-master/resources/views/funds/create.blade.php
