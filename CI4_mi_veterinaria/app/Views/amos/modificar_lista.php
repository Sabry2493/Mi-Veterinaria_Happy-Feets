<!-- <h2>Seleccionar Amo a Modificar</h2>
<ul>
<?php foreach ($amos as $amo): ?>
    <li>
        <?= esc($amo['nombre_apellido']) ?> -
        <a href="<?= base_url('amos/editar/' . $amo['id']) ?>">Modificar</a>
    </li>
<?php endforeach; ?>
</ul> -->
<?= view('partials/header') ?>

<div class="container mt-5">
    <h2>Seleccionar Amo a Modificar</h2>
    <table class="table table-bordered table-striped">
    <thead class="table">
        <tr>
             <th style="background-color:rgba(228, 247, 145, 0.91);text-align:center;">Nombre y Apellido</th>
             <th style="background-color:rgba(228, 247, 145, 0.91);"></th>
        </tr>
    </thead>
    <tbody>
    <?php if (!empty($amos)): ?>
        <?php foreach ($amos as $amo): ?>
        <tr>
             
            <td style="text-align:center;"> <?= esc($amo['nombre_apellido']) ?></td>
            <td style="text-align:center;"><a href="<?= base_url('amos/editar/' . $amo['id']) ?>" class="btn btn-sm btn-warning">Modificar</a></td>
            
            
        </tr>
        <?php endforeach; ?>
        
    <?php else: ?>
        <p class="mt-3">No hay amos registrados para modificar.</p>
    <?php endif; ?>
    </tbody>
    </table>
    <a href="<?= base_url('/') ?>" class="btn btn-secondary mt-4 botones2card"> Volver al Menú</a>
</div>

<?= view('partials/footer') ?>