

<?php $__env->startSection('title', 'Configuración del Sistema'); ?>

<?php $__env->startSection('content'); ?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Configuración General</h3>
                <p class="text-subtitle text-muted">Personaliza la apariencia y el comportamiento del sistema.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Configuración</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li><?php echo e($error); ?></li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></ul>
        </div>
    <?php endif; ?>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Logo del Sistema</h4>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('settings.update')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Logo Actual</h5>
                            <?php if(isset($settings['logo'])): ?>
                                <img src="<?php echo e(asset('storage/' . $settings['logo'])); ?>" alt="Logo Actual" class="img-thumbnail" style="max-width: 200px; background-color: #f8f9fa;">
                            <?php else: ?>
                                <p>No se ha subido ningún logo.</p>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="logo">Subir Nuevo Logo</label>
                                <p class="text-muted">Se recomienda un archivo PNG o SVG con fondo transparente.</p>
                                <input type="file" id="logo" name="logo" class="form-control" accept="image/png, image/jpeg, image/svg+xml">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel projects\sigeApi\resources\views/settings/index.blade.php ENDPATH**/ ?>