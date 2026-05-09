<?php $__env->startSection('title', 'Inscribir Alumno'); ?>

<?php $__env->startSection('content'); ?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Inscripción de Alumnos</h3>
                <p class="text-subtitle text-muted">Seleccione un grupo y busque un alumno para inscribirlo.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Inscripciones</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li><?php echo e($error); ?></li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></ul>
        </div>
    <?php endif; ?>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Paso 1: Seleccionar Grupo y Buscar Alumno</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="group_id_selector">Seleccione un Grupo</label>
                            <select id="group_id_selector" class="form-select">
                                <option value="">-- Seleccione un grupo --</option>
                                <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($group->id); ?>" data-academic-cycle-id="<?php echo e($group->academic_cycle_id); ?>">
                                        <?php echo e($group->gradeLevel->name); ?> - <?php echo e($group->name); ?> (<?php echo e($group->academicCycle->name); ?>)
                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Buscar Alumno por CURP</label>
                        <div class="input-group">
                            <input type="text" id="curp_search" class="form-control" placeholder="CURP del alumno...">
                            <button id="search_student_btn" class="btn btn-primary" type="button">Buscar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="student_info_card" class="card" style="display: none;">
            <div class="card-header">
                <h4 class="card-title">Paso 2: Confirmar y Inscribir</h4>
            </div>
            <div class="card-body">
                <div id="student_details">
                    
                </div>
                <form action="<?php echo e(route('enrollments.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="student_id" id="student_id">
                    <input type="hidden" name="group_id" id="group_id">
                    <input type="hidden" name="academic_cycle_id" id="academic_cycle_id">
                    <input type="hidden" name="enrollment_date" value="<?php echo e(date('Y-m-d')); ?>">

                    <div class="form-group">
                        <label for="status">Estado de la Inscripción</label>
                        <select name="status" class="form-select">
                            <option value="pre_inscrito">Pre-Inscrito</option>
                            <option value="inscrito" selected>Inscrito</option>
                            <option value="baja">Baja</option>
                            <option value="graduado">Graduado</option>
                            <option value="repetidor">Repetidor</option>
                        </select>
                    </div>
                    <div class="form-group form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="has_complementary_care" name="has_complementary_care" value="1">
                        <label class="form-check-label" for="has_complementary_care">Requiere atención complementaria?</label>
                    </div>
                    <div class="form-group">
                        <label for="notes">Notas Adicionales</label>
                        <textarea class="form-control" name="notes" id="notes" rows="3"></textarea>
                    </div>

                    <div class="mt-3">
                        <button type="submit" id="enroll_button" class="btn btn-success">Inscribir Alumno</button>
                        <a href="<?php echo e(route('dashboard')); ?>" class="btn btn-light-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const groupSelect = document.getElementById('group_id_selector');
    const curpInput = document.getElementById('curp_search');
    const searchBtn = document.getElementById('search_student_btn');
    const studentInfoCard = document.getElementById('student_info_card');
    const studentDetailsDiv = document.getElementById('student_details');

    const studentIdInput = document.getElementById('student_id');
    const groupIdInput = document.getElementById('group_id');
    const academicCycleIdInput = document.getElementById('academic_cycle_id');

    searchBtn.addEventListener('click', async function () {
        const curp = curpInput.value;
        const selectedGroupOption = groupSelect.options[groupSelect.selectedIndex];
        const groupId = selectedGroupOption.value;
        const academicCycleId = selectedGroupOption.dataset.academicCycleId;

        if (!groupId) {
            alert('Por favor, seleccione un grupo primero.');
            return;
        }
        if (!curp) {
            alert('Por favor, ingrese el CURP del alumno.');
            return;
        }

        try {
            const response = await fetch(`/students/search/${curp}`); // URL actualizada
            if (response.ok) {
                const student = await response.json();

                studentDetailsDiv.innerHTML = `
                    <h5>Datos del Alumno</h5>
                    <p><strong>Nombre:</strong> ${student.first_name} ${student.last_name}</p>
                    <p><strong>CURP:</strong> ${student.curp}</p>
                    <p><strong>Género:</strong> ${student.gender}</p>
                    <p><strong>Fecha de Nacimiento:</strong> ${student.birth_date}</p>
                    <p><strong>Teléfono:</strong> ${student.phone}</p>
                    ${student.photo ? `<img src="/storage/${student.photo}" alt="Foto del Alumno" class="img-thumbnail mt-2" style="max-width: 150px;">` : ''}
                `;

                studentIdInput.value = student.id;
                groupIdInput.value = groupId;
                academicCycleIdInput.value = academicCycleId;

                studentInfoCard.style.display = 'block';
            } else {
                alert('Estudiante no encontrado. Verifique el CURP o registre al alumno.');
                studentInfoCard.style.display = 'none';
            }
        } catch (error) {
            console.error('Error al buscar el alumno:', error);
            alert('Ocurrió un error al buscar al alumno.');
        }
    });
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel projects\sigeApi\resources\views/enrollments/index.blade.php ENDPATH**/ ?>