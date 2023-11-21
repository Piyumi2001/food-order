<?php
$conn = mysqli_connect('localhost', 'root','','web');

// sql to delete a record
if(isset($_GET['f_id'])){
    $f_id=$_GET['f_id'];
    $delete=mysqli_query($conn, "DELETE from food WHERE f_id='$f_id'");
  }

?>
