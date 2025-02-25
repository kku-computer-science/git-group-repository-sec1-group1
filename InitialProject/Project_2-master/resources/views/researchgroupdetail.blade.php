@extends('layouts.layout')

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
    table th:nth-child(4), table td:nth-child(4) {
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

@section('content')
<div class="container card-4 mt-5">
    <div class="card">
        @foreach ($resgd as $rg)
        <div class="row g-0 shadow-sm">
            <div class="col-md-4">
                <div class="card-body">
                    <img src="{{ asset('img/'.$rg->group_image) }}" alt="..." class="img-fluid">
                    <h1 class="card-text-1">{{ trans('message.Lab_supervisor') }}</h1>
                    <h2 class="card-text-2">
                        @foreach ($rg->user as $r)
                        @if($r->hasRole('teacher'))
                        @php
                        $locale = app()->getLocale();
                        $locale = in_array($locale, ['en', 'th', 'zh']) ? $locale : 'en'; // Set 'en' as default if not found
                        @endphp
                        @if($locale == 'en' && $r->academic_ranks_en == 'Lecturer' && $r->doctoral_degree == 'Ph.D.')
                        <a href="{{ route('detail', Crypt::encrypt($r->id)) }}">
                            {{ $r->{'fname_' . $locale} }} {{ $r->{'lname_' . $locale} }}, Ph.D.
                        </a><br>
                        @elseif($locale == 'en' && $r->academic_ranks_en == 'Lecturer')
                        <a href="{{ route('detail', Crypt::encrypt($r->id)) }}">
                            {{ $r->{'fname_' . $locale} }} {{ $r->{'lname_' . $locale} }}
                        </a><br>
                        @elseif($locale == 'en' && $r->doctoral_degree == 'Ph.D.')
                        <a href="{{ route('detail', Crypt::encrypt($r->id)) }}">
                            {{ str_replace('Dr.', ' ', $r->{'position_' . $locale}) }} {{ $r->{'fname_' . $locale} }} {{ $r->{'lname_' . $locale} }}, Ph.D.
                        </a><br>
                        @elseif($locale == 'th' && isset($r->{'fname_th'}) && isset($r->{'lname_th'}))
                        <a href="{{ route('detail', Crypt::encrypt($r->id)) }}">
                            {{ $r->{'fname_th'} }} {{ $r->{'lname_th'} }}
                        </a><br>
                        @elseif($locale == 'th' && isset($r->{'fname_th'}) && isset($r->{'lname_th'}) && isset($r->{'position_th'}))
                        <a href="{{ route('detail', Crypt::encrypt($r->id)) }}">
                            {{ $r->{'position_th'} }} {{ $r->{'fname_th'} }} {{ $r->{'lname_th'} }}
                        </a><br>
                        @else
                        {{ $r->{'position_' . $locale} }} {{ $r->{'fname_' . $locale} }} {{ $r->{'lname_' . $locale} }}<br>
                        @endif
                        @endif
                        @endforeach
                    </h2>
                    @if(collect($rg->user)->contains(fn($user) => $user->hasRole('student')))
                    <h1 class="card-text-1">Student</h1>
                    <h2 class="card-text-2">
                        @foreach ($rg->user as $user)
                        @if($user->hasRole('student'))
                        @php
                        $locale = app()->getLocale();
                        $locale = in_array($locale, ['en', 'th', 'zh']) ? $locale : 'en'; // Set 'en' as default if not found
                        @endphp
                        {{ $user->{'position_' . $locale} }} {{ $user->{'fname_' . $locale} }} {{ $user->{'lname_' . $locale} }}
                        <br>
                        @endif
                        @endforeach
                    </h2>
                    @endif
                </div>
            </div>

            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">
                        @php
                        $locale = app()->getLocale();
                        $locale = in_array($locale, ['en', 'th', 'zh']) ? $locale : 'en'; // Set 'en' as default if not found
                        @endphp
                        {{ $rg->{'group_name_' . $locale} }}
                    </h5>
                    <h3 class="card-text">
                        {{ Str::limit($rg->{'group_desc_' . $locale}, 350) }}
                    </h3>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@foreach ($projectApplications as $app)
<div class="container card-4 mt-5">
    <div class="card">
        <h4 class="card-text-1">เปิดรับสมัคร</h4>
        <div class="row g-0">
            <div class="card-body">
                @if($projectApplications->isEmpty())
                    <p class="no-job-openings">ไม่พบข้อมูลการรับสมัคร</p>
                @else
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
                            @foreach ($projectApplications as $app)
                            <tr>
                                <td>{{ $app->project_title }}</td>
                                <td>{{ $app->applicationDetail->role}}</td>
                                <td>{{ $app->applicationDetail->amount}}</td>
                                <td>{{ $app->applicationDetail->salary_range}}</td>
                                <td>{{ $app->applicationDetail->end_date}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
</div>
@endforeach
@stop
