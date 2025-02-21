@extends('dashboards.users.layouts.user-dash-layout')
@section('content')
<div class="container">
   <div class="row mb-4">
      <div class="col-md-8">
          <h2>Projects</h2>
         <h4>Group: {{ $researchGroup->group_name_en }}</h4>
      </div>
      <div class="col-md-4 text-end">
         <a style="border-radius: 30px;" href="{{ route('application_project.create', $researchGroup->id) }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Create Project
         </a>
      </div>
   </div>

   <div class="row">
      <div class="col-md-6 mb-4" data-bs-toggle="tooltip" data-bs-placement="top" title="Click to view more details">
         <div class="card hover-zoom" style="border-radius: 10px;">
         <div class="card-body">
            <h5 class="card-title" style="color:#007bff;font-size:1.2rem">AI & Machine Learning Innovations</h5>
            <p class="card-text" style="font-size:1rem">This research group focuses on exploring cutting-edge artificial intelligence models and deep learning algorithms to solve real-world challenges. </p>
            <p class="card-text" style="font-size:1rem; margin-top:1rem;"><strong>Status:</strong> Open</p>
            <p class="card-text" style="font-size:1rem;"><strong>Open for application:</strong> Researcher, Developer</p>
            <!-- <a href=""  class="more-detail-btn">More details</a> -->
         </div>
         </div>
      </div>
      <div class="col-md-6 mb-4" data-bs-toggle="tooltip" data-bs-placement="top" title="Click to view more details">
         <div class="card hover-zoom" style="border-radius: 10px;">
         <div class="card-body">
            <h5 class="card-title" style="color:#007bff;font-size:1.2rem">AI & Machine Learning Innovations</h5>
            <p class="card-text" style="font-size:1rem">This research group focuses on exploring cutting-edge artificial intelligence models and deep learning algorithms to solve real-world challenges. </p>
            <p class="card-text" style="font-size:1rem; margin-top:1rem;"><strong>Status:</strong> Open</p>
            <p class="card-text" style="font-size:1rem;"><strong>Open for application:</strong> Researcher, Developer</p>
            <!-- <a href=""  class="more-detail-btn">More details</a> -->
         </div>
         </div>
      </div>
      <div class="col-md-6 mb-4" data-bs-toggle="tooltip" data-bs-placement="top" title="Click to view more details">
         <div class="card hover-zoom" style="border-radius: 10px;">
         <div class="card-body">
            <h5 class="card-title" style="color:#007bff;font-size:1.2rem">AI & Machine Learning Innovations</h5>
            <p class="card-text" style="font-size:1rem">This research group focuses on exploring cutting-edge artificial intelligence models and deep learning algorithms to solve real-world challenges. </p>
            <p class="card-text" style="font-size:1rem; margin-top:1rem;"><strong>Status:</strong> Open</p>
            <p class="card-text" style="font-size:1rem;"><strong>Open for application:</strong> Researcher, Developer</p>
            <!-- <a href=""  class="more-detail-btn">More details</a> -->
         </div>
         </div>
      </div>
      <div class="col-md-6 mb-4" data-bs-toggle="tooltip" data-bs-placement="top" title="Click to view more details">
         <div class="card hover-zoom" style="border-radius: 10px;">
         <div class="card-body">
            <h5 class="card-title" style="color:#007bff;font-size:1.2rem">AI & Machine Learning Innovations</h5>
            <p class="card-text" style="font-size:1rem">This research group focuses on exploring cutting-edge artificial intelligence models and deep learning algorithms to solve real-world challenges. </p>
            <p class="card-text" style="font-size:1rem; margin-top:1rem;"><strong>Status:</strong> Open</p>
            <p class="card-text" style="font-size:1rem;"><strong>Open for application:</strong> Researcher, Developer</p>
            <!-- <a href=""  class="more-detail-btn">More details</a> -->
         </div>
         </div>
      </div>




   </div>

   <style>
      .hover-zoom {
         transition: transform 0.3s;
      }

      .hover-zoom:hover {
         transform: scale(1.02);
      }

      .test {
         font-size: 1.2rem;
         color: #007bff;

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