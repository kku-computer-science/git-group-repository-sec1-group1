@extends('layouts.layout')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<style>
    .name {
        font-size: 20px;
    }

    /* Modern Job Section Styling */
    .card {
        transition: all 0.25s ease;
        border-radius: 16px !important;
        overflow: hidden;
        border: none;
        background: #FFFFFF;
    }


    /* Modern Job Card Header */
    .job-card-header {
        background: #f9fafb;
        color: #111827;
        padding: 20px 24px;
        border-bottom: none;
        display: flex;
        align-items: center;
    }

    .job-card-header h4 {
        margin-bottom: 0;
        font-size: 1.25rem;
        font-weight: 600;
        letter-spacing: -0.025em;
    }

    .job-card-header i {
        background: #3b82f6;
        color: white;
        padding: 12px;
        border-radius: 12px;
        margin-right: 16px;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
    }

    /* Modern Table Styling */
    .table {
        margin-bottom: 0;
    }

    .table th,
    .table td {
        vertical-align: middle;
        padding: 16px;
        border: none;
    }

    .table thead th {
        color: rgb(91, 91, 91);
        font-weight: 500;
        font-size: 0.85rem;
        letter-spacing: 0.025em;
        text-transform: uppercase;
        margin: 0;
        padding: 0.7rem;
        /* padding: 0 !important; */
        background: #ffffff;
        border-bottom: 1px solid #f3f4f6;
    }

    .table tbody tr {
        border-bottom: 1px solid #f3f4f6;
        transition: background-color 0.15s ease-in-out;
    }

    .table tbody tr:hover {
        background-color: #f9fafb;
    }

    .table tbody tr:last-child {
        border-bottom: none;
    }

    /* Modern Position Icon */
    .position-icon {
        transition: all 0.2s ease;
        width: 48px !important;
        height: 48px !important;
        background-color: #eff6ff !important;
        color: #3b82f6;
        border-radius: 12px !important;
    }

    tr:hover .position-icon {
        background-color: #3b82f6 !important;
        color: white !important;
        transform: scale(1.05);
    }

    /* Modern Job Title */
    .job-title {

        font-size: 1.1rem;
        color: #111827;
        margin-bottom: 4px;
        letter-spacing: -0.025em;
    }

    .job-group {
        color: #6b7280;
        font-size: 0.875rem;
    }

    /* Modern Button */
    .btn-job-details {
        background-color: #3b82f6;
        color: white;
        border: none;
        padding: 8px 16px;
        border-radius: 8px;
        /* font-weight: 500; */
        font-size: 1rem;
        transition: all 0.2s ease;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        text-decoration: none;
    }

    .btn-job-details:hover {
        background-color: #2563eb;
        transform: translateY(-2px);
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        color: white;
        text-decoration: none;
    }

    .btn-job-details i {
        margin-right: 6px;
    }

    /* Modern Badges */
    .badge-custom {
        padding: 6px 10px;
        /* font-weight: 500; */
        font-size: 1rem;
        border-radius: 6px;
        display: inline-block;
    }

    .badge-amount {
        background-color: #eff6ff;
        color: #1d4ed8;
    }

    .badge-deadline {
        /* margin-top: 0.5rem; */
        font-size: 0.9rem;
        padding: 5px 5px;
        border-radius: 6px;
        /* font-weight: 500; */
    }

    .badge-deadline.closed {
        background-color: #fef2f2;
        color: #dc2626;
    }

    .badge-deadline.urgent {
        background-color: #fff7ed;
        color: #ea580c;
    }

    .badge-deadline.open {
        background-color: #ecfdf5;
        color: #10b981;
    }

    /* Modern Text Styling */
    .deadline-date {
        /* font-weight: 500; */
        font-size: 1rem;
        color: #111827;
        margin-bottom: 0.5rem
    }

    .salary-amount {
        /* font-weight: 600; */
        color: #111827;
        font-size: 1rem;
        letter-spacing: -0.025em;
    }

    .salary-period {
        font-size: 0.9rem;
        color: #6b7280;
    }

    .location-icon {
        color: #ef4444;
        margin-right: 5px;
    }

    .location-text {
        color: #4b5563;
        /* font-weight: 500; */
        font-size: 1rem;
    }

    /* Modern Empty State */
    .empty-jobs-container {
        padding: 60px 20px;
    }

    .empty-jobs-icon {
        font-size: 2.5rem;
        color: #9ca3af;
        background: #f9fafb;
        width: 100px;
        height: 100px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 16px;
        margin: 0 auto 24px;
        transition: all 0.3s ease;
    }

    .empty-jobs-container:hover .empty-jobs-icon {
        background: #eff6ff;
        color: #3b82f6;
        transform: scale(1.05);
    }

    .empty-jobs-title {
        font-size: 1.25rem;
        font-weight: 600;
        color: #111827;
        letter-spacing: -0.025em;
        margin-bottom: 12px;
    }

    .empty-jobs-message {
        font-size: 0.95rem;
        color: #6b7280;
        max-width: 500px;
        margin: 0 auto;
    }

    /* Responsive adjustments */
    @media (max-width: 992px) {
        .table {
            display: block;
            overflow-x: auto;
        }

        .job-details-col {
            text-align: left !important;
        }
    }

    @media (max-width: 768px) {
        .position-icon {
            width: 40px !important;
            height: 40px !important;
        }

        .job-title {
            font-size: 0.95rem;
        }

        .table th,
        .table td {
            padding: 12px;
        }
    }

    @media (max-width: 576px) {
        .job-card-header h4 {
            font-size: 1.1rem;
        }

        .empty-jobs-title {
            font-size: 1.2rem;
        }
    }

    /* Other existing styles */
    .card-text-2 {
        font-size: 16px;
    }

    .no-job-openings {
        display: none;
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
                    <h5 class="card-text-1" style="font-size: 1.1rem;">Members</h5>
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
                    <h5 class="card-title" style="font-size: larger;">
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
                    <h5 class="card-title">Releted Research</h5>
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

<!-- Ultra Modern Job Openings Section -->
@if(isset($applications) && $applications->isNotEmpty())
<div class="container card-4 mt-5 mb-5">
    <div class="card shadow-sm overflow-hidden">
        <div class="card-header job-card-header">
            <h4>Job Openings</h4>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>Position</th>
                            <th class="text-center">Vacancies</th>
                            <th class="text-center">Salary</th>
                            <th class="text-center">Application Deadline</th>
                            <th class="text-center">Work Location</th>
                            <th class="text-center job-details-col">Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($applications as $application)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="position-icon d-flex align-items-center justify-content-center">
                                        <i class="fas fa-user-tie"></i>
                                    </div>
                                    <div class="ms-3">
                                        <div class="job-title">{{ $application->role }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">
                                <span class="badge-custom badge-amount">{{ $application->amount }} positions</span>
                            </td>
                            <td class="text-center">
                                @if(isset($application->salary_amount) && isset($application->salary_period))
                                <div class="salary-amount">${{ $application->salary_amount }}</div>
                                <div class="salary-period">{{ $application->salary_period }}</div>
                                @elseif(isset($application->salary_range_old))
                                <div class="salary-amount">{{ $application->salary_range_old }}</div>
                                @else
                                <div class="salary-period">Not specified</div>
                                @endif
                            </td>
                            <td class="text-center">
                                @php
                                $deadline = \Carbon\Carbon::parse($application->app_deadline);
                                $daysLeft = $deadline->diffInDays(now()) + 1;
                                $isPast = $deadline->isPast();
                                @endphp

                                <div class="deadline-date">
                                    {{ $deadline->format('d M Y') }}
                                </div>

                                @if($isPast)
                                <span class="badge-deadline closed">Closed</span>
                                @elseif($daysLeft <= 7)
                                    <span class="badge-deadline urgent">{{ $daysLeft }} days left</span>
                                    @else
                                    <span class="badge-deadline open">{{ $daysLeft }} days left</span>
                                    @endif
                            </td>
                            <td class="text-center">
                                <div class="location-wrapper">
                                    <i class="fas fa-map-marker-alt location-icon"></i>
                                    <span class="location-text">{{ $application->work_location ?? 'Not specified' }}</span>
                                </div>
                            </td>
                            <td class="text-center job-details-col">
                                <a href="{{ route('applicationdetail', $application->id) }}" class="btn-job-details">
                                    <i class="fas fa-info-circle"></i> View Details
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@else
<div class="container card-4 mt-5 mb-5">
    <div class="card shadow-sm overflow-hidden">
        <div class="card-header job-card-header">
            <h4>Job Openings</h4>
        </div>
        <div class="card-body empty-jobs-container">
            <div class="text-center">
                <div class="empty-jobs-icon">
                    <i class="fas fa-clipboard-list"></i>
                </div>
                <h5 class="empty-jobs-title">No Job Openings Available</h5>
                <p class="empty-jobs-message">We currently don't have any open positions. Please check back later for new opportunities.</p>
            </div>
        </div>
    </div>
</div>
@endif

@stop