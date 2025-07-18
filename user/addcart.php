<?php
session_start();
$pid = $_GET['pid'];
$userid = $_SESSION['userid'];
include "../shared/connection.php";
$status = mysqli_query($conn, "insert into cart(userid,pid) values ($userid,$pid)");
if ($status) {
  echo "Added to cart successfully";
  header("location:viewcart.php");
} else {
  mysqli_error($conn);
}
