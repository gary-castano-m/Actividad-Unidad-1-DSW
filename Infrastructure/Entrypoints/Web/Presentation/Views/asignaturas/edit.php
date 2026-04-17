<?php require __DIR__ . '/../layouts/header.php'; ?>
<?php require __DIR__ . '/../layouts/menu.php'; ?>

<h1>Editar Asignatura</h1>

<?php if (!empty($message)): ?>
    <div class="alert-error">
        <?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?>
    </div>
<?php endif; ?>

<form method="POST" action="?route=asignaturas.update">
    <input type="hidden" name="id" value="<?= htmlspecialchars($old['id'] ?? $asignatura->getId(), ENT_QUOTES, 'UTF-8') ?>">

    <div class="form-group">
        <label for="nombre">Nombre</label><br>
        <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($old['nombre'] ?? $asignatura->getNombre(), ENT_QUOTES, 'UTF-8') ?>">
        <?php if (!empty($errors['nombre'])): ?>
            <div class="field-error">
                <?= htmlspecialchars($errors['nombre'], ENT_QUOTES, 'UTF-8') ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="nombreCompleto">Nombre Completo</label><br>
        <input type="text" id="nombreCompleto" name="nombreCompleto" value="<?= htmlspecialchars($old['nombreCompleto'] ?? $asignatura->getNombreCompleto(), ENT_QUOTES, 'UTF-8') ?>">
        <?php if (!empty($errors['nombreCompleto'])): ?>
            <div class="field-error">
                <?= htmlspecialchars($errors['nombreCompleto'], ENT_QUOTES, 'UTF-8') ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="descripcion">Descripción</label><br>
        <textarea id="descripcion" name="descripcion"><?= htmlspecialchars($old['descripcion'] ?? $asignatura->getDescripcion(), ENT_QUOTES, 'UTF-8') ?></textarea>
        <?php if (!empty($errors['descripcion'])): ?>
            <div class="field-error">
                <?= htmlspecialchars($errors['descripcion'], ENT_QUOTES, 'UTF-8') ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="areaConocimiento">Área de Conocimiento</label><br>
        <input type="text" id="areaConocimiento" name="areaConocimiento" value="<?= htmlspecialchars($old['areaConocimiento'] ?? $asignatura->getAreaConocimiento(), ENT_QUOTES, 'UTF-8') ?>">
        <?php if (!empty($errors['areaConocimiento'])): ?>
            <div class="field-error">
                <?= htmlspecialchars($errors['areaConocimiento'], ENT_QUOTES, 'UTF-8') ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="carrera">Carrera</label><br>
        <input type="text" id="carrera" name="carrera" value="<?= htmlspecialchars($old['carrera'] ?? $asignatura->getCarrera(), ENT_QUOTES, 'UTF-8') ?>">
        <?php if (!empty($errors['carrera'])): ?>
            <div class="field-error">
                <?= htmlspecialchars($errors['carrera'], ENT_QUOTES, 'UTF-8') ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="numeroCreditos">Número de Créditos</label><br>
        <input type="number" id="numeroCreditos" name="numeroCreditos" value="<?= htmlspecialchars($old['numeroCreditos'] ?? $asignatura->getNumeroCreditos(), ENT_QUOTES, 'UTF-8') ?>">
        <?php if (!empty($errors['numeroCreditos'])): ?>
            <div class="field-error">
                <?= htmlspecialchars($errors['numeroCreditos'], ENT_QUOTES, 'UTF-8') ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="contenidoTematico">Contenido Temático</label><br>
        <textarea id="contenidoTematico" name="contenidoTematico"><?= htmlspecialchars($old['contenidoTematico'] ?? $asignatura->getContenidoTematico(), ENT_QUOTES, 'UTF-8') ?></textarea>
        <?php if (!empty($errors['contenidoTematico'])): ?>
            <div class="field-error">
                <?= htmlspecialchars($errors['contenidoTematico'], ENT_QUOTES, 'UTF-8') ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="semestre">Semestre</label><br>
        <input type="number" id="semestre" name="semestre" value="<?= htmlspecialchars($old['semestre'] ?? $asignatura->getSemestre(), ENT_QUOTES, 'UTF-8') ?>">
        <?php if (!empty($errors['semestre'])): ?>
            <div class="field-error">
                <?= htmlspecialchars($errors['semestre'], ENT_QUOTES, 'UTF-8') ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="profesor">Profesor</label><br>
        <input type="text" id="profesor" name="profesor" value="<?= htmlspecialchars($old['profesor'] ?? $asignatura->getProfesor(), ENT_QUOTES, 'UTF-8') ?>">
        <?php if (!empty($errors['profesor'])): ?>
            <div class="field-error">
                <?= htmlspecialchars($errors['profesor'], ENT_QUOTES, 'UTF-8') ?>
            </div>
        <?php endif; ?>
    </div>

    <button type="submit" class="btn btn-primary">Guardar cambios</button>
    &nbsp;
    <a class="btn" href="?route=asignaturas.index">Cancelar</a>
</form>

<?php require __DIR__ . '/../layouts/footer.php'; ?>
