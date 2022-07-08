<?php 
session_start(); 
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Mama Mimi</title>


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css



">
    
    <body>


    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">    

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            <img src="assets/images/logo_mama_mimi.png">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="index.php" class="active">Beranda</a></li>
                            <li class="scroll-to-section"><a href="halaman_men.php">Men's</a></li>
                            <li class="scroll-to-section"><a href="halaman_women.php">Women's</a></li>
                            <li class="scroll-to-section"><a href="halaman_kids.php">Kid's</a></li>
                            <li class="scroll-to-section"><a href="halaman_makeup.php">MakeUp</a></li>
    
                            <?php 


                            if($_SESSION)
                            {
                 
                                if(isset($_SESSION['user']))
                                { ?>
                                
                                    <li class="submenu">
                                    <a href="javascript:;"> <?php echo $_SESSION['user']['nama'];?> </a>
                                    <ul>
                                        <li><a href="informasi_akun.php">Akun Saya</a></li>
                                        <li><a href="halaman_chart.php">Keranjang Belanja</a></li>
                                    </ul>
                                    </li>

                                    <li class="scroll-to-section"><a href="logout.php">
                                       Logout</a>
                                    </li> 

                            <?php }
                                else
                                {?>
                                    <li class="scroll-to-section"><a href="halaman_login.php">Login|Sign Up</a></li> 
                                <?php 

                                }
                            ?>


                            <?php }else
                            {?>
                                 <li class="scroll-to-section"><a href="halaman_login.php">Login|Sign Up</a></li> 

                            <?php }
                            ?>
                            
                        </ul>        
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/datepicker.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    <script src="assets/js/slick.js"></script> 
    <script src="assets/js/lightbox.js"></script> 
    <script src="assets/js/isotope.js"></script> 
    
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>

    <script>

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);
                
            });
        });

    </script>
