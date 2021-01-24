<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
    
        <li <?php if (basename($_SERVER['REQUEST_URI']) == 'index.php') echo 'class="active"' ?>>
            <a href="index.php"><i class="fa fa-eye"></i> Produk</a>
        </li>
        
        <li <?php if (basename($_SERVER['REQUEST_URI']) == 'index.php?add_product') echo 'class="active"' ?>>
            <a href="index.php?add_product"><i class="fa fa-plus-circle"></i> Tambah Produk</a>
        </li>
        
        <li <?php if (basename($_SERVER['REQUEST_URI']) == 'index.php?orders') echo 'class="active"' ?>>
            <a href="index.php?orders"><i class="fa fa-book"></i> Orderan</a>
        </li>

        <li <?php if (basename($_SERVER['REQUEST_URI']) == 'index.php?categories') echo 'class="active"' ?>>
            <a href="index.php?categories"><i class="fa fa-list-alt"></i> Kategori</a>
        </li>

        <li <?php if (basename($_SERVER['REQUEST_URI']) == 'index.php?slides') echo 'class="active"' ?>>
            <a href="index.php?slides"><i class="fa fa-film"></i> Slide</a>
        </li>

        <li <?php if (basename($_SERVER['REQUEST_URI']) == 'index.php?users') echo 'class="active"' ?>>
            <a href="index.php?users"><i class="fa fa-users"></i> Admin</a>
        </li>

        
    
    
    </ul>
</div>
<!-- /.navbar-collapse -->