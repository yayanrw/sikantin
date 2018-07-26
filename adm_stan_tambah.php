<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin - DebitCard Canteen Polinema</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">

</head>

<body class="hold-transition skin-blue sidebar-mini">
<?php 
session_start();

include_once 'Library.php';
$db = new Library();

if (empty($_SESSION['admin'])) {
	header('location: login.php');
}
?>

<?php
if (isset($_POST['simpan'])) {
	$id_stan = $_POST['id_stan'];
	$nama_stan = $_POST['nama_stan'];
	$password = $_POST['password'];
	$nama_pemilik = $_POST['nama_pemilik'];
	$alamat_pemilik = $_POST['alamat_pemilik'];
	$no_hp_pemilik = $_POST['no_hp_pemilik'];
	$saldo = $_POST['saldo'];
	$foto = $_FILES['foto']['name'];
	$tmp = $_FILES['foto']['tmp_name'];
	$path = "images/stan/".$foto;
	move_uploaded_file($tmp, $path);

	$tambahStan = $db->tambahStan($id_stan, $nama_stan, $password, $nama_pemilik, $foto, $alamat_pemilik, $no_hp_pemilik, $saldo);
	if ($tambahStan == "Sukses") {
		header('location: adm_stan.php');
	}
	else{
		echo "Data gagal disimpan<br>";
		echo "<a href='adm_stan_tambah.php'>Kembali</a>";
	}
}
?>

<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><img src="../images/kmp-cart.png" alt="DebitCard Canteen Polinema" width="25px"></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>DebitCard Canteen Polinema</b></span>
      </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
     <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <!-- Menu toggle button -->
            <ul class="dropdown-menu">
              <li>
                <!-- inner menu: contains the messages -->
                <ul class="menu">
                  <li>
                      <div class="pull-left">
                        <!-- User Image -->
                        <img src="../images/admin/<?php echo $data['foto']; ?>" class="img-circle" alt="<?php echo $data['username']; ?>">
                      </div>
                  </li>
                  <!-- end message -->
                </ul>
                <!-- /.menu -->
              </li>
            </ul>
          </li>
          <!-- /.messages-menu -->

         
          <!-- User Account Menu -->
          <!-- <li class="dropdown user user-menu">
           
              </li> -->
              <!-- Menu Footer-->
              <li class="user-footer">
                
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Logout</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="images/adm/user.jpg" class="img-circle" >
        </div>
        <div class="pull-left info">
          <p>ADMIN</p>
          <!-- Status -->
          <!-- <small><i class="fa fa-circle text-success"></i> Online</small> -->
        </div>
      </div>

      <!-- search form (Optional) -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Pencarian...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">Menu</li>
        <!-- Optionally, you can add icons to the links -->
        <li><a href="admin.php"><i class="fa fa-dashboard"></i> <span>Beranda</span></a></li>
        <li><a href="adm_stan.php"><i class="fa fa-address-book"></i> <span>Stan</span></a></li>
        <li  class="active"><a href="adm_mhs.php"><i class="fa fa-archive"></i> <span>Mahasiswa</span></a></li>
        <li><a href="trans.php"><i class="fa fa-cart-arrow-down"></i> <span>Transaksi</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Data Stan
        <small>Politeknik Negeri Malang</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="admin.php"><i class="fa fa-dashboard"></i> Beranda </a></li>
        <li><a href="adm_stan.php"><i class="fa fa-user"></i> Stan </a></li>
        <li class="active">Tambah Data</li>
      </ol>
    </section>

    <!-- Main content -->
    <form action="" method="post" enctype="multipart/form-data">
    <section class="content">
     <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-body">
            <div class="col-sm-6">
              <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                <div class="form-group"><br>
                  <label class="col-sm-3 control-label">Id Stan</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="id_stan" placeholder="Id Stan">
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Nama Stan</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="nama_stan" placeholder="Nama Stan">
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Password</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="password" placeholder="Password">
                  </div>
                </div>  
                <br>      
                <div class="form-group">
                  <label class="col-sm-3 control-label">Nama Pemilik</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="nama_pemilik" placeholder="Nama Pemilik">
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Foto Pemilik</label>

                  <div class="col-sm-8">
                    <input type="file" name="foto">
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Alamat Pemilik</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="alamat_pemilik" placeholder="Alamat Pemilik">
                  </div>
                </div>
                <br>
               <div class="form-group">
                  <label class="col-sm-3 control-label">No HP Pemilik</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="no_hp_pemilik" placeholder="No HP Pemilik">
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Saldo</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="saldo" placeholder="Saldo">
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <div class="col-sm-5">
                    <input class="btn btn-primary btn-sm pull-right" type="submit" value="Simpan" name="simpan">
                  </div>
                  <div class="col-sm-5">
                  	<input class="btn btn-primary btn-sm pull-right" type="submit" value="Reset" name="reset">
                  </div>
                </div>
              </form>
            </div>
            <div class="col-sm-6">
              <center>
              <img class="img-responsive" style="height: 200px;margin-top: 130px" src="../images/kmp-2nd.png">
              </center>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  </form>
</div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
   <!--  <div class="pull-right hidden-xs">
      Anything you want
    </div> -->
    <!-- Default to the left -->
    <div class="pull-right">
       <strong>Copyright &copy; 2017 <a href="#">Debit Card Canteen Polinema</a></strong> All rights reserved.
    </div>
   Supported By : <a href="http://www.polinema.ac.id">Politeknik Negeri Malang</a>
  </footer>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>

