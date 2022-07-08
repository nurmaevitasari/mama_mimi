<?php 
include ("proses/connection.php");



$id             = $_GET['id'];
$quantity       = $_GET['value'];
$cust_id        = $_GET['cust_id'];
$date_created   = date('Y-m-d H:i:s');

$insert = $conn->query("INSERT INTO tabel_keranjang_belanja (id_barang,id_customer,quantity,date_created) VALUES ('$id','$cust_id','$quantity','$date_created')");
$chart_id = $conn->insert_id;

echo '<script type="text/javascript">';
echo 'alert("berhasil)';
echo "</script>";

header("Location:halaman_chart.php");

?>