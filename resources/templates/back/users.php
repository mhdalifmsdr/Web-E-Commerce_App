<div class="col-lg-12">
<h1 class="page-header">
Admin

</h1>
<h2 class="bg-success"><?php display_message(); ?>

</h2>

<a href="index.php?add_user" class="btn btn-primary">Tambah Admin</a>


<div class="col-md-12">

<table class="table table-hover">
    <thead>
        <tr>
            <th>Username</th>
            <th>Email</th>
            
        </tr>
    </thead>
    <tbody>

        <?php display_users(); ?>


    </tbody>
</table> <!--End of Table-->


</div>

</div>