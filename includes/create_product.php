
<br>
<button type="button" class="btn btn-primary my-3 ml-1" data-toggle="modal" data-target="#create_product">
  Create Product
</button>
<div class="modal fade" id="create_product" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
            <label for="name">Name</label>
            <input class="form-control" type="text" name="name" id="name">
            <label for="brand">Brand</label>
            <input class="form-control" type="text" name="brand" id="brand">
            <label for="price">Price</label>
            <input class="form-control" type="text" name="price" id="price">
            <label for="weight">Weight</label>
            <input class="form-control" type="text" name="weight" id="weight">
            <button name="create_product" class="btn btn-primary" type="submit">Create</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<?php

if(isset($_POST['create_product'])){
  $name=$_POST['name'];
  $brand=$_POST['brand'];
  $price=$_POST['price'];
  $weight=$_POST['weight'];

$sql="insert into products(name,brand,price,weight) values('$name','$brand','$price','$weight')";

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
  $delete_product=mysqli_query($con,$sql);
  if($query){
    $_SESSION['delete']="Product deleted successfully";
    header("location:index.php");
  }
  else{
    echo "something went wrong";
  }
}

if(isset($_POST['edit_product'])){
}
?>