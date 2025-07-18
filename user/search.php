//live-search/search.php

<?php
include "../shared/connection.php";
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['search'])) {
  $search = $conn->real_escape_string($_POST['search']);
  $sql = $search ?
    "SELECT user_name FROM users WHERE user_name LIKE '%$search%'" :
    "SELECT user_name FROM users";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      echo "<tr><td>" . $row['user_name'] . "</td></tr>";
    }
  } else {
    echo "<tr><td colspan='1'>No results found.</td></tr>";
  }
}

$conn->close();
?>