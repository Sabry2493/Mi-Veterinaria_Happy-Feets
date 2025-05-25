<?= $this->include('partials/header') ?>

<div class="container mt-5 " >
    <h2 class="mb-4">Alta de Amo</h2>
    <?php if (session()->has('error')): ?>
        <div class="alert alert-danger"><?= session('error') ?></div>
    <?php endif; ?>
    <form method="post" action="<?= base_url('amos/guardar') ?>">
        <fieldset class="mb-4 border p-3 rounded fondocard">
            <legend class="float-none w-auto px-2 rounded">Datos del Amo</legend>

            <div class="mb-3">
                <label class="form-label">Nombre y Apellido:</label>
                <input type="text" name="nombre_amo" class="form-control" required pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ ]+" minlength="8">
            </div>

            <div class="mb-3">
                <label class="form-label">Dni:</label>
                <input type="text" name="dni" class="form-control" required pattern="[0-9]{8}" maxlength="8">
            </div>

            <div class="mb-3">
                <label class="form-label">Dirección:</label>
                <input type="text" name="direccion" class="form-control" required minlength="5">
            </div>

            <div class="mb-3">
                <label class="form-label">Teléfono:</label>
                <input type="tel" name="telefono" class="form-control" pattern="[0-9]{10,}" maxlength="13" required placeholder="(Cod)XXX(Num)XXXXXX">
            </div>

            <div class="mb-3">
                <label class="form-label">Fecha de Alta:</label>
                <input type="date" name="fecha_alta_amo" class="form-control" value="<?= date('Y-m-d') ?>" max="<?= date('Y-m-d') ?>">
            </div>
        </fieldset>

        <button type="submit" class="btn btn-primary botonescard">Registrar Amo</button>
        <a href="<?= base_url('/') ?>" class="btn btn-secondary ms-2 botones2card"> Volver al Menú Principal</a>
    </form>
</div>

<?= $this->include('partials/footer') ?>