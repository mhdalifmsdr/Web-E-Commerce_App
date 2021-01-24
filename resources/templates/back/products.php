<h1 class="page-header">
   Produk

</h1>

<h3 class="bg-success"><?php display_message(); ?></h3>

<table class="table table-hover">


    <thead>

      <tr>
           
           <th>Nama Produk</th>
           <th>Kategori</th>
           <th>Harga</th>
           <th>Jumlah</th>

      </tr>
    </thead>
    <tbody>

        <?php get_product_in_admin(); ?>
      


  </tbody>
</table>