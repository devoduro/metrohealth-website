<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Email Campaign | Metro Health Admin</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('css/ashlocs-custom.css')); ?>">
</head>
<body style="background: #f8f9fa;">
    
    <?php echo $__env->make('admin.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="admin-content">
        <?php $__env->startSection('page-title', 'Create Email Campaign'); ?>
        <?php echo $__env->make('admin.partials.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="container-fluid p-4">
            <!-- Back Button -->
            <div class="mb-3">
                <a href="<?php echo e(route('admin.emails.index')); ?>" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Back to Email Campaigns
                </a>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white border-bottom">
                            <h5 class="mb-0"><i class="fas fa-envelope me-2" style="color: #84a33f;"></i>Compose Email Campaign</h5>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo e(route('admin.emails.send')); ?>" method="POST" id="emailForm">
                                <?php echo csrf_field(); ?>

                                <!-- Recipient Type -->
                                <div class="mb-4">
                                    <label class="form-label fw-bold">Recipient Type <span class="text-danger">*</span></label>
                                    <select name="recipient_type" id="recipientType" class="form-select" required>
                                        <option value="">Select recipient type...</option>
                                        <option value="all" <?php echo e(request('type') == 'all' ? 'selected' : ''); ?>>All Patients</option>
                                        <option value="service" <?php echo e(request('type') == 'service' ? 'selected' : ''); ?>>By Medical Service</option>
                                        <option value="custom" <?php echo e(request('type') == 'custom' ? 'selected' : ''); ?>>Custom Email List</option>
                                    </select>
                                    <div id="allPatientsCount" class="mt-2" style="display: none;">
                                        <div class="alert alert-success mb-0">
                                            <i class="fas fa-users me-2"></i>
                                            <strong><?php echo e($stats['total_patients']); ?> recipients</strong> will receive this email
                                        </div>
                                    </div>
                                </div>

                                <!-- Service Selection (shown when 'service' is selected) -->
                                <div class="mb-4" id="serviceSelection" style="display: none;">
                                    <label class="form-label fw-bold">Select Medical Service <span class="text-danger">*</span></label>
                                    <select name="service_name" id="serviceSelect" class="form-select">
                                        <option value="">Choose a service...</option>
                                        <?php $__currentLoopData = $serviceNames; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $serviceName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($serviceName); ?>"><?php echo e($serviceName); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <div id="recipientCount" class="mt-2" style="display: none;">
                                        <div class="alert alert-info mb-0">
                                            <i class="fas fa-users me-2"></i>
                                            <strong><span id="recipientNumber">0</span> recipients</strong> will receive this email
                                        </div>
                                    </div>
                                    <small class="text-muted">Email will be sent to patients who booked this service</small>
                                </div>

                                <!-- Custom Email List (shown when 'custom' is selected) -->
                                <div class="mb-4" id="customEmails" style="display: none;">
                                    <label class="form-label fw-bold">Email Addresses <span class="text-danger">*</span></label>
                                    <textarea name="custom_emails" class="form-control" rows="4" placeholder="Enter email addresses separated by commas&#10;Example: patient1@example.com, patient2@example.com"></textarea>
                                    <small class="text-muted">Separate multiple emails with commas</small>
                                </div>

                                <!-- Email Subject -->
                                <div class="mb-4">
                                    <label class="form-label fw-bold">Email Subject <span class="text-danger">*</span></label>
                                    <input type="text" name="subject" class="form-control" placeholder="Enter email subject" required maxlength="255">
                                    <small class="text-muted">Keep it clear and concise (max 255 characters)</small>
                                </div>

                                <!-- Email Message -->
                                <div class="mb-4">
                                    <label class="form-label fw-bold">Email Message <span class="text-danger">*</span></label>
                                    <textarea name="message" id="emailMessage" class="form-control" rows="10" placeholder="Enter your message here..." required></textarea>
                                    <small class="text-muted">Write your message. Patient names will be automatically personalized.</small>
                                </div>

                                <!-- Action Buttons -->
                                <div class="d-flex gap-2">
                                    <button type="button" class="btn btn-outline-info" onclick="previewEmail()">
                                        <i class="fas fa-eye me-2"></i>Preview
                                    </button>
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-paper-plane me-2"></i>Send Campaign
                                    </button>
                                    <a href="<?php echo e(route('admin.emails.index')); ?>" class="btn btn-outline-secondary">
                                        Cancel
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <!-- Preview Card -->
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-header bg-white border-bottom">
                            <h6 class="mb-0"><i class="fas fa-info-circle me-2"></i>Campaign Info</h6>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <small class="text-muted d-block mb-1">Recipient Type</small>
                                <strong id="previewType">Not selected</strong>
                            </div>
                            <div class="mb-3">
                                <small class="text-muted d-block mb-1">Subject</small>
                                <strong id="previewSubject">Not entered</strong>
                            </div>
                            <div>
                                <small class="text-muted d-block mb-1">Message Length</small>
                                <strong id="messageLength">0 characters</strong>
                            </div>
                        </div>
                    </div>

                    <!-- Tips Card -->
                    <div class="card border-0 shadow-sm" style="background: linear-gradient(135deg, #fff5e6 0%, #ffe6cc 100%);">
                        <div class="card-body">
                            <h6 class="mb-3"><i class="fas fa-lightbulb me-2 text-warning"></i>Quick Tips</h6>
                            <ul class="small mb-0 ps-3">
                                <li class="mb-2">Use a clear, action-oriented subject line</li>
                                <li class="mb-2">Keep your message concise and focused</li>
                                <li class="mb-2">Include contact information</li>
                                <li class="mb-2">Preview before sending</li>
                                <li>Double-check recipient selection</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Preview Modal -->
    <div class="modal fade" id="previewModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-eye me-2"></i>Email Preview</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="border rounded p-4" style="background: #f8f9fa;">
                        <h6 class="mb-3">Subject: <span id="modalSubject"></span></h6>
                        <hr>
                        <div id="modalMessage"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Show/hide fields based on recipient type
        document.getElementById('recipientType').addEventListener('change', function() {
            const type = this.value;
            const serviceSelection = document.getElementById('serviceSelection');
            const customEmails = document.getElementById('customEmails');
            const allPatientsCount = document.getElementById('allPatientsCount');
            
            serviceSelection.style.display = type === 'service' ? 'block' : 'none';
            customEmails.style.display = type === 'custom' ? 'block' : 'none';
            allPatientsCount.style.display = type === 'all' ? 'block' : 'none';
            
            // Hide service recipient count when changing type
            document.getElementById('recipientCount').style.display = 'none';
            
            // Update preview
            document.getElementById('previewType').textContent = 
                type === 'all' ? 'All Patients' : 
                type === 'service' ? 'By Medical Service' : 
                type === 'custom' ? 'Custom Email List' : 'Not selected';
        });

        // Fetch recipient count when service is selected
        document.getElementById('serviceSelect').addEventListener('change', function() {
            const serviceName = this.value;
            const recipientCountDiv = document.getElementById('recipientCount');
            const recipientNumberSpan = document.getElementById('recipientNumber');
            
            if (!serviceName) {
                recipientCountDiv.style.display = 'none';
                return;
            }
            
            // Fetch recipient count via AJAX
            fetch('/admin/emails/recipient-count?service_name=' + encodeURIComponent(serviceName))
                .then(response => response.json())
                .then(data => {
                    recipientNumberSpan.textContent = data.count;
                    recipientCountDiv.style.display = 'block';
                })
                .catch(error => {
                    console.error('Error fetching recipient count:', error);
                    recipientCountDiv.style.display = 'none';
                });
        });

        // Update subject preview
        document.querySelector('input[name="subject"]').addEventListener('input', function() {
            document.getElementById('previewSubject').textContent = this.value || 'Not entered';
        });

        // Update message length
        document.getElementById('emailMessage').addEventListener('input', function() {
            document.getElementById('messageLength').textContent = this.value.length + ' characters';
        });

        // Preview email function
        function previewEmail() {
            const subject = document.querySelector('input[name="subject"]').value;
            const message = document.getElementById('emailMessage').value;
            
            if (!subject || !message) {
                alert('Please enter both subject and message to preview');
                return;
            }
            
            document.getElementById('modalSubject').textContent = subject;
            document.getElementById('modalMessage').innerHTML = message.replace(/\n/g, '<br>');
            
            const modal = new bootstrap.Modal(document.getElementById('previewModal'));
            modal.show();
        }

        // Trigger change on page load if type is pre-selected
        window.addEventListener('load', function() {
            const recipientType = document.getElementById('recipientType');
            if (recipientType.value) {
                recipientType.dispatchEvent(new Event('change'));
            }
        });
    </script>
</body>
</html>
<?php /**PATH /home4/ptawiah/new.metrohealthgh.com/resources/views/admin/emails/create.blade.php ENDPATH**/ ?>