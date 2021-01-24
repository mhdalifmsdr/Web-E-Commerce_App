<?php require_once("../resources/config.php"); ?>

<?php include(TEMPLATE_FRONT . DS . "header.php") ?>

<?php form(); ?>

<?php $order_data = $_SESSION['order-data']; ?>


    <!-- Page Content -->
<div class="container">
<div class="row">
<h1 class="page-header">
    FORM DATA DIRI

</h1>
</div>
               

    
<form action="" method="post" enctype="multipart/form-data">

<div class="col-md-8">

<div class="form-group">
    <label>Nama</label>
        <input type="text" name="nama" class="form-control">
       
    </div>

    <div class="form-group">
           <label>Alamat</label>
      <textarea name="alamat" id="" cols="30" rows="5" class="form-control"></textarea>
    </div>

    <div class="form-group">
           <label>No. Handphone</label>
      <textarea name="no_hp" id="" cols="30" rows="1" class="form-control"></textarea>
    </div>

     <div class="form-group">
        <label>Pesanan</label>
        <textarea id="" cols="30" rows="5" class="form-control">
        <?php 
        $total = 0;
        $order = '';
        foreach ($order_data as $order) {
            echo $order['product']. ' ( '.$order['qty'].'pcs )'. "\n";
            $total = $total + $order['sub-total'];
            }
        ?>
        </textarea>       
        
    </div>

    <div class="form-group">
      <textarea name="pesanan" style="display:none;" class="form-control">
          <?php echo json_encode($order_data); ?>
      </textarea>
    </div>

    <div class="form-group">
           <label>Total</label>
      <input type="text" name="total" class="form-control" value="<?php echo $total; ?>">
    </div>

    <div class="form-group">
        <input type="submit" name="order" class="btn btn-primary btn-lg" value="Pesan">
    </div>

</div><!--Main Content-->

</div>

    <?php include(TEMPLATE_FRONT . DS . "footer.php") ?>