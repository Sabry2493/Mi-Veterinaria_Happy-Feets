
<?= view('partials/header') ?>
<div class="container mt-5">
<h2>Editar Mascota</h2>

    <form action="<?= base_url('mascotas/actualizar/' . $mascota['id']) ?>" method="post">
        <fieldset class="mb-4 border p-3 rounded fondocard">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" name="nombre" id="nombre" value="<?= esc($mascota['nombre']) ?>" class="form-control" required pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ ]+" minlength="3">
            </div>

           
            <div class="mb-3">
                <label for="especie" class="form-label">Seleccione Especie :</label>
                <select name="especie" id="especie" required class="form-control" onchange="toggleOtraEspecie()">
                    <option value="<?= esc($mascota['especie']) ?>"><?= esc($mascota['especie']) ?></option>
                    <option value="Can">Can</option>
                    <option value="Felino">Felino</option>
                    <option value="Reptil">Reptil</option>
                    <option value="Conejo">Conejo</option>
                    <option value="Ave">Ave</option>
                    <option value="Cerdo">Cerdo</option>
                    <option value="Roedor">Roedor</option>
                    <option value="Otra">Otra</option> 
                </select>
            </div>
            <!-- INPUT PARA OTRA ESPECIE -->
            <div id="otra-especie-container" class="mb-3" style="display: none;">
                <label class="form-label">Especifique la especie:</label>
                <input type="text" name="otra_especie" class="form-control" pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ ]+">
            </div>
            <div class="mb-3">
                <label for="raza" class="form-label">Raza:</label>
                <input type="text" name="raza" id="raza" value="<?= esc($mascota['raza']) ?>" class="form-control" required pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ ]+" minlength="4">
            </div>

            <div class="mb-3">
                <label for="nro_registro" class="form-label">Nro Registro:</label>
                <input type="text" name="nro_registro" id="nro_registro" value="<?= esc($mascota['nro_registro']) ?>" class="form-control" readonly>
            </div>

            <div class="mb-3">
                <label for="edad" class="form-label">Edad:</label>
                <input type="number" name="edad" id="edad" value="<?= esc($mascota['edad']) ?>" class="form-control" required>
            </div>
        </fieldset>
        <button type="submit" class="btn btn-primary botonescard">Guardar Cambios</button>
        <a href="<?= base_url('mascotas') ?>" class="btn btn-secondary botones2card">Cancelar</a>
    </form>
</div>
<?= view('partials/footer') ?>