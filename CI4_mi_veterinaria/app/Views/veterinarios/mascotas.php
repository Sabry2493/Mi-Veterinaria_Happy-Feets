
<?= view('partials/header') ?>
<div class="container mt-5 " >
    <h2>Mascotas atendidas por <?= esc($veterinario['nombre_apellido']) ?></h2>
    
        <?php if (!empty($mascotas)): ?>
            <table class="table table-bordered table-striped">
                <thead class="table-primary">
                    <tr>
                        <th style="background-color:rgba(228, 247, 145, 0.91);">Nombre</th>
                        <th style="background-color:rgba(228, 247, 145, 0.91);">Especie</th>
                        <th style="background-color:rgba(228, 247, 145, 0.91);">Raza</th>
                        <th style="background-color:rgba(228, 247, 145, 0.91);">Registro</th>
                        <th style="background-color:rgba(228, 247, 145, 0.91);">Edad</th>
                        <th style="background-color:rgba(228, 247, 145, 0.91);">Fecha de Atención</th>
                        <th style="background-color:rgba(228, 247, 145, 0.91);">Diagnóstico</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($mascotas as $m): ?>
                        <tr>
                            <td><?= esc($m['nombre']) ?></td>
                            <td><?= esc($m['especie']) ?></td>
                            <td><?= esc($m['raza']) ?></td>
                            <td><?= esc($m['nro_registro']) ?></td>
                            <td><?= esc($m['edad']) ?></td>
                            <td><?= esc($m['fecha_atencion']) ?></td>
                            <td><?= nl2br(esc($m['diagnostico'])) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="alert alert-warning">Este veterinario aún no ha atendido mascotas.</div>
        <?php endif; ?>
    
    <p><a href="<?= base_url('veterinarios') ?>" class="btn btn-secondary botones2card"> Volver a Veterinarios</a></p>
</div>
<?= view('partials/footer') ?>