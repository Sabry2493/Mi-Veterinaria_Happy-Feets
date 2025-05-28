
</div> <!--fin del contenedor nuevo-->
<!-- <footer style="background: linear-gradient(to right, rgba(243, 97, 30, 0.94), rgba(243, 144, 30, 0.94));margin-top:20px;"> -->
<footer style="background: linear-gradient(to bottom, rgba(59, 104, 53, 0.94), rgba(202, 193, 193, 0.94));box-shadow: 0 4px 10px rgba(0,0,0,0.2); margin-top:20px;">
    <div class="container mt-1 mb-2 pt-3 " style="text-align: center;">
        <img src="<?= base_url('img/footer/footer1.png') ?>" alt="Logo" style="width: 150px;" >
     <p style="font-family: Lilita One, sans-serif;"> &copy; <?= date('Y') ?> Mi Veterinaria. Todos los derechos reservados.</p>
    </div>
    <div class="container mt-1 pb-3" style="text-align: center;">
        <img src="<?= base_url('img/footer/facebook.png') ?>" alt="facebook" style="width: 40px;margin-right:50px;">
        <img src="<?= base_url('img/footer/instagram.png') ?>" alt="instagram" style="width: 40px;margin-right:50px;">
        <img src="<?= base_url('img/footer/mapa.png') ?>" alt="mapa" style="width: 32px;margin-bottom:6px;">
    </div>
</footer>


<script src="<?= base_url('js/validaciones.js') ?>"></script>

<!-- Bootstrap JS (opcional, para funcionalidades como modales) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!--MODAL EXITO-->
<?php if (session()->getFlashdata('mensaje') && session()->getFlashdata('tipo')): 
    $mensaje = session()->getFlashdata('mensaje');
    $tipo = session()->getFlashdata('tipo');

    // Elegir color y título del modal según el tipo
    switch ($tipo) {
        case 'alta':
            $color = 'bg-success text-white';
            $titulo = '¡Éxito!';
            break;
        case 'modificacion':
            $color = 'bg-warning text-dark';
            $titulo = 'Modificación';
            break;
        case 'baja':
            $color = 'bg-danger text-white';
            $titulo = 'Baja realizada';
            break;
        default:
            $color = 'bg-secondary text-white';
            $titulo = 'Mensaje';
            break;
    }
?>
<!--Modal Bootstrap-->
<div class="modal fade" id="modalMensaje" tabindex="-1" aria-labelledby="modalMensajeLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content <?= $color ?>">
      <div class="modal-header">
        <h5 class="modal-title" id="modalMensajeLabel"><?= $titulo ?></h5>
        <button type="button" class="btn-close <?php if ($tipo !== 'modificacion') echo 'btn-close-white'; ?>" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <?= $mensaje ?>
      </div>
    </div>
  </div>
</div>

<script>
  const modal = new bootstrap.Modal(document.getElementById('modalMensaje'));
  window.addEventListener('load', () => {
    modal.show();
  });
</script>
<?php endif; ?>

</body>
</html>
