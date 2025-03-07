@extends('layouts.layout')

@section('content')
<div class="container py-5">
    <div class="card border-0 shadow-lg" style="border-radius: 15px; overflow: hidden;">
        <div class="card-header bg-primary text-white p-4">
            <h3 class="mb-0">{{ $application->role }} Application Details</h3>
        </div>
        <div class="card-body p-4">
            <!-- Project Information -->
            <div class="section mt-4 p-4 bg-light rounded-3 shadow-sm">
                <h4 class="text-primary">Project Information</h4>
                <p><strong>Project Title:</strong> {{ $application->project->project_title }}</p>
                <p><strong>Description:</strong></p>
                @php
                    $projectDetails = $application->project->project_details ?? 'No description available';
                    if (strpos($projectDetails, '•') === 0) {
                        $items = array_filter(array_map('trim', explode('•', $projectDetails)));
                        echo '<ul class="text-muted">';
                        foreach ($items as $item) {
                            if (!empty($item)) {
                                echo '<li>' . e($item) . '</li>';
                            }
                        }
                        echo '</ul>';
                    } else {
                        echo '<p class="text-muted">' . nl2br(e($projectDetails)) . '</p>';
                    }
                @endphp
                <p><strong>Contact:</strong> {{ $application->project->contact }}</p>
            </div>

            <!-- General Information -->
            <div class="section mt-4 p-4 bg-light rounded-3 shadow-sm">
                <h4 class="text-primary">General Information</h4>
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Role:</strong> {{ $application->role }}</p>
                        <p><strong>Deadline:</strong> {{ \Carbon\Carbon::parse($application->app_deadline)->format('F d, Y') }}</p>
                        <p><strong>Vacancies:</strong> {{ $application->amount }}</p>
                        <p><strong>Salary Range:</strong> {{ $application->salary_range }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Working Time:</strong> {{ $application->working_time }}</p>
                        <p><strong>Location:</strong> {{ $application->work_location }}</p>
                        <p><strong>Start Date:</strong> {{ \Carbon\Carbon::parse($application->start_date)->format('F d, Y') }}</p>
                        <p><strong>End Date:</strong> {{ $application->end_date ? \Carbon\Carbon::parse($application->end_date)->format('F d, Y') : 'N/A' }}</p>
                    </div>
                </div>
            </div>

            <!-- Qualifications -->
            <div class="section mt-4 p-4 bg-light rounded-3 shadow-sm">
                <h4 class="text-primary">Qualifications</h4>
                <p><strong>Required:</strong></p>
                @php
                    $qualifications = $application->qualifications ?: 'Not specified';
                    if (strpos($qualifications, '•') === 0) {
                        $items = array_filter(array_map('trim', explode('•', $qualifications)));
                        echo '<ul class="text-muted">';
                        foreach ($items as $item) {
                            if (!empty($item)) {
                                echo '<li>' . e($item) . '</li>';
                            }
                        }
                        echo '</ul>';
                    } else {
                        echo '<p class="text-muted">' . nl2br(e($qualifications)) . '</p>';
                    }
                @endphp
                <p><strong>Preferred:</strong></p>
                @php
                    $preferredQualifications = $application->preferred_qualifications ?: 'Not specified';
                    if (strpos($preferredQualifications, '•') === 0) {
                        $items = array_filter(array_map('trim', explode('•', $preferredQualifications)));
                        echo '<ul class="text-muted">';
                        foreach ($items as $item) {
                            if (!empty($item)) {
                                echo '<li>' . e($item) . '</li>';
                            }
                        }
                        echo '</ul>';
                    } else {
                        echo '<p class="text-muted">' . nl2br(e($preferredQualifications)) . '</p>';
                    }
                @endphp
            </div>

            <!-- Application Process -->
            <div class="section mt-4 p-4 bg-light rounded-3 shadow-sm">
                <h4 class="text-primary">Application Process</h4>
                @php
                    $applicationProcess = $application->application_process;
                    if (strpos($applicationProcess, '•') === 0) {
                        $items = array_filter(array_map('trim', explode('•', $applicationProcess)));
                        echo '<ul class="text-muted">';
                        foreach ($items as $item) {
                            if (!empty($item)) {
                                echo '<li>' . e($item) . '</li>';
                            }
                        }
                        echo '</ul>';
                    } else {
                        echo '<p class="text-muted">' . nl2br(e($applicationProcess)) . '</p>';
                    }
                @endphp
            </div>

            <!-- Required Documents -->
            <div class="section mt-4 p-4 bg-light rounded-3 shadow-sm">
                <h4 class="text-primary">Required Documents</h4>
                @php
                    $requiredDocuments = $application->required_documents;
                    if (strpos($requiredDocuments, '•') === 0) {
                        $items = array_filter(array_map('trim', explode('•', $requiredDocuments)));
                        echo '<ul class="text-muted">';
                        foreach ($items as $item) {
                            if (!empty($item)) {
                                echo '<li>' . e($item) . '</li>';
                            }
                        }
                        echo '</ul>';
                    } else {
                        echo '<p class="text-muted">' . nl2br(e($requiredDocuments)) . '</p>';
                    }
                @endphp
            </div>

            <!-- Additional Details -->
            <div class="section mt-4 p-4 bg-light rounded-3 shadow-sm">
                <h4 class="text-primary">Additional Details</h4>
                @php
                    $appDetail = $application->app_detail;
                    if (strpos($appDetail, '•') === 0) {
                        $items = array_filter(array_map('trim', explode('•', $appDetail)));
                        echo '<ul class="text-muted">';
                        foreach ($items as $item) {
                            if (!empty($item)) {
                                echo '<li>' . e($item) . '</li>';
                            }
                        }
                        echo '</ul>';
                    } else {
                        echo '<p class="text-muted">' . nl2br(e($appDetail)) . '</p>';
                    }
                @endphp
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        background: #fff;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }
    .card:hover {
        transform: translateY(-5px);
    }
    .section {
        border: 1px solid #e9ecef;
    }
    .bg-light {
        background-color: #f8f9fa !important;
    }
    h4 {
        border-bottom: 2px solid #007bff;
        padding-bottom: 8px;
        margin-bottom: 15px;
        font-weight: 600;
    }
    .text-primary {
        color: #007bff !important;
    }
    p strong {
        color: #343a40;
    }
    ul {
        padding-left: 20px;
        margin-bottom: 0;
    }
    ul li {
        margin-bottom: 5px;
    }
</style>
@endsection