

<?php $__env->startSection('title', 'Registrar Nuevo Estudiante'); ?>

<?php $__env->startSection('content'); ?>
<div class="page-heading">
    
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Registro de Estudiante</h3>
                <p class="text-subtitle text-muted">Formulario de inscripción completo para un nuevo estudiante y sus tutores.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(route('students.index')); ?>">Estudiantes</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Registrar</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li><?php echo e($error); ?></li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></ul>
    </div>
<?php endif; ?>

<form action="<?php echo e(route('students.store')); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <section class="section">
        <div class="row">
            <div class="col-12">
                
                <div class="card">
                    <div class="card-header"><h4 class="card-title">1. Datos del Estudiante</h4></div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4"><div class="form-group"><label>Primer Nombre</label>

                                    <input type="text" class="form-control" name="student[first_name]" value="<?php echo e(old('student.first_name')); ?>" required></div>
                            </div>
                            <div class="col-md-4"><div class="form-group"><label>Segundo Nombre</label><input type="text" class="form-control" name="student[middle_name]" value="<?php echo e(old('student.middle_name')); ?>"></div></div>
                            <div class="col-md-4"><div class="form-group"><label>Primer Apellido</label><input type="text" class="form-control" name="student[last_name]" value="<?php echo e(old('student.last_name')); ?>" required></div></div>
                            <div class="col-md-4"><div class="form-group"><label>Segundo Apellido</label><input type="text" class="form-control" name="student[second_last_name]" value="<?php echo e(old('student.second_last_name')); ?>"></div></div>
                            <div class="col-md-4"><div class="form-group"><label>CURP</label><input type="text" class="form-control" name="student[curp]" value="<?php echo e(old('student.curp')); ?>" required></div></div>
                            <div class="col-md-4"><div class="form-group"><label>Género</label><select class="form-select" name="student[gender]"><option value="masculino">Masculino</option><option value="femenino">Femenino</option></select></div></div>
                            <div class="col-md-4"><div class="form-group"><label>Fecha de Nacimiento</label><input type="date" class="form-control flatpickr-calendar" name="student[birth_date]" value="<?php echo e(old('student.birth_date')); ?>" required></div></div>
                            <div class="col-md-8"><div class="form-group"><label>Lugar de Nacimiento</label><input type="text" class="form-control" name="student[birth_place]" value="<?php echo e(old('student.birth_place')); ?>" required></div></div>
                            <div class="col-md-12"><div class="form-group"><label>Dirección</label><textarea class="form-control" name="student[address]" rows="2" style="resize: none;"><?php echo e(old('student.address')); ?></textarea></div></div>
                            <div class="col-md-4"><div class="form-group"><label>Teléfono</label><input type="tel" class="form-control" name="student[phone]" value="<?php echo e(old('student.phone')); ?>"></div></div>
                           
                            <div class="col-md-4"><div class="form-group"><label>Tipo de sangre</label>
                                        <select class="form-select" name="student[blood_type]">
                                            <option value="">Seleccione una opción</option>
                                            <option value="A+">A+</option>
                                            <option value="A-">A-</option>
                                            <option value="B+">B+</option>
                                            <option value="B-">B-</option>
                                            <option value="AB+">AB+</option>
                                            <option value="AB-">AB-</option>
                                            <option value="O+">O+</option>
                                            <option value="O-">O-</option>
                                        </select>
                                </div>
                            </div>
                            <div class="col-md-4"><div class="form-group"><label>Tipo de Discapacidad</label><select class="form-select" name="student[disability_type_id]"><option value="">Ninguna</option><?php $__currentLoopData = $disabilityTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($type->id); ?>" <?php echo e(old('student.disability_type_id') == $type->id ? 'selected' : ''); ?>><?php echo e($type->name); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></div></div>
                            <div class="col-md-4"><div class="form-group"><label>Escuela de Origen</label><input type="text" class="form-control" name="student[origin_school]" value="<?php echo e(old('student.origin_school')); ?>"></div></div>
                            <div class="col-md-3"><div class="form-group"><label>Talla Pantalón</label><input type="text" class="form-control" name="student[pants_size]" value="<?php echo e(old('student.pants_size')); ?>"></div></div>
                            <div class="col-md-3"><div class="form-group"><label>Talla Camisa</label><input type="text" class="form-control" name="student[shirt_size]" value="<?php echo e(old('student.shirt_size')); ?>"></div></div>
                            <div class="col-md-3"><div class="form-group"><label>Talla Zapatos</label><input type="text" class="form-control" name="student[shoe_size]" value="<?php echo e(old('student.shoe_size')); ?>"></div></div>
                            <div class="col-md-3"><div class="form-group"><label>Peso (kg)</label><input type="number" step="0.1" class="form-control" name="student[weight]" value="<?php echo e(old('student.weight')); ?>"></div></div>
                            <div class="col-md-3"><div class="form-group"><label>Altura (m)</label><input type="number" step="0.01" class="form-control" name="student[height]" value="<?php echo e(old('student.height')); ?>"></div></div>
                            <div class="col-md-3"><div class="form-group"><label>Estado</label><select class="form-select" name="student[status]"><option value="activo">Activo</option><option value="inactivo">Inactivo</option><option value="graduado">Graduado</option><option value="baja">Baja</option></select></div></div>
                            <div class="col-md-6"><div class="form-group"><label>Fotografía</label><input type="file" class="form-control" name="student[photo]" accept="image/*"></div></div>
                            <div class="col-md-12"><div class="form-group"><label>Notas Adicionales</label><textarea class="form-control" name="student[notes]" style="resize: none;" rows="4"><?php echo e(old('student.notes')); ?></textarea></div></div>
                        </div>
                    </div>
                </div>

                
                <div class="card">
                    <div class="card-header"><h4 class="card-title">2. Datos de los Tutores</h4></div>
                    <div class="card-body">
                        <div id="guardians-container"></div>
                        <button type="button" id="add-guardian" class="btn btn-outline-primary mt-3">Añadir Tutor</button>
                    </div>
                </div>
                
                <div class="col-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-1 mb-1">Registrar Estudiante</button>
                    <a href="<?php echo e(route('students.index')); ?>" class="btn btn-light-secondary me-1 mb-1">Cancelar</a>
                </div>
            </div>
        </div>
    </section>
</form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
document.addEventListener('DOMContentLoaded', function () {
    let guardianIndex = 0;
    const container = document.getElementById('guardians-container');
    const relationshipTypes = <?php echo json_encode($relationshipTypes, 15, 512) ?>;

    function createRelationshipSelect(selectedIndex) {
        let select = document.createElement('select');
        select.classList.add('form-select');
        select.name = `guardians[${selectedIndex}][relationship_type_id]`;
        select.required = true;
        relationshipTypes.forEach(type => {
            let option = document.createElement('option');
            option.value = type.id;
            option.textContent = type.name;
            select.appendChild(option);
        });
        return select;
    }

    function addGuardianForm() {
        const currentIndex = guardianIndex;
        const newGuardianForm = document.createElement('div');
        newGuardianForm.classList.add('guardian-form', 'mb-4', 'p-3', 'border', 'rounded');
        newGuardianForm.dataset.index = currentIndex;

        const relationshipSelect = createRelationshipSelect(currentIndex);

        newGuardianForm.innerHTML = `
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0">Tutor ${currentIndex + 1}</h5>
                ${currentIndex > 0 ? '<button type="button" class="btn btn-sm btn-danger remove-guardian">Eliminar</button>' : ''}
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label>CURP</label>
                    <div class="input-group">
                        <input type="text" class="form-control curp-input" name="guardians[${currentIndex}][curp]" required>
                        <button class="btn btn-primary search-guardian" type="button">Buscar</button>
                    </div>
                </div>
                <div class="col-md-6"><div class="form-group"><label>Parentesco</label><div class="relationship-select-wrapper"></div></div></div>
                <div class="col-md-4"><div class="form-group"><label>Primer Nombre</label><input type="text" class="form-control" name="guardians[${currentIndex}][first_name]" required></div></div>
                <div class="col-md-4"><div class="form-group"><label>Segundo Nombre</label><input type="text" class="form-control" name="guardians[${currentIndex}][middle_name]"></div></div>
                <div class="col-md-4"><div class="form-group"><label>Primer Apellido</label><input type="text" class="form-control" name="guardians[${currentIndex}][last_name]" required></div></div>
                <div class="col-md-4"><div class="form-group"><label>Segundo Apellido</label><input type="text" class="form-control" name="guardians[${currentIndex}][second_last_name]"></div></div>
                <div class="col-md-4"><div class="form-group"><label>Fecha de Nacimiento</label><input type="date" class="form-control" name="guardians[${currentIndex}][birth_date]" required></div></div>
                <div class="col-md-4"><div class="form-group"><label>Ocupación</label><input type="text" class="form-control" name="guardians[${currentIndex}][occupation]" required></div></div>
                <div class="col-md-4"><div class="form-group"><label>Teléfono</label><input type="tel" class="form-control" name="guardians[${currentIndex}][phone]" required></div></div>
                <div class="col-md-4"><div class="form-group"><label>Email</label><input type="email" class="form-control" name="guardians[${currentIndex}][email]"></div></div>
                <div class="col-md-12"><div class="form-group"><label>Dirección</label><textarea class="form-control" name="guardians[${currentIndex}][address]" style="resize: none;" rows="2"></textarea></div></div>
                <div class="col-md-12">
                    <div class="form-check form-switch"><input class="form-check-input" type="checkbox" name="guardians[${currentIndex}][is_primary_contact]" value="1"><label class="form-check-label">Contacto Principal</label></div>
                    <div class="form-check form-switch"><input class="form-check-input" type="checkbox" name="guardians[${currentIndex}][is_legal_guardian]" value="1"><label class="form-check-label">Tutor Legal</label></div>
                    <div class="form-check form-switch"><input class="form-check-input" type="checkbox" name="guardians[${currentIndex}][lives_with_student]" value="1"><label class="form-check-label">Vive con el estudiante</label></div>
                </div>
            </div>
        `;

        newGuardianForm.querySelector('.relationship-select-wrapper').appendChild(relationshipSelect);
        container.appendChild(newGuardianForm);
        guardianIndex++;
    }

    addGuardianForm();

    document.getElementById('add-guardian').addEventListener('click', addGuardianForm);

    container.addEventListener('click', async function(e) {
        if (e.target.classList.contains('remove-guardian')) {
            e.target.closest('.guardian-form').remove();
        }
        if (e.target.classList.contains('search-guardian')) {
            const form = e.target.closest('.guardian-form');
            const curp = form.querySelector('.curp-input').value;
            if (!curp) {
                alert('Por favor, introduce un CURP para buscar.');
                return;
            }

            try {
                const response = await fetch(`/api/guardians/search/${curp}`);
                if (response.ok) {
                    const guardian = await response.json();
                    form.querySelector(`input[name$="[first_name]"]`).value = guardian.first_name || '';
                    form.querySelector(`input[name$="[middle_name]"]`).value = guardian.middle_name || '';
                    form.querySelector(`input[name$="[last_name]"]`).value = guardian.last_name || '';
                    form.querySelector(`input[name$="[second_last_name]"]`).value = guardian.second_last_name || '';
                    form.querySelector(`input[name$="[birth_date]"]`).value = guardian.birth_date || '';
                    form.querySelector(`input[name$="[occupation]"]`).value = guardian.occupation || '';
                    form.querySelector(`input[name$="[phone]"]`).value = guardian.phone || '';
                    form.querySelector(`input[name$="[email]"]`).value = guardian.email || '';
                    form.querySelector(`textarea[name$="[address]"]`).value = guardian.address || '';
                    alert('Tutor encontrado y datos rellenados.');
                } else {
                    alert('Tutor no encontrado. Por favor, rellena los datos manualmente.');
                }
            } catch (error) {
                console.error('Error al buscar el tutor:', error);
                alert('Ocurrió un error al realizar la búsqueda.');
            }
        }
    });
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel projects\sigeApi\resources\views/students/create.blade.php ENDPATH**/ ?>