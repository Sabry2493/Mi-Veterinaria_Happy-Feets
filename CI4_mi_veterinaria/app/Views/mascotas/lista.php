
<?= view('partials/header') ?>
<div class="container mt-5 " >
    <h2>Lista de Mascotas</h2>

    <table class="table table-bordered table-striped">
        <thead class="table">
            <tr>
                <th style="background-color:rgba(228, 247, 145, 0.91);">Nombre</th>
                <th style="background-color:rgba(228, 247, 145, 0.91);">Especie</th>
                <th style="background-color:rgba(228, 247, 145, 0.91);">Raza</th>
                <th style="background-color:rgba(228, 247, 145, 0.91);">Nro Registro</th>
                <th style="background-color:rgba(228, 247, 145, 0.91);">Edad</th>
                <?php if ($modo === 'mostrar'): ?>
                    <th style="background-color:rgba(228, 247, 145, 0.91); text-align:center;">Estado</th>
                <?php else: ?>
                    <th style="background-color:rgba(228, 247, 145, 0.91); text-align:center;">Acciones</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($mascotas)): ?>
                <?php foreach ($mascotas as $m): ?>
                    <tr>
                        <td><?= esc($m['nombre']) ?></td>
                        <td><?= esc($m['especie']) ?></td>
                        <td><?= esc($m['raza']) ?></td>
                        <td><?= esc($m['nro_registro']) ?></td>
                        <td><?= esc($m['edad']) ?></td>
                        <?php if ($modo === 'mostrar'): ?>
                            <td style="text-align:center;">
                            
                                <?php
                                    
                                   if (!empty($m['fecha_defuncion'])) {
                                        echo "Fallecida";
                                    } elseif (!empty($m['fecha_venta']) && ($m['adoptada'] == 0)) {
                                        echo "En venta";
                                    } elseif (!empty($m['adoptada']) && $m['adoptada'] == 1) {
                                        echo "Adoptada";
                                    } else {
                                        echo "Activa con dueño";
                                    }
                                    ?>
                            </td>
                            <?php else: ?>
                                <td style="text-align:center;">
                                <a href="<?= base_url('mascotas/editar/' . $m['id']) ?>" class="btn btn-sm btn-warning"> Modificar </a>
                                </td>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center">No hay mascotas registradas.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <p><a href="<?= base_url('/') ?>" class="btn btn-secondary botones2card">Volver al Menú Principal</a></p>
</div>
<?= view('partials/footer') ?>