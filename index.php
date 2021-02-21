<!-- Trigger the modal with a button -->

<!-- Modal -->
<div id="updateModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Update Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="index_crud.php" method="post">

    <label for="name">Name</label>
    <input type="hidden" name="id" id="id">
    <input class="form-control" value="<?php echo $data['name']?>" type="text" name="name" id="name">
    <label for="brand">Brand</label>
    <input class="form-control" type="text" value="<?php echo $data['brand']?>" name="brand" id="brand">
    <label for="price">Price</label>
    <input class="form-control" type="number" value="<?php echo $data['price']?>" name="price" id="price">
    <label for="weight">Weight</label>
    <input class="form-control" type="number" value="<?php echo $data['weight']?>" name="weight" id="weight">
    <button name="edit_product" class="mt-4 btn btn-success" type="submit">Update</button>
    <button  class="mt-4 btn btn-warning" data-dismiss="modal">Close</button>
</form>
      </div>
      
    </div>

  </div>
</div>

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
?>
<button type="button" class="btn btn-primary my-3 ml-1" data-toggle="modal" data-target="#create_product">
  Create Product
</button>
<div class="modal fade" id="create_product" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Create Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="index_crud.php" method="post">
            <label for="name">Name</label>
            <input class="form-control" type="text" name="name" id="name">
            <label for="brand">Brand</label>
            <input class="form-control" type="text" name="brand" id="brand">
            <label for="price">Price</label>
            <input class="form-control" type="number" name="price" id="price">
            <label for="weight">Weight</label>
            <input class="form-control" type="number" name="weight" id="weight">
            <button name="create_product" class="mt-4 btn btn-primary" type="submit">Create</button>
    <button  class="mt-4 btn btn-warning" data-dismiss="modal">Close</button>
        </form>
      </div>
     
    </div>
  </div>
</div>
<table id="myTable" class="table">
    <thead>
        <tr>
            <th>id</th>
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
                <td ><?php echo $value['id'] ?></td>
                <td ><?php echo $value['name'] ?></td>
                <td><?php echo $value['brand'] ?></td>
                <td><?php echo $value['price'] ?></td>
                <td><?php echo $value['weight'] ?></td>
                <td>
                <form action="index_crud.php" method="get">
                <button type="button" name="edit_product" class="btn btn-info updateBtn" data-toggle="modal" data-target="#updateModal" >Update</button>
                </form>
                    <form action="index_crud.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $value['id'] ?>" id="id">
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
ob_flush();
?>
<script>
    $(document).ready(function () {
      $('.updateBtn').on('click', function(){

        $('#updateModal').modal('show');

        // Get the table row data.
        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        console.log(data);

        $('#id').val(data[0]);
        $('#name').val(data[1]);
        $('#brand').val(data[2]);
        $('#price').val(data[3]);   
        $('#weight').val(data[4]);   

        });
        
    });
  </script>

