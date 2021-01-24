<?php add_category(); ?>

<h1 class="page-header">
  Kategori Produk

</h1>


<div class="col-md-4">

    <h3 class="bg-success"><?php display_message(); ?></h3>
    
    <form action="" method="post">
    
        <div class="form-group">
            <label for="category-title">Judul</label>
            <input name="cat_title" type="text" class="form-control">
        </div>

        <div class="form-group">
            
            <input name="add_category" type="submit" class="btn btn-primary" value="Tambah Kategori">
        </div>      


    </form>


</div>


<div class="col-md-8">

    <table class="table">
            <thead>

        <tr>
            <th>Kategori</th>
        </tr>
            </thead>


    <tbody>
        
        <?php show_categories_in_admin(); ?>


    </tbody>

        </table>

</div>