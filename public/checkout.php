<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php") ?>

    <!-- Page Content -->
    <div class="container">


<!-- /.row --> 

<div class="row">
  <h4 class="text-center bg-danger"><?php display_message(); ?></h4>

  <h1>Pesanan</h1>

    <table class="table table-striped">
        <thead>
          <tr>
           <th>Produk</th>
           <th>Harga</th>
           <th>Jumlah</th>
           <th>Total Harga</th>
          </tr>
        </thead>
        <tbody>

            <?php cart(); ?>
        
        </tbody>
    </table>
<a href="form_data.php" class="btn btn-success" <?= isset($_SESSION['item_quantity']) ? '' : 'disabled' ?>>Beli Sekarang</a>
</form>

<!--  ***********CART TOTALS*************-->
            
<div class="col-xs-4 pull-right ">
<h2>Jumlah Belanjaan</h2>

<table class="table table-bordered" cellspacing="0">

<tr class="cart-subtotal">
<th>Item</th>
<td><span class="amount"><?php echo isset($_SESSION['item_quantity']) ? $_SESSION['item_quantity'] : $_SESSION['item_quantity'] ="0"; ?></span></td>
</tr>
<tr class="shipping">
<th>Pengiriman</th>
<td>Pengiriman Gratis</td>
</tr>

<tr class="order-total">
<th>Total Pembayaran</th>
<td><strong><span class="amount">&#82;&#112;  
  <?php echo isset($_SESSION['item_total']) ? $_SESSION['item_total'] : $_SESSION['item_total'] = "0"; ?>
    
  </span></strong> </td>
</tr>

</tbody>

</table>

</div><!-- CART TOTALS-->

</div><!--Main Content-->

</div>
    <!-- /.container -->

<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>