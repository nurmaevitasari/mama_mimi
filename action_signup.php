<?php


include ("connection.php");

if($_POST)
{	
	
	$nama_lengkap 	= $_POST['nama_lengkap'];
    $username 		= $_POST['username'];
    $email 			= $_POST['email'];
    $no_tlp 		= $_POST['no_tlp'];
    $password 		= $_POST['password'];
    $password_hash  = sha1(md5($password));

    $datetime = date('Y-m-d H:i:s');

    $insert = $conn->query("INSERT INTO tbl_customer (no_tlp,nama_customer,email,date_created) VALUES ('$no_tlp','$nama_lengkap','$email','$datetime')");
    $customer_id = $conn->insert_id;

    if($customer_id)
    {

    	$insert = $conn->query("INSERT INTO tbl_customer_user (customer_id,username,password,last_login) VALUES ('$customer_id','$username','$password_hash','$datetime')");


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


			header("Location:../index.php");

		}

    }

}

?>