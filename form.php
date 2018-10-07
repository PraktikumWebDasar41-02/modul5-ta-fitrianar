<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<center>
	<h1>L O G I N</h1>
<form action="" method="post">
	<table>
		<tr>
			<td>NIM</td>
			<td>:</td>
			<td><input type="text" name="nim"></td>
		</tr>
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><input type="text" name="nama"></td>
		</tr>
		<tr>
			<td>E-mail</td>
			<td>:</td>
			<td><input type="text" name="email"></td>
		</tr>
		<tr>
			<td>Tanggal Lahir</td>
			<td>:</td>
			<td><input type="date" name="tgl"></td>
		</tr>
		<tr>
			<td>Jenis Kelamin</td>
			<td>:</td>
			<td>
				<input type="radio" name="jk" value="L"> Laki-laki
				<input type="radio" name="jk" value="P"> Perempuan
			</td>
		</tr>
		<tr>
			<td>Program Studi</td>
			<td>:</td>
			<td>
				<select name="ps">
					<option value="si">D3 Sistem Informasi</option>
					<option value="tt">D3 Teknik Telekomunikasi</option>
					<option value="tk">D3 Teknik Komputer</option>
					<option value="if">D3 Teknik Informatika</option>
					<option value="mm">D4 Multimedia</option>
					<option value="mp">D3 Manajemen Pemasaran</option>
					<option value="ph">D3 Manajemen Perhiotelan</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Fakultas</td>
			<td>:</td>
			<td>
				<select name="fak">
					<option value="FIT">FIT</option>
					<option value="FIK">FIK</option>
					<option value="FEB">FEB</option>
					<option value="FKB">FKB</option>
					<option value="FRI">FFRI</option>
				</select>
			</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td><input type="submit" name="submit" value="SUBMIT"></td>
		</tr>
		</table>
</form>
</center>
</body>
</html>

<?php
	if (isset($_POST['submit'])) {
		$nim = $_POST['nim'];
		$nama = $_POST['nama'];
		$email = $_POST['email'];
		$tgl = $_POST['tgl'];
		$jk = $_POST['jk'];
		$ps = $_POST['ps'];
		$fak = $_POST['fak'];

		$cek = true;

		if (empty($nim)) {
			echo "NIM tidak boleh kosong<br>";
			$cek = false;
		}else{
			if (strlen($nim)!=10 && !is_numeric($nim)) {
				echo "<center>NIM Harus 10 digit dan angka<br></center>";
				$cek = false;
			}
		}
		
		if (empty($nama)) {
			echo "<center>Nama tidak boleh kosong<br></center>";
			$cek = false;
		}else{
			if (strlen($nama)>20) {
				echo "<center>Maksimal panjang nama 20 huruf<br></center>";
				$cek = false;
			}	
		}
		
		if (empty($email)) {
			echo "<center>Email tidak boleh kosong</center>";	
			$cek = false;
		}else{
			if (!strpos($email, '@') || !strpos($email, '.com')) {
				echo "<center>Format email harus @ .com<br></center>";
				$cek = false;
			}
		}

		if ($cek) {
			$koneksi = mysqli_connect('localhost','root','','d_modul5');

			$sql = "INSERT INTO t_jurnal1 values ('$nim','$nama','$email','$tgl','$jk','$ps','$fak')";
			mysqli_query($koneksi, $sql);
			session_start();
			$_SESSION['pk'] = $nim;
			header("Location:tampil.php");
		}
		
	}
?>
