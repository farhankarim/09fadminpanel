<?php
$db_name="daraz";

//database connection
$con=mysqli_connect("localhost","root","");
//database select
$select_db=mysqli_select_db($con,$db_name);
//database exist or not


?>