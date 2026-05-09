

<?php $__env->startSection('title', 'Detalles de la Sección'); ?>

<?php $__env->startSection('content'); ?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Detalles de la Sección</h3>
                <p class="text-subtitle text-muted">Información completa de la sección registrada.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(route('sections.index')); ?>">Secciones</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detalles</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section>
        <div class="row">
            <div class="col-md-8 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Sección: <?php echo e($section->name); ?></h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label><strong>Código:</strong></label>
                            </div>
                            <div class="col-md-8 form-group">
                                <p><?php echo e($section->code); ?></p>
                            </div>
                            <div class="col-md-4">
                                <label><strong>Nombre:</strong></label>
                            </div>
                            <div class="col-md-8 form-group">
                                <p><?php echo e($section->name); ?></p>
                            </div>
                            <div class="col-md-4">
                                <label><strong>Estado:</strong></label>
                            </div>
                            <div class="col-md-8 form-group">
                                <?php if($section->is_active): ?>
                                    <span class="badge bg-success">Activa</span>
                                <?php else: ?>
                                    <span class="badge bg-danger">Inactiva</span>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-4">
                                <label><strong>Fecha de Creación:</strong></label>
                            </div>
                            <div class="col-md-8 form-group">
                                <p><?php echo e($section->created_at->format('d/m/Y H:i')); ?></p>
                            </div>
                        </div>
                        <div class="mt-3">
                            <a href="<?php echo e(route('sections.index')); ?>" class="btn btn-secondary">Volver al Listado</a>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel projects\sigeApi\resources\views/sections/show.blade.php ENDPATH**/ ?>