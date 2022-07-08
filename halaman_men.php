    
<?php 

include ("proses/connection.php");


$pria = $conn->query("SELECT * FROM tbl_produk  WHERE kategori_produk ='2' ORDER BY id ASC ");


?>

<?php include 'header.php';?>
<!-- ***** Header Area End ***** -->


    <br><br>
    <!-- ***** Men Area Starts ***** -->
    <section class="section" id="men">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>Men's Collection</h2>
                        <span>Kamu Mungkin Suka Produk Ini</span>
                    </div>
                </div>
            </div>
        </div>

         <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="women-item-carousel">
                        <div class="owl-women-item owl-carousel">

                           <?php 

                           foreach ($pria as $key => $pr) 
                           {
                                $id_pr = $pr['id'];

                                $photo = $conn->query("SELECT * FROM tbl_produk_photo WHERE 
                                    produk_id='$id_pr' ORDER BY urutan ASC LIMIT 1");
                                $photo = mysqli_fetch_assoc($photo);



                            ?>
                               
                                <div class="item">
                                    <div class="thumb">
                                        <div class="hover-content">
                                            <ul>
                                                <li><a href="<?php echo 'detail_produk.php?id='.$pr['id'];?>"><i class="fa fa-eye"></i></a></li>
                                                <li><a href=""><i class="fa fa-star"></i></a></li>
                                                <li><a href=""><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <img src="assets/images/<?php echo $photo['filename'];?>" alt="">
                                    </div>
                                    <div class="down-content">
                                        <h4><?php echo $pr['nama_produk'];?></h4>
                                        <span><?php echo "Rp.".number_format($pr['harga']);?></span>
                                        
                                    </div>
                                </div>

                           <?php } ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </section>
    <!-- ***** Men Area Ends ***** -->


    <!-- ***** Social Area Starts ***** -->
    <section class="section" id="social">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>Social Media</h2>
                        <span>Temukan Kami di Media Sosial Mana Saja</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row images">
                <div class="col-2">
                    <div class="thumb">
                        <div class="icon">
                            <a href="http://instagram.com">
                                <h6>Fashion</h6>
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                        <img src="assets/images/instagram-01.jpg" alt="">
                    </div>
                </div>
                <div class="col-2">
                    <div class="thumb">
                        <div class="icon">
                            <a href="http://instagram.com">
                                <h6>New</h6>
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                        <img src="assets/images/instagram-02.jpg" alt="">
                    </div>
                </div>
                <div class="col-2">
                    <div class="thumb">
                        <div class="icon">
                            <a href="http://instagram.com">
                                <h6>Brand</h6>
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                        <img src="assets/images/instagram-03.jpg" alt="">
                    </div>
                </div>
                <div class="col-2">
                    <div class="thumb">
                        <div class="icon">
                            <a href="http://instagram.com">
                                <h6>Makeup</h6>
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                        <img src="assets/images/instagram-04.jpg" alt="">
                    </div>
                </div>
                <div class="col-2">
                    <div class="thumb">
                        <div class="icon">
                            <a href="http://instagram.com">
                                <h6>Leather</h6>
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                        <img src="assets/images/instagram-05.jpg" alt="">
                    </div>
                </div>
                <div class="col-2">
                    <div class="thumb">
                        <div class="icon">
                            <a href="http://instagram.com">
                                <h6>Bag</h6>
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                        <img src="assets/images/instagram-06.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Social Area Ends ***** -->

    <!-- <?php include 'footer.php';?> -->