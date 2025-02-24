@extends('layouts.layout')

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

@section('content')

<br><br>
<h3 style="margin-left: 300px;">ข้อมูลการรับสมัคร</h3><br>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Application</title>
</head>
<body>
    @foreach($proj_app as $app2)
    <div style="border: 1px solid black; margin-bottom: 10px; padding: 10px;">
        <dl>
            <!--
            <dt><strong>ID:</strong></dt>
            <dd>{{ $app2->id }}</dd>
            -->
            <dt><strong>ชื่อโปรเจค:</strong></dt>
            <dd>{{ $app2->project_title }}</dd>

            <dt><strong>ช่องทางการสมัคร:</strong></dt>
            <dd>{{ $app2->contact }}</dd>

            <!--
            <dt><strong>Re Group ID:</strong></dt>
            <dd>{{ $app2->re_group_id }}</dd>
            -->
        </dl>
    </div>
    @endforeach
</body>
</html>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Details</title>
</head>
<body>
    @foreach($app_detail as $app)
    <div style="border: 1px solid black; margin-bottom: 10px; padding: 10px;">
        <dl>
            <!--
            <dt><strong>ID:</strong></dt>
            <dd>{{ $app->id }}</dd>
            -->

            <dt><strong>ตำแหน่ง:</strong></dt>
            <dd>{{ $app->role }}</dd>

            <dt><strong>จำนวน:</strong></dt>
            <dd>{{ $app->amount }}</dd>



            <dt><strong>รายละเอียด:</strong></dt>
            <dd>{{ $app->app_detail }}</dd>

            <dt><strong>เงื่อนไขการสมัคร:</strong></dt>
            <dd>{{ $app->app_condition }}</dd>


            <dt><strong>เปิดรับสมัครถึง:</strong></dt>
            <dd>{{ $app->app_deadline }}</dd>


            <!--
            <dt><strong>Project Application ID:</strong></dt>
            <dd>{{ $app->project_app_id }}</dd>
            -->

        </dl>
    </div>
    @endforeach
</body>
</html>





@endsection