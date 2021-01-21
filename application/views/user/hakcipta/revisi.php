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
                      <select id="inputJenisCiptaan" name="inputJenisCiptaan" class="form-control select2">
                        <option value="programkomputer" <?php if($hc['jenis']=="programkomputer"){echo "selected";} ?>>Program Komputer</option>
                        <option value="naskah" <?php if($hc['jenis']=="naskah"){echo "selected";} ?>>Naskah</option>
                        <option value="seni" <?php if($hc['jenis']=="seni"){echo "selected";} ?>>Seni</option>
                        <option value="musik" <?php if($hc['jenis']=="musik"){echo "selected";} ?>>Musik</option>
                        <option value="film" <?php if($hc['jenis']=="film"){echo "selected";} ?>>Film</option>
                        <option value="foto" <?php if($hc['jenis']=="foto"){echo "selected";} ?>>Foto</option>
                        <option value="database" <?php if($hc['jenis']=="database"){echo "selected";} ?>>Database</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Sub Jenis Ciptaan</label>
                    <div class="col-sm-10">
                      <select id="inputSubJenisCiptaan" name="inputSubJenisCiptaan" class="form-control select2">
                        <option value="a" <?php if($hc['subjenis']=="a"){echo "selected";} ?>>A</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputJudul" name="inputJudul" value="<?= $hc['judul'] ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Uraian Singkat Ciptaan</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" id="inputUSC" name="inputUSC" rows="5"><?php echo $hc['uraiansingkat'] ?></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Tanggal Pertama Kali Diumumkan</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" id="inputDate" name="inputDate" value="<?php echo $hc['tanggal'] ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Kota Pertama Kali Diumumkan</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputKota" name="inputKota" value="<?php echo $hc['kota'] ?>">
                    </div>
                  </div>
                  <?php if ($comment['Detail']!=null) : ?>
                  <div class="form-group">
                      <label for="commentsdetail">Comments</label>
                      <textarea class="form-control" style="background-color:white" id="commentsdetail" name="commentsdetail" rows="3" readonly><?= $comment['Detail'] ?></textarea>
                  </div>
                  <?php endif ?>
                  

                  
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">Data Pencipta</h3>
                  <div class="card-tools">
                    <ul class="nav nav-pills ml-auto">
                        <li class="nav-item">
                          <button type="button" class="btn btn-default" id="btambah"><i class="fa fa-plus-square"></i> Tambah</button>
                          <!-- <button type="button" class="btn btn-default" data-toggle="modal" data-target="#madd"><i class="fa fa-plus-square"></i> Tambah</button> -->
                        </li>
                    </ul>
                  </div>
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
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                  <?php if ($comment['Pencipta']!=null) : ?>
                  <div class="form-group">
                      <label for="commentsdetail">Comments</label>
                      <textarea class="form-control" style="background-color:white" id="commentsdetail" name="commentsdetail" rows="3" readonly><?= $comment['Pencipta'] ?></textarea>
                  </div>
                  <?php endif ?>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
              <div class="card text-center mt-5">
                  <div class="card-footer bg-light">
                      <div class="form-group row">
                          <div class="col-md-6 col-sm-6 offset-md-3">
                              <button type="button" id="revisi" name="revisi" class="btn btn-success">Revisi</button>
                          </div>
                      </div>
                  </div>
              </div>
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

<!-- modal tambah pencipta -->
<div class="modal fade" id="madd" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="LabelMTambah">Tambah</h5>
          <h5 class="modal-title" id="LabelMEdit">Edit</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action=""  method="post">
            <div class="form-group">
              <label for="InputNama">Nama</label>
              <input type="text" class="form-control" id="InputNama" name="InputNama">
            </div>
            <div class="form-group">
              <label for="InputKwn">Kewarganegaraan</label>
              <input type="Text" class="form-control" id="InputKwn" name="InputKwn">
            </div>
            <div class="form-group">
              <label for="InputAlamat">Alamat</label>
              <input type="Text" class="form-control" id="InputAlamat" name="InputAlamat">
            </div>
            <div class="form-group">
              <label for="InputProvinsi">Provinsi</label>
              <select class="form-control select2" id="prov" name="prov" style="width: 100%;">
              </select>
            </div>
            <div class="form-group">
              <label for="InputKota" id="labKab">Kabupaten / Kota</label>
              <select class="form-control select2" id="kab" name="kab" style="width: 100%;">
              </select>
            </div>
            <div class="form-group">
              <label for="InputKota"id="labKec">Kecamatan</label>
              <select class="form-control select2" id="kec" name="kec" style="width: 100%;">
              </select>
            </div>
            <div class="form-group">
              <label for="InputKP">Kode Pos</label>
              <input type="Text" class="form-control" id="InputKP" name="InputKP">
              <input type="hidden" class="form-control" id="InputId" name="InputId">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary" id="tambah">Tambah</button>
          <button type="button" class="btn btn-primary" id="edit">Edit</button>
        </div>
      </div>
    </div>
</div>

<!-- REQUIRED SCRIPTS -->

<?php $this->load->view('admin/partial/js');?>

<script>
    $(document).ready(function() {
      $('.select2').select2({
          theme: 'bootstrap4'
      });
    })
</script>

<script>
  $('#btambah').click(function(){
    $("#edit").hide();
    $("#LabelMEdit").hide();
    $("#tambah").show();
    $("#LabelMTambah").show();
    $("#madd").modal("show");
    $('#InputNama').val(null);
    $('#InputId').val(null);
    $('#InputKwn').val(null);
    $('#InputAlamat').val(null);
    $('#prov').val(null).trigger('change');
    $('#kab').val(null).trigger('change');
    $("#kab").hide();
    $("#labKab").hide();
    $("#labKec").hide();
    $('#kec').val(null).trigger('change');
    $('#InputKP').val(null);
  })
</script>

<script>
    $("#kab").next().hide();
    $("#labKab").hide();
    $("#kec").next().hide();
    $("#labKec").hide();

    $(document).ready(function() {
      $.ajax({
        type: "POST",
        url: "<?= base_url() ?>admin/wilayah/dataProv",
        dataType: "JSON",
        success: function(data){
            // console.log(data);
            $("#prov").html(data);
        }
      });
    })

    $("#prov").on("change", function(){
        var  dataprov = $(this).val();
        
        if (dataprov == "") {
            $("#kab").next().hide();
            $("#labKab").hide();
        } else {
            $.ajax({
                type: "POST",
                url: "<?= base_url() ?>admin/wilayah/dataKab",
                data: {
                    id : dataprov
                },
                dataType: "JSON",
                success: function(data){
                    $("#kab").next().show();
                    $("#labKab").show();
                    $("#kec").next().hide();
                    $("#labKec").hide();
                    $("#kab").html(data);
                }
            });
        }
    });

    $("#kab").on("change", function(){
        var  datakab = $(this).val();
        if (datakab == "") {
            $("#kec").hide();
            $("#labKec").hide();
        } else {
            $.ajax({
                type: "POST",
                url: "<?= base_url() ?>admin/wilayah/dataKec",
                data: {
                    id : datakab
                },
                dataType: "JSON",
                success: function(data){
                    // console.log(data);
                    $("#kec").next().show();
                    $("#labKec").show();
                    $("#kec").html(data);
                }
            });
        }
    });
</script>

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
          // console.log(meta);
            return meta.row + meta.settings._iDisplayStart + 1;
          }
        },
        {data: "nama"},
        {data: "kewarganegaraan"},
        {data: "alamat"},
        {data: "provinsi"},
        {data: "kota"},
        {data: "kecamatan"},
        {data: "kodepos"},
        {
          data: "idpencipta",
          render: function(data, type, row){
            const setdelPencipta = '"'+data+'"';
            return "<a onclick='editPencipta("+setdelPencipta+")' data-toggle='tooltip' title='Edit'>\
                  <button type='button' class='btn btn-warning'><i class='fa fa-edit'></i></button>\
              </a>\
              <a onclick='delPencipta("+setdelPencipta+")' data-toggle='tooltip' title='Delete'>\
                  <button type='button' class='btn btn-danger'><i class='fa fa-trash'></i></button>\
              </a>";
          }
        }
      ]
    });
  });
</script>

<script>
  $('#tambah').click(function(){
    var nama = $('#InputNama').val();
    var Kewarganegaraan = $('#InputKwn').val();
    var Alamat = $('#InputAlamat').val();
    var Provinsi =$("#prov option:selected").text();
    var Kabupaten = $("#kab option:selected").text();
    var Kecamatan = $("#kec option:selected").text();
    var KodePos = $('#InputKP').val();
    $.ajax({
            url:  "<?php echo base_url('user/pencipta/add')?>",
            type: 'POST',
            data: {
                id:"<?= $hc["idHakCipta"] ?>",
                nama:nama,
                Kewarganegaraan:Kewarganegaraan,
                Provinsi:Provinsi,
                Kabupaten:Kabupaten,
                Kecamatan:Kecamatan,
                Alamat:Alamat,
                KodePos:KodePos
            },
            dataType: "JSON",
            success: function(data){
              // console.log(data);
              if (data.status == true) {
                Swal.fire({
                  icon: 'success',
                  title: 'Success...',
                  html: data.message
                });
                pencipta.ajax.reload(null, false);
                $('#InputNama').val(" ");
                $('#InputKwn').val(" ");
                $('#InputAlamat').val(" ");
                $("#prov").val("");
                $("#labKab").hide();
                $("#kab").hide();
                $("#labKec").hide();
                $("#kec").hide();
                $('#InputKP').val("");
                $("#madd").modal('hide');
              }else{
                Swal.fire({
                  icon: 'error',
                  title: 'Oopss...',
                  html: data.message
                });
              }
            }
    });

    });

  $('#edit').click(function(){

    var nama = $('#InputNama').val();
    var id = $('#InputId').val();
    var Kewarganegaraan = $('#InputKwn').val();
    var Alamat = $('#InputAlamat').val();
    var Provinsi =$("#prov option:selected").text();
    var Kabupaten = $("#kab option:selected").text();
    var Kecamatan = $("#kec option:selected").text();
    var KodePos = $('#InputKP').val();
    $.ajax({
            url:  "<?php echo base_url('user/pencipta/updatePencipta')?>",
            type: 'POST',
            data: {
                id:id,
                nama:nama,
                Kewarganegaraan:Kewarganegaraan,
                Provinsi:Provinsi,
                Kabupaten:Kabupaten,
                Kecamatan:Kecamatan,
                Alamat:Alamat,
                KodePos:KodePos
            },
            dataType: "JSON",
            success: function(data){
              console.log(data);
              if (data.status == true) {
                Swal.fire({
                  icon: 'success',
                  title: 'Success...',
                  html: data.message
                });
                pencipta.ajax.reload(null, false);
                $('#InputNama').val(" ");
                $('#InputKwn').val(" ");
                $('#InputAlamat').val(" ");
                $("#prov").val("");
                $("#labKab").hide();
                $("#kab").hide();
                $("#labKec").hide();
                $("#kec").hide();
                $('#InputKP').val("");
                $("#madd").modal('hide');
              }else{
                Swal.fire({
                  icon: 'error',
                  title: 'Oopss...',
                  html: data.message
                });
              }
            }
    });

    });
</script>

<script>
  function delPencipta(id){
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
          url: "<?php echo site_url('user/pencipta/hapus')?>",
          dataType: "JSON",
          success: function (data) {
            if (data.status == true) {
              pencipta.ajax.reload();
              console.log(data);
              Swal.fire({
                icon: 'success',
                title: 'Success...',
                text: data.message
              });
            } else {
              pencipta.ajax.reload();
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

  function editPencipta(id){
    $.ajax({
      type: "POST",
      url: "<?= base_url() ?>user/pencipta/editPencipta",
      data: {
          id : id
      },
      dataType: "JSON",
      success: function(data){
          console.log(data);
          $('#InputNama').val(data.nama);
          $('#InputId').val(data.idpencipta);
          $('#InputKwn').val(data.kewarganegaraan);
          $('#InputAlamat').val(data.alamat);
          $('#prov').val(null).trigger('change');
          $('#kab').val(null).trigger('change');
          $("#kab").hide();
          $("#labKab").hide();
          $("#labKec").hide();
          $('#kec').val(null).trigger('change');
          $('#InputKP').val(data.kodepos);
          $("#tambah").hide();
          $("#LabelMTambah").hide();
          $("#edit").show();
          $("#LabelMEdit").show();
          $("#madd").modal('show');
      }
    });
  }
</script>

<script>
  $('#revisi').click(function(){
    var inputJenisCiptaan = $('#inputJenisCiptaan').val();
    var inputSubJenisCiptaan = $('#inputSubJenisCiptaan').val();
    var inputJudul = $('#inputJudul').val();
    var inputUSC = $('#inputUSC').val();
    var inputDate = $('#inputDate').val();
    var inputKota = $('#inputKota').val();
    $.ajax({
        type: "POST",
        url: "<?= base_url() ?>user/hakcipta/revisiHakCipta",
        data:{
          inputJenisCiptaan:inputJenisCiptaan,
          inputSubJenisCiptaan:inputSubJenisCiptaan,
          inputJudul:inputJudul,
          inputUSC:inputUSC,
          inputDate:inputDate,
          inputKota:inputKota,
          id:"<?= $hc["idHakCipta"] ?>"
        },
        dataType: "JSON",
        success: function(data){
          console.log(data);
          if (data.status == true) {
            Swal.fire({
                icon: 'success',
                title: 'Success...',
                html: data.message,
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33'
            }).then((result) => {
                if (result.value) {
                window.location.replace("<?php echo site_url('user/hakcipta/table') ?>");
                }
            });
          }else{
            Swal.fire({
              icon: 'error',
              title: 'Oopss...',
              html: data.message
            });
          }
        }
    });
  });
</script>

</body>
</html>
