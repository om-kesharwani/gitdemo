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


if ($_SESSION['role'] != 'vendor') {
  echo "forbidden access";
  exit();
}
include "menu.html";
?>






<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
  <div class="d-flex justify-content-center align-items-center vh-100">
    <form enctype="multipart/form-data" action="upload.php" method="post" class="w-50 bg-warning p-3">
      <h3 class="text-center"> Upload Product </h3>
      <input class="form-control mt-3" type="text" placeholder="product Name" name="name">
      <input class="form-control mt-3" type="number" placeholder="product Price" name="price">
      <textarea class="form-control mt-2" type="file" placeholder="product description" cls="20" rows="5" name="detail"></textarea>
      <input class="form-control mt-2" type="file" name="pdt-img">
      <div class="text-center mt-3">
        <button class="btn btn-danger">upload</button>
      </div>
      <div class="text-center mt-3">

        <button class="btn btn-danger">update</button>
      </div>




    </form>
  </div>

</body>

</html>
