
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
	      	<button class="btn btn-info pull-right" data-toggle="modal" data-target="#modalCustomer">Add Customer</button>
	      	<br><br>
		    <table class="table table-hover" id="tbl_cust">
	      		<thead>
		      		<td>ID</td>
		      		<td>Nama</td>
		      		<td>Alamat</td>
		      		<td>Tlp</td>
		      		<td>Email</td>
		      		<td>Password</td>
		      		<td>Action</td>
	      		</thead>

	      		<?php

	      		if($customer)
	      		{
	      			foreach ($customer as $key => $cust) 
	      			{?>
	      				<tr>
	      					<td><?php echo $cust['cus_id'];?></td>
	      					<td><?php echo $cust['cus_nama'];?></td>
	      					<td><?php echo $cust['cus_alamat'];?></td>
	      					<td><?php echo $cust['cus_phone'];?></td>
	      					<td><?php echo $cust['cus_mail'];?></td>
	      					<td><?php echo $cust['cus_password'];?></td>
	      					<td>
	      						<a class="btn btn-danger" onclick="return confirm('Yakin Delete ID ini?');" href="<?php echo 'delete_customer_tugas_11.php?id='.$cust['cus_id'];?>">Delete</a>
	      						<a class="btn btn-warning"  href="<?php echo 'edit_customer_tugas_11.php?id='.$cust['cus_id'];?>">Edit</a>
	      					</td>
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
		      		<td>Photo</td>
		      		<td></td>
	      		</thead>

	      		<?php

	      		if($produk)
	      		{
	      			foreach ($produk as $key => $produk) 
	      			{?>
	      				<tr>
	      					<td><?php echo $produk['p_kode'];?></td>
	      					<td><?php echo $produk['p_nama'];?></td>
	      					<td><?php echo $produk['p_satuan'];?></td>
	      					<td><?php echo "Rp.".number_format($produk['p_harga']);?></td>
	      					<td><?php echo $produk['kp_nama'];?></td>
	      					<td><?php echo $produk['p_photo'];?></td>
	      					<td>
	      						<a class="btn btn-danger" onclick="return confirm('Yakin Delete ID ini?');" href="<?php echo 'delete_produk_tugas_11.php?id='.$produk['p_kode'];?>">Delete</a>
	      						<a class="btn btn-warning"  href="<?php echo 'edit_produk_tugas_11.php?id='.$produk['p_kode'];?>">Edit</a>
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

	      		if($katagoriproduk)
	      		{
	      			foreach ($katagoriproduk as $key => $kat) 
	      			{?>
	      				<tr>
	      					<td><?php echo $kat['kp_kode'];?></td>
	      					<td><?php echo $kat['kp_nama'];?></td>
	      					<td>
	      						<a class="btn btn-danger" onclick="return confirm('Yakin Delete ID ini?');" href="<?php echo 'delete_kategori_produk_tugas_11.php?id='.$kat['kp_kode'];?>">Delete</a>
	      						<a class="btn btn-warning"  href="<?php echo 'edit_kategori_produk_tugas_11.php?id='.$kat['kp_kode'];?>">Edit</a>
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

<!-- POPUP ADD CUSTOMER -->
<div class="modal fade" id="modalCustomer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="add_customer_tugas_11.php" id="myform" method="POST">
        	<div class="form-group">
		      <label for="email">Nama:</label>
		      <input type="text" class="form-control" placeholder="Nama Customer" name="cus_nama">
    		</div>

    		<div class="form-group">
		      <label for="email">Alamat:</label>
		      <input type="text" class="form-control" placeholder="Alamat" name="cus_alamat">
    		</div>

    		<div class="form-group">
		      <label for="email">Phone:</label>
		      <input type="text" class="form-control" placeholder="No Tlp" name="cus_tlp">
    		</div>

    		<div class="form-group">
		      <label for="email">Email:</label>
		      <input type="text" class="form-control" placeholder="E-mail" name="cus_email">
    		</div>

    		<div class="form-group">
		      <label for="email">Password:</label>
		      <input type="text" class="form-control" placeholder="Password" name="cus_password">
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
		        <form action="add_produk_tugas_11.php" id="myform" method="POST">
		        	<div class="form-group">
				      <label for="email">Kode Produk:</label>
				      <input type="text" class="form-control" placeholder="Kode Produk" name="p_kode">
		    		</div>

		    		<div class="form-group">
				      <label for="email">Nama:</label>
				      <input type="text" class="form-control" placeholder="Nama" name="p_nama">
		    		</div>

		    		<div class="form-group">
				      <label for="email">Satuan:</label>
				      <input type="text" class="form-control" placeholder="Satuan" name="p_satuan">
		    		</div>

		    		<div class="form-group">
				      <label for="email">Harga:</label>
				      <input type="text" class="form-control" placeholder="Harga" name="p_harga">
		    		</div>

		    		<div class="form-group">
				      <label for="email">Kode Katagori Produk:</label>
				      <!-- <input type="text" class="form-control" placeholder="Kode Katagori Produk" name="p_kp_kode"> -->
				      <select class="form-control" name="p_kp_kode">
				      	<option value=''>--Pilih--</option>
				      	<?php 
				      	foreach($katagoriproduk as $key => $kat) 
				      	{?>
				      		<option value='<?php echo $kat['kp_kode'];?>'> <?php echo $kat['kp_nama'];?></option>
				      	<?php } ?>
				      	
				      </select>
		    		</div>

		    		 <div class="form-group">
				      <label for="email">Photo:</label>
				      <input type="text" class="form-control" placeholder="Photo" name="p_photo">
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
		        <form action="add_katagori_produk_tugas_11.php" id="myform" method="POST">
		        	<div class="form-group">
				      <label for="email">Kode Produk:</label>
				      <input type="text" class="form-control" placeholder="Kode Produk" name="kp_kode">
		    		</div>

		    		<div class="form-group">
				      <label for="email">Nama:</label>
				      <input type="text" class="form-control" placeholder="Nama" name="kp_nama">
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
  	"pageLength": 5
	});

   $('#tbl_produk').dataTable( {
  	"pageLength": 5
	});

   $('#tbl_katagoriproduk').dataTable( {
  	"pageLength": 5
	});

});

</script>



