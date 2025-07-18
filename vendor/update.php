<?php
$pid = $_GET['pid'];
include "../shared/connection.php";
$status = mysqli_query($conn, "UPDATE product
SET  
WHERE pid = $pid;");
if ($status) {
  header("location:view.php");
} else {
  echo mysqli_error($conn);
}
