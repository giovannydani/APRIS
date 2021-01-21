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
              <h3 class="card-title">Progres</h3>
              <div class="card-tools">
                <ul class="nav nav-pills ml-auto">
                  <li class="nav-item">
                    <a href="<?php echo site_url('user/hakcipta/add')?>">
                      <button type="button" class="btn btn-default btn-sm"><i class="fa fa-plus-square"></i> Tambah Hak Cipta</button>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="_hakcipta_" class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Judul</th>
                  <th>Tanggal</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Selesai</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="_Selesai_" class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Judul</th>
                  <th>Tanggal</th>
                  <th>Status</th>
                  <th>Action</th>
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
  var status;

  $(document).ready(function(){
    hakcipta = $("#_hakcipta_").DataTable({
      ajax: {
        url: "<?php echo base_url()?>user/hakcipta/tabledata",
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
        {data: "tanggalinput"},
        {
          data: "status",
          render: function (data, type, row, meta) {
          // console.log(meta);
            status=data;
            if (data=="validasi") {
              return "Menunggu Validasi";
            }else if (data=="revisi"){
            return "Revisi";
            }
          }
        },
        { data: "idHakCipta",
          render: function(data, type, row){
            const setdelHakcipta = '"'+data+'"';
            if (status=="validasi") {
            return "\
              <a href='<?php echo site_url('user/hakcipta/detail/')?>"+data+"' data-toggle='tooltip' title='detail'>\
                  <button type='button' class='btn btn-warning'><i class='fa fa-info-circle'></i> Detail</button>\
              </a>\
              <a onclick='delHakcipta("+setdelHakcipta+")' data-toggle='tooltip' title='Delete'>\
                    <button type='button' class='btn btn-danger'><i class='fa fa-trash'></i> Hapus</button>\
              </a>\
              ";
              // return null;
            }else if (status=="revisi"){
              return "\
                <a href='<?php echo site_url('user/hakcipta/revisi/')?>"+data+"' data-toggle='tooltip' title='revisi'>\
                    <button type='button' class='btn btn-primary'><i class='fa fa-edit'></i>    Revisi</button>\
                </a>\
                <a onclick='delHakcipta("+setdelHakcipta+")' data-toggle='tooltip' title='Delete'>\
                    <button type='button' class='btn btn-danger'><i class='fa fa-trash'></i> Hapus</button>\
                </a>\
                ";
            }
          }
        }
      ]
    });
  });
  
  function delHakcipta(id){
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.value) {
        $.ajax({
          type: "POST",
          data: {id: id},
          url: "<?php echo site_url('user/hakcipta/hapusHakcipta')?>",
          dataType: "JSON",
          success: function (data) {
            if (data.status == true) {
              hakcipta.ajax.reload();
              Swal.fire({
                icon: 'success',
                title: 'Success...',
                text: data.message
              });
            } else {
              pehakciptancipta.ajax.reload();
              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: data.message
              })
            }
          }
        });
      }
    })
  }
  
  
</script>
<script>
  var selesai;
  var status;
  
  $(document).ready(function(){
    selesai = $("#_Selesai_").DataTable({
      ajax: {
        url: "<?php echo base_url()?>user/hakcipta/tabledataselesai",
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
        {data: "tanggalinput"},
        {
          data: "status",
          render: function (data, type, row, meta) {
            return "Selesai";
          }
        },
        {
          data: "idHakCipta",
          render: function (data, type, row, meta) {
          // console.log(meta);
            return "\
              <a href='<?php echo site_url('user/hakcipta/detail/')?>"+data+"' data-toggle='tooltip' title='detail'>\
                  <button type='button' class='btn btn-warning'><i class='fa fa-info-circle'></i> Detail</button>\
              </a>\
              ";
          }
        }
      ]
    });
  });  
</script>

</body>
</html>
