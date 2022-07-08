<?php

include ("connection.php");

session_unset();

if($_POST)
{	
	$username = $_POST['uname'];
	$password = $_POST['password'];

	$password_hash = sha1(md5($password));


	
	$sql = $conn->query("SELECT cs.nama_customer,username,password,email,customer_id FROM tbl_customer cs
		          		LEFT JOIN tbl_customer_user lgn ON lgn.customer_id = cs.id
		          		WHERE (email ='$username' AND password='$password_hash') OR (username='$username' AND password='$password_hash')");
	$cek = mysqli_fetch_assoc($sql);

	
	if(!empty($cek))
	{
		
		session_start();

		$login = array(
			'nama'  => $cek['nama_customer'],
			'email' => $cek['email'],
			'username' => $cek['username'],
			'customer_id' => $cek['customer_id'],
		);

		$_SESSION["user"]=$login;


		header("Location:../halaman_awal.php");

	}

}

?>