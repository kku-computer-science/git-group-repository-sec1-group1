@extends('dashboards.users.layouts.user-dash-layout')
<!-- <link  rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"> -->
@section('content')
<style>
    .my-select {
        background-color: #fff;
        color: #212529;
        border: #000 0.2 solid;
        border-radius: 5px;
        padding: 4px 10px;
        width: 100%;
        font-size: 14px;
    }
</style>
<div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>{{ __('message.whoops') }}</strong> {{ __('message.problem_input') }}<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card" style="padding: 16px;">
            <div class="card-body">
                <h4 class="card-title">{{ __('message.add_research_project') }}</h4>
                <p class="card-description">{{ __('message.fill_research_details') }}</p>
                <form action="{{ route('researchProjects.store') }}" method="POST">
                    @csrf
                    <div class="form-group row mt-5">
                        <label class="col-sm-2 ">{{ __('message.project_name') }}</label>
                        <div class="col-sm-8">
                            <input type="text" name="project_name" class="form-control" placeholder="{{ __('message.project_name') }}" value="{{ old('project_name') }}">
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                        <label class="col-sm-2 ">{{ __('message.start_date') }}</label>
                        <div class="col-sm-4">
                            <input type="date" name="project_start" class="form-control" value="{{ old('project_start') }}">
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                        <label class="col-sm-2 ">{{ __('message.end_date') }}</label>
                        <div class="col-sm-4">
                            <input type="date" name="project_end" class="form-control" value="{{ old('project_end') }}">
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                        <label class="col-sm-2 ">{{ __('message.select_fund') }}</label>
                        <div class="col-sm-4">
                            <select class="custom-select my-select" name="fund">
                                <option value='' disabled selected>{{ __('message.select_fund') }}</option>
                                @foreach($funds as $fund)
                                    <option value="{{ $fund->id }}">{{ $fund->fund_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 ">{{ __('message.project_year') }}</label>
                        <div class="col-sm-4">
                            <input type="number" name="project_year" class="form-control" placeholder="{{ __('message.project_year') }}">
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                        <label class="col-sm-2 ">{{ __('message.budget') }}</label>
                        <div class="col-sm-4">
                            <input type="number" name="budget" class="form-control" placeholder="{{ __('message.budget_unit') }}" value="{{ old('budget') }}">
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                        <label class="col-sm-2 ">{{ __('message.responsible_department') }}</label>
                        <div class="col-sm-9">
                            <select class="custom-select my-select" name="responsible_department">
                                <option value='' disabled selected>{{ __('message.select_department') }}</option>
                                @foreach($deps as $dep)
                                    <option value="{{ $dep->department_name_th }}">{{ $dep->department_name_th }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                        <label class="col-sm-2 ">{{ __('message.project_details') }}</label>
                        <div class="col-sm-9">
                            <textarea name="note" class="form-control" style="height:150px" placeholder="{{ __('message.project_details') }}">{{ old('note') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                        <label class="col-sm-2 ">{{ __('message.status') }}</label>
                        <div class="col-sm-3">
                            <select class="custom-select my-select" name="status">
                                <option value="" disabled selected>{{ __('message.select_status') }}</option>
                                <option value="1">{{ __('message.status_pending') }}</option>
                                <option value="2">{{ __('message.status_in_progress') }}</option>
                                <option value="3">{{ __('message.status_closed') }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="pt-4">
                        <button type="submit" class="btn btn-primary me-2">{{ __('message.submit') }}</button>
                        <a class="btn btn-light" href="{{ route('researchProjects.index')}}">{{ __('message.cancel') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

    @section('javascript')
    <script>
        $(document).ready(function() {
            $("#selUser0").select2()
            $("#head0").select2()
            //$("#fund").select2()
            //$("#dep").select2()
            var i = 0;

            $("#add-btn2").click(function() {

                ++i;
                $("#dynamicAddRemove").append('<tr><td><select id="selUser' + i +
                    '" name="moreFields[' + i +
                    '][userid]"  style="width: 200px;"><option value="">Select User</option>@foreach($users as $user)<option value="{{ $user->id }}">{{ $user->fname_th }} {{ $user->lname_th }}</option>@endforeach</select></td><td><button type="button" class="btn btn-danger btn-sm remove-tr"><i class="mdi mdi-minus"></i></button></td></tr>'
                );
                $("#selUser" + i).select2()
            });
            $(document).on('click', '.remove-tr', function() {
                $(this).parents('tr').remove();
            });

        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            var postURL = "<?php echo url('addmore'); ?>";
            var i = 0;


            $('#add').click(function() {
                i++;
                $('#dynamic_field').append('<tr id="row' + i +
                    '" class="dynamic-added"><td><p>ตำแหน่งหรือคำนำหน้า :</p><input type="text" name="title_name[]" placeholder="ตำแหน่งหรือคำนำหน้า" style="width: 200px;" class="form-control name_list" /><br><p>ชื่อ :</p><input type="text" name="fname[]" placeholder="ชื่อ" style="width: 300px;" class="form-control name_list" /><br><p>นามสกุล :</p><input type="text" name="lname[]" placeholder="นามสกุล" style="width: 300px;" class="form-control name_list" /></td><td><button type="button" name="remove" id="' +
                    i + '" class="btn btn-danger btn-sm btn_remove"><i class="mdi mdi-minus"></i></button></td></tr>');
            });


            $(document).on('click', '.btn_remove', function() {
                var button_id = $(this).attr("id");
                $('#row' + button_id + '').remove();
            });


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $('#submit').click(function() {
                $.ajax({
                    url: postURL,
                    method: "POST",
                    data: $('#add_name').serialize(),
                    type: 'json',
                    success: function(data) {
                        if (data.error) {
                            printErrorMsg(data.error);
                        } else {
                            i = 1;
                            $('.dynamic-added').remove();
                            $('#add_name')[0].reset();
                            $(".print-success-msg").find("ul").html('');
                            $(".print-success-msg").css('display', 'block');
                            $(".print-error-msg").css('display', 'none');
                            $(".print-success-msg").find("ul").append(
                                '<li>Record Inserted Successfully.</li>');
                        }
                    }
                });
            });


            function printErrorMsg(msg) {
                $(".print-error-msg").find("ul").html('');
                $(".print-error-msg").css('display', 'block');
                $(".print-success-msg").css('display', 'none');
                $.each(msg, function(key, value) {
                    $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
                });
            }
        });
    </script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#addMore2').on('click', function() {
                var data = $("#tb tr:eq(1)").clone(true).appendTo("#tb");
                data.find("input").val('');
            });
            $(document).on('click', '.remove', function() {
                var trIndex = $(this).closest("tr").index();
                if (trIndex > 1) {
                    $(this).closest("tr").remove();
                } else {
                    alert("Sorry!! Can't remove first row!");
                }
            });
        });
    </script>
    @stop