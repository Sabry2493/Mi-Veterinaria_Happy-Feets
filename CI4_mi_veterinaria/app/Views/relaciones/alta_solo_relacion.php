
<?= $this->include('partials/header') ?>

<div class="container mt-5">
    <h2 class="mb-4">Alta Relación Amo - Mascota</h2>

    <form action="<?= base_url('relaciones/guardarRelacion') ?>" method="post">
        
        <fieldset class="mb-4 border p-3 rounded fondocard">
           <!--  <legend class="float-none w-auto px-2">Ingrese los datos</legend> -->

        <div class="mb-3">
            <label for="id_amo" class="form-label">Amo:</label>
            <select name="id_amo" id="id_amo" class="form-select" required>
                <option value="">Seleccionar...</option>
                <?php foreach ($amos as $amo): ?>
                    <option value="<?= $amo['id'] ?>"><?= esc($amo['nombre_apellido']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="id_mascota" class="form-label">Mascota:</label>
            <select name="id_mascota" id="id_mascota" class="form-select" required>
                <option value="">Seleccionar...</option>
                <?php foreach ($mascotas as $mascota): ?>
                    <option value="<?= $mascota['id'] ?>"><?= esc($mascota['nombre']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="fecha_inicio" class="form-label">Fecha de inicio:</label>
            <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" value="<?= date('Y-m-d') ?>" required max="<?= date('Y-m-d') ?>">
        </div>
        </fieldset>

        <button type="submit" class="btn btn-primary botonescard">Guardar relación</button>
        <a href="<?= base_url('/') ?>" class="btn btn-secondary ms-2 botones2card"> Volver al Menú Principal</a>
    </form>
</div>

<?= $this->include('partials/footer') ?>