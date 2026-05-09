

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <h5 class=" card-header d-flex justify-content-between align-items-center">
                Alumnos Registrados
                <a href="<?php echo e(route('students.create')); ?>" class="btn btn-primary">Nuevo Alumno</a>
            </h5>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>CURP</th>
                        <th>Teléfono</th>
                        <th>Discapacidad</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><img src="<?php echo e($student->photo ? asset('storage/'.$student->photo): 'https://ui-avatars.com/api/?name=' . urlencode($student->first_name . ' ' . $student->last_name) . '&color=7F9CF5&background=EBF4FF'); ?>" class="img-thumbnail " alt="Foto del estudiante" style="max-width: 100px; max-height: 100px;"></td>
                            <td><?php echo e($student->first_name); ?> <?php echo e($student->middle_name); ?></td>
                            <td><?php echo e($student->last_name); ?> <?php echo e($student->second_last_name); ?></td>
                            <td><?php echo e($student->curp); ?></td>
                            <td><?php echo e($student->phone); ?></td>
                           
                             <td><?php echo e(optional($student->disabilityType)->name ?? 'Ninguna'); ?></td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Actions">
                                <a href="<?php echo e(route('students.show', $student->id)); ?>" class="btn btn-sm btn-primary me-2">Ver</a>
                                <a href="#" class="btn btn-sm btn-warning me-2">Editar</a>
                                <form action="<?php echo e(route('students.destroy', $student->id)); ?>" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este estudiante?');">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="6" class="text-center">No hay estudiantes registrados.</td>
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

<?php echo $__env->make('template.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel projects\sigeApi\resources\views/students/index.blade.php ENDPATH**/ ?>