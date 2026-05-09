
<?php $__env->startSection('title', 'Detalles de los roles'); ?>
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
                    Roles del sistema
                </h5>
                <a href="<?php echo e(route('roles.create')); ?>" class="btn btn-primary">Nuevo rol</a>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Fecha de creacion</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($role->name); ?></td>
                            <td><?php echo e($role->created_at); ?></td>
                            <td class="d-flex gap-1">
                                <a href="<?php echo e(route('roles.edit',$role->id)); ?>" class="btn btn-sm btn-warning">Editar</a>
                                <form action="<?php echo e(route('roles.destroy',$role->id)); ?>" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este rol?');">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="6" class="text-center">No hay roles registrados.</td>
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

<?php echo $__env->make('template.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel projects\sigeApi\resources\views/roles/index.blade.php ENDPATH**/ ?>