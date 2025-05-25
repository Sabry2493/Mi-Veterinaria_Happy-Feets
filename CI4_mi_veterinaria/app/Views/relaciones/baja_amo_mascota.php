
<?= $this->include('partials/header') ?>

<div class="container mt-5">
    <h2 class="mb-4">Baja de relación Amo - Mascota</h2>
    <fieldset class="mb-4 border p-3 rounded fondocard">
        <div class="mb-3">
            <p><strong>Amo:</strong> <?= esc($relacion['nombre_amo']) ?></p>
            <p><strong>Mascota:</strong> <?= esc($relacion['nombre_mascota']) ?></p>
        </div>

        <form method="post" action="<?= base_url('relaciones/procesarBaja/' . $relacion['id']) ?>">
            <div class="mb-3">
                <label class="form-label">Motivo de baja:</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="motivo" value="venta" id="venta" required>
                    <label class="form-check-label" for="venta">Venta</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="motivo" value="fallecimiento" id="fallecimiento" required>
                    <label class="form-check-label" for="fallecimiento">Fallecimiento</label>
                </div>
            </div>

            <div class="mb-3">
                <label for="fecha_fin" class="form-label">Fecha de fin de la relación:</label>
                <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" value="<?= date('Y-m-d') ?>" required>
            </div>
    </fieldset>
            <button type="submit" class="btn btn-danger botonescard">Confirmar Baja</button>
            <a href="<?= base_url('/') ?>" class="btn btn-secondary ms-2 botones2card">Volver al Menú Principal</a>
        </form>
    
</div>

<?= $this->include('partials/footer') ?>