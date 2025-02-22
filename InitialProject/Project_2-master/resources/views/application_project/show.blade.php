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
    <p class="text-muted text-center alert alert-warning">No applications yet.</p>
    @else
    <div class="row">
        @foreach($project->applications as $application)
        <div class="col-md-6">
            <div class="card shadow-sm border-0 mb-3" style="border-radius: 10px;">
                <div class="card-body">
                    <h5 class="card-title text-dark">Role: {{ $application->role }}</h5>
                    <p><strong>Amount:</strong> ${{ $application->amount }}</p>
                    <p><strong>Details:</strong> {{ $application->app_detail }}</p>
                    <p><strong>Conditions:</strong> {{ $application->app_condition }}</p>
                    <p><strong>Deadline:</strong> {{ $application->app_deadline }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif






</div>




<style>
    .modal-content {
        width: 40vw;
        border-radius: 20px;

    }

    .alert {
        font-size: 1rem;
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