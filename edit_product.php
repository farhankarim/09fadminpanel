<?php
ob_start();
session_start();
// var_dump($_SESSION);
if (!isset($_SESSION['username'])) {
    header("location: login.php");
}

include("includes/head.php");
include("includes/sidebar.php");
include("includes/navbar.php");
include("includes/db.php");

//fetch data from database with id passed in get request

$product_id=$_GET['product_id'];
$query="select * from products where product_id = '$product_id'";
$result=mysqli_query($con,$query);
//fetch sing row data in associative array
$data=mysqli_fetch_assoc($result);
// var_dump($data);
?>

//form selected row id fetch
//fetch record from database with id fetched above
//fetched record update in form
//form updation reflected in database update
<form action="" method="post">
    <label for="name">Name</label>
    <input class="form-control" value="<?php echo $data['name']?>" type="text" name="name" id="name">
    <label for="brand">Brand</label>
    <input class="form-control" type="text" value="<?php echo $data['brand']?>" name="brand" id="brand">
    <label for="price">Price</label>
    <input class="form-control" type="text" value="<?php echo $data['price']?>" name="price" id="price">
    <label for="weight">Weight</label>
    <input class="form-control" type="text" value="<?php echo $data['weight']?>" name="weight" id="weight">
    <button name="create_product" class="btn btn-success" type="submit">Update</button>
</form>

<?php

if(isset($_POST['create_product'])){
    $name=$_POST['name'];
    $brand=$_POST['brand'];
    $price=$_POST['price'];
    $weight=$_POST['weight'];

    $sql="update products set name='$name', brand='$brand',price='$price',weight='$weight' where product_id='$product_id'";
    $result=mysqli_query($con,$sql);

    if($result){
        header("location:index.php");
    }
    else{
        echo "something went wrong";
    }
}
include("includes/footer.php");
include("includes/scripts.php");

?>