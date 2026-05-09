

<?php $__env->startSection('content'); ?>

    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo e(session('success')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">
                Grados Escolares
            </h5>
            <a href="<?php echo e(route('gradeLevels.create')); ?>" class="btn btn-primary">Nuevo Grado</a>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                <tr>
                    <th>Sección</th>
                    <th>Nombre</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $gradeLevels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($grade->section->name); ?></td>
                        <td><?php echo e($grade->name); ?></td>
                        <td>
                            <?php if($grade->status == 'active'): ?>
                                <span class="badge bg-success">Activo</span>
                            <?php elseif($grade->status == 'inactive'): ?>
                                <span class="badge bg-danger">Inactivo</span>
                            <?php else: ?>
                                <span class="badge bg-warning"><?php echo e($grade->status); ?></span>
                            <?php endif; ?>
                        </td>
                        <td class="d-flex gap-1">
                            <a href="<?php echo e(route('gradeLevels.show', $grade->id)); ?>" class="btn btn-sm btn-primary">Ver</a>
                            <a href="<?php echo e(route('gradeLevels.edit', $grade->id)); ?>" class="btn btn-sm btn-warning">Editar</a>
                            <form action="<?php echo e(route('gradeLevels.destroy', $grade->id)); ?>" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este grado?');">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="4" class="text-center">No hay grados registrados.</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    
    <script src="<?php echo e(asset('assets/extensions/simple-datatables/umd/simple-datatables.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/static/js/pages/simple-datatables.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel projects\sigeApi\resources\views/gradeLevels/index.blade.php ENDPATH**/ ?>