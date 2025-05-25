
<?= view('partials/header') ?>
<div class="container mt-5 " >
    <h2>Dar de Baja al Veterinario</h2>
    <fieldset class="mb-4 border p-3 rounded fondocard">
    <div class="alert alert-warning">
        ¿Estás seguro de que deseas dar de baja a <strong><?= esc($veterinario['nombre_apellido']) ?></strong>?
    </div>

    <form action="<?= base_url('veterinarios/baja/' . $veterinario['id']) ?>" method="post" class="mb-3">
        <div class="mb-3">
            <label for="fecha_egreso" class="form-label">Fecha de Egreso:</label>
            <input type="date" name="fecha_egreso" id="fecha_egreso" class="form-control" required value="<?= date('Y-m-d') ?>" max="<?= date('Y-m-d') ?>">
        </div>
    </fieldset>
        <button type="submit" class="btn btn-danger botonescard"> Confirmar Baja</button>
        <a href="<?= base_url('veterinarios/listarParaBaja') ?>" class="btn btn-secondary botones2card">Cancelar</a>
    </form>
</div>
<?= view('partials/footer') ?>