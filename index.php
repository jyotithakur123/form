<?php
include 'connection.php';
$conn = OpenCon();
$sql = "SELECT name FROM school";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo " - Name: " . $row["name"] . "<br>";
  }
} else {
  echo "0 results";
}

echo $query;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link src="style.css">
    
    </head>
<body>

<form action="" method="get" enctype="multipart/form-data">
    <input type="text" name="name" id="">
    <input type="text" name="class" id="">
    <input type="text" name="roll" id="">
    <!-- <input type="file" name="image" id=""> -->
    <button type="submit" name="save">Save</button>    
    </form>

</body>
</html>

<?php

$name  = $_GET['name'];
$class  = $_GET['class'];
$roll  = $_GET['roll'];

if($name!=null && $class!=null && $roll!=null){

    $sql = "INSERT INTO `school` (`id`, `name`, `class`, `roll_no`) VALUES (NULL, '$name', '$class', '$roll')";

    if (mysqli_query($conn, $sql)) {

        echo "New record created successfully";

    } else {

        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        
    }


}


CloseCon($conn);
?>


