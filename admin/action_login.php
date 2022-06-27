<?php

include ("connection.php");

session_unset();

if($_POST)
{	
	$username = $_POST['uname'];
	$password = $_POST['password'];

	$password_hash = sha1(md5($password));


	
	$sql = $conn->query("SELECT * FROM tbl_admin
		          		WHERE (username ='$username' AND password='$password_hash')");
	$cek = mysqli_fetch_assoc($sql);


	
	if(!empty($cek))
	{
		
		session_start();

		$login = array(
			'id'  => $cek['id'],
			'nama_karyawan' => $cek['nama_karyawan'],
			'username' => $cek['username'],
		);

		$_SESSION["admin"]=$login;

		header("Location:halaman_admin.php");
	}else
	{
		header("Location:login_1.php");
	}

}

?>