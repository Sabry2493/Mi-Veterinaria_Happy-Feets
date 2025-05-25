
<?= view('partials/header') ?>

<div class="container mt-5">
    <h2>Modificar Datos del Amo</h2>
        
        <form method="post" action="<?= base_url('amos/modificar/guardar') ?>" class="mt-4">
           <fieldset class="mb-4 border p-3 rounded fondocard">
                <input type="hidden" name="id" value="<?= $amo['id'] ?>">

                <div class="mb-3">
                    <label for="nombre_apellido" class="form-label">Nombre y Apellido:</label>
                    <input type="text" name="nombre_apellido" id="nombre_apellido" class="form-control" value="<?= esc($amo['nombre_apellido']) ?>" required pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ ]+" minlength="8">
                </div>

                <div class="mb-3">
                    <label for="direccion" class="form-label">Dirección:</label>
                    <input type="text" name="direccion" id="direccion" class="form-control" value="<?= esc($amo['direccion']) ?>" required minlength="5">
                </div>

                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono:</label>
                    <input type="text" name="telefono" id="telefono" class="form-control" value="<?= esc($amo['telefono']) ?>" required pattern="[0-9]{10,}" maxlength="13" placeholder="(Cod)XXX(Num)XXXXXX">
                </div>  
            </fieldset>
            <button type="submit" class="btn btn-primary botonescard">Guardar Cambios</button>
            <a href="<?= base_url('/amos/modificar') ?>" class="btn btn-secondary ms-2 botones2card">Cancelar</a>
        </form>
    
</div>

<?= view('partials/footer') ?>