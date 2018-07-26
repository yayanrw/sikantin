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

$id = $_GET['id_stan'];
$getId = $db->getId('stan', 'id_stan', $id);
$data = mysqli_fetch_row($getId);
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
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Detail Data Stan
        <small>Politeknik Negeri Malang</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="admin.php"><i class="fa fa-dashboard"></i> Beranda </a></li>
        <li><a href="adm_stan.php"><i class="fa fa-user"></i> Stan </a></li>
        <li class="active">Detail Data</li>
      </ol>
    </section>

    <!-- Main content -->
     <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
    <section class="content">
     <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-body">
            <div class="col-sm-4">
             	
<ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Id Stan</b> <p class="pull-right"><?php echo $data[0] ?></p>
                </li>
                <li class="list-group-item">
                  <b>Nama Stan</b> <p class="pull-right"><?php echo $data[1] ?></p>
                </li>
                <li class="list-group-item">
                  <b>Password</b> <p class="pull-right"><?php echo $data[2] ?></p>
                </li>                
                <li class="list-group-item">
                  <b>Nama Pemilik</b> <p class="pull-right"><?php echo $data[3] ?></p>
                </li>
                <li class="list-group-item">
                  <b>Alamat Pemilik</b> <p class="pull-right"><?php echo $data[5] ?></p>
                </li>
                <li class="list-group-item">
                  <b>No HP Pemilik</b> <p class="pull-right"><?php echo $data[6] ?></p>
                </li>
                <li class="list-group-item">
                	<b>Saldo</b> <p class="pull-right">Rp. <?php echo $data[7] ?></p>
                </li>              
              </ul>
             </div> 
             <div class="col-sm-6">
              <center>           
              <img src="images/stan/<?php echo $data[4]; ?>" alt="<?php echo $data[4]; ?>" class="img-responsive" style="height: 200px;margin-top: 130px">
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

