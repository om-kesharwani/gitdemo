<?php
session_start();
if (!isset($_SESSION['login_status'])) {
  echo "lofin is skipped";
  echo "Unauthorized access ";
  exit();
} else if ($_SESSION['login_status'] == false) {
  echo "<h1> invalid authentication</h1>";
  exit();
}
if ($_SESSION['role'] != 'customer') {
  echo "forbidden access";
  exit();
}

?>

<html>

<head>
  <style>
    .pdt-card {
      margin: 10px;
      background-color: black;
      display: inline-block;
      color: white;
      padding: 10px;
      width: 200px;
      height: 250px;
      vertical-align: top;
    }

    .name {
      font-size: 15px;
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
      height: 50%;

    }

    .details {
      height: 40px;
      overflow: scroll;
    }
  </style>
</head>

</html>


<?php
include "menu.html";

$conn = new mysqli("localhost", "root", "", "om", 3306);
$sql_object = mysqli_query($conn, "select * from product ");
while ($dbrow = mysqli_fetch_assoc($sql_object)) {
  echo "<div class='pdt-card'>
          <div class='name'> $dbrow[name] </div>
          <div class='price'> $dbrow[price] </div>
          <img class='pdt-img' src='$dbrow[impath]'>
          <div class='details'>$dbrow[details]</div>
          <div class='text-center' mt-2>
          <a href='addcart.php?pid=$dbrow[pid]'>
          <button class='btn btn-success'> add to cart</button>
          </div>
          </a>
          </div>";
}
include "../shared/footer.html";
?>