<?php 

include ("connection.php");


if($_POST)
{
	$kategori = $_POST['kategori'];
	$insert = $conn->query("INSERT tbl_kategori_produk (kategori) VALUE ('$kategori')");

	echo '<script type="text/javascript">';
	echo 'alert("berhasil)';
	echo "</script>";

	header("Location:halaman_admin.php");
}