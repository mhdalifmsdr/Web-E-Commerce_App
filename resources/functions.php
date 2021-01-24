<?php 

$upload_directory = "uploads";


// helper function


function last_id(){

global $connection;

return mysqli_insert_id($connection);


}

function set_message($msg){

if(!empty($msg)) {

$_SESSION['message'] = $msg;

} else {

$msg = "";

    }

}


function display_message(){

    if(isset($_SESSION['message'] )) {

        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
}



function redirect($location) {

header("Location: $location");


}

function query($sql) {

global $connection;

return mysqli_query($connection, $sql);

}

function confirm($result) {

global $connection;
if(!$result){

die("QUERY FAILED" . mysqli_error($connection));
		}

}

function escape_string($string) {

global $connection;

return mysqli_real_escape_string($connection, $string);

}


function fetch_array($result){

return mysqli_fetch_array($result);
}



/*************************FRONT END FUNCTION******************************/



//get product

function get_products() {

$query = query(" SELECT * FROM products");

confirm($query); 

$rows = mysqli_num_rows($query);


if(isset($_GET['page'])){

    $page = preg_replace('#[^0-9]#', '', $_GET['page']);

}else{

    $page = 1;

}

$perPage = 3;

$lastPage = ceil($rows / $perPage);

if($page < 1){

    $page = 1;

}elseif($page > $lastPage){

    $page = $lastPage;

}


$middleNumbers = '';

$sub1 = $page - 1;
$sub2 = $page - 2;
$add1 = $page + 1;
$add2 = $page + 2;

if($page == 1){

     $middleNumbers .= '<li class="page-item active"><a>' .$page. '</a></li>';

     $middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$add1.'">' .$add1. '</a></li>';



}elseif ($page == $lastPage) {
    
     $middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$sub1.'">' .$sub1. '</a></li>';

     $middleNumbers .= '<li class="page-item active"><a>' .$page. '</a></li>';

}elseif ($page > 2 && $page < ($lastPage -1)) {

     $middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$sub2.'">' .$sub2. '</a></li>';

     $middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$sub1.'">' .$sub1. '</a></li>';

     $middleNumbers .= '<li class="page-item active"><a>' .$page. '</a></li>';

     $middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$add1.'">' .$add1. '</a></li>';

     $middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$add2.'">' .$add2. '</a></li>';


}elseif ($page > 1 && $page < $lastPage) {
    
     $middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$sub1.'">' .$sub1. '</a></li>';

     $middleNumbers .= '<li class="page-item active"><a>' .$page. '</a></li>';

     $middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$add1.'">' .$add1. '</a></li>';

     
}

$limit = 'LIMIT ' . ($page-1) * $perPage . ',' . $perPage;

$query2 = query(" SELECT * FROM products $limit");

confirm($query2);



$outputPagination = "";



if($page != 1){

    $prev = $page - 1;

    $outputPagination .='<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$prev.'">Back</a></li>';
}

$outputPagination .= $middleNumbers;  

if($page != $lastPage){

    $next = $page + 1;

    $outputPagination .='<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$next.'">Next</a></li>';


}




while($row = fetch_array($query2)){

$product_image = display_image($row['product_image']);

$product = <<<DELIMETER

 <div class="col-sm-4 col-lg-4 col-md-4">
    <div class="thumbnail">
        <a href="item.php?id={$row['product_id']}"><img style="height:200px" src="../resources/{$product_image}" alt=""></a>
        <div class="caption">
            <h4 class="pull-right">&#82&#112; {$row['product_price']}</h4>
            <h4><a href="item.php?id={$row['product_id']}">{$row['product_title']}</a>
            </h4>
            <p>{$row['product_description']}</p>
             <a class="btn btn-primary" href="../resources/cart.php?add={$row['product_id']}">Tambah ke Keranjang</a>
        </div>
       
    </div>
</div>

DELIMETER;

echo $product;

    }

    echo "<div class='text-center'><ul class='pagination'>{$outputPagination}</ul></div>";

}

function get_categories(){

$query = query("SELECT * FROM categories");
confirm($query);

while($row = fetch_array($query)) {


$categories_links = <<<DELIMETER

<a href='category.php?id={$row['cat_id']}' class='list-group-item'>{$row['cat_title']}</a>


DELIMETER;

echo $categories_links;


    
    }


}


function get_products_in_cat_page() {

$query = query(" SELECT * FROM products WHERE product_category_id = " . escape_string($_GET['id']) . "");

confirm($query);    

while($row = fetch_array($query)){

$product_image = display_image($row['product_image']);

$product = <<<DELIMETER

<div class="col-md-3 col-sm-6 hero-feature">
    <div class="thumbnail">
        <img style="height:200px" src= "../resources/{$product_image}" alt="">
        <div class="caption">
            <h3>{$row['product_title']}</h3>
            <p>{$row['product_description']}</p>
            <p>
                <a href="../resources/cart.php?add={$row['product_id']}" class="btn btn-primary">Tambah ke Keranjang</a> <a href="item.php?id={$row['product_id']}" class="btn btn-default">Info</a>
            </p>
        </div>
    </div>
</div>
DELIMETER;

echo $product;

    }

}


function get_products_in_shop_page() {

$query = query(" SELECT * FROM products");

confirm($query);    

while($row = fetch_array($query)){

$product_image = display_image($row['product_image']);

$product = <<<DELIMETER

<div class="col-md-3 col-sm-6 hero-feature">
    <div class="thumbnail">
        <img style="height:200px" src= "../resources/{$product_image}" alt="">
        <div class="caption">
            <h3>{$row['product_title']}</h3>
            <p>{$row['product_description']}</p>
            <p>
                <a href="../resources/cart.php?add={$row['product_id']}" class="btn btn-primary">Tambah ke Keranjang</a> <a href="item.php?id={$row['product_id']}" class="btn btn-default">Info</a>
            </p>
        </div>
    </div>
</div>
DELIMETER;

echo $product;

    }

}




function login_user(){

if(isset($_POST['submit'])){

$username = escape_string($_POST['username']);
$password = escape_string($_POST['password']);

$query = query("SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}'");
confirm($query);

if(mysqli_num_rows($query) == 0){

redirect("login.php");

set_message("Username dan Password yang anda masukkan salah!");


} else {

$_SESSION['username'] = $username;

redirect("admin");


        }


    }



}


function send_message(){

if(isset($_POST['submit'])){


    $to        = "alifmuhammad30@gmail.com";
    $from_name = $_POST['name'];
    $subject   = $_POST['subject'];
    $email     = $_POST['email'];
    $message   = $_POST['message'];


    $headers = "From: {$from_name} {$email}";

    $result = mail($to, $subject,  $message,$headers);

        if(!$result){

            set_message ("Pesan anda tidak terkirim");
            redirect("contact.php");    

        } else {

            set_message ("Pesan anda telah terkirim");
            redirect("contact.php");  
        }

    }

}



/*******************************BACK END FUNCTION******************************/
function form(){


if(isset($_POST['order'])){

$order_id           = escape_string($_POST['order_id']);
$nama               = escape_string($_POST['nama']);
$alamat             = escape_string($_POST['alamat']);
$no_hp              = escape_string($_POST['no_hp']);
$pesanan            = $_POST['pesanan'];
$total              = escape_string($_POST['total']);
$data               = json_decode($pesanan);


$query = query("INSERT INTO orders(order_id, nama, alamat, no_hp, pesanan, total) VALUES('{$order_id}','{$nama}', '{$alamat}', '{$no_hp}', '{$pesanan}', '{$total}')");

confirm($query);

// query kurangi jumlah barang
foreach ($data as $dt) {
    $query = query("UPDATE products SET product_quantity = product_quantity - ".$dt->qty." WHERE product_id = ".$dt->product_id."");
    confirm($query);

}


$last_id = last_id();
$cust = [
    'nama' => $_POST['nama'],
    'alamat' => $_POST['alamat'],
    'no_hp' => $_POST['no_hp']
];


$_SESSION['cust'] = $cust;
redirect("thank_you.php");
    }

}


function display_orders(){


$query = query("SELECT * FROM orders");
confirm($query);
$order = '';
while($row = fetch_array($query)){

    $pesanan = json_decode($row['pesanan'], TRUE);
    foreach ($pesanan as $pesan) {
        $order .= ' Product : '.$pesan['product']."<br>".
                  ' Jumlah  : '.$pesan['qty']."<br>"; 
    }

$orders = <<<DELIMETER

<tr>
    
    <td>{$row['nama']}</td>
    <td>{$row['alamat']}</td>
    <td>{$row['no_hp']}</td>
    <td>{$order}<br></td>
    <td>{$row['total']}</td>
    <td><a class="btn btn-danger" href="../../resources/templates/back/delete_order.php?id={$row['order_id']}"><span class="glyphicon glyphicon-remove"></span></a></td>
</tr>

DELIMETER;

echo $orders;
$order = '';
        }


}




/************************* Admin Product Page ******************/



function display_image($picture){

global $upload_directory;    

return $upload_directory . DS . $picture;


}


function get_product_in_admin(){

$query = query(" SELECT * FROM products");

confirm($query);    

while($row = fetch_array($query)){

$category = show_product_category_title($row['product_category_id']);

$product_image = display_image($row['product_image']);

$product = <<<DELIMETER

        <tr>
            
            <td>{$row['product_title']}<br>
            <img width='100' src="../../resources/{$product_image}" alt="">
            </td>
            <td>{$category}</td>
            <td>{$row['product_price']}</td>
            <td>{$row['product_quantity']}</td>
            <td><a href="index.php?edit_product&id={$row['product_id']}" class="btn btn-success" >Edit</a>
             <a class="btn btn-danger" href="../../resources/templates/back/delete_product.php?id={$row['product_id']}"><span class="glyphicon glyphicon-remove"></span></a></td>
        </tr>
 

DELIMETER;

echo $product;

    }

}


function show_product_category_title($product_category_id){

$category_query = query ("SELECT * FROM categories WHERE cat_id = '{$product_category_id}' ");
confirm($category_query);

while($category_row = fetch_array($category_query)){

return $category_row['cat_title'];

    }

}

/**************************** add products in admin *****************************/

function add_product(){


if(isset($_POST['publish'])){

$product_title              = escape_string($_POST['product_title']);
$product_category_id        = escape_string($_POST['product_category_id']);
$product_price              = escape_string($_POST['product_price']);
$product_description        = escape_string($_POST['product_description']);
$short_desc                 = escape_string($_POST['short_desc']);
$product_quantity           = escape_string($_POST['product_quantity']);
$product_image              = escape_string($_FILES['file']['name']);
$image_temp_location        = $_FILES['file']['tmp_name'];

move_uploaded_file($image_temp_location, UPLOAD_DIRECTORY . DS . $product_image);

$query = query("INSERT INTO products(product_title, product_category_id, product_price, product_description, short_desc, product_quantity, product_image) VALUES('{$product_title}', '{$product_category_id}', '{$product_price}', '{$product_description}', '{$short_desc}', '{$product_quantity}', '{$product_image}')");

confirm($query);
$last_id = last_id();
set_message("Produk {$product_title} Telah Di Tambahkan");
redirect("index.php");

    }

}

function show_categories_add_product_page(){

$query = query("SELECT * FROM categories");
confirm($query);

while($row = fetch_array($query)) {


$categories_options = <<<DELIMETER

<option value="{$row['cat_id']}">{$row['cat_title']}</option>

DELIMETER;

echo $categories_options;


    
    }


}



/*****************************updating product code********************/
function update_product(){


if(isset($_POST['update'])){

$product_title              = escape_string($_POST['product_title']);
$product_category_id        = escape_string($_POST['product_category_id']);
$product_price              = escape_string($_POST['product_price']);
$product_description        = escape_string($_POST['product_description']);
$short_desc                 = escape_string($_POST['short_desc']);
$product_quantity           = escape_string($_POST['product_quantity']);
$product_image              = escape_string($_FILES['file']['name']);
$image_temp_location        = escape_string($_FILES['file']['tmp_name']);


if(empty($product_image)){

$get_pic = query("SELECT * FROM products WHERE product_id=" .escape_string($_GET['id']). "");
confirm($get_pic);

while($pic = fetch_array($get_pic)){

$product_image = $pic['product_image'];

    }
}

move_uploaded_file($image_temp_location, UPLOAD_DIRECTORY . DS . $product_image);

$query  = "UPDATE products SET ";
$query .= "product_title        = '{$product_title}'        ,";
$query .= "product_category_id  = '{$product_category_id}'  ,";
$query .= "product_price        = '{$product_price}'        ,";
$query .= "product_description  = '{$product_description}'  ,";
$query .= "short_desc           = '{$short_desc}'           ,";
$query .= "product_quantity     = '{$product_quantity}'     ,";
$query .= "product_image        = '{$product_image}'         ";
$query .= "WHERE product_id=" . escape_string($_GET['id']);


$send_update_query = query($query);
confirm($send_update_query);
set_message("Produk Telah Update");
redirect("index.php");

    }

}


/**************************Categories in Admin*************************/

function show_categories_in_admin(){

$category_query = query("SELECT * FROM categories");
confirm($category_query);

while($row = fetch_array($category_query)) {

$cat_id = $row['cat_id'];
$cat_title = $row['cat_title'];

$category = <<<DELIMETER


<tr>
    <td>{$cat_title}</td>
    <td><a class="btn btn-danger" href="../../resources/templates/back/delete_category.php?id={$row['cat_id']}"><span class="glyphicon glyphicon-remove"></span></a></td>
</tr>

DELIMETER;

echo $category;

    }

}


function add_category(){

if(isset($_POST['add_category'])){

$cat_title = escape_string($_POST['cat_title']);

if(empty($cat_title) || $cat_title == " "){

echo "<p class='bg-danger'>Field Tidak Boleh Kosong</p>";

} else {

$insert_cat = query("INSERT INTO categories(cat_title) VALUES('{$cat_title}') ");
confirm($insert_cat);

set_message("Kategori Telah Dibuat");



        }

    }

}


/*********************admin User******************/

function display_users(){

$category_query = query("SELECT * FROM users");
confirm($category_query);

while($row = fetch_array($category_query)) {

$user_id = $row['user_id'];
$username = $row['username'];
$email = $row['email'];
$password = $row['password'];

$user = <<<DELIMETER


<tr>
    <td>{$username}</td>
    <td>{$email}</td>
    <td><a class="btn btn-danger" href="../../resources/templates/back/delete_user.php?id={$row['user_id']}"><span class="glyphicon glyphicon-remove"></span></a></td>
</tr>

DELIMETER;

echo $user;

    }

}


function add_user(){

if(isset($_POST['add_user'])){


$username     = escape_string($_POST['username']);
$email        = escape_string($_POST['email']);
$password     = escape_string($_POST['password']);
$query = query("INSERT INTO users(username,email,password) VALUES('{$username}','{$email}','{$password}')");
confirm($query);

set_message("User Created");

redirect("index.php?users");


    }

}


/***************************Report**********/
function get_reports(){

$query = query(" SELECT * FROM reports");

confirm($query);    

while($row = fetch_array($query)){

$report = <<<DELIMETER

        <tr>
            <td>{$row['report_id']}</td>
            <td>{$row['product_id']}</td>
            <td>{$row['order_id']}</td>
            <td>{$row['product_price']}</td>
            <td>{$row['product_title']}
            <td>{$row['product_quantity']}</td>
             <td><a class="btn btn-danger" href="../../resources/templates/back/delete_report.php?id={$row['report_id']}"><span class="glyphicon glyphicon-remove"></span></a></td>
        </tr>
 

DELIMETER;

echo $report;

    }

}


/************************* Slides Funtions*********************/

function add_slides(){

if(isset($_POST['add_slide'])){

$slide_title            = escape_string($_POST['slide_title']);
$slide_image            = escape_string($_FILES['file']['name']);
$slide_image_loc        = $_FILES['file']['tmp_name'];


if(empty($slide_title) || empty($slide_image)) {

echo "<p class='bg-danger'>Nama slide tidak boleh kosong</p>";

}else{

move_uploaded_file($slide_image_loc, UPLOAD_DIRECTORY . DS . $slide_image);

$query = query("INSERT INTO slides(slide_title,slide_image) VALUES('{$slide_title}','{$slide_image}')");
confirm($query);
set_message("Slide Added");
redirect("index.php?slides");

        }

    }


}


function get_current_slide_in_admin(){

$query = query("SELECT * FROM slides ORDER BY slide_id DESC LIMIT 1");
confirm($query);

while($row = fetch_array($query)){

$slide_image = display_image($row['slide_image']);

$slide_active_admin = <<<DELIMETER


    <img class="img-responsive" src="../../resources/{$slide_image}" alt="">


DELIMETER;

echo $slide_active_admin;

    }

}


function get_slides(){

$query = query("SELECT * FROM slides");
confirm($query);

$active = 'active';
while($row = fetch_array($query)){

$slide_image = display_image($row['slide_image']);

$slides = <<<DELIMETER

<div class="item $active">
    <img class="slide-image" src="../resources/{$slide_image}" alt="">
</div>

DELIMETER;

echo $slides;
$active = '';


    }

}


function get_slide_thumbnails(){

$query = query("SELECT * FROM slides ORDER BY slide_id ASC");
confirm($query);

while($row = fetch_array($query)){

$slide_image = display_image($row['slide_image']);

$slide_thumb_admin = <<<DELIMETER

<div class="col-xs-6 col-md-3 image_container">

        <a class='btn btn-danger delete-slides' href="index.php?delete_slide_id={$row['slide_id']}"><span class='glyphicon glyphicon-remove'></span></a>
        <img width="200" class="img-responsive slide_image" src="../../resources/{$slide_image}" alt="">

    <div class="caption">

    <h3>{$row['slide_title']}</h3>
    

    </div>

</div>



DELIMETER;

echo $slide_thumb_admin;

    }

}



 ?>