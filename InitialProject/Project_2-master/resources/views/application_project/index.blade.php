@extends('dashboards.users.layouts.user-dash-layout')
@section('content')
<div class="container">
   <div class="row mb-4">
      <div class="col-md-8">
         <h2 style="margin-bottom: 20px;"><strong>Projects</strong></h2>
         <h4>Group: {{ $researchGroup->group_name_en }}</h4>
      </div>
      <div class="col-md-4 text-end">
         <button type="button" class="create-project-btn" data-bs-toggle="modal" data-bs-target="#createProjectModal">
            <i class="fas fa-plus m-1"></i> Create Project
         </button>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="createProjectModal" tabindex="-1" aria-labelledby="createProjectModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="createProjectModalLabel">Create Project for Application</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  <form action="{{ route('application_project.store', $researchGroup->id) }}" method="POST">
                     @csrf
                     <div class="mb-3">
                        <label for="projectName" class="form-label">Project Name</label>
                        <input type="text" class="form-control" id="projectName" name="project_title" required>
                     </div>

                     <div class="mb-3">
                        <label for="projectDescription" class="form-label">Project Description</label>
                        <textarea class="form-control" id="projectDescription" name="project_details" rows="5" required></textarea>
                     </div>

                     <div class="mb-3">
                        <label for="projectContact" class="form-label">Application Contact</label>
                        <textarea type="text" class="form-control" id="projectContact" name="contact" rows="3" required></textarea>
                     </div>


                     <input type="hidden" name="re_group_id" value="{{ $researchGroup->id }}">
                     <button type="submit" style="background-color: #007bff; border-radius:20px; color:white;" class="btn">Create</button>

               </div>

               </form>
            </div>
         </div>
      </div>
   </div>
</div>

<div class="row">
   @if($projects->isEmpty())
   <div class="col-md-12 text-center">
      <p class="alert alert-warning">No projects available at the moment.</p>
   </div>
   @else
   @foreach($projects as $project)
   <div class="col-md-6 mb-4">
      <a href="{{ route('application_project.show', $project->id) }}" class="text-decoration-none text-dark">
         <div class="card shadow-sm border-0" style="border-radius: 10px; cursor: pointer;" data-bs-toggle="tooltip" data-bs-placement="top" title="Click to view more details">
            <div class="card hover-zoom" style="border-radius: 10px;">
               <div class="card-body">
                  <h5 class="card-title text-primary" style="font-size:1.2rem;">{{ $project->project_title }}</h5>
                  <p class="card-text text-muted" style="font-size:1rem;">{{ Str::limit($project->project_details, 200) }}</p>
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

                  <p class="card-text"><strong>Open for application:</strong>
                     @if($project->applications->isNotEmpty())
                     {{ $project->applications->pluck('role')->join(', ') }}
                     @else
                     Not specified
                     @endif
                  </p>

               </div>
            </div>
         </div>
      </a>
   </div>
   @endforeach
   @endif
</div>


<style>
   .hover-zoom {
      transition: transform 0.3s;
   }

   .hover-zoom:hover {
      transform: scale(1.02);
   }

   .create-project-btn {
      border-radius: 30px;
      padding: 10px 20px;
      background-color: #007bff;
      color: white;
      border: none;

   }

   .create-project-btn:hover {
      background-color: rgb(46, 147, 255);
      color: white;

   }

   .alert {
      font-size: 1rem;
      margin: 0 1rem;

   }

   .modal-content {
      width: 40vw;
      border-radius: 20px;
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

   #projectDescription {
      height: 15vh;
   }

   #projectContact {
      height: 10vh;
   }

   footer {
      display: none;
   }


   /* .more-detail-btn{
         background-color: #007bff;
         color: white;
         padding: 5px 10px;
         border-radius: 5px;
         text-decoration: none;
         
         } */
</style>

</div>
@endsection