<?= view('partials/header') ?>
<!--  cambio 3:definir ancho  -->
    <div class="container mt-4" style="background-color: rgb(54, 99, 70); width: 90%; max-width: 1050px; height: auto; box-shadow: -1px 4px 8px 8px rgba(59, 112, 52, 0.53);">
        <div class="d-flex justify-content-center">
            <img src="<?= base_url('img/fondos/fondo.png') ?>" alt="logo" class="img-fluid" style="max-height: 455px;width: 650px;">
        </div>
    </div>

<!--si no esta logueado no muestra lo que esta debtro de este bloque-->
<?php if (session()->has('usuario_id')): ?>

<div class="container mt-4 letragral">
    <div class="container mt-3 d-flex justify-content-center">
        <button class="btn" id="mostrarTarjetasBtn" type="button" data-bs-toggle="collapse" data-bs-target="#tarjetas">
        Administrar veterinaria
        </button>
    </div>
    <div class="collapse mt-3" id="tarjetas">
        <!-- Tarjetas de acciones -->
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <!-- Altas -->
            <div class="col">
                <div class="card border-success shadow">
                    <div class="card-header bg-success text-white" >➕ Altas</div>
                    <div class="card-body" id="alta" >
                        <ul class="list-unstyled">
                            <li><a href="<?= base_url('relaciones/formAlta') ?>" class="btn btn-outline-success w-100 mb-2">Registrar nuevo Amo con Mascota</a></li>
                            <li><a href="<?= base_url('amos/formulario_alta') ?>" class="btn btn-outline-success w-100 mb-2">Registrar nuevo Amo</a></li>
                            <li><a href="<?= base_url('relaciones/alta') ?>" class="btn btn-outline-success w-100 mb-2">Vincular Amo nuevo y Mascota existentes</a></li>  
                            <li><a href="<?= base_url('veterinarios/crear') ?>" class="btn btn-outline-success w-100 mb-2">Registrar Veterinario</a></li>
                            <li><a href="<?= base_url('relaciones/registrar_visita') ?>" class="btn btn-outline-success w-100">Registrar Visita Veterinaria</a></li> <!-- NUEVO -->
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Bajas -->
            <div class="col">
                <div class="card border-danger shadow">
                    <div class="card-header bg-danger text-white" >🗑️ Bajas</div>
                    <div class="card-body" id="baja1">
                        <ul class="list-unstyled">
                            <li><a href="<?= base_url('relaciones/verRelaciones') ?>" class="btn btn-outline-danger w-100 mb-2">Dar de baja relación Amo-Mascota</a></li>
                            <li><a href="<?= base_url('veterinarios/listarParaBaja') ?>" class="btn btn-outline-danger w-100">Dar de baja Veterinario</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Modificaciones -->
            <div class="col">
                <div class="card border-warning shadow">
                    <div class="card-header bg-warning text-dark">✏️ Modificaciones</div>
                    <div class="card-body" id="modificar">
                        <ul class="list-unstyled">
                            <li><a href="<?= base_url('amos/modificar') ?>" class="btn btn-outline-warning w-100 mb-2">Modificar datos del Amo</a></li>
                            <li><a href="<?= base_url('mascotas/editar') ?>" class="btn btn-outline-warning w-100 mb-2">Modificar datos de la Mascota</a></li>
                            <li><a href="<?= base_url('veterinarios/listarParaModificar') ?>" class="btn btn-outline-warning w-100">Modificar datos del Veterinario</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Mostrar -->
            <div class="col">
                <div class="card border-primary shadow">
                    <div class="card-header bg-primary text-white">🔍 Mostrar</div>
                    <div class="card-body" id="mostrar">
                        <ul class="list-unstyled">
                            <li><a href="<?= base_url('veterinarios') ?>" class="btn btn-outline-primary w-100 mb-2">Mostrar todos los Veterinarios</a></li>
                            <li><a href="<?= base_url('mascotas/mostrar') ?>" class="btn btn-outline-primary w-100 mb-2">Mostrar Mascotas</a></li>
                            <li><a href="<?= base_url('relaciones/ver_mascotas_por_amo') ?>" class="btn btn-outline-primary w-100 mb-2">Mostrar Mascotas por Amo</a></li>
                            <li><a href="<?= base_url('relaciones/ver_amos_por_mascota') ?>" class="btn btn-outline-primary w-100">Mostrar Amos por Mascota</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<?= view('partials/footer') ?>
