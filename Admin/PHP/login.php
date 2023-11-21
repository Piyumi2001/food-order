
<?php

    $username = $_POST['uname'];
    $password = $_POST['psw'];


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//to prevent from mysqli injection
 $username = stripcslashes($username);
 $password = stripcslashes($password);
 $username = mysqli_real_escape_string($con, $username);
 $password = mysqli_real_escape_string($con, $password);

 $sql = "select *from login where username = '$username' and password = '$password'";
 $result = mysqli_query($con, $sql);
 $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
 $count = mysqli_num_rows($result);

 if($count == 1){
     echo "<h1><center> Login successful </center></h1>";
 }
 else{
     echo "<h1> Login failed. Invalid username or password.</h1>";
 }
?>

$conn->close();

?>
