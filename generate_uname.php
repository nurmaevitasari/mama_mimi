<?php 

if($_POST)
{
	$string = $_POST['nama_lengkap'];

	$nrRand = rand(0, 20000);
    
    $string = strtolower($string);
    $uname =  preg_replace('/^(.+)\s(.{2}).+$/', '$1$2', $string, 1).$nrRand;


    echo json_encode($uname);
}


?>