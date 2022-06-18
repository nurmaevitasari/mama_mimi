

<?php 
include ("proses/connection.php");
include 'header.php';

$id = $_SESSION['user']['customer_id'];
$sql = $conn->query("SELECT * FROM tbl_customer WHERE id='$id'");
$detail_cust = mysqli_fetch_assoc($sql);

print_r($detail_cust);
?>
<!-- ***** Header Area End ***** --> 

<div class="main-banner" id="top">
        <div class="container-fluid">
            <div class="row" style='margin-left: 76px;'>
              <span>Profil Saya</span>
            </div>

            <div class="row" style='margin-left: 76px;'>
              <span>Kelola informasi profil Anda untuk mengontrol, melindungi dan mengamankan akun</span>
            </div>
            <br><br><br>
            <div style='margin-left: 76px;'>
                <table>
                    <tr>
                        <td>Username</td>
                        <td>:</td>
                        <td><?php echo $_SESSION['user']['username'];?></td>
                    </tr>

                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td><?php echo $detail_cust['nama_customer'];?></td>
                    </tr>


                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td><?php echo $detail_cust['email'];?></td>
                    </tr>
                    
                </table>
          
            </div>
        </div>
</div>
