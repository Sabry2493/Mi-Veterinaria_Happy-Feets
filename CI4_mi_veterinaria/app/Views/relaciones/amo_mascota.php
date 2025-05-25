
<!--Listado baja relacion Amo mascota-->
<?= $this->include('partials/header') ?>

<div class="container mt-5">
    <h2 class="mb-4">Baja de relaciones Amo - Mascota</h2>

    <table class="table table-bordered table-striped">
        <thead class="table">
            <tr>
                <th style="background-color:rgba(228, 247, 145, 0.91);">Amo</th>
                <th style="background-color:rgba(228, 247, 145, 0.91);">Mascota</th>
                <th style="background-color:rgba(228, 247, 145, 0.91);">Fecha Inicio</th>
                <th style="background-color:rgba(228, 247, 145, 0.91);">Fecha Fin</th>
                <th style="background-color:rgba(228, 247, 145, 0.91);">Motivo</th>
                <th style="background-color:rgba(228, 247, 145, 0.91);text-align:center;">Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($relaciones as $rel): ?>
                <tr>
                    <td><?= esc($rel['nombre_amo']) ?></td>
                    <td><?= esc($rel['nombre_mascota']) ?></td>
                    <td><?= esc($rel['fecha_inicio']) ?></td>
                    <td><?= esc($rel['fecha_fin'] ?? '-') ?></td>
                    <td><?= $rel['fecha_fin'] ? esc($rel['motivo']) : '-' ?></td>
                    <td style="text-align:center;">
                        <?php if (!$rel['fecha_fin']): ?>
                            <!-- <a href="<?= base_url('relaciones/baja/' . $rel['id']) ?>" class="btn btn-danger btn-sm">🗑️ Baja</a> -->
                            <a href="<?= base_url('relaciones/baja/' . $rel['id']) ?>" class="btn btn-danger btn-sm"> Baja</a>
                        <?php else: ?>
                            <span class="text-muted">Finalizada</span>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="<?= base_url('/') ?>" class="btn btn-secondary botones2card">Volver al Menú Principal</a>
</div>

<?= $this->include('partials/footer') ?>