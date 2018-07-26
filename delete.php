<?php
include_once 'Library.php';
if (isset($_GET['id_stan'])) {
	$db = new Library();
	$id = $_GET['id_stan'];
	$delete = $db->delete($id, 'stan', 'id_stan');
	if ($delete == "Sukses") {
		header('location: adm_stan.php');
	}
	else{
		header('location: adm_stan.php');
	}
}
else if (isset($_GET['id_mhs'])) {
	$db = new Library();
	$id = $_GET['id_mhs'];
	$delete = $db->delete($id, 'mahasiswa', 'nim');
	if ($delete == "Sukses") {
		header('location: adm_mhs.php');
	}
	else{
		header('location: adm_mhs.php');
	}
}
?>