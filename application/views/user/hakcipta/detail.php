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

          <!-- Horizontal Form -->
        <form class="form-horizontal">
          <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Detail</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Jenis Ciptaan</label>
                    <div class="col-sm-10">
                        <p class="form-control border-left-0 border-top-0 border-right-0">
                            <?php echo $hc['jenis'] ?>
                        </p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Sub Jenis Ciptaan</label>
                    <div class="col-sm-10">
                    <p class="form-control border-left-0 border-top-0 border-right-0">
                            <?php echo $hc['subjenis'] ?>
                        </p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                        <p class="form-control border-left-0 border-top-0 border-right-0">
                            <?php echo $hc['judul'] ?>
                        </p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Uraian Singkat Ciptaan</label>
                    <div class="col-sm-10">
                    <textarea class="form-control border-left-0 border-top-0 border-right-0" rows="10" style="background-color:white"readonly><?php echo $hc['uraiansingkat'] ?></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Tanggal Pertama Kali Diumumkan</label>
                    <div class="col-sm-10">
                        <p class="form-control border-left-0 border-top-0 border-right-0">
                            <?php echo $hc['tanggal'] ?>
                        </p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Kota Pertama Kali Diumumkan</label>
                    <div class="col-sm-10">
                        <p class="form-control border-left-0 border-top-0 border-right-0">
                            <?php echo $hc['kota'] ?>
                        </p>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">Data Pencipta</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="_pencipta_" class="table table-bordered table-hover table-striped" >
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th style="width:20%">Kewarganegaraan</th>
                        <th>Alamat</th>
                        <th>Provinsi</th>
                        <th>Kota</th>
                        <th>Kecamatan</th>
                        <th>Kode Pos</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
          </form>

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
  $(document).ready(function(){
    pencipta = $("#_pencipta_").DataTable({
      "paging": false,
      "searching": false,
      "ordering": false,
      "bInfo" : false,
      ajax: {
        url: "<?php echo base_url()?>user/pencipta/dataPenciptaa",
        type: "POST",
        dataSrc: "",
        data: function ( d ) {
            d.token = "<?= $hc["idHakCipta"] ?>";
        }
      },
      columns: [
        {
          data: "idpencipta",
          render: function (data, type, row, meta) {
            return meta.row + meta.settings._iDisplayStart + 1;
          }
        },
        {data: "nama"},
        {data: "kewarganegaraan"},
        {data: "alamat"},
        {data: "provinsi"},
        {data: "kota"},
        {data: "kecamatan"},
        {data: "kodepos"}
      ]
    });
  });
</script>

</body>
</html>
