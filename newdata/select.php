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
  <table class="table">
  <thead>
    <tr>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Name</th>
      <th scope="col">Roll</th>
      <th scope="col">Class</th>
      <th scope="col">Father's name</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  	<?php
  	include("conn.php");
//if(isset($_POST['submit'])){
// $name=$_POST['Name'];
// $Rollno=$_POST['Rollno'];
// $Class=$_POST['Class'];
// $Fathername=$_POST['Fathername'];
  	$sql = "SELECT * FROM class";
$result = $conn->query($sql);
//print_r($sql);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
//  	print_r($row);
  	?>
  	<tr>
      <td><?php echo $row['id']?></td>
      <td><?php echo $row['Name']?></td>
      <td><?php  echo $row['Rollno']?></td>
      <td><?php  echo $row['Class']?></td>
      <td><?php echo $row['Fathername']?>
     <td><a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a></td>
    <td><a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
    </tr>
    <?php
}}
?>
</tbody>
</div>

</body>
</html>
