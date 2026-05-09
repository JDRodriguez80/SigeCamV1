

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
                Ciclos Academicos
            </h5>
            <a href="<?php echo e(route('academicCycles.create')); ?>" class="btn btn-primary">Nuevo Ciclo</a>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Costo</th>
                    <th>Fecha de Inicio</th>
                    <th>Fecha Termino</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $academicCycles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cycle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($cycle->name); ?></td>
                        <td><?php echo e($cycle->cycle_cost); ?></td>
                        <td><?php echo e($cycle->start_date); ?></td>
                        <td><?php echo e($cycle->end_date); ?></td>
                        <td>
                            <?php if($cycle->is_current): ?>
                                <span class="badge bg-success">Actual</span>
                            <?php else: ?>
                                <span class="badge bg-danger">Ciclo no actual</span>
                            <?php endif; ?>
                        </td>
                        <td class="d-flex gap-1">
                            <a href="<?php echo e(route('academicCycles.show', $cycle->id)); ?>" class="btn btn-sm btn-primary">Ver</a>
                            <a href="<?php echo e(route('academicCycles.edit', $cycle->id)); ?>" class="btn btn-sm btn-warning">Editar</a>
                            <form action="<?php echo e(route('academicCycles.destroy', $cycle->id)); ?>" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este ciclo?');">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6" class="text-center">No hay ciclos registrados.</td>
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

<?php echo $__env->make('template.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel projects\sigeApi\resources\views/academicCycles/index.blade.php ENDPATH**/ ?>