<?php

include ("connection.php");

$customer = $conn->query("SELECT tbl_customer.*,tbl_customer_user.username,tbl_customer_user.password FROM tbl_customer
								 					LEFT JOIN tbl_customer_user On tbl_customer_user.customer_id = tbl_customer.id
								 					ORDER BY tbl_customer.id ASC ");

$kategori = $conn->query("SELECT * FROM  tbl_kategori_produk ORDER BY id ASC");

$produk = $conn->query("SELECT tbl_produk.*,tbl_kategori_produk.kategori FROM tbl_produk 
											 LEFT JOIN tbl_kategori_produk ON tbl_kategori_produk.id = tbl_produk.kategori_produk 
											 ORDER BY tbl_produk.id ASC");

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Toko Online Ivana</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
  <script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>

</head>
<body>

<div class="container">
  <h2>ADMIN MAMA MIMI</h2>
 
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Customer</a></li>
    <li><a data-toggle="tab" href="#menu1">Produk</a></li>
    <li><a data-toggle="tab" href="#menu2">Kategori Produk</a></li>
  </ul>

  <div class="tab-content">

	    <div id="home" class="tab-pane fade in active">
	       <h3>Data Customer</h3>
	      	
	      <br><br>
		    <table class="table table-hover" id="tbl_cust">
	      		<thead>
		      		<td>ID</td>
		      		<td>Nama</td>
		      		<td>Alamat</td>
		      		<td>Tlp</td>
		      		<td>Email</td>
		      		<td>Username</td>
		      		<td>Password</td>
		      		<td>Date Created</td>
	      		</thead>

	      		<?php

	      		if($customer)
	      		{
	      			foreach ($customer as $key => $cust) 
	      			{?>
	      				<tr>
	      					<td><?php echo $cust['id'];?></td>
	      					<td><?php echo $cust['nama_customer'];?></td>
	      					<td><?php echo $cust['alamat'];?></td>
	      					<td><?php echo $cust['no_tlp'];?></td>
	      					<td><?php echo $cust['email'];?></td>
	      					<td><?php echo $cust['username'];?></td>
	      					<td><?php echo $cust['password'];?></td>
	      					<td><?php echo date('d-m-Y H:i:s',strtotime($cust['date_created']));?></td>
	      				</tr>
	      				
	      			<?php }
	      		}?>
	      	</table>
    	</div>

    <div id="menu1" class="tab-pane fade">
      <h3>PRODUCT</h3>
      <button class="btn btn-info pull-right" data-toggle="modal" data-target="#modalProduk">Add produk</button>
	      	<br><br>
		    <table class="table table-hover" id="tbl_produk" width="100%">
	      		<thead>
		      		<td>Kode</td>
		      		<td>Nama</td>
		      		<td>Satuan</td>
		      		<td>Harga</td>
		      		<td>Kode Kategori Produk</td>
		      		<td>Action</td>
	      		</thead>

	      		<?php

	      		if($produk)
	      		{
	      			foreach ($produk as $key => $produk) 
	      			{?>
	      				<tr>
	      					<td><?php echo $produk['kode_produk'];?></td>
	      					<td><?php echo $produk['nama_produk'];?></td>
	      					<td><?php echo $produk['satuan'];?></td>
	      					<td><?php echo "Rp.".number_format($produk['harga']);?></td>
	      					<td><?php echo $produk['kategori'];?></td>
	      					<td>
	      						<a class="btn btn-danger btn-sm" onclick="return confirm('Yakin Delete ID ini?');" href="<?php echo 'delete_produk_tugas_11.php?id='.$produk['p_kode'];?>">Delete</a>
	      						
	      						<a class="btn btn-primary btn-sm"  href="<?php echo 'detail_produk.php?id='.$produk['id'];?>">Detail</a>
	      					</td>
	      				</tr>
	      				
	      			<?php }
	      		}?>
	      		
	      	</table>


    	</div>
      

    <div id="menu2" class="tab-pane fade">
      <h3>Kategori Produk</h3>
      <button class="btn btn-info pull-right" data-toggle="modal" data-target="#modalkatagoriproduk">Add Kategori Produk</button>
	      	<br><br>
		    <table class="table table-hover" id="tbl_katagoriproduk" width="100%">
	      		<thead>
		      		<td>Kode Kategori Produk</td>
		      		<td>Nama</td>
		      		<td></td>
	      		</thead>

	      		<?php

	      		if($kategori)
	      		{
	      			foreach ($kategori as $key => $kat) 
	      			{?>
	      				<tr>
	      					<td><?php echo $kat['id'];?></td>
	      					<td><?php echo $kat['kategori'];?></td>
	      					<td>
	      						<a class="btn btn-danger btn-sm" onclick="return confirm('Yakin Delete Kategori ID ini?');" href="<?php echo 'admin/delete_kategori.php?id='.$kat['kp_kode'];?>">Delete</a>
	      					</td>
	      				</tr>
	      				
	      			<?php }
	      		}?>
	      		
	      	</table>


      
    </div>
    
  </div>
</div>

</body>
</html>


<!-- MODAL -->

<!-- BATAS POP UP CUSTOMER -->

<!-- POP UP ADD PRODUK -->
<div class="modal fade" id="modalProduk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Add Produk</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <form action="add_produk.php" id="myform" method="POST" enctype="multipart/form-data" onsubmit="this.submit.disabled = true; this.submit.html = 'Uploading...'; ">
		        	<div class="form-group">
				      <label for="email">Kode Produk:</label>
				      <input type="text" class="form-control" placeholder="Kode Produk" name="kode_produk">
		    		</div>

		    		<div class="form-group">
				      <label for="email">Nama:</label>
				      <input type="text" class="form-control" placeholder="Nama" name="nama_produk">
		    		</div>

		    		<div class="form-group">
				      <label for="email">Satuan:</label>
				     	<select class="form-control" name="satuan">
				      	<option value=''>--Pilih--</option>
				      	<option value='Pcs'>Pcs</option>
				      	<option value='Set'>Set</option>
				      	<option value='Lusin'>Lusin</option>
				      	<option value='Meter'>Meter</option>
				      	</select>
		    		</div>

		    		<div class="form-group">
				      <label for="email">Harga:</label>
				      <input type="text" class="form-control" placeholder="Harga" name="harga">
		    		</div>

		    		<div class="form-group">
				      <label for="email">Kode Katagori Produk:</label>
				      <select class="form-control" name="kategori_produk">
				      	<option value=''>--Pilih--</option>
				      	<?php 
				      	foreach($kategori as $key => $kat) 
				      	{?>
				      		<option value='<?php echo $kat['id'];?>'> <?php echo $kat['kategori'];?></option>
				      	<?php } ?>
				      </select>
		    		</div>

		    		 <div class="form-group">
				      <label for="email">Photo:</label>
				      <input type="file" class="form-control" placeholder="Photo" name="files[]" multiple="true">
		    		</div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="submit" class="btn btn-primary">Add Data</button>
		        </form>
		      </div>
		    </div>
		  </div>
		</div>
<!-- BATAS POP UP ADD PRODUK -->


<!-- POP UP ADD KATEGORI PRODUK -->
<div class="modal fade" id="modalkatagoriproduk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Add Kategori Produk</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <form action="add_kategori.php" id="myform" method="POST">
		    		<div class="form-group">
				      <label for="email">Kategori:</label>
				      <input type="text" class="form-control" placeholder="Kategori" name="kategori">
		    		</div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="submit" class="btn btn-primary">Add Data</button>
		        </form>
		      </div>
		    </div>
		  </div>
		</div>




<!-- JQUERY -->
<script type="text/javascript">
$(document).ready( function () 
{
   $('#tbl_cust').dataTable( {
  	"pageLength": 50
	});

   $('#tbl_produk').dataTable( {
  	"pageLength": 50
	});

   $('#tbl_katagoriproduk').dataTable( {
  	"pageLength": 50
	});

});

</script>



