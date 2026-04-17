<?php require __DIR__ . '/../layouts/header.php'; ?>
<?php require __DIR__ . '/../layouts/menu.php'; ?>

<h1>Detalle de Asignatura</h1>

<?php if (!empty($message)): ?>
    <div class="alert-error">
        <?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?>
    </div>
<?php endif; ?>

<table class="detail-table">
    <tr>
        <th>ID</th>
        <td><?= htmlspecialchars($asignatura->getId(), ENT_QUOTES, 'UTF-8') ?></td>
    </tr>
    <tr>
        <th>Nombre</th>
        <td><?= htmlspecialchars($asignatura->getNombre(), ENT_QUOTES, 'UTF-8') ?></td>
    </tr>
    <tr>
        <th>Nombre Completo</th>
        <td><?= htmlspecialchars($asignatura->getNombreCompleto(), ENT_QUOTES, 'UTF-8') ?></td>
    </tr>
    <tr>
        <th>Descripción</th>
        <td><?= htmlspecialchars($asignatura->getDescripcion(), ENT_QUOTES, 'UTF-8') ?></td>
    </tr>
    <tr>
        <th>Área de Conocimiento</th>
        <td><?= htmlspecialchars($asignatura->getAreaConocimiento(), ENT_QUOTES, 'UTF-8') ?></td>
    </tr>
    <tr>
        <th>Carrera</th>
        <td><?= htmlspecialchars($asignatura->getCarrera(), ENT_QUOTES, 'UTF-8') ?></td>
    </tr>
    <tr>
        <th>Número de Créditos</th>
        <td><?= htmlspecialchars($asignatura->getNumeroCreditos(), ENT_QUOTES, 'UTF-8') ?></td>
    </tr>
    <tr>
        <th>Contenido Temático</th>
        <td><?= htmlspecialchars($asignatura->getContenidoTematico(), ENT_QUOTES, 'UTF-8') ?></td>
    </tr>
    <tr>
        <th>Semestre</th>
        <td><?= htmlspecialchars($asignatura->getSemestre(), ENT_QUOTES, 'UTF-8') ?></td>
    </tr>
    <tr>
        <th>Profesor</th>
        <td><?= htmlspecialchars($asignatura->getProfesor(), ENT_QUOTES, 'UTF-8') ?></td>
    </tr>
</table>

<p style="margin-top: 16px;">
    <a class="btn btn-warning" href="?route=asignaturas.edit&amp;id=<?= urlencode($asignatura->getId()) ?>">Editar</a>
    &nbsp;
    <a class="btn" href="?route=asignaturas.index">Volver al listado</a>
</p>

<?php require __DIR__ . '/../layouts/footer.php'; ?>
