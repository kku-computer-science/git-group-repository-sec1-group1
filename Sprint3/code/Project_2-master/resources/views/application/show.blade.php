@extends('dashboards.users.layouts.user-dash-layout')

@section('content')
<div class="container">
    <div class="card shadow-none border-0" style="border-radius: 10px;background-color:rgba(0, 0, 0, 0);">
        <div class="card-body p-0">
            <!-- Header with back button -->
            <div class="d-flex justify-content-between">
                <!-- Back Button - Updated to link to research group applications -->
                <a href="{{ route('application.show', $researchGroup->id) }}" class="btn btn-secondary mt-3 ct-btn">
                    <i class="fas fa-arrow-left"></i>
                </a>

                <!-- Edit and Delete Buttons -->
                <div>
                    <!-- Edit Button (Routes to Edit Page) -->
                    <a href="{{ route('application.edit', $application->id) }}" class="btn btn-warning mt-3 ct-btn me-2">
                        <i class="fas fa-edit"></i>
                    </a>

                    <!-- Delete Button -->
                    <form action="{{ route('application.destroy', $application->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger mt-3 ct-btn" onclick="return confirm('Are you sure you want to delete this application?');">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Application Title and Status -->
            <div class="mt-4 mb-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="text-primary">{{ $application->role }} Position</h3>
                    <span class="badge {{ strtotime($application->app_deadline) >= time() ? 'bg-success' : 'bg-danger' }} p-2">
                        {{ strtotime($application->app_deadline) >= time() ? 'Active' : 'Expired' }}
                    </span>
                </div>
                <p class="text-muted">Research Group: {{ $researchGroup->{'group_name_' . app()->getLocale()} }}</p>
            </div>

            <!-- Application Details -->
            <div class="app-details-container">
                <!-- Key Information Row -->
                <div class="row mb-4">
                    <div class="col-md-3 col-sm-6 mb-3 mb-md-0">
                        <div class="info-card">
                            <div class="info-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="info-content">
                                <h6>Vacancies</h6>
                                <p>{{ $application->amount }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 mb-3 mb-md-0">
                        <div class="info-card">
                            <div class="info-icon">
                                <i class="far fa-clock"></i>
                            </div>
                            <div class="info-content">
                                <h6>Deadline</h6>
                                <p>{{ \Carbon\Carbon::parse($application->app_deadline)->format('M d, Y h:i A') }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 mb-3 mb-md-0">
                        <div class="info-card">
                            <div class="info-icon">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                            <div class="info-content">
                                <h6>Salary</h6>
                                <p>
                                    @if(isset($application->salary_amount) && isset($application->salary_period))
                                        ${{ $application->salary_amount }} {{ $application->salary_period }}
                                    @else
                                        {{ $application->salary_range }}
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="info-card">
                            <div class="info-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="info-content">
                                <h6>Location</h6>
                                <p>{{ $application->work_location }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Working Time Section -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="detail-card">
                            <h5><i class="far fa-clock me-2"></i>Working Time</h5>
                            <div class="detail-content">
                                @if(isset($application->working_type) && isset($application->working_hours) && isset($application->working_period))
                                    {{ $application->working_type }}, {{ $application->working_hours }} {{ $application->working_period }}
                                @else
                                    {{ $application->working_time }}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Detailed Information -->
                <div class="row mb-4">
                    <div class="col-md-6 mb-4">
                        <div class="detail-card">
                            <h5><i class="fas fa-info-circle me-2"></i>Application Details</h5>
                            <div class="detail-content">
                                {!! nl2br(e($application->app_detail)) !!}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-4">
                        <div class="detail-card">
                            <h5><i class="fas fa-file-alt me-2"></i>Required Documents</h5>
                            <div class="detail-content">
                                {!! nl2br(e($application->required_documents)) !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6 mb-4">
                        <div class="detail-card">
                            <h5><i class="fas fa-graduation-cap me-2"></i>Required Qualifications</h5>
                            <div class="detail-content">
                                {!! nl2br(e($application->qualifications)) !!}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-4">
                        <div class="detail-card">
                            <h5><i class="fas fa-award me-2"></i>Preferred Qualifications</h5>
                            <div class="detail-content">
                                {!! nl2br(e($application->preferred_qualifications ?? 'No preferred qualifications specified.')) !!}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Timeline and Documents Row -->
                <div class="row mb-4">
                    <div class="col-md-6 mb-4">
                        <div class="detail-card">
                            <h5><i class="fas fa-calendar-alt me-2"></i>Timeline</h5>
                            <div class="timeline">
                                <div class="timeline-item">
                                    <div class="timeline-marker"></div>
                                    <div class="timeline-content">
                                        <h6>Application Deadline</h6>
                                        <p>{{ \Carbon\Carbon::parse($application->app_deadline)->format('M d, Y') }}</p>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-marker"></div>
                                    <div class="timeline-content">
                                        <h6>Expected Start</h6>
                                        <p>{{ \Carbon\Carbon::parse($application->start_date)->format('M d, Y') }}</p>
                                    </div>
                                </div>
                                @if($application->end_date)
                                <div class="timeline-item">
                                    <div class="timeline-marker"></div>
                                    <div class="timeline-content">
                                        <h6>Expected End</h6>
                                        <p>{{ \Carbon\Carbon::parse($application->end_date)->format('M d, Y') }}</p>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Application Process Section -->
                    <div class="col-md-6 mb-4">
                        <div class="detail-card">
                            <h5><i class="fas fa-tasks me-2"></i>Application Process</h5>
                            <div class="detail-content">
                                {!! nl2br(e($application->application_process)) !!}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Information (if available) -->
                @if(isset($application->contact_name) || isset($application->contact_email) || isset($application->contact_phone))
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="detail-card">
                            <h5><i class="fas fa-address-card me-2"></i>Contact Information</h5>
                            <div class="detail-content">
                                <div class="row">
                                    @if(isset($application->contact_name))
                                    <div class="col-md-4">
                                        <strong>Contact Person:</strong> {{ $application->contact_name }}
                                    </div>
                                    @endif
                                    
                                    @if(isset($application->contact_email))
                                    <div class="col-md-4">
                                        <strong>Email:</strong> {{ $application->contact_email }}
                                    </div>
                                    @endif
                                    
                                    @if(isset($application->contact_phone))
                                    <div class="col-md-4">
                                        <strong>Phone:</strong> {{ $application->contact_phone }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Custom Fields (if defined) -->
                @if(strpos($application->app_detail, 'CUSTOM_FIELDS:') !== false)
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="detail-card">
                            <h5><i class="fas fa-list-alt me-2"></i>Custom Fields</h5>
                            <div class="detail-content">
                                @php
                                    $customFieldsText = substr($application->app_detail, strpos($application->app_detail, 'CUSTOM_FIELDS:') + 14);
                                    $customFields = json_decode(trim($customFieldsText), true);
                                @endphp
                                
                                @if(is_array($customFields) && count($customFields) > 0)
                                    <div class="row">
                                    @foreach($customFields as $field)
                                        <div class="col-md-4 mb-3">
                                            <strong>{{ $field['label'] }}</strong>
                                            @if(isset($field['placeholder']) && $field['placeholder'])
                                            <p class="text-muted small">{{ $field['placeholder'] }}</p>
                                            @endif
                                        </div>
                                    @endforeach
                                    </div>
                                @else
                                    <p>No custom fields defined or invalid format.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<style>
    /* Info Cards */
    .info-card {
        background-color: #f8f9fa;
        border-radius: 10px;
        padding: 15px;
        height: 100%;
        display: flex;
        align-items: center;
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .info-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    .info-icon {
        font-size: 24px;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background-color: rgba(0, 123, 255, 0.1);
        color: #007bff;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
    }

    .info-content h6 {
        font-size: 14px;
        color: #6c757d;
        margin-bottom: 5px;
    }

    .info-content p {
        font-size: 16px;
        font-weight: 600;
        color: #343a40;
        margin-bottom: 0;
    }

    /* Detail Cards */
    .detail-card {
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        padding: 20px;
        height: 100%;
    }

    .detail-card h5 {
        color: #343a40;
        font-size: 18px;
        font-weight: 600;
        padding-bottom: 12px;
        border-bottom: 1px solid #e9ecef;
        margin-bottom: 15px;
    }

    .detail-content {
        color: #495057;
        font-size: 15px;
        line-height: 1.6;
    }

    /* Timeline */
    .timeline {
        position: relative;
        padding-left: 30px;
    }

    .timeline:before {
        content: '';
        position: absolute;
        left: 7px;
        top: 0;
        height: 100%;
        width: 2px;
        background-color: #e9ecef;
    }

    .timeline-item {
        position: relative;
        margin-bottom: 25px;
    }

    .timeline-marker {
        position: absolute;
        left: -30px;
        top: 5px;
        width: 16px;
        height: 16px;
        border-radius: 50%;
        border: 2px solid #007bff;
        background-color: white;
    }

    .timeline-content h6 {
        font-size: 16px;
        font-weight: 600;
        color: #343a40;
        margin-bottom: 5px;
    }

    .timeline-content p {
        color: #6c757d;
        margin-bottom: 0;
    }

    /* Other styles */
    .ct-btn {
        padding: 0.8rem 1rem;
        border-radius: 10px;
    }

    footer {
        display: none;
    }

    .content-wrapper {
        padding: 0rem 2.187rem 1.5rem 3.5rem;
    }

    .app-details-container {
        margin-top: 20px;
    }
</style>
@endsection