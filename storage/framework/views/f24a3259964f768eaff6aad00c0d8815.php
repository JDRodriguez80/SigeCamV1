

<?php $__env->startSection('title', 'Detalles del Grupo'); ?>

<?php $__env->startSection('content'); ?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Detalles del Grupo</h3>
                <p class="text-subtitle text-muted">Información completa del grupo y sus alumnos inscritos.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(route('groups.index')); ?>">Grupos</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detalles</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <?php if(session('success')): ?>
            <div class="alert alert-success"><?php echo e(session('success')); ?></div>
        <?php endif; ?>

        
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Datos del Grupo</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Nombre:</strong> <?php echo e($group->name); ?></p>
                        <p><strong>Grado:</strong> <?php echo e($group->gradeLevel->name); ?></p>
                        <p><strong>Sección:</strong> <?php echo e($group->gradeLevel->section->name); ?></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Ciclo Académico:</strong> <?php echo e($group->academicCycle->name); ?></p>
                        <p><strong>Turno:</strong> <?php echo e(ucfirst($group->shift)); ?></p>
                        <p><strong>Capacidad:</strong> <?php echo e($group->enrollments->count()); ?> / <?php echo e($group->capacity); ?></p>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Alumnos Inscritos</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>CURP</th>
                            <th>Género</th>
                            <th>Discapacidad</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $group->enrollments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enrollment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td>
                                    <?php if($enrollment->student->photo): ?>
                                        <img src="<?php echo e(asset('storage/' . $enrollment->student->photo)); ?>" alt="Foto" width="50" class="rounded-circle">
                                    <?php else: ?>
                                        <img src="<?php echo e(asset('assets/static/images/faces/2.jpg')); ?>" alt="Avatar" width="50" class="rounded-circle">
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($enrollment->student->first_name); ?> <?php echo e($enrollment->student->middle_name); ?></td>
                                <td><?php echo e($enrollment->student->last_name); ?> <?php echo e($enrollment->student->second_last_name); ?></td>
                                <td><?php echo e($enrollment->student->curp); ?></td>
                                <td><?php echo e(ucfirst($enrollment->student->gender)); ?></td>
                                <td><?php echo e($enrollment->student->disabilityType->name ?? 'N/A'); ?></td>
                                <td>
                                    <form action="<?php echo e(route('enrollments.destroy', $enrollment->id)); ?>" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres quitar a este alumno del grupo?');">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-sm btn-danger">Quitar</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="7" class="text-center">No hay alumnos inscritos en este grupo.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <a href="<?php echo e(route('groups.index')); ?>" class="btn btn-secondary">Volver al Listado</a>
    </section>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('assets/extensions/simple-datatables/umd/simple-datatables.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/static/js/pages/simple-datatables.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel projects\sigeApi\resources\views/groups/show.blade.php ENDPATH**/ ?>