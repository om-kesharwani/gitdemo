<?php
session_start();
$_SESSION['login_status'] = false;
$conn = new mysqli("localhost", "root", "", "om", 3306);
$sql_result = mysqli_query($conn, "select * from usertable where username='$_POST[username]'and password='$_POST[password]' ");
if (mysqli_num_rows($sql_result) > 0) {
  $dbrow = mysqli_fetch_assoc($sql_result);
  print_r($dbrow);

  echo "<h1>login successfull</h1>";
  $_SESSION['login_status'] = true;
  $_SESSION['role'] = $dbrow['role'];
  $_SESSION['userid'] = $dbrow['userid'];
  $_SESSION['username'] = $dbrow['username'];

  if ($dbrow['role'] == 'vendor') {
    header("location:../vendor/home.php");
  } else if ($dbrow['role'] == 'customer') {
    header("location:../user/home.php");
  }
} else {
  echo "<h1>login unsuccessfull</h1>";
}
