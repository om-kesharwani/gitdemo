
<?php
session_start();
$conn = new mysqli("localhost", "root", "", "om", 3306);

print_r($_POST);
echo "<br>";
print_r($_FILES);
$filename = $_FILES['pdt-img']['name'];
$source = $_FILES['pdt-img']['tmp_name'];
$target = "../shared/images/$filename";
echo "<br>$source";
move_uploaded_file($source, $target);
$status = mysqli_query($conn, "insert into product(name,price,details,impath,owner) values ('$_POST[name]',$_POST[price],'$_POST[detail]','$target',$_SESSION[userid])");
if ($status) {
  echo "<h1> uploaded successfully</h1>";
  header("location:menu.html");
} else {
  echo mysqli_error_list($conn);
}
?>