@extends('layouts.layout')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
    :root {
        --primary: #6366f1;
        --primary-light: #eef2ff;
        --text-dark: #0f172a;
        --text-medium: #475569;
        --text-light: #94a3b8;
        --bg-white: #ffffff;
        --bg-light: #f8fafc;
        --success: #22c55e;
        --success-light: #f0fdf4;
        --warning: #eab308;
        --warning-light: #fefce8;
        --danger: #ef4444;
        --danger-light: #fef2f2;
        --border: #e2e8f0;
        --shadow: rgba(0, 0, 0, 0.05);
        --radius: 12px;
    }
    
    body {
        font-family: 'Plus Jakarta Sans', sans-serif;
        background-color: #f1f5f9;
        color: var(--text-dark);
        line-height: 1.6;
    }
    
    .container {
        max-width: 960px;
        margin: 0 auto;
        padding: 32px 16px;
    }
    
    /* Cards */
    .card {
        background: var(--bg-white);
        border-radius: var(--radius);
        box-shadow: 0 4px 6px var(--shadow);
        margin-bottom: 24px;
        border: 1px solid var(--border);
        overflow: hidden;
    }
    
    .card-header {
        padding: 24px 32px;
        border-bottom: 1px solid var(--border);
    }
    
    .card-header.primary {
        background: var(--primary);
        color: white;
        border-bottom: none;
    }
    
    .card-body {
        padding: 32px;
    }
    
    /* Typography */
    h1, h2, h3, h4, h5 {
        font-weight: 600;
        line-height: 1.3;
    }
    
    h1 {
        font-size: 1.75rem;
        margin-bottom: 16px;
    }
    
    h2 {
        font-size: 1.5rem;
        margin-bottom: 16px;
        color: var(--primary);
    }
    
    h3 {
        font-size: 1.25rem;
        margin-bottom: 16px;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    h3 i {
        color: var(--primary);
    }
    
    h4 {
        font-size: 1.1rem;
        margin-bottom: 12px;
        margin-top: 20px;
    }
    
    p {
        margin-bottom: 16px;
        color: var(--text-medium);
    }
    
    /* Meta Information */
    .meta {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        margin-top: 20px;
    }
    
    .meta-item {
        display: flex;
        align-items: center;
        gap: 8px;
        color: white;
        opacity: 0.9;
        font-size: 0.95rem;
    }
    
    /* Grid and Layout */
    .grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 24px;
    }
    
    .divider {
        height: 1px;
        background: var(--border);
        margin: 24px 0;
    }
    
    /* Job Status */
    .timeline {
        margin-top: 20px;
    }
    
    /* Badges */
    .badge {
        display: inline-flex;
        align-items: center;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        margin-top: 8px;
    }
    
    .badge-success {
        background: var(--success-light);
        color: var(--success);
    }
    
    .badge-warning {
        background: var(--warning-light);
        color: var(--warning);
    }
    
    .badge-danger {
        background: var(--danger-light);
        color: var(--danger);
    }
    
    .badge-primary {
        background: var(--primary-light);
        color: var(--primary);
    }
    
    /* Info Item */
    .info-item {
        margin-bottom: 16px;
    }
    
    .info-label {
        font-weight: 600;
        font-size: 0.875rem;
        color: var(--text-dark);
        margin-bottom: 4px;
    }
    
    .info-value {
        color: var(--text-medium);
    }
    
    /* List Styling */
    .list {
        list-style: none;
        padding-left: 0;
        margin: 16px 0;
    }
    
    .list li {
        padding-left: 24px;
        position: relative;
        margin-bottom: 12px;
        color: var(--text-medium);
    }
    
    .list li:before {
        content: "";
        position: absolute;
        left: 8px;
        top: 10px;
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: var(--primary);
    }
    
    /* Custom Fields */
    .custom-fields {
        margin-top: 24px;
        border-top: 1px dashed var(--border);
        padding-top: 24px;
    }
    
    .custom-field {
        background: var(--bg-light);
        padding: 16px;
        border-radius: 8px;
        border: 1px solid var(--border);
    }
    
    .custom-field-label {
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: var(--text-light);
        margin-bottom: 4px;
        font-weight: 600;
    }
    
    .custom-field-value {
        color: var(--text-medium);
    }
    
    /* Buttons */
    .button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        background: var(--primary);
        color: white;
        font-weight: 600;
        padding: 10px 24px;
        border-radius: 8px;
        border: none;
        cursor: pointer;
        text-decoration: none;
        transition: all 0.2s ease;
    }
    
    .button:hover {
        opacity: 0.9;
        transform: translateY(-1px);
    }
    
    .buttons {
        display: flex;
        justify-content: center;
        margin-top: 32px;
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .card-body {
            padding: 24px;
        }
        
        .grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="container">
    <!-- Job Header Card -->
    <div class="card">
        <div class="card-header" style="background-color:rgb(86, 92, 255);">
            <h1>{{ $application->role }}</h1>
            
            <div class="meta">
                <div class="meta-item">
                    <i class="fas fa-map-marker-alt"></i>
                    {{ $application->work_location }}
                </div>
                
                <div class="meta-item">
                    <i class="fas fa-calendar-alt"></i>
                    Apply by {{ \Carbon\Carbon::parse($application->app_deadline)->format('M d, Y') }}
                </div>
                
                @if(isset($application->salary_amount) && isset($application->salary_period))
                <div class="meta-item">
                    <i class="fas fa-money-bill-wave"></i>
                    ${{ $application->salary_amount }} {{ $application->salary_period }}
                </div>
                @elseif(isset($application->salary_range_old))
                <div class="meta-item">
                    <i class="fas fa-money-bill-wave"></i>
                    {{ $application->salary_range_old }}
                </div>
                @endif
                
                <div class="meta-item">
                    <i class="fas fa-users"></i>
                    {{ $application->amount }} position(s)
                </div>
            </div>
        </div>
        
        <div class="card-body">
            <div class="grid">
                <div class="info-item">
                    <div class="info-label">Status</div>
                    <div class="info-value">
                        @php
                            $deadline = \Carbon\Carbon::parse($application->app_deadline);
                            $daysLeft = $deadline->diffInDays(now());
                            $isPast = $deadline->isPast();
                        @endphp
                        
                        @if($isPast)
                            <span class="badge badge-danger">Closed</span>
                        @elseif($daysLeft <= 7)
                            <span class="badge badge-warning">{{ $daysLeft }} days left</span>
                        @else
                            <span class="badge badge-success">Open ({{ $daysLeft }} days left)</span>
                        @endif
                    </div>
                </div>
                
                <div class="info-item">
                    <div class="info-label">Employment Type</div>
                    <div class="info-value">
                        {{ $application->end_date ? 'Contract' : 'Permanent' }}
                        @if($application->end_date)
                            <span class="badge badge-primary">
                                {{ \Carbon\Carbon::parse($application->start_date)->format('M Y') }} - 
                                {{ \Carbon\Carbon::parse($application->end_date)->format('M Y') }}
                            </span>
                        @endif
                    </div>
                </div>
                
                <div class="info-item">
                    <div class="info-label">Start Date</div>
                    <div class="info-value">{{ \Carbon\Carbon::parse($application->start_date)->format('F d, Y') }}</div>
                </div>
                
                @if($application->contact_name || $application->contact_email || $application->contact_phone)
                <div class="info-item">
                    <div class="info-label">Contact</div>
                    <div class="info-value">
                        @if($application->contact_name)
                            <div><i class="fas fa-user fa-sm text-primary mr-1"></i> {{ $application->contact_name }}</div>
                        @endif
                        @if($application->contact_email)
                            <div><i class="fas fa-envelope fa-sm text-primary mr-1"></i> {{ $application->contact_email }}</div>
                        @endif
                        @if($application->contact_phone)
                            <div><i class="fas fa-phone fa-sm text-primary mr-1"></i> {{ $application->contact_phone }}</div>
                        @endif
                    </div>
                </div>
                @endif
            </div>
            
            <!-- Custom Fields -->
            @if(isset($applicationCustomFields) && $applicationCustomFields->count() > 0)
            <div class="custom-fields">
                <div class="grid">
                    @foreach($applicationCustomFields as $field)
                        <div class="custom-field">
                            <div class="custom-field-label">{{ $field->field_label }}</div>
                            <div class="custom-field-value">
                                @if(isset($customFieldValues[$field->id]))
                                    @if($field->field_type == 'checkbox')
                                        {{ $customFieldValues[$field->id] ? 'Yes' : 'No' }}
                                    @elseif($field->field_type == 'file')
                                        <a href="{{ asset('storage/'.$customFieldValues[$field->id]) }}" target="_blank" class="badge badge-primary">
                                            <i class="fas fa-file-download"></i> View File
                                        </a>
                                    @else
                                        {{ $customFieldValues[$field->id] }}
                                    @endif
                                @else
                                    <span class="text-gray-400">Not specified</span>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
    
    <!-- Job Description -->
    <div class="card">
        <div class="card-body">
            <h3><i class="fas fa-clipboard-list"></i> Job Description</h3>
            <div>
                @php
                    $appDetail = $application->app_detail;
                    if (strpos($appDetail, '•') === 0) {
                        $items = array_filter(array_map('trim', explode('•', $appDetail)));
                        echo '<ul class="list">';
                        foreach ($items as $item) {
                            if (!empty($item)) {
                                echo '<li>' . e($item) . '</li>';
                            }
                        }
                        echo '</ul>';
                    } else {
                        echo '<p>' . nl2br(e($appDetail)) . '</p>';
                    }
                @endphp
            </div>
        </div>
    </div>
    
    <!-- Qualifications -->
    <div class="card">
        <div class="card-body">
            <h3><i class="fas fa-user-graduate"></i> Qualifications</h3>
            
            <h4>Required</h4>
            @php
                $qualifications = $application->qualifications ?: 'Not specified';
                if (strpos($qualifications, '•') === 0) {
                    $items = array_filter(array_map('trim', explode('•', $qualifications)));
                    echo '<ul class="list">';
                    foreach ($items as $item) {
                        if (!empty($item)) {
                            echo '<li>' . e($item) . '</li>';
                        }
                    }
                    echo '</ul>';
                } else {
                    echo '<p>' . nl2br(e($qualifications)) . '</p>';
                }
            @endphp
            
            @if($application->preferred_qualifications)
            <h4>Preferred</h4>
            @php
                $preferredQualifications = $application->preferred_qualifications;
                if (strpos($preferredQualifications, '•') === 0) {
                    $items = array_filter(array_map('trim', explode('•', $preferredQualifications)));
                    echo '<ul class="list">';
                    foreach ($items as $item) {
                        if (!empty($item)) {
                            echo '<li>' . e($item) . '</li>';
                        }
                    }
                    echo '</ul>';
                } else {
                    echo '<p>' . nl2br(e($preferredQualifications)) . '</p>';
                }
            @endphp
            @endif
        </div>
    </div>
    
    <!-- Application Process -->
    <div class="card">
        <div class="card-body">
            <h3><i class="fas fa-file-alt"></i> Application Process</h3>
            
            <h4>How to Apply</h4>
            @php
                $applicationProcess = $application->application_process;
                if (strpos($applicationProcess, '•') === 0) {
                    $items = array_filter(array_map('trim', explode('•', $applicationProcess)));
                    echo '<ul class="list">';
                    foreach ($items as $item) {
                        if (!empty($item)) {
                            echo '<li>' . e($item) . '</li>';
                        }
                    }
                    echo '</ul>';
                } else {
                    echo '<p>' . nl2br(e($applicationProcess)) . '</p>';
                }
            @endphp
            
            <h4>Required Documents</h4>
            @php
                $requiredDocuments = $application->required_documents;
                if (strpos($requiredDocuments, '•') === 0) {
                    $items = array_filter(array_map('trim', explode('•', $requiredDocuments)));
                    echo '<ul class="list">';
                    foreach ($items as $item) {
                        if (!empty($item)) {
                            echo '<li>' . e($item) . '</li>';
                        }
                    }
                    echo '</ul>';
                } else {
                    echo '<p>' . nl2br(e($requiredDocuments)) . '</p>';
                }
            @endphp
            

        </div>
    </div>
</div>
@endsection