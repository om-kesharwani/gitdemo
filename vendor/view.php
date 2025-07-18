<html>

<head>
  <style>
    .pdt-card {
      margin: 10px;
      background-color: black;
      display: inline-block;
      color: white;
      padding: 10px;
      width: 250px;
      height: 400px;
      vertical-align: top;
    }

    .name {
      font-size: 24px;
    }

    .price {
      color: violet;
      font-size: 22px;
      ;
    }

    .price::after {
      content: " Rs";
      font-size: 12px;
    }

    .pdt-img {
      width: 100%;
      height: 70%;

    }

    .details {
      overflow: auto;
    }
  </style>
</head>

</html>


<?php
include "menu.html";
session_start();
$conn = new mysqli("localhost", "root", "", "om", 3306);
$sql_object = mysqli_query($conn, "select * from product where owner=$_SESSION[userid]");
while ($dbrow = mysqli_fetch_assoc($sql_object)) {
  echo "<div class='pdt-card'>
          <div class='name'> $dbrow[name] </div>
          <div class='price'> $dbrow[price] </div>
          <img class='pdt-img' src='$dbrow[impath]'>
          <div class='details'>$dbrow[details]</div>
           <a href='deletecart.php?pid=$dbrow[pid]'>
          <button>delete</button>
          </a>
          <a href='home.php'?pid=$dbrow[pid]'>
          <button>edit</button>
          </div>";
}
?>