@extends('layouts.layout')

<style>
    .recruitment-container {
        max-width: 900px;
        margin: 0 auto;
        padding: 20px;
        font-family: 'Prompt', sans-serif;
    }

    .page-title {
        color: #3c4858;
        text-align: center;
        margin-bottom: 30px;
        font-size: 28px;
        font-weight: 600;
        position: relative;
        padding-bottom: 15px;
    }

    .page-title:after {
        content: '';
        position: absolute;
        width: 100px;
        height: 3px;
        background: #007bff;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
    }

    .project-card {
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        margin-bottom: 30px;
        padding: 25px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-left: 5px solid #007bff;
    }

    .project-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }

    .project-title {
        font-size: 24px;
        color: #333;
        margin-bottom: 15px;
        font-weight: 600;
    }

    .project-contact {
        background: #f8f9fa;
        padding: 12px 15px;
        border-radius: 8px;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
    }

    .project-contact i {
        margin-right: 10px;
        color: #007bff;
    }

    .position-card {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.08);
        margin-bottom: 20px;
        padding: 20px;
        border-top: 3px solid #28a745;
    }

    .position-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
        padding-bottom: 15px;
        border-bottom: 1px solid #eee;
    }

    .position-role {
        font-size: 20px;
        font-weight: 600;
        color: #343a40;
    }

    .position-amount {
        background: #28a745;
        color: white;
        padding: 5px 15px;
        border-radius: 20px;
        font-size: 14px;
        font-weight: 500;
    }

    .position-section {
        margin-bottom: 15px;
    }

    .section-title {
        font-weight: 600;
        color: #495057;
        margin-bottom: 8px;
        font-size: 16px;
    }

    .section-content {
        color: #6c757d;
        line-height: 1.6;
    }

    .deadline {
        background: #fff3cd;
        color: #856404;
        padding: 12px 15px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        font-weight: 500;
        margin-top: 20px;
    }

    .deadline i {
        margin-right: 10px;
    }
</style>

@section('content')
<div class="recruitment-container">
    <h2 class="page-title">ข้อมูลการรับสมัคร</h2>
    
    @if($applicationDetail)
        <div class="project-card">
            <h3 class="project-title">{{ $applicationDetail->project_title }}</h3>
            
            <div class="project-contact">
                <i class="fas fa-envelope"></i>
                <span>ช่องทางการสมัคร: {{ $applicationDetail->contact }}</span>
            </div>

            <div class="position-card">
                <div class="position-header">
                    <div class="position-role">{{ $applicationDetail->applicationDetail->role }}</div>
                    <div class="position-amount">รับ {{ $applicationDetail->applicationDetail->amount }} ตำแหน่ง</div>
                </div>

                <div class="position-section">
                    <div class="section-title">รายละเอียด:</div>
                    <div class="section-content">{{ $applicationDetail->applicationDetail->app_detail }}</div>
                </div>

                <div class="position-section">
                    <div class="section-title">เงื่อนไขการสมัคร:</div>
                    <div class="section-content">{{ $applicationDetail->applicationDetail->app_condition }}</div>
                </div>

                <div class="deadline">
                    <i class="far fa-calendar-alt"></i>
                    <span>เปิดรับสมัครถึง: {{$applicationDetail->applicationDetail->end_date }}</span>
                </div>
            </div>
        </div>
    @else
        <p>ไม่พบข้อมูลการสมัคร</p>
    @endif
</div>

<!-- เพิ่ม Font Awesome สำหรับไอคอน -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

<!-- เพิ่ม Font Prompt (ฟอนต์ไทย) จาก Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;600&display=swap" rel="stylesheet">
@endsection