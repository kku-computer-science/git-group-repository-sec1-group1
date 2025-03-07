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

    th,
    td {
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

    table th:nth-child(1),
    table td:nth-child(1) {
        width: 30%;
    }

    table th:nth-child(2),
    table td:nth-child(2),
    table th:nth-child(3),
    table td:nth-child(3),
    table th:nth-child(4),
    table td:nth-child(4) {
        width: 15%;
    }

    table th:nth-child(5),
    table td:nth-child(5),
    table th:nth-child(6),
    table td:nth-child(6) {
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

                <div class="card-body">
                    <h5 class="card-title">งานวิจัยที่เกี่ยวข้อง</h5>
                    <ul>
                        <h3 class="card-text">
                            @foreach ($relatedResearch->sortByDesc('public_date') as $research)
                            <li>
                                <strong>[{{ $research->re_type }}]</strong>
                                <strong>{{ $research->re_title }}</strong><br>
                                <span style="margin-left: 20px;">
                                    @php
                                    $userNames = $research->users->map(fn($user) => $user->fname_en . ' ' . $user->lname_en)->join(', ');
                                    @endphp
                                    {{ $userNames ?: 'ไม่ระบุ' }}
                                    @if ($research->and_author == 1)
                                    <span> และคณะ</span>
                                    @endif
                                </span><br>

                                <span style="margin-left: 20px;">{{ $research->re_desc }}</span><br>
                                <span style="margin-left: 20px;">
                                    <em>{{ $research->public_date }}</em> |
                                    <a href="{{ $research->source_url }}" target="_blank">[url]</a>
                                </span>
                            </li>
                            @endforeach

                        </h3>
                        <div class="pagination">
                            {{ $relatedResearch->links() }}
                        </div>
                    </ul>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@if($projectApplications->isNotEmpty())
<div class="container card-4 mt-5">
    <div class="card">
        <h4 class="card-text-1">เปิดรับสมัคร</h4>
        <div class="row g-0">
            <div class="card-body">
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
                        @foreach($app->applications as $application)
                        <tr>
                            <td>{{ $app->project_title }}</td>
                            <td>{{ $application->role }}</td>
                            <td>{{ $application->amount }}</td>
                            <td>{{ $application->salary_range }}</td>
                            <td>{{ $application->end_date }}</td>
                            <td><a href="{{ route('applicationdetail', $application->id) }}">รายละเอียด</a></td>
                        </tr>
                        @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@else
<div class="container card-4 mt-5">
    <div class="card">
        <h4 class="card-text-1">เปิดรับสมัคร</h4>
        <div class="row g-0">
            <div class="card-body">
                <p class="no-job-openings">ไม่พบข้อมูลการรับสมัคร</p>
            </div>
        </div>
    </div>
</div>
@endif

@stop