<?php 


include ("connection.php");

if($_POST)
{
	$nama_barang 	= $_POST['nama_barang'];
	$harga 			= $_POST['harga'];

	$harga 			= str_replace(",","", $harga);
	$harga 			= str_replace(".","", $harga);
	$id 			= $_POST['id'];

	$url 			="detail_produk.php?id=".$id;




	$sql =$conn->query("UPDATE tbl_produk SET nama_produk ='$nama_barang', harga ='$harga' WHERE id='$id'");

	header("Location:".$url);
}

?>