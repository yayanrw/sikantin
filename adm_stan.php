
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
  <link rel="stylesheet" href="css/bootstrap.min.css">
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
        <li class="active"><a href="adm_stan.php"><i class="fa fa-address-book"></i> <span>Stan</span></a></li>
        <li><a href="adm_mhs.php"><i class="fa fa-archive"></i> <span>Mahasiswa</span></a></li>
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
        Daftar Stan
        <small>Politeknik Negeri Malang</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="admin.php"><i class="fa fa-dashboard"></i> Beranda </a></li>
        <li class="active">Daftar Stan</li>
      </ol>
    </section>
    
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
    	<h4>
		<form method="post">
			<a href="adm_stan_tambah.php" class="btn btn-primary btn-sm"><i class="fa fa-user-plus"></i>  Tambah Data</a>
			        <div class="col-sm-3">
              
          	   <input type="text" name="cari" class="form-control" placeholder="Pencarian Data ..">
               </div>
               <div class="col-sm-1">
                <span class="input-group-btn">
                <button type="submit" name="pencarian" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
              </div>
        
			<!-- <input type="text" name="cari" placeholder="Pencarian"> <input type="submit" value="Pencarian" name="pencarian"> -->
		</form>
		</h4>

	<div class="box box-primary">
	<table class="table table-striped table-hover text-center">
	<tr>
		<th>Id Stan</th>
		<th>Nama Stan</th>
		<th>Password</th>
		<th>Nama Pemilik</th>
		<th>Alamat Pemilik</th>
		<th>No HP Pemilik</th>
		<th>Saldo</th>
		<th>Aksi</th>
	</tr>
	<?php
	if (isset($_POST['pencarian'])) {
		$arrayData = $db->pencarianStan($_POST['cari']);
	}
	else{
		$arrayData = $db->tampilData('stan');
	}
	foreach ($arrayData as $data){
	?>
	<tr>
		<td><?php echo $data['id_stan']; ?></td>
		<td><a href="adm_stan_detail.php?id_stan=<?php echo $data['id_stan']; ?>"><?php echo $data['nama_stan']; ?></a></td>
		<td><?php echo $data['password']; ?></td>
		<td><?php echo $data['nama_pemilik']; ?></td>
		<td><?php echo $data['alamat_pemilik']; ?></td>
		<td><?php echo $data['no_hp_pemilik']; ?></td>
		<td>Rp. <?php echo $data['saldo']; ?></td>
		<td>
			<a href="adm_stan_edit.php?id_stan=<?php echo $data['id_stan']; ?>#update" title="Edit Data" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
          	<a href="delete.php?id_stan=<?php echo $data['id_stan']; ?>" title="Hapus Data" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a> 
          	<a href="adm_stan_trans.php?id_stan=<?php echo $data['id_stan']; ?>" title="Informasi Transaksi" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a> 
		</td>
	</tr>
	<?php } ?>
		</table>
      <!-- <h1>
        Page Header
        <small>Optional description</small>
      </h1> -->
      <!-- <ol class="breadcrumb">
        <li><a href="admin.php"><i class="fa fa-dashboard"></i> Beranda </a></li>
        <li class="active">Dashboard</li>
      </ol> -->
      	</div>
    	 </div>
        </div>
    </section>

    <!-- Main content -->
    
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

