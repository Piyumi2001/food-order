
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="css/style.css">

    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">

      <span class="logo_name">Foodies' Kictchen</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="#" class="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="#delete">
            <i class='bx bx-box' ></i>
            <span class="links_name">Delete</span>
          </a>
        </li>
        <li>
          <a href="#update">
            <i class='bx bx-box' ></i>
            <span class="links_name">update</span>
          </a>
        </li>

        <li>
          <a href="#product-section">
            <i class='bx bx-box' ></i>
            <span class="links_name">Product List</span>
          </a>
        </li>
        <li>
          <a href="#order-section">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Order List</span>
          </a>
        </li>

        <li class="log_out">
          <a href="index.php">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Dashboard</span>
      </div>
      <div class="search-box">
        <input type="text" placeholder="Search...">
        <i class='bx bx-search' ></i>
      </div>
      <div class="profile-details">
        <img src="image/profile.png" alt="">
        <span class="admin_name">Hello Kasuni</span>
      </div>
    </nav>

<!-- insert data -->
    <?php

    @include 'conection.php';
    session_start();

      function uploadImage()
      {
          $uploads_dir = "uploads";
          $newFileName = "";
          if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
              $tmpName = $_FILES["image"]["tmp_name"];
              $fileName = $_FILES["image"]["name"];
              $fileNameCmps = explode(".", $fileName);
              $fileExtension = strtolower(end($fileNameCmps));
              $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
              if (move_uploaded_file($tmpName, "../$uploads_dir/$newFileName")) {
                  return $newFileName;
              }
          }
          return $newFileName;
      }

if (isset($_POST['save'])) {

        // $f_id = $_POST['f_id'];
        $f_name = $_POST['f_name'];
        $price = $_POST['price'];
        $image = uploadImage();


                $insert = "INSERT INTO food (image, f_name, price)
                VALUES ('$image', '$f_name' , '$price')";

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

        <form action="" class="form" method="post" enctype="multipart/form-data">
            <h2> <br> <br> <br> Add Food </h2><br>

            <div>

                <!-- <label >Id:</label>
                <input type="number" name="f_id" id="" placeholder="ID.." required><br><br> -->

                <label >Food Name:</label>
                <input type="text" name="f_name" id="" placeholder="Food Name.." required><br><br>


                <label >Price:</label>
                <input type="number" name="price" id="" placeholder="Price.." required><br><br>

                <label >Image:</label>
                <input type="file" name="image" id="" placeholder="ID.." required><br><br>


            <button  name="save"  onclick="location.href=''";> Save</button>

            <br>

        </div>

        </form>

    </body>
    </html>

  </section>
<!-- end insert data -->

<!-- delete data -->
<section class="product-section" id="delete">


     <br><br><br><br><h1>Products</h1>
      <table class="table" border=1px>
          <tr>
              <th>f_id</th>
              <th>image</th>
              <th>f_name</th>
              <th>price</th>

          </tr>
          <?php
      $display = $conn->query("SELECT * FROM food");
      while ($data = $display->fetch_assoc()){
      ?>
          <tr>
              <td><?php echo $data['f_id']; ?></td>
              <td><?php echo $data['image']; ?></td>
              <td><?php echo $data['f_name']; ?></td>
              <td><?php echo $data['price']; ?></td>

              <td><a href="delete.php?f_id=<?php echo $data["f_id"]; ?>">Delete</a>
          </tr>
      <?php
      }
      ?>
      </table>

</section>



<!-- end delete data -->





<!-- update data -->
<section class="product-section" id="update">

<br><br><br><br><h1>PRODUCT TABLE</h1>
<table class="table" border=1px>
    <tr>
      <th>f_id</th>
      <th>image</th>
      <th>f_name</th>
      <th>price</th>

    </tr>
    <?php
$display = $conn->query("SELECT * FROM food");
while ($data = $display->fetch_assoc()){
$i=0;
?>
    <tr>
      <td><?php echo $data['f_id']; ?></td>
      <td><?php echo $data['image']; ?></td>
      <td><?php echo $data['f_name']; ?></td>
      <td><?php echo $data['price']; ?></td>
        <td><a href="update.php?id=<?php echo $data["f_id"]; ?>">Update</a></td>
        </tr>
<?php
$i++;
}
?>
</table>
</section>
<!-- end update data -->
<!-- product list -->
  <section class="product-section" id="product-section">
    <br><br><br><br><h2>Food Items</h2>

  <?php
  $con=mysqli_connect('localhost', 'root','','web');
  // Check connection
  if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  $result = mysqli_query($con,"SELECT * FROM food");


  echo "<table border>
  <tr>
  <th>f_id</th>
  <th>image</th>
  <th>f_name</th>
  <th>price</th>
  </tr>";

  while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['f_id'] . "</td>";
  echo "<td>" . $row['image'] . "</td>";
  echo "<td>" . $row['f_name'] . "</td>";
  echo "<td>" . $row['price'] . "</td>";
  echo "</tr>";
  }
  echo "</table>";

  mysqli_close($con);
  ?>

</section>

<!-- end product list -->

<!-- order list -->

<section class="product-section" id="order-section">
  <h2> <h2> <br> <br> <br>Food Items</h2><br>

<?php
$con=mysqli_connect('localhost', 'root','','web');
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM customer");


echo "<table border>
<tr>
<th>c_id</th>
<th>first_name</th>
<th>last_name</th>
<th>email</th>
<th>tel</th>
<th>food</th>
<th>quantity</th>
<th>address</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['c_id'] . "</td>";
echo "<td>" . $row['first_name'] . "</td>";
echo "<td>" . $row['last_name'] . "</td>";
echo "<td>" . $row['email'] . "</td>";
echo "<td>" . $row['tel'] . "</td>";
echo "<td>" . $row['food'] . "</td>";
echo "<td>" . $row['quantity'] . "</td>";
echo "<td>" . $row['address'] . "</td>";
echo "</tr>";
}
echo "</table>";

mysqli_close($con);
?>

</section>
<!-- end order list -->


  <script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
 </script>

</body>
</html>
