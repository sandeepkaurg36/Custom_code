  <?php
    include("conn.php");
    $sql = "DELETE FROM class WHERE id='" . $_GET["id"] . "'";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
  ?>