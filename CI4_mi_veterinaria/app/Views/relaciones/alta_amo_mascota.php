<?= $this->include('partials/header') ?>

<div class="container mt-5 " >
    <h2 class="mb-4">Alta de Amo - Mascota</h2>
    <form method="post" action="<?= base_url('relaciones/guardar_alta') ?>">
        <fieldset class="mb-4 border p-3 rounded fondocard">
            <legend class="float-none w-auto px-2 rounded" >Datos del Amo</legend>

            <div class="mb-3">
                <label class="form-label" >Nombre y Apellido:</label>
                <input type="text" name="nombre_amo" class="form-control" required pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ ]+" minlength="8">
            </div>
            <div class="mb-3">
                 <label for="dni" class="form-label">Dni:</label>
                 <input type="text" name="dni" id="dni" class="form-control" required pattern="[0-9]{8}" maxlength="8">
                 <button type="button" class="btn btn-outline-light mt-2" id="btn-comprobar-mascotas" data-url="<?= base_url('relaciones/comprobar_mascotas') ?>" >
                    Comprobar mascotas del DNI </button> 
            </div>
             <!-- div que mostrará resultados -->
                <div class="rounded" id="resultado-mascotas" style="display:none;margin:30px;margin-top: 2px;margin-bottom: 4px; padding: 10px;color:white;background: rgba(223, 199, 93, 0.4);">
                    <h5>Mascotas asociadas a este DNI:</h5>
                    <ul id="lista-mascotas"></ul>
                </div>  
            


            <div class="mb-3">
                <label class="form-label">Dirección:</label>
                <input type="text" name="direccion" class="form-control" required minlength="5">
            </div>

            <div class="mb-3">
                <label class="form-label">Teléfono:</label>
                <input type="text" name="telefono" class="form-control" pattern="[0-9]{10,}" required maxlength="13"  placeholder="(Cod)XXX(Num)XXXXXX">
            </div>

            <div class="mb-3">
                <label class="form-label">Fecha de Alta:</label>
                <input type="date" name="fecha_alta_amo" class="form-control" value="<?= date('Y-m-d') ?>" max="<?= date('Y-m-d') ?>">
            </div>
        </fieldset>

        <fieldset class="mb-4 border p-3 rounded fondocard ">
            <legend class="float-none w-auto px-2 rounded">Datos de la Mascota</legend>

            <div class="mb-3">
                <label class="form-label">Nombre:</label>
                <input type="text" name="nombre_mascota" class="form-control" required  pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ ]+" minlength="3">
            </div>

            <div class="mb-3">
                <label class="form-label">Especie:</label>
                <select name="especie" id="especie" required class="form-control" onchange="toggleOtraEspecie()">
                    <option value=" ">Seleccione especie</option>
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
                <label class="form-label">Raza:</label>
                <input type="text" name="raza" class="form-control" pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ ]+" minlength="4">
            </div>

            <!-- <div class="mb-3">
                <label class="form-label">Nro. Registro:</label>
                <input type="text" name="nro_registro" class="form-control">
            </div> -->

            <div class="mb-3">
                <label class="form-label">Edad:</label>
                <input type="number" name="edad" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Fecha de Alta:</label>
                <input type="date" name="fecha_alta_mascota" class="form-control" value="<?= date('Y-m-d') ?>" max="<?= date('Y-m-d') ?>">
            </div>
        </fieldset>

        <button type="submit" class="btn btn-primary botonescard">Registrar Amo y Mascota</button>
        <a href="<?= base_url('/') ?>" class="btn btn-secondary ms-2 botones2card"> Volver al Menú Principal</a>
    </form>
</div>

<?= $this->include('partials/footer') ?>
