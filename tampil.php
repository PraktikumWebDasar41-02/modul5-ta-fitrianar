<?php

	session_start();
	$koneksi = mysqli_connect('localhost','root','','d_modul5');

	$pk = $_SESSION['pk'];

	$sql = "SELECT * FROM t_jurnal1 WHERE nim = '$pk' ";
	$query = mysqli_query($koneksi, $sql);
	$hasil = mysqli_fetch_array($query);

	echo "NIM : ".$hasil['NIM']."<br>";
	echo "Nama : ".$hasil['Nama']."<br>";
	echo "Email : ".$hasil['email']."<br>";
	echo "Tanggal Lahir : ".$hasil['Tanggal_Lahir']."<br>";
	echo "Jenis Kelamin: ".$hasil['Jenis_Kelamin']."<br>";
	echo "Program Studi : ".$hasil['Program_Studi']."<br>";
	echo "Fakultas : ".$hasil['Fakultas']."<br>";

	session_destroy();
?>

