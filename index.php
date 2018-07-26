<?php 
session_start();

include_once 'Library.php';
$db = new Library();

if (empty($_SESSION['admin'] || $_SESSION['stan'] || $_SESSION['mhs'])) {
	header('location: login.php');
}
else if (isset($_SESSION['admin'])) {
	echo "Selamat datang ".$_SESSION['admin'];
	header('location: admin.php');
}
else if (isset($_SESSION['stan'])) {
	echo "Selamat datang ".$_SESSION['stan'];
	header('location: stan.php');
}
else if (isset($_SESSION['mhs'])) {
	echo "Selamat datang ".$_SESSION['mhs'];
	header('location: mhs.php');
}
 ?>