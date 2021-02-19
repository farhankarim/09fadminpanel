<?php
ob_start();
session_start();
// var_dump($_SESSION);
if(!isset($_SESSION['username'])){
    header("location: login.php");
}

include("includes/head.php");
include("includes/sidebar.php");
include("includes/navbar.php");
include("includes/db.php");

//select * from products result saved in $result variable
$query = "select * from products";
$data = mysqli_query($con, $query);
echo "<br> No.of products in store are <b>$data->num_rows<b>";


?>
<?php
if (isset($_SESSION['delete'])) {
?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Holy guacamole!</strong> <?php echo $_SESSION['delete']; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php
    // if closing tag here
    unset($_SESSION["delete"]);
}
?>

<?php
if (isset($_SESSION['create'])) {
?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Holy guacamole!</strong> <?php echo $_SESSION['create']; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php
    // if closing tag here
    unset($_SESSION["create"]);
}
include('includes/create_product.php');
?>
<table id="myTable" class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Brand</th>
            <th>Price</th>
            <th>Weight</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php

        foreach ($data as $value) {
        ?>
            <tr>
                <td scope="row"><?php echo $value['name'] ?></td>
                <td><?php echo $value['brand'] ?></td>
                <td><?php echo $value['price'] ?></td>
                <td><?php echo $value['weight'] ?></td>
                <td>
                <form action="edit_product.php" method="get">
                        <input type="hidden" name="product_id" value="<?php echo $value['product_id'] ?>" id="product_id">
                    <button name="edit_product" class="btn btn-warning" type="submit">Edit</button>
                </form>
                    <form action="" method="post">
                        <input type="hidden" name="product_id" value="<?php echo $value['product_id'] ?>" id="product_id">
                    <button name="delete_product" class="btn btn-danger" type="submit">Delete</button>
                    </form>
                    
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>

<?php
include("includes/footer.php");
include("includes/scripts.php");

?>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>