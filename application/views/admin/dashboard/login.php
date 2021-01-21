

<!DOCTYPE html>
<html>
<head>
  <?php $this->load->view('admin/partial/head'); ?>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a><b>Admin</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="<?= base_url() ?>dashboard" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="_username_" placeholder="Username" required autocomplete="off">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="_password_" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<?php $this->load->view('admin/partial/js');?>

<script>
  $(document).ready(function(){
    // ===== Notification alert =====
    var notif = {
      status:"<?php if(isset($notif["status"])) { echo $notif["status"]; } ?>", 
      message:"<?php if(isset($notif["message"])) { echo $notif["message"]; } ?>"
    };

    if (notif.status == "error" && notif.message != "") {
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        html: notif.message
      })
    } else if(notif.status == "success" && notif.message != ""){
      Swal.fire({
        icon: 'success',
        title: 'Success!',
        html: notif.message
      })
    }

  });
</script>

</body>
</html>

