<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include('db.php');


// JIKA YANG DIKIRIM BERUPA FORM-DATA atau x-www-form-urlencoded
if (!isset($_POST['name']) && !isset($_POST['address']) && !isset($_POST['salary'])) {
  echo json_encode("No Data Sent");
} else {
  $name = $_POST['name'];
  $address = $_POST['address'];
  $salary = $_POST['salary'];
  htmlspecialchars($name);
  htmlspecialchars($address);
  htmlspecialchars($salary);
  $result = mysqli_query($db, "INSERT INTO employees (name, address, salary) VALUES
('{$name}','{$address}', '{$salary}')");
  if ($result) {
    echo json_encode("Success");
  } else {
    echo json_encode("Failed");
  }
}