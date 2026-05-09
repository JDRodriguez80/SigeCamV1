

<?php $__env->startSection('title', 'Detalles del ciclo escolar'); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Detalles del ciclo escolar</h3>
                    <p class="text-subtitle text-muted">Información completa del ciclo escolar registrado.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(route('academicCycles.index')); ?>">Ciclos</a></li>
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
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label><strong>Nombre:</strong></label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <p><?php echo e($academicCycle->name); ?></p>
                                </div>
                                <div class="col-md-4">
                                    <label><strong>Costo:</strong></label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <p><?php echo e($academicCycle->cycle_cost); ?></p>
                                </div>
                                <div class="col-md-4">
                                    <label><strong>Fecha de inicio:</strong></label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <p><?php echo e($academicCycle->start_date); ?></p>
                                </div> <div class="col-md-4">
                                    <label><strong>Fecha de fin:</strong></label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <p><?php echo e($academicCycle->end_date); ?></p>
                                </div>
                                <div class="col-md-4">
                                    <label><strong>Estado:</strong></label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <?php if($academicCycle->status == 'activo'): ?>
                                        <span class="badge bg-success">Activo</span>
                                    <?php elseif($academicCycle->status == 'archivado'): ?>
                                        <span class="badge bg-warning">Archivado</span>
                                    <?php else: ?>
                                        <span class="badge bg-danger">Inactivo</span>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-4">
                                    <label><strong>Fecha de Creación:</strong></label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <p><?php echo e($academicCycle->created_at->format('d/m/Y H:i')); ?></p>
                                </div>
                            </div>
                            <div class="mt-3">
                                <a href="<?php echo e(route('academicCycles.index')); ?>" class="btn btn-secondary">Volver al Listado</a>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel projects\sigeApi\resources\views/academicCycles/show.blade.php ENDPATH**/ ?>