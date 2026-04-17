<?php require __DIR__ . '/../layouts/header.php'; ?>
<?php require __DIR__ . '/../layouts/menu.php'; ?>

<h1>Lista de Asignaturas</h1>

<?php if (empty($asignaturas)): ?>
    <p>No hay asignaturas registradas todavía.</p>
<?php else: ?>
    <table border="1" cellpadding="8" cellspacing="0" style="border-collapse:collapse">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Nombre Completo</th>
                <th>Área</th>
                <th>Créditos</th>
                <th>Semestre</th>
                <th>Profesor</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($asignaturas as $asignatura): ?>
                <tr>
                    <td><?= htmlspecialchars($asignatura->getId(), ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($asignatura->getNombre(), ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($asignatura->getNombreCompleto(), ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($asignatura->getAreaConocimiento(), ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($asignatura->getNumeroCreditos(), ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($asignatura->getSemestre(), ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($asignatura->getProfesor(), ENT_QUOTES, 'UTF-8') ?></td>
                    <td>
                        <a class="btn btn-sm" href="?route=asignaturas.show&id=<?= urlencode($asignatura->getId()) ?>">Ver</a>
                        <a class="btn btn-sm btn-warning" href="?route=asignaturas.edit&id=<?= urlencode($asignatura->getId()) ?>">Editar</a>
                        <form method="POST" action="?route=asignaturas.delete" style="display:inline" onsubmit="return confirm('¿Eliminar esta asignatura?')">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($asignatura->getId(), ENT_QUOTES, 'UTF-8') ?>">
                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

<?php require __DIR__ . '/../layouts/footer.php'; ?>
