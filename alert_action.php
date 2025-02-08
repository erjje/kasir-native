<!-- alert add  -->
<?php if(isset($_SESSION['add']) && $_SESSION['add'] != null) : ?>
        <div class="alert alert-success" role="alert">
          <?= $_SESSION['add']; ?>
        </div>
      <?php endif; $_SESSION['add'] = null; ?>

    <!-- alert edit -->
     <?php  if(isset($_SESSION['edit']) && $_SESSION['edit'] != null) : ?>
       <div class="alert alert-warning" role="alert">
          <?= $_SESSION['edit']; ?>
        </div>
      <?php endif; $_SESSION['edit'] =null; ?>

      <!-- alert delete -->
      <?php  if(isset($_SESSION['delete']) && $_SESSION['delete'] != null) : ?>
       <div class="alert alert-danger" role="alert">
          <?= $_SESSION['delete']; ?>
        </div>
      <?php endif; $_SESSION['delete'] =null; ?>

          <!-- alert jika username dan password salah/ error login -->
    <?php if($_SESSION['failed'] && $_SESSION['failed'] != null) : ?>
      <div class="alert alert-danger" role="alert">
          <?= $_SESSION['failed']; ?>
        </div>
    <?php endif; $_SESSION['failed'] = null;?>

    <!-- alert if belum login -->
    <?php if($_SESSION['not_login'] && $_SESSION['not_login'] != null) : ?>
      <div class="alert alert-danger" role="alert">
          <?= $_SESSION['not_login']; ?>
        </div>
    <?php endif; $_SESSION['not_login'] = null;?>


