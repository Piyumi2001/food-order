<?php
include 'conection.php';

// $s = $conn->query("SELECT Category FROM plant_table");
// $ss = $conn->query("SELECT Id FROM plant_table WHERE Category = '$s'");
// $sss = $conn->query("SELECT Id  FROM category");

//     // if($ss == $sss) {
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
  <section class="product" id="product">

<h1 class="heading">Today <span> Special</span></h1>

<!-- DISPLAY -->


<div class="box-container">
<?php

$f_id = $_GET['id'];

$sql = $conn->query("SELECT * FROM food WHERE f_id='$f_id'");

while ($data = $sql->fetch_assoc())
{
?>
<div class="box">
    <div class="image">
        <img src="images/g23.jpeg" alt="">
    </div>
    <div class="content">
        <h3><?php echo $data['f_name']; ?></h3>
        <span class="price"><?php echo"Rs."; echo $data['price']; ?></span>
        <a href="#" class="btn">Order Now</a>
        <a href="order" class="btn">Order Now</a>

    </div>
</div>
</body>

<?php
}
?>

</body>
</html>

</div>

</section>





</body>
</html>
