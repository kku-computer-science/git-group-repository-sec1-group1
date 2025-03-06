@extends('dashboards.users.layouts.user-dash-layout')

@section('content')
<div class="container">
    <div class="card border-0" style="border-radius: 10px;">
        <div class="card-body">
            <h3 class="text-primary mb-4">Create Application for {{ $project->project_title }}</h3>

            <!-- Single-Select Positions (Radio Buttons) -->
            <div class="mb-4">
                <label class="form-label d-block mb-2">Select Position</label>
                <div class="btn-group d-flex flex-wrap gap-2" role="group" aria-label="Position Selection">
                    <input type="radio" class="btn-check ct-check" id="researchAssistant" name="position" value="Research Assistant" autocomplete="off">
                    <label class="btn ct-btn-outline" for="researchAssistant">Research Assistant</label>

                    <input type="radio" class="btn-check ct-check" id="phd" name="position" value="PhD" autocomplete="off">
                    <label class="btn ct-btn-outline" for="phd">Ph.D.</label>

                    <input type="radio" class="btn-check ct-check" id="postdoc" name="position" value="Postdoc" autocomplete="off">
                    <label class="btn ct-btn-outline" for="postdoc">Postdoc</label>
                </div>
            </div>

            <!-- Application Form -->
            <form action="{{ route('application.store', $project->id) }}" method="POST">
                @csrf
                <div id="formContainer"></div>

                <button type="submit" class="btn btn-primary mt-3">Submit Application</button>
                <a href="{{ route('application_project.show', $project->id) }}" class="btn btn-secondary mt-3">Cancel</a>
            </form>
        </div>
    </div>
</div>

<style>
    .ct-btn-outline {
        color: #007bff;
        /* Custom text color */
        border-color: #007bff;
        /* Custom border color */
        outline: none !important;
        box-shadow: none !important;
    }

    .ct-btn-outline:hover,
    .ct-btn-outline:active {
        background-color: #007bff !important;
        /* Custom hover background */
        color: white !important;
    }

    .ct-check:checked+label {
        background-color: #007bff !important;
        /* Custom checked background */
        color: white !important;
        border-color: #007bff !important;
    }

    /* Ensure focus does nothing */
    .ct-btn-outline:focus,
    .ct-check:focus+label {
        outline: none !important;
        box-shadow: none !important;
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

    .bullet-point-btn{
        font-size: 0.8rem;
        padding: 0.25rem 0.5rem;
        color: #007bff;
        border-color: #007bff;
    }

    .bullet-point-btn:hover{
        background-color: #007bff;
        color: white;
    }
</style>

<script>
 document.addEventListener("DOMContentLoaded", function() {
    const radioButtons = document.querySelectorAll("input[name='position']");
    const formContainer = document.getElementById("formContainer");

    radioButtons.forEach(radio => {
        radio.addEventListener("change", function() {
            updateForm();
        });
    });

    function updateForm() {
        formContainer.innerHTML = ""; // Clear previous form
        
        // Find the selected radio button
        const selectedRadio = document.querySelector("input[name='position']:checked");
        
        if (selectedRadio) {
            formContainer.innerHTML = generateForm(selectedRadio.value);
        }
        
        // Initialize tooltips after form is generated
        const tooltips = document.querySelectorAll('[data-bs-toggle="tooltip"]');
        tooltips.forEach(tooltip => {
            new bootstrap.Tooltip(tooltip);
        });

        // Initialize bullet point functionality
        setupBulletPoints();
    }

    function setupBulletPoints() {
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
    }

    function generateForm(position) {
        return `
            <div class="mt-4 p-4 border rounded bg-light position-relative">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="text-primary m-0">${position} Application</h4>
                    <span class="badge bg-primary">${position}</span>
                </div>
                <input type="hidden" name="role" value="${position}">

                <div class="row">
                    <!-- Left Column -->
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label fw-bold">
                                Application Deadline
                                <i class="fas fa-info-circle ms-1" data-bs-toggle="tooltip" 
                                   title="Set the deadline for application submissions"></i>
                            </label>
                            <input type="date" class="form-control" name="app_deadline" required>
                        </div>

                        <div class="form-group mb-4">
                            <label class="form-label fw-bold">
                                Vacancies
                                <i class="fas fa-info-circle ms-1" data-bs-toggle="tooltip" 
                                   title="Number of available positions"></i>
                            </label>
                            <input type="number" class="form-control" name="amount" min="1" required>
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
                            <textarea class="form-control mt-2 txtarea" name="qualifications" rows="4" required
                                    placeholder="• Ph.D. in relevant field
• 3+ years research experience
• Strong publication record"></textarea>
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
                            <textarea class="form-control mt-2 txtarea" name="preferred_qualifications" rows="4"
                                    placeholder="• Experience with grant writing
• Teaching experience
• Industry collaboration experience"></textarea>
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
                            <textarea class="form-control mt-2 txtarea" name="required_documents" rows="4" required
                                    placeholder="• CV/Resume
• Cover Letter
• Research Statement
• References"></textarea>
                        </div>

                        <div class="form-group mb-4">
                            <label class="form-label fw-bold">Salary Range</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="text" class="form-control" name="salary_amount" 
                                       placeholder="e.g., 65,000 - 80,000" required>
                                <select class="form-select" name="salary_period" style="max-width: 120px;">
                                    <option value="per hour">per hour</option>
                                    <option value="per day">per day</option>
                                    <option value="per week">per week</option>
                                    <option value="per month" selected>per month</option>
                                    <option value="per year">per year</option>
                                    <option value="per contract">per contract</option>
                                    <option value="per project">per project</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label class="form-label fw-bold">Working Time</label>
                            <div class="input-group">
                                <select class="form-select" name="working_type" style="max-width: 150px;">
                                    <option value="Full-time" selected>Full-time</option>
                                    <option value="Part-time">Part-time</option>
                                    <option value="Flexible">Flexible</option>
                                    <option value="Contract">Contract</option>
                                </select>
                                <input type="text" class="form-control" name="working_hours" 
                                       placeholder="e.g., 40 hours">
                                <select class="form-select" name="working_period" style="max-width: 120px;">
                                    <option value="per day">per day</option>
                                    <option value="per week" selected>per week</option>
                                    <option value="per month">per month</option>
                                    <option value="per contract">per contract</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label class="form-label fw-bold">Working Location</label>
                            <input type="text" class="form-control" name="work_location" 
                                   placeholder="e.g., Cambridge, MA (Hybrid)" required>
                        </div>
                        
                        <div class="form-group mb-4">
                            <label class="form-label fw-bold">
                                Contact Information
                                <i class="fas fa-info-circle ms-1" data-bs-toggle="tooltip" 
                                   title="Contact person for inquiries about this position"></i>
                            </label>
                            <div class="row g-2">
                                <div class="col-md-12 mb-2">
                                    <input type="text" class="form-control" name="contact_name" 
                                           placeholder="Contact Name" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="contact_email" 
                                           placeholder="Email Address" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="tel" class="form-control" name="contact_phone" 
                                           placeholder="Phone Number">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <label class="form-label fw-bold">Start Date</label>
                                    <input type="date" class="form-control" name="start_date" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <label class="form-label fw-bold">End Date</label>
                                    <input type="date" class="form-control" name="end_date">
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
                            <textarea class="form-control mt-2 txtarea" name="application_process" rows="4" required
                                    placeholder="• Submit application through the online portal
• Initial screening by committee
• First round interviews
• Final selection"></textarea>
                        </div>

                        <div class="form-group mb-4">
                            <label class="form-label fw-bold">Additional Details</label>
                            <textarea class="form-control txtarea" name="app_detail" rows="4" required
                                    placeholder="Provide any additional information about the position, research project, or application requirements."></textarea>
                        </div>
                    </div>
                </div>
            </div>
        `;
    }
}); 
</script>@endsection