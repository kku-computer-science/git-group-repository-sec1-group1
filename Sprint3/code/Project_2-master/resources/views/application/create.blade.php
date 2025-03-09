@extends('dashboards.users.layouts.user-dash-layout')

@section('content')
<div class="container">
    <div class="card border-0" style="border-radius: 10px;">
        <div class="card-body">
            <h3 class="text-primary mb-4">Create Application for {{ $researchGroup->group_name_en }}</h3>

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
            <form action="{{ route('application.store', $researchGroup->id) }}" method="POST">
                @csrf
                <div id="formContainer"></div>

                <button type="submit" class="btn btn-primary mt-3">Submit Application</button>
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
        
        // Initialize custom fields functionality
        initializeCustomFields();
    }
    
    // Keep track of custom fields
    let customFields = [];
    let customFieldCounter = 0;
    
    function initializeCustomFields() {
        // Set up modal field type change handler
        const modalFieldType = document.getElementById('modal-field-type');
        if (modalFieldType) {
            modalFieldType.addEventListener('change', function() {
                updateModalFieldOptions(this.value);
            });
        }
        
        // Set up save custom field button
        const saveCustomFieldBtn = document.getElementById('save-custom-field');
        if (saveCustomFieldBtn) {
            saveCustomFieldBtn.addEventListener('click', saveCustomField);
        }
        
        // Initialize with default field type
        updateModalFieldOptions('text');
        
        // Update the custom fields list
        updateCustomFieldsList();
    }
    
    function updateModalFieldOptions(fieldType) {
        // All field types in this version use placeholders, so no need to show/hide elements
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

    function saveCustomField() {
    // Get field values from modal
    const label = document.getElementById('modal-field-label').value;
    const type = document.getElementById('modal-field-type').value;
    const required = document.getElementById('modal-field-required').checked;
    
    // Validate required fields
    if (!label) {
        alert('Field Label is required');
        return;
    }
    
    // Create field config object
    const fieldId = customFieldCounter++;
    let fieldConfig = {
        id: fieldId,
        label: label,
        type: type,
        required: required
    };
    
    // Add placeholder for text fields
    if (['text', 'textarea', 'number'].includes(type)) {
        fieldConfig.placeholder = document.getElementById('modal-field-placeholder').value;
    }
    
    // Add to custom fields array
    customFields.push(fieldConfig);
    
    // Update fields list and preview
    updateCustomFieldsList();
    generateApplicantFields(customFields);
    
    // Store in hidden input for processing - update this line
    document.getElementById('custom-fields-config').value = JSON.stringify(customFields);
    
    // Also append custom fields HTML to the form container for submission
    const customFieldsContainer = document.createElement('div');
    customFieldsContainer.id = 'custom-fields-container-for-submission';
    customFieldsContainer.style.display = 'none';
    
    // Append this container to the form if it doesn't exist
    let container = document.getElementById('custom-fields-container-for-submission');
    if (!container) {
        document.querySelector('form').appendChild(customFieldsContainer);
    }
    
    // Reset and close modal
    resetModalForm();
    const modal = bootstrap.Modal.getInstance(document.getElementById('customFieldModal'));
    modal.hide();
}

    
    function resetModalForm() {
        document.getElementById('modal-field-label').value = '';
        document.getElementById('modal-field-type').value = 'text';
        document.getElementById('modal-field-required').checked = false;
        document.getElementById('modal-field-placeholder').value = '';
    }
    
    function updateCustomFieldsList() {
        const container = document.getElementById('custom-fields-list');
        if (!container) return;
        
        if (customFields.length === 0) {
            container.innerHTML = `
                <div class="alert alert-info">
                    No custom fields have been added yet. Click "Add Custom Field" to get started.
                </div>
            `;
            return;
        }
        
        let fieldsHtml = '<div class="list-group">';
        
        customFields.forEach((field, index) => {
            let typeLabel = '';
            switch (field.type) {
                case 'text': typeLabel = 'Short Text'; break;
                case 'textarea': typeLabel = 'Long Text'; break;
                case 'date': typeLabel = 'Date'; break;
                case 'number': typeLabel = 'Number'; break;
                default: typeLabel = field.type;
            }
            
            fieldsHtml += `
                <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="mb-0">${field.label} ${field.required ? '<span class="text-danger">*</span>' : ''}</h6>
                        <small class="text-muted">${typeLabel}</small>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-outline-danger remove-field" data-field-id="${index}">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            `;
        });
        
        fieldsHtml += '</div>';
        container.innerHTML = fieldsHtml;
        
        // Add event listeners for remove buttons
        document.querySelectorAll('.remove-field').forEach(btn => {
            btn.addEventListener('click', function() {
                const fieldIndex = parseInt(this.getAttribute('data-field-id'));
                removeCustomField(fieldIndex);
            });
        });
    }
    
    function removeCustomField(index) {
        if (index >= 0 && index < customFields.length) {
            customFields.splice(index, 1);
            updateCustomFieldsList();
            generateApplicantFields(customFields);
            document.getElementById('custom-fields-config').value = JSON.stringify(customFields);
        }
    }
    
    function generateApplicantFields(fieldsConfig) {
    const container = document.getElementById('applicant-custom-fields-container');
    if (!container) return;
    
    // Clear previous fields
    container.innerHTML = '';
    
    if (!fieldsConfig || fieldsConfig.length === 0) {
        container.innerHTML = '<div class="alert alert-info">No custom fields have been added yet.</div>';
        return;
    }
    
    fieldsConfig.forEach(field => {
        if (!field || !field.label || !field.type) return; // Skip invalid fields
        
        const fieldId = `app_field_${field.id}`;
        let fieldHtml = '';
        
        // Create different input based on field type
        try {
            switch (field.type) {
                case 'text':
                    fieldHtml = `
                        <div class="mb-3">
                            <label for="${fieldId}" class="form-label fw-bold">${field.label}${field.required ? ' <span class="text-danger">*</span>' : ''}</label>
                            <input type="text" class="form-control" id="${fieldId}" name="custom_${field.id}" 
                                   placeholder="${field.placeholder || ''}" ${field.required ? 'required' : ''}>
                        </div>
                    `;
                    break;
                    
                case 'textarea':
                    fieldHtml = `
                        <div class="mb-3">
                            <label for="${fieldId}" class="form-label">${field.label}${field.required ? ' <span class="text-danger">*</span>' : ''}</label>
                            <textarea class="form-control" id="${fieldId}" name="custom_${field.id}" rows="3" 
                                     placeholder="${field.placeholder || ''}" ${field.required ? 'required' : ''}></textarea>
                        </div>
                    `;
                    break;
                    
                case 'date':
                    fieldHtml = `
                        <div class="mb-3">
                            <label for="${fieldId}" class="form-label">${field.label}${field.required ? ' <span class="text-danger">*</span>' : ''}</label>
                            <input type="date" class="form-control" id="${fieldId}" name="custom_${field.id}" 
                                   ${field.required ? 'required' : ''}>
                        </div>
                    `;
                    break;
                    
                case 'number':
                    fieldHtml = `
                        <div class="mb-3">
                            <label for="${fieldId}" class="form-label">${field.label}${field.required ? ' <span class="text-danger">*</span>' : ''}</label>
                            <input type="number" class="form-control" id="${fieldId}" name="custom_${field.id}" 
                                   placeholder="${field.placeholder || ''}" ${field.required ? 'required' : ''}>
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
            
            container.insertAdjacentHTML('beforeend', fieldHtml);
        } catch (error) {
            console.error('Error generating field:', error);
            container.insertAdjacentHTML('beforeend', `
                <div class="alert alert-danger">
                    Error generating field: ${error.message}
                </div>
            `);
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

                        <!-- Custom Fields Section -->
                        <div class="form-group mb-4">
                            <label class="form-label fw-bold">Custom Fields</label>
                            <p class="text-muted small">Add additional topics or information fields that you want to include in this application.</p>
                            
                            <div class="d-flex gap-2 mb-3">
                                <button type="button" id="add-custom-field" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#customFieldModal">
                                    <i class="fas fa-plus me-1"></i> Add Custom Field
                                </button>
                            </div>
                            
                            <!-- This hidden input will store the custom fields configuration as JSON -->
                            <input type="hidden" name="custom_fields_config" id="custom-fields-config">
                            
                            <!-- Custom Fields List -->
                            <div id="custom-fields-list" class="mb-3">
                                <div class="alert alert-info">
                                    No custom fields have been added yet. Click "Add Custom Field" to get started.
                                </div>
                            </div>
                            
                            <!-- Generated application fields will be displayed here -->
                            <div id="custom-fields-for-applicants" class="mt-4 border-top pt-3">
                                <h5 class="text-primary">Custom Application Fields</h5>
                                <p class="text-muted small">These fields will be shown to applicants. Preview how they'll appear.</p>
                                <div id="applicant-custom-fields-container">
                                    <!-- Generated fields will appear here -->
                                    <div class="alert alert-info">
                                        Add custom fields to see how they'll appear to applicants.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label class="form-label fw-bold">Application Details</label>
                            <textarea class="form-control txtarea" name="app_detail" rows="4" required
                                    placeholder="Provide any application information about the position, research project, or application requirements."></textarea>
                        </div>
                    </div>
                </div>
            </div>
        `;
    }
}); 
</script>@endsection