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
$ids =$_GET['id'];
if(isset($_POST['submit'])){
$name=$_POST['Name'];
$Rollno=$_POST['Rollno'];
$Class=$_POST['Class'];
$Fathername=$_POST['Fathername'];
$sql = "UPDATE class SET Name='$name',Rollno='$Rollno',Class='$Class',Fathername='$Fathername' WHERE id='".$ids."'";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}
}
$conn->close();
?>