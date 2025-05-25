
<?= view('partials/header') ?>
<div class="container mt-5 " >
    <h2>Editar Veterinario</h2>

    <form action="<?= base_url('veterinarios/actualizar/' . $veterinario['id']) ?>" method="post" class="mb-3">
        <fieldset class="mb-4 border p-3 rounded fondocard">
            <div class="mb-3">
                <label for="nombre_apellido" class="form-label">Nombre y Apellido:</label>
                <input type="text" name="nombre_apellido" id="nombre_apellido" class="form-control"
                    value="<?= esc($veterinario['nombre_apellido']) ?>" required pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ ]+" minlength="6">
            </div>

            <div class="mb-3">
                <label for="matricula" class="form-label">Matrícula:</label>
                <input type="text" name="matricula" id="matricula" class="form-control"
                    value="<?= esc($veterinario['matricula']) ?>" required minlength="6" maxlength="12" placeholder="CVXXXXXXXXXX">
            </div>

            <div class="mb-3">
                <label for="especialidad" class="form-label">Especialidad:</label>
                <!-- <input type="text" name="especialidad" id="especialidad" class="form-control"
                    value="<?= esc($veterinario['especialidad']) ?>"> -->
                <select name="especialidad" id="especialidad" class="form-control" required  onchange="toggleOtraEspecialidad()">
                    <option value="<?= esc($veterinario['especialidad']) ?>"><?= esc($veterinario['especialidad']) ?></option>
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
                <input type="text" name="telefono_personal" id="telefono_personal" class="form-control"
                    value="<?= esc($veterinario['telefono_personal']) ?>" pattern="[0-9]{10,}" maxlength="13" required placeholder="(Cod)XXX(Num)XXXXXX">
            </div>
        </fieldset>
        <button type="submit" class="btn btn-primary botonescard"> Guardar Cambios</button>
        <a href="<?= base_url('veterinarios/listarParaModificar') ?>" class="btn btn-secondary botones2card"> Volver a la Lista</a>

    </form>
</div>
<?= view('partials/footer') ?>