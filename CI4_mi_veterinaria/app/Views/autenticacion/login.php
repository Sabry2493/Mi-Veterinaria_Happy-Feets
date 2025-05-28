<?= view('partials/header') ?>

<div class="container mt-5">
    <div class="row align-items-center" style="min-height: 70vh;">
        <!-- Columna del formulario -->
        <div class="col-md-6">
            <h2>Iniciar sesión</h2>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
            <?php endif; ?>

            <form action="<?= base_url('autenticar') ?>" method="post">
                <div class="mb-3">
                    <label for="usuario" class="form-label">Usuario</label>
                    <input type="text" name="usuario" id="usuario" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="clave" class="form-label">Clave</label>
                    <input type="password" name="clave" id="clave" class="form-control" required>
                </div>
                <button type="submit" class="btn "style="background-color:rgb(70, 233, 151);">Ingresar</button>
            </form>
        </div>
        <!-- Columna de la imagen -->
        <div class="col-md-6 text-center">
            <img src="<?= base_url('img/fondos/logo2.png') ?>" alt="Imagen login" class="img-fluid" style="max-height: 350px;">
        </div>
    </div>
</div>

<?= view('partials/footer') ?>