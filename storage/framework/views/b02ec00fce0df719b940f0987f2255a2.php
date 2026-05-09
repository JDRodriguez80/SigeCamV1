<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'SIGE - Sistema de Gestión Estudiantil'); ?></title>

    <?php if(isset($systemLogo) && $systemLogo): ?>
        <link rel="shortcut icon" href="<?php echo e(asset('storage/' . $systemLogo)); ?>" type="image/x-icon">
    <?php else: ?>
        <link rel="shortcut icon" href="<?php echo e(asset('assets/compiled/svg/favicon.svg')); ?>" type="image/x-icon">
    <?php endif; ?>

    <link rel="stylesheet" href="<?php echo e(asset('assets/compiled/css/app.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/compiled/css/app-dark.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/compiled/css/iconly.css')); ?>">

    
    <?php echo $__env->yieldContent('styles'); ?>
</head>

<body>
    <script src="<?php echo e(asset('assets/static/js/initTheme.js')); ?>"></script>
    <div id="app">

        <?php echo $__env->make('template.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div id="main" class='layout-navbar'>
            <header>
                <nav class="navbar navbar-expand navbar-light navbar-top">
                    <div class="container-fluid">
                        <a href="#" class="burger-btn d-block">
                            <i class="bi bi-justify fs-3"></i>
                        </a>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-lg-0">
                                
                            </ul>
                            <div class="dropdown">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="user-menu d-flex">
                                        <div class="user-name text-end me-3">
                                            <h6 class="mb-0 text-gray-600">John Ducky</h6>
                                            <p class="mb-0 text-sm text-gray-600">Administrator</p>
                                        </div>
                                        <div class="user-img d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="<?php echo e(asset('assets/compiled/jpg/1.jpg')); ?>">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton" style="min-width: 11rem;">
                                    <li>
                                        <h6 class="dropdown-header">Hello, John!</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-person me-2"></i> My Profile</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-gear me-2"></i> Settings</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
            <div id="main-content">
            <?php echo $__env->yieldContent('content_header'); ?>

                <?php echo $__env->yieldContent('content'); ?>

                <?php echo $__env->make('template.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>
    <script src="<?php echo e(asset('assets/static/js/components/dark.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/compiled/js/app.js')); ?>"></script>

    
    <?php echo $__env->yieldContent('scripts'); ?>

</body>

</html>
<?php /**PATH D:\laravel projects\sigeApi\resources\views/template/template.blade.php ENDPATH**/ ?>