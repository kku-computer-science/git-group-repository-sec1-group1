@extends('dashboards.users.layouts.user-dash-layout')

@section('content')
<div class="container">
   <div class="card shadow-lg border-0" style="border-radius: 10px;">
      <div class="card-body">
         <h3 class="text-primary">Create Application for {{ $project->project_title }}</h3>

         <!-- Multi-Select Positions -->
         <div class="mb-3">
            <label for="positionSelect" class="form-label">Select Positions to Open</label>
            <select class="form-select" id="positionSelect" multiple>
               <option value="Research Assistant">Research Assistant</option>
               <option value="PhD">Ph.D.</option>
               <option value="Postdoc">Postdoc</option>
            </select>
         </div>

         <!-- Unified Form to Submit All Applications at Once -->
         <form action="{{ route('application.store', $project->id) }}" method="POST">
            @csrf
            <div id="formsContainer"></div>

            <button type="submit" class="btn btn-primary mt-3">Submit All Applications</button>
            <a href="{{ route('application_project.show', $project->id) }}" class="btn btn-secondary mt-3">Cancel</a>
         </form>
      </div>
   </div>
</div>

<script>
   document.addEventListener("DOMContentLoaded", function () {
      const positionSelect = document.getElementById("positionSelect");
      const formsContainer = document.getElementById("formsContainer");

      positionSelect.addEventListener("change", function () {
         formsContainer.innerHTML = ""; // Clear previous forms

         // Get selected options
         const selectedPositions = Array.from(positionSelect.selectedOptions).map(option => option.value);

         selectedPositions.forEach(position => {
            formsContainer.innerHTML += generateForm(position);
         });
      });

      function generateForm(position) {
         return `
            <div class="mt-4 p-3 border rounded bg-light">
               <h5 class="text-dark">${position} Application</h5>
               <input type="hidden" name="role[]" value="${position}">

               <div class="mb-3">
                  <label class="form-label">Application Deadline</label>
                  <input type="datetime-local" class="form-control" name="app_deadline[]" required>
               </div>

               <div class="mb-3">
                  <label class="form-label">Amount</label>
                  <input type="number" class="form-control" name="amount[]" required>
               </div>

               <div class="mb-3">
                  <label class="form-label">Application Details</label>
                  <textarea class="form-control" name="app_detail[]" rows="3" required></textarea>
               </div>

               <div class="mb-3">
                  <label class="form-label">Application Condition</label>
                  <input type="text" class="form-control" name="app_condition[]" required>
               </div>
            </div>
         `;
      }
   });
</script>
@endsection