

<?php $__env->startSection('title', 'Crear Nuevo Grupo'); ?>

<?php $__env->startSection('content'); ?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Crear Nuevo Grupo</h3>
                <p class="text-subtitle text-muted">Formulario para registrar un nuevo grupo académico.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(route('groups.index')); ?>">Grupos</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Crear</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section id="basic-vertical-layouts">
        <div class="row match-height">
            <div class="col-md-8 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Datos del Grupo</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical" method="POST" action="<?php echo e(route('groups.store')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="academic_cycle_id">Ciclo Académico</label>
                                                <select class="form-select" name="academic_cycle_id" required>
                                                    <option value="">Seleccione un ciclo</option>
                                                    <?php $__currentLoopData = $academicCycles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cycle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($cycle->id); ?>"><?php echo e($cycle->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="grade_level_id">Grado</label>
                                                <select class="form-select" name="grade_level_id" required>
                                                    <option value="">Seleccione un grado</option>
                                                    <?php $__currentLoopData = $gradeLevels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($grade->id); ?>"><?php echo e($grade->name); ?> (<?php echo e($grade->section->name); ?>)</option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="name">Nombre del Grupo (Ej: 'A', 'B')</label>
                                                <input type="text" name="name" id="name" class="form-control" placeholder="Nombre o identificador del grupo" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="shift">Turno</label>
                                                <select class="form-select" name="shift" required>
                                                    <option value="">Seleccione un turno</option>
                                                    <option value="matutino">Matutino</option>
                                                    <option value="vespertino">Vespertino</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="capacity">Capacidad</label>
                                                <input type="number" name="capacity" class="form-control" min="1" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="status">Estado</label>
                                                <select class="form-select" name="status" required>
                                                    <option value="active">Activo</option>
                                                    <option value="inactive">Inactivo</option>
                                                    <option value="full">Lleno</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Guardar Grupo</button>
                                            <a href="<?php echo e(route('groups.index')); ?>" class="btn btn-light-secondary me-1 mb-1">Cancelar</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel projects\sigeApi\resources\views/groups/create.blade.php ENDPATH**/ ?>