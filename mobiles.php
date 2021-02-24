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
echo "<h2>Products</h2><br> No.of products in store are <b>$data->num_rows<b>";


?>
<div class="pt-lg-12 pb-lg-3 pt-8 pb-6">
    <div class="container">
      <div class="row d-lg-flex align-items-center mb-4">
        <div class="col">
          <h2 class="mb-0">Recommended to you</h2>
        </div>
        <div class="col-auto">
          <a href="pages/course-filter-list.html" class="btn btn-outline-primary btn-sm">View All</a>
        </div>
      </div>
      <form action="" method="POST">
      
        <input type="text" name="search_box" id="search">
        <button type="submit" name="search">Search</button>
      </form>
      <div class="row">
        <div class="col-lg-3 col-md-6 col-12">
          <!-- Card -->
          <?php
          if(isset($_POST['search'])){
            $search=$_POST['search_box'];
            $query="select * from products where name like '$search%' ";
            var_dump($query);
            $data=mysqli_query($con,$query);
          }
          
          
         
          foreach ($data as $row) {
              # code...
        
          ?>
          <div class="card  mb-4 card-hover">
            <a href="pages/course-single.html" w class="card-img-top"><img src="<?php echo "uploads/".$row["image_path"]?>" alt="" class="rounded-top card-img-top"></a>
            <!-- Card Body -->
            <div class="card-body">
              <h4 class="mb-2 text-truncate-line-2 "><a href="pages/course-single.html" class="text-inherit"><?php echo $row["name"]?></a></h4>
              <!-- List -->
              <ul class="mb-3 list-inline">
                <li class="list-inline-item"><i class="far fa-clock mr-1"></i>3h 56m</li>
                <li class="list-inline-item">
                  <svg class="mr-1 mt-n1" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE"></rect>
                    <rect x="7" y="5" width="2" height="9" rx="1" fill="#DBD8E9"></rect>
                    <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>
                  </svg>
                  Beginner
                </li>
              </ul>
              <div class="lh-1">
                <span>
                  <i class="mdi mdi-star text-warning mr-n1"></i>
                  <i class="mdi mdi-star text-warning mr-n1"></i>
                  <i class="mdi mdi-star text-warning mr-n1"></i>
                  <i class="mdi mdi-star text-warning mr-n1"></i>
                  <i class="mdi mdi-star text-warning"></i>
                </span>
                <span class="text-warning">4.5</span>
                <span class="font-size-xs text-muted">(7,700)</span>
              </div>
            </div>
            <!-- Card Footer -->
            <div class="card-footer">
              <div class="row align-items-center no-gutters">
                <div class="col-auto">
                  <img src="uploads/Capture.JPG" width="100" class="rounded-circle avatar-xs" alt="">
                </div>
                <div class="col ml-2">
                  <span>Morris Mccoy</span>
                </div>
                <div class="col-auto">
                  <a href="#!" class="text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Bookmarks">
                    <i class="fe fe-bookmark  "></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        <?php
        
    }
        ?>
      </div>
    </div>
  </div>