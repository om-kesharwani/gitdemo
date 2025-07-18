<?php
include "menu.html";
include "../shared/connection.php";
session_start();
$sql_result = mysqli_query($conn, "select * from cart inner join product on cart.pid=product.pid where owner=$_SESSION[userid]");
$index = 1;
$total = 0;
echo "<div class='row'>
<div class='col-1'>ID</div>
<div class='col-2'>Product Name</div>
<div class='col-2'>Product image</div>
<div class='col-4'>Product Price</div>
<div class='col-2'>Action</div>
<hr>
</div>
";
while ($dbrow = mysqli_fetch_assoc($sql_result)) {
  $total += $dbrow["price"];
  echo "<div class='row'>
     <div class='col-1'>$index</div>
     <div class='name col-2'>$dbrow[name]</div>
     <img class='pdt-img col-2' src='$dbrow[impath]'>
     <div class='price col-4'>$dbrow[price]</div>
     <div class='col-2'>
    
    
    <button class='btn btn-success'>ACCEPT</button>
    <button class='btn btn-danger'>REJECT</button>

     </div>

     </div><hr>";
  $index++;
}
