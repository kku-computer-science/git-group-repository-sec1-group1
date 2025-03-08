@extends('dashboards.users.layouts.user-dash-layout')

@section('content')
<div class="container">
    <div class="card border-0" style="border-radius: 10px;">
        <div class="card-body">
            <h3 class="text-primary mb-4">Edit {{ $application->role }} Application</h3>

            <!-- Edit Form -->
            <form action="{{ route('application.update', $application->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mt-4 p-4 border rounded bg-light position-relative">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="text-primary m-0">{{ $application->role }} Application</h4>
                        <span class="badge bg-primary">{{ $application->role }}</span>
                    </div>
                    <input type="hidden" name="role" value="{{ $application->role }}">

                    <div class="row">
                        <!-- Left Column -->
                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label class="form-label fw-bold">
                                    Application Deadline
                                    <i class="fas fa-info-circle ms-1" data-bs-toggle="tooltip" 
                                       title="Set the deadline for application submissions"></i>
                                </label>
                                <input type="date" class="form-control" name="app_deadline" 
                                       value="{{ \Carbon\Carbon::parse($application->app_deadline)->format('Y-m-d') }}" required>
                            </div>

                            <div class="form-group mb-4">
                                <label class="form-label fw-bold">
                                    Vacancies
                                    <i class="fas fa-info-circle ms-1" data-bs-toggle="tooltip" 
                                       title="Number of available positions"></i>
                                </label>
                                <input type="number" class="form-control" name="amount" 
                                       value="{{ $application->amount }}" min="1" required>
                            </div>

                            <div class="form-group mb-4">
                                <label class="form-label fw-bold">
                                    Required Qualifications
                                    <i class="fas fa-info-circle ms-1" data-bs-toggle="tooltip" 
                                       title="List the mandatory qualifications"></i>
                                </label>
                                <div class="input-group">
                                    <button type="button" class="btn btn-outline-secondary bullet-point-btn">
                                        Add Bullet Point
                                    </button>
                                </div>
                                <textarea class="form-control mt-2 txtarea" name="qualifications" rows="4" required>{{ $application->qualifications }}</textarea>
                            </div>

                            <div class="form-group mb-4">
                                <label class="form-label fw-bold">
                                    Preferred Qualifications
                                    <i class="fas fa-info-circle ms-1" data-bs-toggle="tooltip" 
                                       title="List the desired but not mandatory qualifications"></i>
                                </label>
                                <div class="input-group">
                                    <button type="button" class="btn btn-outline-secondary bullet-point-btn">
                                        Add Bullet Point
                                    </button>
                                </div>
                                <textarea class="form-control mt-2 txtarea" name="preferred_qualifications" rows="4">{{ $application->preferred_qualifications }}</textarea>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label class="form-label fw-bold">
                                    Required Documents
                                    <i class="fas fa-info-circle ms-1" data-bs-toggle="tooltip" 
                                       title="List all documents needed for application"></i>
                                </label>
                                <div class="input-group">
                                    <button type="button" class="btn btn-outline-secondary bullet-point-btn">
                                        Add Bullet Point
                                    </button>
                                </div>
                                <textarea class="form-control mt-2 txtarea" name="required_documents" rows="4" required>{{ $application->required_documents }}</textarea>
                            </div>

                            <div class="form-group mb-4">
                                <label class="form-label fw-bold">Salary Range</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="text" class="form-control" name="salary_range" 
                                           value="{{ $application->salary_range }}" required>
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label class="form-label fw-bold">Working Time</label>
                                <input type="text" class="form-control" name="working_time" 
                                       value="{{ $application->working_time }}" required>
                            </div>

                            <div class="form-group mb-4">
                                <label class="form-label fw-bold">Working Location</label>
                                <input type="text" class="form-control" name="work_location" 
                                       value="{{ $application->work_location }}" required>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-4">
                                        <label class="form-label fw-bold">Start Date</label>
                                        <input type="date" class="form-control" name="start_date" 
                                               value="{{ \Carbon\Carbon::parse($application->start_date)->format('Y-m-d') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-4">
                                        <label class="form-label fw-bold">End Date</label>
                                        <input type="date" class="form-control" name="end_date" 
                                               value="{{ $application->end_date ? \Carbon\Carbon::parse($application->end_date)->format('Y-m-d') : '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Full Width Fields -->
                        <div class="col-12">
                            <div class="form-group mb-4">
                                <label class="form-label fw-bold">
                                    Application Process
                                    <i class="fas fa-info-circle ms-1" data-bs-toggle="tooltip" 
                                       title="Describe the steps in the application process"></i>
                                </label>
                                <div class="input-group">
                                    <button type="button" class="btn btn-outline-secondary bullet-point-btn">
                                        Add Bullet Point
                                    </button>
                                </div>
                                <textarea class="form-control mt-2 txtarea" name="application_process" rows="4" required>{{ $application->application_process }}</textarea>
                            </div>

                            <div class="form-group mb-4">
                                <label class="form-label fw-bold">Additional Details</label>
                                <textarea class="form-control txtarea" name="app_detail" rows="4" required>{{ $application->app_detail }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Buttons -->
                <div class="d-flex justify-content-between mt-4 mb-4">
                    <a href="{{ route('application.show', $application->id) }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .ct-btn-outline {
        color: #007bff;
        border-color: #007bff;
        outline: none !important;
        box-shadow: none !important;
    }

    .ct-btn-outline:hover,
    .ct-btn-outline:active {
        background-color: #007bff !important;
        color: white !important;
    }

    .ct-check:checked+label {
        background-color: #007bff !important;
        color: white !important;
        border-color: #007bff !important;
    }

    .form-control {
        height: 5vh;
        padding: 0.5rem;
        font-size: 1rem;
    }

    .form-control.txtarea {
        height: fit-content;
        padding-bottom: 0;
    }

    .bullet-point-btn {
        font-size: 0.8rem;
        padding: 0.25rem 0.5rem;
        color: #007bff;
        border-color: #007bff;
    }

    .bullet-point-btn:hover {
        background-color: #007bff;
        color: white;
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Initialize tooltips
        const tooltips = document.querySelectorAll('[data-bs-toggle="tooltip"]');
        tooltips.forEach(tooltip => {
            new bootstrap.Tooltip(tooltip);
        });

        // Initialize bullet point functionality
        document.querySelectorAll('.bullet-point-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const textarea = this.closest('.form-group').querySelector('textarea');
                const cursorPos = textarea.selectionStart;
                const textBefore = textarea.value.substring(0, cursorPos);
                const textAfter = textarea.value.substring(cursorPos);
                textarea.value = textBefore + "\n• " + textAfter;
                textarea.focus();
                textarea.selectionStart = cursorPos + 3;
                textarea.selectionEnd = cursorPos + 3;
            });
        });
    });
</script>
@endsection