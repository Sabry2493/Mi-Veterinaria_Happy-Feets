
<?= view('partials/header') ?>

<div class="container mt-5">
    <h2 class="mb-4">Registrar Visita Veterinaria</h2>

    <form action="<?= base_url('relaciones/guardar_visita') ?>" method="post">
        <fieldset class="mb-4 border p-3 rounded fondocard">
            
            <div class="mb-3">
                <label for="id_veterinario" class="form-label">Veterinario:</label>
                <select name="id_veterinario" id="id_veterinario" class="form-select" required>
                    <option value="">Seleccione...</option>
                    <?php foreach ($veterinarios as $v): ?>
                        <?php if (empty($v['fecha_egreso'])): ?>
                            <option value="<?= $v['id'] ?>"><?= esc($v['nombre_apellido']) ?> (<?= esc($v['especialidad']) ?>)</option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="id_mascota" class="form-label">Mascota:</label>
                <select name="id_mascota" id="id_mascota" class="form-select" required>
                    <option value="">Seleccione...</option>
                    <?php foreach ($mascotas as $m): ?>
                        <option value="<?= $m['id'] ?>"><?= esc($m['nombre']) ?> (<?= esc($m['especie']) ?>)</option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="fecha_atencion" class="form-label">Fecha de Atención:</label>
                <input type="datetime-local" name="fecha_atencion" id="fecha_atencion" class="form-control" value="<?= date('Y-m-d H:i:s') ?>" required max="<?= date('Y-m-d H:i:s') ?>" required>
            </div>

            <div class="mb-3">
                <label for="diagnostico" class="form-label">Diagnóstico:</label>
                <textarea name="diagnostico" id="diagnostico" class="form-control" rows="4" minlength="13" required></textarea>
            </div>
        </fieldset>

        <button type="submit" class="btn btn-success botonescard">Registrar Visita</button>
        <a href="<?= base_url('/') ?>" class="btn btn-secondary ms-2 botones2card">Volver al Menú</a>
    </form>
</div>

<?= view('partials/footer') ?>