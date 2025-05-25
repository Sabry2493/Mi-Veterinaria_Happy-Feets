

<?= view('partials/header') ?>  
<div class="lista-mascotasfondo text-white p-5 mt-0 tabla-superpuesta">
    
    <div class="container p-5 mt-0" >
        <h2>Listado de Mascotas</h2>

        <form method="get" action="<?= base_url('relaciones/ver_mascotas_por_amo') ?>" class="mb-4">
            <label for="amo_id" class="form-label">Filtrar por Amo:</label>
            <select name="amo_id" id="amo_id" class="form-select w-auto d-inline-block" onchange="this.form.submit()">
                <option value="">-- Ver todas --</option>
                <?php foreach ($amos as $a): ?>
                    <option value="<?= $a['id'] ?>" <?= ($a['id'] == $amoSeleccionado) ? 'selected' : '' ?>>
                        <?= esc($a['nombre_apellido']) ?>
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
                    <th style="background-color:rgba(228, 247, 145, 0.91);">Nombre</th>
                    <th style="background-color:rgba(228, 247, 145, 0.91);">Especie</th>
                    <th style="background-color:rgba(228, 247, 145, 0.91);">Raza</th>
                    <th style="background-color:rgba(228, 247, 145, 0.91);">Nro Registro</th>
                    <th style="background-color:rgba(228, 247, 145, 0.91);">Edad</th>
                    <?php if ($amoSeleccionado): ?>
                        <th style="background-color:rgba(228, 247, 145, 0.91);">Fecha Alta Relación</th>
                        <th style="background-color:rgba(228, 247, 145, 0.91);">Fecha Baja</th>
                        <th style="background-color:rgba(228, 247, 145, 0.91);">Motivo Baja</th>
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
                            <?php if ($amoSeleccionado): ?>
                                <td><?= esc($m['fecha_inicio'] ?? '-') ?></td>
                                <td><?= esc($m['fecha_fin'] ?? '-') ?></td>
                                <td><?= esc($m['motivo'] ?? '-') ?></td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="<?= $amoSeleccionado ? 8 : 5 ?>" class="text-center">No se encontraron mascotas.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <p><a href="<?= base_url('/') ?>" class="btn btn-secondary botones2card"> Volver al menú</a></p>
</div>


<?= view('partials/footer') ?>