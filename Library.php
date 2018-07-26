<?php 
include_once 'database.php';
class Library
{
	private $db;

	private $host = DB_HOST;
	private $user = DB_USER;
	private $pass = DB_PASS;
	private $dbname = DB_NAME;

	function __construct()
	{
		$this->koneksi();
	}

	function koneksi(){
		$this->db = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
		if($this->db->connect_errno){
			echo "Koneksi Gagal";
		}
		return $this->db;
	}

	function cekLogin($username, $password){
		$queryAdm = $this->db->query("SELECT * FROM admin WHERE username = '".$username."' AND password = '".$password."'");
		$queryStan = $this->db->query("SELECT * FROM stan WHERE id_stan = '".$username."' AND password = '".$password."'");
		$queryMhs = $this->db->query("SELECT * FROM mahasiswa WHERE nim = '".$username."' AND password = '".$password."'");
		session_start();
		// echo json_encode($rowAdm);
		if ($queryAdm->num_rows>0) {
			$_SESSION['admin'] = $username;
			header('location: admin.php');
		}
		else if ($queryStan->num_rows>0) {
			$_SESSION['stan'] = $username;
			header('location: stan.php');
		}
		elseif ($queryMhs->num_rows>0) {
			$_SESSION['mhs'] = $username;
			header('location: mhs.php');
		}
		else{
			echo "Login Gagal!";
		}
	}

	function getId($table, $pk, $id){
		$query = $this->db->query("SELECT * FROM $table WHERE $pk = '$id'");
		return $query;
	}

	function tampilData($table){
		$query = $this->db->query("SELECT * FROM $table");
		if ($query->num_rows > 0) {
			while ($row = mysqli_fetch_array($query)) {
				$data[] = $row;
			}
			return $data;
		}
		else{
			die();
		}
		return $data;
	}
	function tampilDataku($nim){
		$query = $this->db->query("SELECT * FROM mahasiswa where nim='$nim'");
		if ($query->num_rows > 0) {
			while ($row = mysqli_fetch_array($query)) {
				$data[] = $row;
			}
			return $data;
		}
		else{
			die();
		}
		return $data;
	}
	function tampilData2($table, $pk, $where){
		$query = $this->db->query("SELECT * FROM $table WHERE $pk = '$where'");
		if ($query->num_rows > 0) {
			while ($row = mysqli_fetch_array($query)) {
				$data[] = $row;
			}
			return $data;
		}
		else{
			die();
		}
		return $data;
	}

	function tambahStan($id_stan, $nama_stan, $password, $nama_pemilik, $foto, $alamat_pemilik, $no_hp_pemilik, $saldo){
		$query = $this->db->query("INSERT INTO stan VALUES('$id_stan', '$nama_stan', '$password', '$nama_pemilik', '$foto', '$alamat_pemilik', '$no_hp_pemilik', '$saldo')");
		return "Sukses";
	}

	function tambahMhs($nim, $password, $nama, $jurusan, $alamat, $no_hp, $saldo, $foto){
		$query = $this->db->query("INSERT INTO mahasiswa VALUES('$nim', '$password', '$nama', '$jurusan', '$alamat', '$no_hp', '$saldo', '$foto')");
		return "Sukses";
	}

	function editStan($id_stan, $nama_stan, $password, $nama_pemilik, $foto, $alamat_pemilik, $no_hp_pemilik, $saldo){
		$query = $this->db->query("UPDATE stan SET nama_stan = '$nama_stan', password = '$password', nama_pemilik = '$nama_pemilik', foto = '$foto', alamat_pemilik = '$alamat_pemilik', no_hp_pemilik = '$no_hp_pemilik', saldo = '$saldo' WHERE id_stan = '$id_stan'");
		return "Sukses";
	}

	function editMhs($nim, $password, $nama, $jurusan, $alamat, $no_hp, $saldo, $foto){
		$query = $this->db->query("UPDATE mahasiswa SET password = '$password', nama = '$nama', jurusan = '$jurusan', alamat = '$alamat', no_hp = '$no_hp', saldo = '$saldo', foto = '$foto' WHERE nim = '$nim'");
		return "Sukses";
	}

	function delete($id, $table, $pk){
		$query = $this->db->query("DELETE FROM $table WHERE $pk = '$id'") or die("Query Salah");
		return "Sukses";
	}

	function pencarianStan($id){
		$query = $this->db->query("SELECT * FROM stan WHERE id_stan LIKE '%$id%' OR nama_stan LIKE '%$id%' OR nama_pemilik LIKE '%$id%' OR alamat_pemilik LIKE '%$id%' OR no_hp_pemilik LIKE '%$id%' OR saldo LIKE '%$id%'");
		return $query;
	}

	function pencarianMhs($id){
		$query = $this->db->query("SELECT * FROM mahasiswa WHERE nim LIKE '%$id%' OR nama LIKE '%$id%' OR jurusan LIKE '%$id%' OR alamat LIKE '%$id%' OR no_hp LIKE '%$id%' OR  saldo LIKE '%$id%'");
		return $query;
	}

	function pencarianMhsNim($id){
		$query = $this->db->query("SELECT * FROM mahasiswa WHERE nim LIKE '%$id%'");
		$data = mysqli_fetch_array($query);
		return $data;
	}

	function transaksi($nim, $id_stan, $biaya){
		$queryMhs = $this->db->query("SELECT saldo FROM mahasiswa WHERE nim = '".$nim."'");
		while ($data=mysqli_fetch_array($queryMhs)) {
			$saldoMhs = $data['saldo'];
		}

		if (($saldoMhs-=$biaya) > 0) {
			$date = date("Y-m-d");
			$queryTransaksi = $this->db->query("INSERT INTO transaksi(id_stan, nim, biaya, tanggal) VALUES ('$id_stan', '$nim', '$biaya', '$date')");

			$queryStan = $this->db->query("SELECT saldo FROM stan WHERE id_stan = '".$id_stan."'");
			$saldoStan=0;
			while ($data=mysqli_fetch_array($queryStan)) {
				$saldoStan = $data['saldo'];
			}

			$saldoStan+=$biaya;
			$queryStan = $this->db->query("update stan set saldo='".$saldoStan."' WHERE id_stan = '".$id_stan."'");

			$queryMhs = $this->db->query("SELECT saldo FROM mahasiswa WHERE nim = '".$nim."'");
			$saldoMhs=0;
			while ($data=mysqli_fetch_array($queryMhs)) {
				$saldoMhs = $data['saldo'];
			}
			
			$saldoMhs-=$biaya;
			$queryMhs = $this->db->query("update mahasiswa set saldo='".$saldoMhs."' WHERE nim = '".$nim."'");
			header('location: stan_trans.php');
		}
		else{
			echo "Saldo anda tidak mencukupi";
			die();
		}

		
	}
}
?>