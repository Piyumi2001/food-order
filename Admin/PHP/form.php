<?php

@include 'conection.php';
session_start();
if(isset($_POST['save'])){

    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];


            $insert = "INSERT INTO food (f_id , f_name, price)
            VALUES ('$id' , '$name' , '$price')";

            mysqli_query($conn, $insert);
        }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Food  </title>
</head>
<body>


    <form action="" class="form" method="post">
        <h3> Food </h3>



        <div>

            <label >Id:</label>
            <input type="number" name="id" id="" placeholder="ID.." required><br><br>

            <label >Food Name:</label>
            <input type="text" name="name" id="" placeholder="Food Name.." required><br><br>


            <label >Price:</label>
            <input type="number" name="price" id="" placeholder="Price.." required><br><br>

        <button class="" name="save"  onclick="location.href=''";> Save</button>
        <br>

    </div>


    </form>

</body>
</html>
