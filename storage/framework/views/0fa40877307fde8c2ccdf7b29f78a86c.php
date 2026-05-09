

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
                Grupos
            </h5>
            <a href="<?php echo e(route('groups.create')); ?>" class="btn btn-primary">Nuevo Grupo</a>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                <tr>
                    <th>Ciclo Escolar</th>
                    <th>Sección</th>
                    <th>Grado</th>
                    <th>Nombre</th>
                    <th>Turno</th>
                    <th>Capacidad</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($group->academicCycle->name); ?></td>
                        <td><?php echo e($group->gradeLevel->section->name); ?></td>
                        <td><?php echo e($group->gradeLevel->name); ?></td>
                        <td><?php echo e($group->name); ?></td>
                        <td><?php echo e($group->shift); ?></td>
                        <td><?php echo e($group->capacity); ?></td>
                        <td>
                            <?php if($group->status == 'active'): ?>
                                <span class="badge bg-success">Activo</span>
                            <?php elseif($group->status == 'inactive'): ?>
                                <span class="badge bg-danger">Inactivo</span>
                            <?php else: ?>
                                <span class="badge bg-warning">Lleno</span>
                            <?php endif; ?>
                        </td>
                        <td class="d-flex gap-1">
                            <a href="<?php echo e(route('groups.show', $group->id)); ?>" class="btn btn-sm btn-primary">Ver</a>
                            <a href="<?php echo e(route('groups.edit', $group->id)); ?>" class="btn btn-sm btn-warning">Editar</a>
                            <form action="<?php echo e(route('groups.destroy', $group->id)); ?>" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este grupo?');">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="8" class="text-center">No hay grupos registrados.</td>
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

<?php echo $__env->make('template.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel projects\sigeApi\resources\views/groups/index.blade.php ENDPATH**/ ?>