<?php

include ("connection.php");



if($_POST)
{

	$kode_produk 		= $_POST['kode_produk'];
    $nama_produk 		= $_POST['nama_produk'];
    $kategori_produk 	= $_POST['kategori_produk'];
    $harga 				= $_POST['harga'];
    $harga 				= str_replace(",", "", $harga);
    $harga 				= str_replace(".", "", $harga);
    $date_created 		= date('Y-m-d H:i:s');
    $satuan   			= $_POST['satuan'];



	$insert = $conn->query("INSERT INTO tbl_produk (kode_produk,nama_produk,satuan,harga,diskon_persen,kategori_produk,date_created) VALUES ('$kode_produk','$nama_produk','$satuan','$harga','0','$kategori_produk','$date_created')");
	$id_produk = $conn->insert_id;

	if($id_produk)
	{
	    if($_FILES)
	    { 
	        
	        foreach ($_FILES['files']['name'] as $key => $value) 
	        {
	        	$temp_file_location = $_FILES['files']['tmp_name'][$key];
	        	$namaFile 			= $_FILES['files']['name'][$key];

	        	$dirUpload = "../assets/images";

	       
				$file_path = $dirUpload."'/'".$namaFile;
				$file_path = str_replace("'","", $file_path);

				$move_file = move_uploaded_file($temp_file_location,$file_path);


				if($move_file) 
				{
				    $insert = $conn->query("INSERT tbl_produk_photo (produk_id,filename,urutan,date_created) VALUE ('$id_produk','$namaFile','1','$date_created')");
				}
	        }
	    }
	}

	echo '<script type="text/javascript">';
	echo 'alert("berhasil)';
	echo "</script>";

	header("Location:halaman_admin.php");

}

?>