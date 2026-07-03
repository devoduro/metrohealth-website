<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Metro Health</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('css/ashlocs-custom.css')); ?>">
</head>
<body style="background: linear-gradient(135deg, #FFF5F0 0%, #FFFFFF 100%); min-height: 100vh; display: flex; align-items: center; justify-content: center;">
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="admin-login-card">
                    <div class="text-center mb-4">
                        <img src="<?php echo e(asset('images/logo/logo.png')); ?>" alt="Metro Health Logo" style="height: 100px; margin-bottom: 1.5rem;">
                        <h2 style="font-weight: 700; color: #1a1d21; font-size: 1.8rem;">Metro Health Admin</h2>
                        <p style="color: #84a33f; font-weight: 600;">Healthcare Management System</p>
                    </div>

                    <?php if($errors->any()): ?>
                    <div class="alert alert-danger" style="border-radius: 15px;">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        <?php echo e($errors->first()); ?>

                    </div>
                    <?php endif; ?>

                    <?php if(session('error')): ?>
                    <div class="alert alert-danger" style="border-radius: 15px;">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        <?php echo e(session('error')); ?>

                    </div>
                    <?php endif; ?>

                    <form action="<?php echo e(route('admin.login.submit')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="mb-3">
                            <label class="form-label" style="font-weight: 600;">Email Address</label>
                            <div class="input-group">
                                <span class="input-group-text" style="background: var(--ashlocs-light); border: 2px solid #e0e0e0; border-right: none;">
                                    <i class="fas fa-envelope" style="color: var(--ashlocs-orange);"></i>
                                </span>
                                <input type="email" name="email" class="form-control form-control-lg" 
                                       style="border-left: none; border: 2px solid #e0e0e0;" 
                                       value="<?php echo e(old('email')); ?>" required autofocus>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label" style="font-weight: 600;">Password</label>
                            <div class="input-group">
                                <span class="input-group-text" style="background: var(--ashlocs-light); border: 2px solid #e0e0e0; border-right: none;">
                                    <i class="fas fa-lock" style="color: var(--ashlocs-orange);"></i>
                                </span>
                                <input type="password" name="password" class="form-control form-control-lg" 
                                       style="border-left: none; border: 2px solid #e0e0e0;" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                <label class="form-check-label" for="remember">
                                    Remember me
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary-custom btn-lg w-100">
                            <i class="fas fa-sign-in-alt me-2"></i>Login to Dashboard
                        </button>
                    </form>

                    <div class="text-center mt-4">
                        <a href="<?php echo e(route('home')); ?>" style="color: var(--ashlocs-orange); text-decoration: none;">
                            <i class="fas fa-arrow-left me-2"></i>Back to Website
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\metrohealth-web\resources\views/admin/login.blade.php ENDPATH**/ ?>