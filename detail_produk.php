<?php 

session_start(); 
include ("proses/connection.php");


$customer_id = $_SESSION['user']['customer_id'];


$id = $_GET['id'];


$detail = $conn->query("SELECT * FROM tbl_produk WHERE id='$id'");
$detail = mysqli_fetch_assoc($detail);

$photo = $conn->query("SELECT * FROM tbl_produk_photo 
            WHERE produk_id='$id' ORDER BY urutan ASC LIMIT 1");
$photo = mysqli_fetch_assoc($photo);

$full_foto = $conn->query("SELECT * FROM tbl_produk_photo WHERE produk_id='$id'");

?>

<style type="text/css">
    .left-images{
        width: 500px;
    }
</style>


<?php include 'header.php';?>
<!-- ***** Header Area End ***** -->

<!-- ***** Preloader Start ***** -->
<div id="preloader">
    <div class="jumper">
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>  

<script src="assets/magnific/jquery.magnific-popup.min.js"></script>
<link href="assets/magnific/magnific-popup.css" rel="stylesheet">



<!-- ***** Product Area Starts ***** -->
    <section class="section" id="product">
        <br><br><br>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                <div class="left-images popup-gallery">
                     <img class="foto" src="assets/images/<?php echo $photo['filename'];?>" alt="">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="right-content">
                    <h4><?php echo $detail['nama_produk'];?></h4>
                    <span class="price"><?php echo "Rp.".number_format($detail['harga']);?></span>
                    <ul class="stars">
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                    </ul>
                </div>

                <div class="quantity-content">
                    <div class="left-content">
                        <h6>No. of Orders</h6>
                    </div>
                    <div class="right-content">
                        <div class="quantity buttons_added">
                            <input type="button" value="-" class="minus"><input type="number" step="1" min="1" max="" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" pattern="" inputmode=""><input type="button" value="+" class="plus">
                        </div>

                    </div>
                </div>

                <div class="total">
                        <h4>Total: Rp.<span class="ttl"><?php echo number_format($detail['harga']);?></span></h4>
                        
                        <div class="main-border-button"><a class="add_to_chart">Add To Cart</a></div>
                </div>


                <br><br>
                <center>
                            <div class="row popup-gallery">
                                <?php foreach ($full_foto as $key => $value) 
                                { ?>
                                    <a target = "_blank" href="<?php echo 'assets/images/'.$value['filename']; ?>" style="margin-right:4px;"> 
                                     <img src="<?php echo 'assets/images/'.$value['filename']; ?>" class="img-responsive img-thumbnail"  style="width: 100;height: 100;">
                              </a>

                                <?php }
                                ?>
                            </div>
                </center>

            </div>
            </div>
        </div>
    </section>
    <!-- ***** Product Area Ends ***** -->

<script type="text/javascript">
$('.popup-gallery').magnificPopup({
delegate: 'a',
type: 'image',
tLoading: 'Loading image #%curr%...',
mainClass: 'mfp-img-mobile',
gallery: {
    enabled: true,
    navigateByImgClick: true,
    preload: [0,1] // Will preload 0 - before current, and 1 after the current image
},
image: {
    tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
    
}
});


function addCommas(nStr)
{
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}

$('.plus').click(function()
{
    var value = $('.qty').val();
    var harga_satuan = "<?php echo $detail['harga'];?>";
    var hitung = parseFloat(value)+1;
    $('.qty').val(hitung);
    var hitung_total = harga_satuan*hitung;

    var ttl = addCommas(hitung_total);

    $('.ttl').text(ttl);
         
});

$('.minus').click(function()
{
    var value = $('.qty').val();
    var harga_satuan = "<?php echo $detail['harga'];?>";
    var hitung = parseInt(value)-1;

    if(hitung =='0')
    {
        hitung ='1';
    }

    var hitung_total = harga_satuan*hitung;

    $('.qty').val(hitung);

    var ttl = addCommas(hitung_total);

    $('.ttl').text(ttl);
         
});



$(".qty").keyup(function() 
{
    var value = $(this).val();

    if(value ='0')
    {
        value='1';
         $('.qty').val('1');
    }
    
    var harga_satuan = "<?php echo $detail['harga'];?>";

    var hitung_total = harga_satuan*value;

    var ttl = addCommas(hitung_total);

    $('.ttl').text(ttl);
        
});


$('.add_to_chart').click(function()
{
    var value = $('.qty').val();
    var id = "<?php echo $id;?>";
    var cust_id = "<?php echo $customer_id;?>";

    $(location).prop('href', 'add_to_chart.php?id='+id+'&value='+value+"&cust_id="+cust_id);
});

</script>