    
<?php 
session_start(); 
include ("proses/connection.php");

$customer_id = $_SESSION['user']['customer_id'];

$keranjang = $conn->query("SELECT tabel_keranjang_belanja.*,tbl_produk.nama_produk,tbl_produk.harga FROM tabel_keranjang_belanja 
    LEFT JOIN tbl_produk ON tbl_produk.id = tabel_keranjang_belanja.id_barang
                            WHERE id_customer='$customer_id' ORDER BY date_created ASC ");


?>



<?php include 'header.php';?>
<!-- ***** Header Area End ***** -->

<br><br><br>
<div class="container" style="background-color: #E7BB91;">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <table>
                            <tr>
                                <th style="width: 800px;"><input type="checkbox"> Produk</th>
                                <th style="width: 200px;">Quantity</th>
                                <th style="width: 200px;">Total Harga</th>
                            </tr>
                        </table>
                    </nav>
                </div>
            </div>
</div>
<br>

<?php 
foreach ($keranjang as $key => $value) 
{
    $id_barang = $value['id_barang'];

    $photo = $conn->query("SELECT * FROM tbl_produk_photo WHERE 
                                    produk_id='$id_barang' ORDER BY urutan ASC LIMIT 1");
    $photo = mysqli_fetch_assoc($photo);

    $total_harga = $value['harga']*$value['quantity'];

    ?>

    <div class="container" style="background-color: #E7BB91;">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <br>
                        <table>
                            <tr>
                                <td style="width: 800px;"><input type="checkbox">

                                    <a target="_blank" href="<?php echo 'detail_produk.php?id='.$pr['id'];?>">
                                        <img style="width: 100px;" src="assets/images/<?php echo $photo['filename'];?>" alt="">
                                    </a>

                                    <?php echo $value['nama_produk'];?>

                                </td>
                                <td style="width: 200px;"><?php echo $value['quantity'];?></td>
                                <td style="width: 200px;">Rp.<?php echo number_format($total_harga);?></td>
                            </tr>
                        </table>
                        <br>
                    </nav>
                </div>
            </div>
    </div>

<?php }?>
