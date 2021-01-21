<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view('admin/partial/head'); ?>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  

  <?php 
  $this->load->view('admin/partial/navbar');
  $this->load->view('admin/partial/sidebar'); 
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">  
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?= $judul ?></h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">

          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Data Hak Cipta</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="_hakcipta_" class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Judul</th>
                  <th>Tanggal</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

  </div>
  <!-- /.content-wrapper -->


  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<?php $this->load->view('admin/partial/js');?>

<script>
  var hakcipta;
  $(document).ready(function(){
    hakcipta = $("#_hakcipta_").DataTable({
      ajax: {
        url: "<?php echo base_url()?>admin/hakcipta/tabledataselesai",
        type: "POST",
        dataSrc: "",
      },
      columns: [
        {
          data: "idHakCipta",
          render: function (data, type, row, meta) {
          // console.log(meta);
            return meta.row + meta.settings._iDisplayStart + 1;
          }
        },
        {data: "judul"},
        {data: "tanggalinput"}
      ]
    });
  });


</script>

</body>
</html>
