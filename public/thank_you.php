<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php") ?>

    <!-- Page Content -->
    <div class="container">
        <h1 class="page-header"><center>Terima Kasih telah Berbelanja</center></h1>
    
    <h2>Rincian Pesanan</h2><br>
    <p>Nama&emsp;&emsp;: <?php echo $_SESSION['cust']['nama']; ?></p>
    <p>Alamat &emsp; : <?php echo $_SESSION['cust']['alamat']; ?> </p>
	<p>No. Hp &emsp; : <?php echo $_SESSION['cust']['no_hp']; ?></p>
	<p>Pesanan</p>	
	<table class="table table-bordered">
    <thead>
      <tr> 
           <th class="text-center">Produk</th>
           <th class="text-center">Jumlah</th>
           <th class="text-center">Harga</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $total = 0;
    $order_data = $_SESSION['order-data'];
    	foreach ($order_data as $order) {
    		echo '
    			<tr>
			      <td>'.$order['product'].'</td>
			      <td>'.$order['qty'].'</td>
			      <td>Rp. '.$order['sub-total'].'</td>
		      	</tr>
    		';
    		$total = $total + $order['sub-total'];
    	}

     ?>	
   	  

    </tbody>

    </table>

    <h3 class="text-right"> Total Belanja : Rp. <?php echo $total; ?></h3><br>
    
    <div>
    <a class="btn pull-right btn-success btn-lg" href="index.php">Selesai</a>
    </div>
    <br>

    <h4>Transfer Pembayaran ke Rekening</h4>
    <h4><img height="35" width="90" src="../resources/uploads/BCA_logo.png">&emsp;Muhammad Alif Musdiar<br> 
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;0341930285</h4>
    <p>Setelah melakukan pembayaran,<br>
       bukti pembayaran kirim ke Admin<br>
    </p>
    <h4><img height="35" width="45" src="../resources/uploads/450px-LINE_logo.svg.png">&emsp; @muhammad_alif24</h4>
    <h4><img height="35" width="45" src="../resources/uploads/wa_logo.png">&emsp; 081266669098</h4> 
   
	 </div>




  



    <!-- /.container -->

<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>