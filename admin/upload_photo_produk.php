<?php

include ("connection.php");


include ("connection.php");

if($_POST)
{
	$id 			= $_POST['id'];
	$date_created   = date('Y-m-d H:i:s');

	$url 			="detail_produk.php?id=".$id;


    if($_FILES)
    { 
        
        foreach ($_FILES['userfiles']['name'] as $key => $value) 
        {
        	$temp_file_location = $_FILES['userfiles']['tmp_name'][$key];
        	$namaFile 			= $_FILES['userfiles']['name'][$key];

        	$dirUpload = "../assets/images";

       
			$file_path = $dirUpload."'/'".$namaFile;
			$file_path = str_replace("'","", $file_path);

			$move_file = move_uploaded_file($temp_file_location,$file_path);

			$sql = $conn->query("SELECT * FROM tbl_produk_photo WHERE produk_id='$id' ORDER BY id DESC LIMIT 1");
			$urut = mysqli_fetch_assoc($sql);

			$urutan = $urut['urutan']+1;


			if($move_file) 
			{
			    $insert = $conn->query("INSERT tbl_produk_photo (produk_id,filename,urutan,date_created) VALUE ('$id','$namaFile','$urutan','$date_created')");
			}
        }
    }


	header("Location:".$url);
}