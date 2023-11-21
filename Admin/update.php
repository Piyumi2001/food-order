<?php
$conn = mysqli_connect('localhost', 'root','','web');
function update()
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

if(isset($_GET['id'])){
    $id=$_GET['id'];
    if(count($_POST)>0){
    $sql = "UPDATE food SET image= '" . $_POST['image'] . "', f_name= '" . $_POST['f_name'] . "',
    price= '" . $_POST['price'] . "' WHERE f_id= '$id'";

    if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    } else {
    echo "Error updating record";
    }
}
}
// ,Image= ''

$result = mysqli_query($conn,"SELECT * FROM food  WHERE f_id = '$id' ");
 //
$row= mysqli_fetch_array($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="" class="form" method="post" enctype="multipart/form-data">
            <h3> Update Products </h3>

            <div>

              <label>ID:</label>
              <input type="text" name="f_id" id="" value="<?php echo $row['f_id']; ?>" placeholder="Food ID.." required><br><br>

              <label>Image:</label>
              <input type="file" name="image" id="" placeholder="Image.." required><br><br>

                <label>Food Name:</label>
                <input type="text" name="f_name" id="" value="<?php echo $row['f_name']; ?>" placeholder="Food Name.." required><br><br>

                <label>Price:</label>
                <input type="number" name="price" id="" value="<?php echo $row['price']; ?>" placeholder="Price.." required><br><br>

                <button class="" name="update" onclick="location.href=''" ;> Update</button>
                <br>

            </div>

        </form>




</body>
</html>
