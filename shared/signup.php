<?php
$conn = new mysqli("localhost", "root", "", "om", 3306);
$status = mysqli_query($conn, "insert into usertable(username,password,role) values ('$_POST[username]','$_POST[password]','$_POST[role]') ");
if ($status) {
  echo "<br>Signup successfull";
  header("location:login.html");
} else {
  echo mysqli_error($conn);
}
