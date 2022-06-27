<?php

include ("connection.php");

$id = $_GET['id'];

$photo = $conn->query("SELECT * FROM tbl_produk_photo WHERE produk_id='$id' ORDER BY urutan ASC LIMIT 1");
$foto = mysqli_fetch_assoc($photo);

$detail = $conn->query("SELECT tbl_produk.*,tbl_kategori_produk.kategori FROM tbl_produk 
											 LEFT JOIN tbl_kategori_produk ON tbl_kategori_produk.id = tbl_produk.kategori_produk 
											 WHERE tbl_produk.id ='$id'");
$detail = mysqli_fetch_assoc($detail);

$full_foto = $conn->query("SELECT * FROM tbl_produk_photo WHERE produk_id='$id'");


?>

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

<title>Mama Mimi</title>
<!-- Additional CSS Files -->
<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">
<link rel="stylesheet" href="../assets/css/templatemo-hexashop.css">
<link rel="stylesheet" href="../assets/css/owl-carousel.css">
<link rel="stylesheet" href="../assets/css/lightbox.css">


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>

<script src="../assets/magnific/jquery.magnific-popup.min.js"></script>
<link href="../assets/magnific/magnific-popup.css" rel="stylesheet">




<div id="page-inner" style="margin-left:50px;margin-right: 50px;">
	<div class="row">
		<div class="col-sm-7">
		</div>
		<div class="col-md-12">
			<br>
			<a class="btn btn-default pull-left" href="halaman_admin.php">Back</a>
			<br>
			<h2>Details Produk <?php echo $detail['nama_produk'];?></h2>
			<button class="btn btn-info pull-right" data-toggle="modal" data-target="#myModal">Update Produk</button>

			<button class="btn btn-success pull-right" data-toggle="modal" data-target="#UploadFiles" style="margin-right:4px;">Add Photo</button>

		</div>
	</div>

	<hr />

	<div id="detail" class="row">
		<div class="dl-horizontal" style="font-size: 14px;">
			<div class="col-md-12">
		  		
					    <div class="col-sm-5">
					    	
					    	<a href="<?php echo '../assets/images/'.$foto['filename']; ?>" title="<?php echo $foto['file_name']; ?>" target="_blank" >
				      		<img src="<?php echo '../assets/images/'.$foto['filename']; ?>" alt="<?php echo $foto['filename']; ?>" style="width: 200;height: 300;margin-right:22px;margin-left: 164px;">
				      	     </a>
				      	     <br>
				      	
			      	   		<br>
			      	   		
			      	   		<center>
			      	   		<div class="row popup-gallery">
					      	    <?php foreach ($full_foto as $key => $value) 
					      	    { ?>
					      	    	<a target = "_blank" href="<?php echo '../assets/images/'.$value['filename']; ?>" style="margin-right:2px;"> 
                                 	 <img src="<?php echo '../assets/images/'.$value['filename']; ?>" class="img-responsive img-thumbnail"  style="width: 100;height: 100;">
                              </a>

					      	    <?php }
					      	    ?>
				      		</div>
				      		</center>
				      	
					    </div>
					    <div class="col-sm-2">
					 	</div>
					    <div class="col-sm-5">
					    	<table class="table table-hover">
					    		<tr>
					    			<td>Kode Produk</td>
					    			<td><?php echo $detail['kode_produk'];?></td>
					    		</tr>
					    		<tr>
					    			<td>Nama Produk</td>
					    			<td><?php echo $detail['nama_produk'];?></td>
					    		</tr>
					    		<tr>
					    			<td>Satuan</td>
					    			<td><?php echo $detail['satuan'];?></td>
					    		</tr>
					    		<tr>
					    			<td>Harga</td>
					    			<td><?php echo "Rp.".number_format($detail['harga']);?></td>
					    		</tr>
					    		<tr>
					    			<td>Kategori</td>
					    			<td><?php echo $detail['kategori'];?></td>
					    		</tr>
					    	</table>
					    </div>
				
		  	</div>
		</div>
	</div>
</div>

 <!-- Modal -->

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      	<div class="modal-content">
      		<form  action="update_produk.php" method="post" enctype="multipart/form-data">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title">Update Product</h4>
	        </div>
	        <div class="modal-body">
	         	
		         	<div class="form-group">
	            		<label class="control-label col-sm-3">Nama Barang</label>
	            		<div class="col-sm-8">
	            			<input type="text" name="nama_barang" class="form-control" value="<?php echo $detail['nama_produk'];?>">
	            		</div><br><br><br>
	            		<label class="control-label col-sm-3">Harga</label>
	            		<div class="col-sm-8">
	            			<input type="text" name="harga" class="form-control" value="<?php echo number_format($detail['harga']);?>" onkeyup="splitInDots(this)">
	            		</div>

	            		<input type="hidden" name="id" class="form-control" value="<?php echo $detail['id'];?>">
	            	</div>
	            	<br><br>
	       	</div>
	        <div class="modal-footer">
	         <button type="submit" id="AddMessageButton" class="btn btn-primary">Submit</button>
	      	</form>
	        </div>
      	</div>
    </div>
 </div>
  

 <div id="UploadFiles" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title ttl">Upload Photo Product</h4>
      </div>
      <div class="modal-body">
      	<form id="AddMessage" action="upload_photo_produk.php" method="post" enctype="multipart/form-data">

		<div class="form-group row">
            <div class="col-xs-12">
                <input type="file" class="form-control" name="userfiles[]" required='true' multiple>
            </div>

            <input type="hidden" name="id" class="form-control" value="<?php echo $detail['id'];?>">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" id="AddMessageButton" class="btn btn-primary">Submit</button>
      </div>
    </div>
    </form>

  </div>
</div>



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

function reverseNumber(input) {
   return [].map.call(input, function(x) {
      return x;
    }).reverse().join(''); 
  }
  
  function plainNumber(number) {
     return number.split(',').join('');
  }

function splitInDots(input) 
{
    
    var value = input.value,
        plain = plainNumber(value),
        reversed = reverseNumber(plain),
        reversedWithDots = reversed.match(/.{1,3}/g).join(','),
        normal = reverseNumber(reversedWithDots);        
    console.log(plain,reversed, reversedWithDots, normal);
    input.value = normal;
}


</script>
