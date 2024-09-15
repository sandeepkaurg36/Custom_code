<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Stacked form</h2>
  <form action="#" method="post">
   Name<input type="text" name="Name" value=""><br>
   Rollno<input type="text" name="Rollno" value=""><br>
   Class<input type="text" name="Class" value=""><br>
   Fathername<input type="text" name="Fathername" class="Fathername"><br>
   <input type="submit" name="submit"value="submit">
  </form>
</div>

</body>
</html>
<?php
include("conn.php");
if(isset($_POST['submit'])){
$name=$_POST['Name'];
$Rollno=$_POST['Rollno'];
$Class=$_POST['Class'];
$Fathername=$_POST['Fathername'];
$sql = "INSERT INTO class (Name, Rollno, Class,Fathername)
VALUES ('$name', '$Rollno', '$Class','$Fathername')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
?>