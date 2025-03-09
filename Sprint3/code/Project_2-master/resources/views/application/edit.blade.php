@extends('dashboards.users.layouts.user-dash-layout')

@section('content')
<div class="container">
    <div class="card border-0" style="border-radius: 10px;">
        <div class="card-body">
            <h3 class="text-primary mb-4">Edit Application for {{ $researchGroup->group_name_en }}</h3>

            <!-- Application Form -->
            <form action="{{ route('application.update', $application->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div id="formContainer"></div>

                <button type="submit" class="btn btn-primary mt-3">Update Application</button>
                <a href="{{ route('application.index', $researchGroup->id) }}" class="btn btn-secondary mt-3">Cancel</a>
            </form>
        </div>
    </div>
</div>

<!-- Custom Field Modal -->
<div class="modal fade" id="customFieldModal" tabindex="-1" aria-labelledby="customFieldModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="customFieldModalLabel">Add Custom Field</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="custom-field-item border rounded p-3 mb-3 position-relative bg-white">
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label class="form-label">Field Label <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="modal-field-label" placeholder="e.g., Required Skills" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Field Type <span class="text-danger">*</span></label>
                            <select class="form-select" id="modal-field-type">
                                <option value="text">Short Text</option>
                                <option value="textarea">Long Text</option>
                                <option value="date">Date</option>
                                <option value="number">Number</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="modal-field-required">
                            <label class="form-check-label" for="modal-field-required">
                                Make this field required
                            </label>
                        </div>
                    </div>

                    <!-- Field specific options -->
                    <div id="modal-field-options">
                        <div id="modal-placeholder-option" class="mb-3">
                            <label class="form-label">Field Placeholder</label>
                            <input type="text" class="form-control" id="modal-field-placeholder" placeholder="Enter placeholder text">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="save-custom-field">Add Field</button>
            </div>
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
        const formContainer = document.getElementById("formContainer");

        // Populate form on page load
        function setInitialForm() {
            const selectedPosition = "{{ $application->role }}";
            formContainer.innerHTML = generateForm(selectedPosition);

            // Populate form fields with existing data
            populateExistingData();
            
            // Add bullet point functionality
            setupBulletPointButtons();
        }

        // Call initial form setup
        setInitialForm();
        
        // Setup bullet point functionality for all bullet point buttons
        function setupBulletPointButtons() {
            const bulletButtons = document.querySelectorAll('.bullet-point-btn');
            
            bulletButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Find the associated textarea (next sibling after the button's parent)
                    const inputGroup = this.closest('.input-group');
                    const textarea = inputGroup.nextElementSibling;
                    
                    if (textarea) {
                        // Get current cursor position
                        const cursorPos = textarea.selectionStart;
                        const textBefore = textarea.value.substring(0, cursorPos);
                        const textAfter = textarea.value.substring(cursorPos);
                        
                        // Add bullet point at cursor position
                        // If cursor is not at the start of a line, add a newline first
                        const newLine = (cursorPos === 0 || textBefore.endsWith('\n')) ? '' : '\n';
                        textarea.value = textBefore + newLine + '• ' + textAfter;
                        
                        // Set cursor position after the bullet point
                        const newCursorPos = cursorPos + newLine.length + 2; // 2 for the '• '
                        textarea.focus();
                        textarea.setSelectionRange(newCursorPos, newCursorPos);
                    }
                });
            });
        }

        function populateExistingData() {
            // Populate basic fields
            document.querySelector('input[name="app_deadline"]').value = "{{ \Carbon\Carbon::parse($application->app_deadline)->format('Y-m-d') }}";
            document.querySelector('input[name="amount"]').value = "{{ $application->amount }}";

            // Textarea fields
            document.querySelector('textarea[name="qualifications"]').value = `{!! addslashes($application->qualifications) !!}`;
            document.querySelector('textarea[name="preferred_qualifications"]').value = `{!! addslashes($application->preferred_qualifications) !!}`;
            document.querySelector('textarea[name="required_documents"]').value = `{!! addslashes($application->required_documents) !!}`;

            // Salary and working time
            const salaryParts = "{{ $application->salary_range_old }}".split(' ');
            document.querySelector('input[name="salary_amount"]').value = salaryParts[0];
            document.querySelector('select[name="salary_period"]').value = "{{ $application->salary_period }}";

            // Other fields
            document.querySelector('input[name="work_location"]').value = "{{ $application->work_location }}";
            document.querySelector('input[name="start_date"]').value = "{{ $application->start_date }}";
            document.querySelector('input[name="end_date"]').value = "{{ $application->end_date }}";

            document.querySelector('textarea[name="application_process"]').value = `{!! addslashes($application->application_process) !!}`;
            document.querySelector('textarea[name="app_detail"]').value = `{!! addslashes($application->app_detail) !!}`;

            // Contact information
            document.querySelector('input[name="contact_name"]').value = "{{ $application->contact_name }}";
            document.querySelector('input[name="contact_email"]').value = "{{ $application->contact_email }}";
            document.querySelector('input[name="contact_phone"]').value = "{{ $application->contact_phone }}";

            console.log("Populating existing data...");

            // Convert PHP variables to JavaScript with proper escaping
            const existingCustomFields = JSON.parse('{!! json_encode($existingCustomFields) !!}');
            const customFieldValues = JSON.parse('{!! json_encode($customFieldValues) !!}');

            console.log("Existing Custom Fields:", existingCustomFields);
            console.log("Custom Field Values:", customFieldValues);

            // Reset custom fields
            const customFields = [];

            // Prepare custom fields
            existingCustomFields.forEach((field) => {
                const fieldId = field.id;
                const fieldValue = customFieldValues[fieldId] || "";

                customFields.push({
                    id: fieldId,
                    label: field.field_label,
                    type: field.field_type,
                    required: field.field_required === 1,
                    placeholder: field.field_placeholder || "",
                    value: fieldValue, // Add existing value
                });
            });

            console.log("Processed Custom Fields:", customFields);

            // Generate custom fields in the DOM
            generateApplicantFields(customFields);
        }

        function generateApplicantFields(fieldsConfig) {
            const container = document.getElementById("applicant-custom-fields-container");
            if (!container) {
                console.error("Container 'applicant-custom-fields-container' not found!");
                return;
            }

            console.log("Generating fields with config:", fieldsConfig);

            // Clear previous fields
            container.innerHTML = "";

            if (!fieldsConfig || fieldsConfig.length === 0) {
                console.log("No custom fields to render.");
                container.innerHTML =
                    '<div class="alert alert-info">No custom fields have been added yet.</div>';
                return;
            }

            fieldsConfig.forEach((field) => {
                if (!field || !field.label || !field.type) {
                    console.warn("Skipping invalid field:", field);
                    return;
                }

                const fieldId = `app_field_${field.id}`;
                let fieldHtml = "";

                try {
                    switch (field.type) {
                        case "text":
                            fieldHtml = `
                                <div class="mb-3">
                                    <label for="${fieldId}" class="form-label fw-bold">${field.label}${
                                field.required ? ' <span class="text-danger">*</span>' : ""
                            }</label>
                                    <input type="text" class="form-control" id="${fieldId}" name="custom_${field.id}" 
                                           placeholder="${field.placeholder || ""}" 
                                           value="${field.value || ""}"
                                           ${field.required ? "required" : ""}>
                                </div>
                            `;
                            break;

                        case "textarea":
                            fieldHtml = `
                                <div class="mb-3">
                                    <label for="${fieldId}" class="form-label">${field.label}${
                                field.required ? ' <span class="text-danger">*</span>' : ""
                            }</label>
                                    <textarea class="form-control" id="${fieldId}" name="custom_${field.id}" rows="3" 
                                              placeholder="${field.placeholder || ""}" 
                                              ${field.required ? "required" : ""}>${
                                field.value || ""
                            }</textarea>
                                </div>
                            `;
                            break;

                        case "date":
                            fieldHtml = `
                                <div class="mb-3">
                                    <label for="${fieldId}" class="form-label">${field.label}${
                                field.required ? ' <span class="text-danger">*</span>' : ""
                            }</label>
                                    <input type="date" class="form-control" id="${fieldId}" name="custom_${field.id}" 
                                           value="${field.value || ""}"
                                           ${field.required ? "required" : ""}>
                                </div>
                            `;
                            break;

                        case "number":
                            fieldHtml = `
                                <div class="mb-3">
                                    <label for="${fieldId}" class="form-label">${field.label}${
                                field.required ? ' <span class="text-danger">*</span>' : ""
                            }</label>
                                    <input type="number" class="form-control" id="${fieldId}" name="custom_${field.id}" 
                                           placeholder="${field.placeholder || ""}" 
                                           value="${field.value || ""}"
                                           ${field.required ? "required" : ""}>
                                </div>
                            `;
                            break;

                        default:
                            fieldHtml = `
                                <div class="alert alert-warning">
                                    Unknown field type: ${field.type}
                                </div>
                            `;
                    }

                    console.log("Generated field HTML:", fieldHtml);
                    container.insertAdjacentHTML("beforeend", fieldHtml);
                } catch (error) {
                    console.error("Error generating field:", error);
                    container.insertAdjacentHTML(
                        "beforeend",
                        `<div class="alert alert-danger">Error generating field: ${error.message}</div>`
                    );
                }
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
- 3+ years research experience
- Strong publication record"></textarea>
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
- Teaching experience
- Industry collaboration experience"></textarea>
                        </div>

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
- Initial screening by committee
- First round interviews
- Final selection"></textarea>
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
- Cover Letter
- Research Statement
- References"></textarea>
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
                            <label class="form-label fw-bold">Additional Details</label>
                            <div class="input-group">
                                <button type="button" class="btn btn-outline-secondary bullet-point-btn">
                                    Add Bullet Point
                                </button>
                            </div>
                            <textarea class="form-control mt-2 txtarea" name="app_detail" rows="4" required
                                    placeholder="Provide any additional information about the position, research project, or application requirements."></textarea>
                        </div>

                    <!-- Custom Fields Section -->
                    <div class="form-group mb-4">
                        <label class="form-label fw-bold">Custom Fields</label>
                        <p class="text-muted small">Add additional topics or information fields that you want to include in this application.</p>
                        
                        <!-- This hidden input will store the custom fields configuration as JSON -->
                        <input type="hidden" name="custom_fields_config" id="custom-fields-config" value="{{ json_encode($existingCustomFields) }}">
                        
                        <!-- Generated application fields will be displayed here -->
                        <div id="applicant-custom-fields-container">
                            <!-- Generated fields will appear here -->
                            <div class="alert alert-info">Add custom fields to see how they'll appear to applicants.</div>
                        </div>
                    </div>


                    </div>
                </div>
                </div>
            `;
        }

        // Custom field functions
        document.getElementById('save-custom-field').addEventListener('click', function() {
            const label = document.getElementById('modal-field-label').value;
            const type = document.getElementById('modal-field-type').value;
            const required = document.getElementById('modal-field-required').checked;
            const placeholder = document.getElementById('modal-field-placeholder').value;
            
            if (!label) {
                alert('Field label is required');
                return;
            }
            
            // Get existing fields
            let customFields = [];
            const configInput = document.getElementById('custom-fields-config');
            if (configInput.value) {
                try {
                    customFields = JSON.parse(configInput.value);
                } catch (e) {
                    console.error('Error parsing custom fields:', e);
                }
            }
            
            // Generate new field ID
            const fieldId = Date.now(); // Simple timestamp-based ID
            
            // Add new field
            customFields.push({
                id: fieldId,
                field_label: label,
                field_type: type,
                field_required: required ? 1 : 0,
                field_placeholder: placeholder
            });
            
            // Update the hidden input
            configInput.value = JSON.stringify(customFields);
            
            // Close the modal
            const modal = bootstrap.Modal.getInstance(document.getElementById('customFieldModal'));
            modal.hide();
            
            // Update the display
            generateApplicantFields(customFields.map(field => ({
                id: field.id,
                label: field.field_label,
                type: field.field_type,
                required: field.field_required === 1,
                placeholder: field.field_placeholder
            })));
        });
    });
</script>
@endsection