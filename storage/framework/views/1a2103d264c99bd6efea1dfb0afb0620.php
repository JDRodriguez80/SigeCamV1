

<?php $__env->startSection('title', 'Crear Nuevo grado'); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Crear Nuevo grado</h3>
                    <p class="text-subtitle text-muted">Formulario para registrar un nuevo grado académico.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(route('gradeLevels.index')); ?>">Grados</a></li>
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
                            <h4 class="card-title">Datos del grado</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-vertical" method="POST" action="<?php echo e(route('gradeLevels.store')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="section_id">Sección</label>
                                                    <select class="form-select" id="section_id" name="section_id" required>
                                                        <option value="">Seleccione una sección</option>
                                                        <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($section->id); ?>"><?php echo e($section->name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="name">Nombre del grado</label>
                                                    <input type="text" name="name" id="name" class="form-control" placeholder="Nombre del grado" required>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="status">Estado</label>
                                                    <select class="form-select" id="status" name="status">
                                                        <option value="active">Activo</option>
                                                        <option value="inactive">Inactivo</option>
                                                        <option value="full">Lleno</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Guardar Grado</button>
                                                <a href="<?php echo e(route('gradeLevels.index')); ?>" class="btn btn-light-secondary me-1 mb-1">Cancelar</a>
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

<?php echo $__env->make('template.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel projects\sigeApi\resources\views/gradeLevels/create.blade.php ENDPATH**/ ?>