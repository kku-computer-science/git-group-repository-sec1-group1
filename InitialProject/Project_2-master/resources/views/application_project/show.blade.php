@extends('dashboards.users.layouts.user-dash-layout')

@section('content')
<div class="container">
    <div class="card shadow-none border-0" style="border-radius: 10px;background-color:rgba(0, 0, 0, 0);">
        <div class="card-body p-0">

            <div class="d-flex justify-content-between">
                <!-- Back Button -->
                <a href="{{ route('application_project.index', $project->re_group_id) }}" class="btn btn-secondary mt-3 ct-btn">
                    <i class="fas fa-arrow-left"></i>
                </a>

                <div class=""> <!-- Edit Button (Opens Modal) -->
                    <button type="button" class="btn btn-warning mt-3 ct-btn" data-bs-toggle="modal" data-bs-target="#editProjectModal">
                        <i class="fas fa-edit"></i>
                    </button>

                    <!-- Delete Button -->
                    <form action="{{ route('application_project.destroy', $project->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger mt-3 ct-btn" onclick="return confirm('Are you sure you want to delete this project?');">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </div>
            </div>






            <h3 class="text-primary mt-4">{{ $project->project_title }}</h3>
            <p class="text-muted">{{ $project->project_details }}</p>
            <p><strong>Contact:</strong> {{ $project->contact }}</p>
            <p class="card-text mt-2">
                <strong>Status:</strong>
                @if($project->applications->isNotEmpty())
                @if($project->applications->max('app_deadline') >= now())
                Open
                @else
                Closed
                @endif
                @else
                No Applications Yet
                @endif
            </p>

            <p class="card-text mb-4"><strong>Open for application:</strong>
                @if($project->applications->isNotEmpty())
                {{ $project->applications->pluck('role')->join(', ') }}
                @else
                Not specified
                @endif
            </p>


        </div>
    </div>

    <!-- Edit Project Modal -->
    <div class="modal fade m-0" id="editProjectModal" tabindex="-1" aria-labelledby="editProjectModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProjectModalLabel">Edit Project</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('application_project.update', $project->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="project_title" class="form-label">Project Title</label>
                            <input type="text" class="form-control" id="project_title" name="project_title" value="{{ $project->project_title }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="project_details" class="form-label">Project Details</label>
                            <textarea class="form-control" id="project_details" name="project_details" rows="5" required>{{ $project->project_details }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="contact" class="form-label">Contact</label>
                            <textarea type="text" class="form-control" id="contact" name="contact" rows="5" required>{{ $project->contact }}</textarea>
                        </div>

                        <!-- <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status">
                                <option value="Open" {{ $project->status == 'Open' ? 'selected' : '' }}>Open</option>
                                <option value="Closed" {{ $project->status == 'Closed' ? 'selected' : '' }}>Closed</option>
                            </select>
                        </div> -->

                        <!-- <div class="mb-3">
                            <label for="roles" class="form-label">Open for Application</label>
                            <input type="text" class="form-control" id="roles" name="roles" value="{{ $project->roles }}">
                        </div> -->

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <hr>


    <!-- Applications List -->
    <div class="d-flex justify-content-between align-items-center mt-4 mb-4">
        <h3 class="mb-0">Applications</h3>
        <a href="{{ route('application.create', $project->id) }}" class="btn btn-success ct-btn">
            Create Application
        </a>
    </div>



    @if($project->applications->isEmpty())
    <div class="alert alert-warning text-center p-4" role="alert">
        <i class="fas fa-info-circle me-2"></i> No applications have been created yet. 
    </div>
@else
    <div class="row application-grid">
        @foreach($project->applications as $application)
            <div class="col-md-6 mb-4">
                <div class="application-card">
                    <div class="application-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="role-title mb-0">{{ $application->role }}</h5>
                            <span class="status-badge {{ strtotime($application->app_deadline) >= time() ? 'active' : 'expired' }}">
                                {{ strtotime($application->app_deadline) >= time() ? 'Active' : 'Expired' }}
                            </span>
                        </div>
                        <div class="deadline-info">
                            <i class="far fa-clock me-1"></i>
                            <span>Deadline: {{ \Carbon\Carbon::parse($application->app_deadline)->format('M d, Y h:i A') }}</span>
                        </div>
                    </div>
                    
                    <div class="application-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="info-group">
                                    <label><i class="fas fa-users me-2"></i>Vacancies</label>
                                    <p class="mb-0">{{ $application->amount }}</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="info-group">
                                    <label><i class="fas fa-map-marker-alt me-2"></i>Location</label>
                                    <p class="mb-0">{{ $application->work_location ?? 'Not specified' }}</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="info-group mt-3">
                            <label><i class="fas fa-info-circle me-2"></i>Description</label>
                            <p class="app-detail">{{ Str::limit($application->app_detail, 100) }}</p>
                        </div>
                        
                        <div class="info-group">
                            <label><i class="fas fa-list-ul me-2"></i>Conditions</label>
                            <p class="app-condition">{{ Str::limit($application->qualifications, 100) }}</p>
                        </div>
                    </div>
                    
                    <div class="application-footer">
                        <div class="row">

                            <div class="col-12">
                                <a href="{{ route('application.show' ,$application->id) }}" class="btn btn-primary btn-sm w-100">
                                    <i class="fas fa-eye me-1"></i> View Details
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @endif






</div>




<style>
    .application-grid {
        margin-top: 20px;
    }

    .application-card {
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.08);
        border: none;
        transition: transform 0.2s, box-shadow 0.2s;
        background: white;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .application-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 20px rgba(0, 123, 255, 0.15);
    }

    .application-header {
        background: linear-gradient(to right, #f8f9fa, #f1f3f5);
        padding: 16px 20px;
        border-bottom: 1px solid #eaeaea;
    }

    .role-title {
        color: #2c3e50;
        font-weight: 600;
        font-size: 1.2rem;
    }

    .deadline-info {
        color: #6c757d;
        font-size: 0.85rem;
        margin-top: 5px;
    }

    .status-badge {
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
    }

    .status-badge.active {
        background-color: rgba(25, 135, 84, 0.1);
        color: #198754;
    }

    .status-badge.expired {
        background-color: rgba(220, 53, 69, 0.1);
        color: #dc3545;
    }

    .application-body {
        padding: 20px;
        flex-grow: 1;
    }

    .info-group {
        margin-bottom: 12px;
    }

    .info-group label {
        font-size: 0.85rem;
        font-weight: 600;
        color: #6c757d;
        margin-bottom: 4px;
        display: block;
    }

    .info-group p {
        color: #343a40;
        line-height: 1.4;
    }

    .app-detail,
    .app-condition {
        font-size: 0.9rem;
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
    }

    .application-footer {
        padding: 16px 20px;
        background-color: #f8f9fa;
        border-top: 1px solid #eaeaea;
    }

    .application-footer .btn {
        border-radius: 6px;
        padding: 8px 0;
        font-size: 0.85rem;
        font-weight: 500;
    }

    .btn-outline-primary {
        color: #007bff;
        border-color: #007bff;
    }

    .btn-outline-primary:hover {
        background-color: #007bff;
        color: white;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .alert {
        border-radius: 12px;
        font-size: 1rem;
    }

    .modal-content {
        width: 40vw;
        border-radius: 20px;

    }



    .modal .modal-dialog {
        margin-top: 1rem;
    }



    .modal .modal-dialog .modal-content .modal-body {
        padding: 0.5rem 1.5rem;
    }



    .modal-header {
        height: 8vh;
    }

    .modal-title {
        font-size: 1.5rem;
    }

    .form-control {
        height: 5vh;
        padding: 0.5rem;
        font-size: 1rem;
    }

    #project_details {
        height: 15vh;
    }

    #contact {
        height: 10vh;
    }

    footer {
        display: none;
    }

    .ct-btn {
        padding: 0.8rem 1rem;
        border-radius: 10px;
    }

    .content-wrapper {
        padding: 0rem 2.187rem 1.5rem 3.5rem;
    }

    /* .more-detail-btn{
         background-color: #007bff;
         color: white;
         padding: 5px 10px;
         border-radius: 5px;
         text-decoration: none;
         
         } */
</style>

@endsection