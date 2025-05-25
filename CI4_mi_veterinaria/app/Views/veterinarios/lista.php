
<?php
$modo = $modo ?? 'ver'; // ver, baja, modificar
?>

<?= view('partials/header') ?>
<div class="lista-veterinariofondo text-white p-5 mt-0 ">
    <div class="container mt-5 " >
        <h2 class="mt-4">
            <?php if ($modo === 'baja'): ?>
                Baja de Veterinarios
            <?php elseif ($modo === 'modificar'): ?>
                Modificación de Veterinarios
            <?php else: ?>
                Lista de Veterinarios
            <?php endif; ?>
        </h2>

        <?php if ($modo === 'ver'): ?>
            <p>
                <a href="<?= base_url('veterinarios/crear') ?>" class="btn btn-success my-2" >
                    Agregar Veterinario
                </a>
            </p>
        <?php endif; ?>
    </div>
</div>
<div class="container mt-0 " >
    <table class="table table-bordered table-striped">
        <thead class="table" >
            <tr >
                <th style="background-color:rgba(228, 247, 145, 0.91);">Nombre</th>
                <th style="background-color:rgba(228, 247, 145, 0.91);">Matrícula</th>
                <th style="background-color:rgba(228, 247, 145, 0.91);">Especialidad</th>
                <th style="background-color:rgba(228, 247, 145, 0.91);">Teléfono</th>
                <th style="background-color:rgba(228, 247, 145, 0.91);">Fecha Ingreso</th>
                <th style="background-color:rgba(228, 247, 145, 0.91);">Fecha Egreso</th>
                <th style="background-color:rgba(228, 247, 145, 0.91);"><?= $modo !== 'ver' ? 'Acción' : 'Acciones' ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($veterinarios as $v): ?>
                <tr>
                    <td><?= esc($v['nombre_apellido']) ?></td>
                    <td><?= esc($v['matricula']) ?></td>
                    <td><?= esc($v['especialidad']) ?></td>
                    <td><?= esc($v['telefono_personal']) ?></td>
                    <td><?= esc($v['fecha_ingreso']) ?></td>
                    <td><?= esc($v['fecha_egreso']) ?: '-' ?></td>
                    <td>
                        <?php if ($modo === 'ver'): ?>
                            <a href="<?= base_url('veterinarios/mascotas/' . $v['id']) ?>" class="btn btn-sm btn-info">🐶 Ver Mascotas</a>
                        <?php elseif ($modo === 'editar'): ?>
                            <a href="<?= base_url('veterinarios/editar/' . $v['id']) ?>" class="btn btn-sm btn-warning">Modificar</a>
                        <?php elseif ($modo === 'baja'): ?>
                            <?php if (empty($v['fecha_egreso'])): ?>
                                <a href="<?= base_url('veterinarios/confirmarBaja/' . $v['id']) ?>" class="btn btn-sm btn-danger">Dar de Baja</a>
                            <?php else: ?>
                                <span class="text-secondary">🟠 Ya dado de baja</span>
                            <?php endif; ?>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="<?= base_url('/') ?>" class="btn btn-secondary botones2card"> Volver al Menú</a>
</div >
<?= view('partials/footer') ?>