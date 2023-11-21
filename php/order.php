
<?php
$conn = mysqli_connect('localhost', 'root','','web');

if(isset($_POST['submit'])){ // Fetching variables of the form which travels in URL
  $A = $_POST['first_name'];
  $B = $_POST['last_name'];
  $C = $_POST['email'];
  $D = $_POST['tel'];
  $E = $_POST['food'];
  $F = $_POST['quantity'];
  $G = $_POST['address'];

//Insert Query of SQL

  $insert = "INSERT INTO customer (`first_name`, `last_name`, `email`, `tel`, `food`, `quantity`, `address`) values ('$A', '$B', '$C', '$D', '$E', '$F', '$G')";
  $display = $conn->query($insert);
  if($conn->query($insert)===true){
    //echo "<br/><br/><span>Data Inserted successfully...!!</span>";
	header("Location: ../index.php");
  }else{
    echo"Error";
  }

// else{
// echo "<p>Insertion Failed <br/> Some Fields are Blank....!!</p>";
// }
}
$conn->close(); // Closing Connection with Server



?>
