
<?= view('partials/header') ?>
<div class="lista-amosfondo text-white pt-0 p-4 mt-0">
    <div class="container p-5 mt-2">
        <h2>Listado de Amos</h2>

        <form method="get" action="<?= base_url('relaciones/ver_amos_por_mascota') ?>" class="mb-4">
            <label for="mascota_id" class="form-label">Filtrar por Mascota:</label>
            <select name="mascota_id" id="mascota_id" class="form-select w-auto d-inline-block" onchange="this.form.submit()">
                <option value="">-- Ver todos --</option>
                <?php foreach ($mascotas as $m): ?>
                    <option value="<?= $m['id'] ?>" <?= ($m['id'] == $mascotaSeleccionada) ? 'selected' : '' ?>>
                        <?= esc($m['nombre']) ?> (<?= esc($m['nro_registro']) ?>)
                    </option>
                <?php endforeach; ?>
            </select>
        </form>
    </div>
</div>
<div class="container mt-0 " >
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table">
                <tr>
                    <th style="background-color:rgba(228, 247, 145, 0.91);">Nombre y Apellido</th>
                    <th style="background-color:rgba(228, 247, 145, 0.91);">DNI</th>
                    <th style="background-color:rgba(228, 247, 145, 0.91);">Dirección</th>
                    <th style="background-color:rgba(228, 247, 145, 0.91);">Teléfono</th>
                    <?php if ($mascotaSeleccionada): ?>
                        <th style="background-color:rgba(228, 247, 145, 0.91);">Fecha Inicio</th>
                        <th style="background-color:rgba(228, 247, 145, 0.91);">Fecha Fin</th>
                        <th style="background-color:rgba(228, 247, 145, 0.91);">Motivo Baja</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($amos)): ?>
                    <?php foreach ($amos as $a): ?>
                        <tr>
                            <td><?= esc($a['nombre_apellido']) ?></td>
                            <td><?= esc($a['dni']) ?></td>
                            <td><?= esc($a['direccion']) ?></td>
                            <td><?= esc($a['telefono']) ?></td>
                            <?php if ($mascotaSeleccionada): ?>
                                <td><?= esc($a['fecha_inicio']) ?></td>
                                <td><?= esc($a['fecha_fin'] ?? '-') ?></td>
                                <td><?= esc($a['motivo'] ?? '-') ?></td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="<?= $mascotaSeleccionada ? 7 : 4 ?>" class="text-center">No se encontraron amos para esta mascota.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <p><a href="<?= base_url('/') ?>" class="btn btn-secondary botones2card"> Volver al menú</a></p>
</div>

<?= view('partials/footer') ?>