<?php
ob_start();
session_start();
// var_dump($_SESSION);
if (!isset($_SESSION['username'])) {
    header("location: login.php");
}

include("includes/db.php");

if(isset($_POST['edit_product'])){
  $id=$_POST['id'];
  $name=$_POST['name'];
  $brand=$_POST['brand'];
  $price=$_POST['price'];
  $weight=$_POST['weight'];


  $sql="update products set name='$name',brand='$brand',price='$price',weight='$weight' where product_id ='$id'";
  $query=mysqli_query($con,$sql);
  
  if($query){
    $_SESSION['create']="Product updated successfully";
    header("location:index.php");
  }
  else{
    echo "something went wrong";
  }
}

if(isset($_POST['create_product'])){
    $name=$_POST['name'];
    $brand=$_POST['brand'];
    $price=$_POST['price'];
    $weight=$_POST['weight'];
    // get the name of file
    $c_image = $_FILES['image']['name'];
    // get the location of file in chrome temp folder
    $c_image_tmp = $_FILES['image']['tmp_name'];
    // move the file from temp folder to server folder named uploads
    move_uploaded_file($c_image_tmp,"uploads/$c_image");
  $sql="insert into products(name,brand,price,weight,image_path) values('$name','$brand','$price','$weight','$c_image')";
  
  $query=mysqli_query($con,$sql);
  
  if($query){
    $_SESSION['create']="Product created successfully";
    header("location:index.php");
  }
  else{
    echo "something went wrong";
  }
  }
  
  if(isset($_POST['delete_product'])){
    $id=$_POST['product_id'];
    $sql="delete from products where product_id = '$id'";
    var_dump($sql);
    $delete_product=mysqli_query($con,$sql);
    if($delete_product){
      $_SESSION['delete']="Product deleted successfully";
      header("location:index.php");
    }
    else{
      echo "something went wrong";
    }
  }
