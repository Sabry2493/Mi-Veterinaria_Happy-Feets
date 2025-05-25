
<?= view('partials/header') ?>
<div class="container mt-5 " >
    <h2>Alta de Veterinario</h2>
    <?php if (session()->has('error')): ?>
        <div class="alert alert-danger"><?= session('error') ?></div>
    <?php endif; ?>
    <form action="<?= base_url('veterinarios/guardar') ?>" method="post" class="mb-3">
        <fieldset class="mb-4 border p-3 rounded fondocard">
            <legend class="float-none w-auto px-2 rounded">Datos del Veterinario</legend>
            <div class="mb-3">
                <label for="nombre_apellido" class="form-label">Nombre y Apellido:</label>
                <input type="text" name="nombre_apellido" id="nombre_apellido" class="form-control" required pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ ]+" minlength="6">
            </div>

            <div class="mb-3">
                <label for="matricula" class="form-label">Matrícula:</label>
                <input type="text" name="matricula" id="matricula" class="form-control" required minlength="6" maxlength="12" placeholder="CVXXXXXXXXXX">
            </div>

            <div class="mb-3">
                <label for="especialidad" class="form-label">Especialidad:</label>
                <!-- <input type="text" name="especialidad" id="especialidad" class="form-control"> -->
                <select name="especialidad" id="especialidad" class="form-control" required onchange="toggleOtraEspecialidad()">
                    <option value="">Seleccione una</option>
                    <option value="Medicina general">Medicina general</option>
                    <option value="Cirugia">Cirugía</option>
                    <option value="Analisis clinicos">Análisis clínicos</option>
                    <option value="Traumatologia">Traumatología</option>
                    <option value="Nutricion">Nutrición</option>
                    <option value="Urgencias veterinarias">Urgencias</option>
                    <option value="Ecografias">Ecografías</option>
                    <option value="Peluqueria canina">Peluquería canina</option>
                    <option value="Veterinario agronomo">Vet. animales de campo</option>
                    <option value="Otra especialidad">Otra especialidad</option>     
                </select>
            </div>
            <!-- INPUT PARA OTRA ESPECIALIDAD -->
            <div id="otra-especialidad-container" class="mb-3" style="display: none;">
                <label class="form-label">Especifique la especialidad:</label>
                <input type="text" name="otra_especialidad" class="form-control">
            </div>

            <div class="mb-3">
                <label for="telefono_personal" class="form-label">Teléfono Personal:</label>
                <input type="text" name="telefono_personal" id="telefono_personal" class="form-control" pattern="[0-9]{10,}" maxlength="13" required  placeholder="(Cod)XXX(Num)XXXXXX">
            </div>

            <div class="mb-3">
                <label for="fecha_ingreso" class="form-label">Fecha de Ingreso:</label>
                <input type="date" name="fecha_ingreso" id="fecha_ingreso" class="form-control" value="<?= date('Y-m-d') ?>" max="<?= date('Y-m-d') ?>" required>
            </div>
        </fieldset>

        <button type="submit" class="btn btn-success botonescard"> Guardar</button>
        <a href="<?= base_url('/') ?>" class="btn btn-secondary botones2card"> Volver al Menú</a>
    </form>
</div>
<?= view('partials/footer') ?>