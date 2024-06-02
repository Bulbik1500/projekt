<?php
function add_user($email, $password, $name, $surname)
{
  include "db.php";
  $conn = new mysqli($DB_servername, $DB_username, $DB_password, $DB_name);
  $sql = "INSERT INTO users (email, name, surname, password) VALUES ('$email', '$name', '$surname', '$password');";
  $conn->query($sql);
  // if ($conn->query($sql) === TRUE) {
  //   echo "New record created successfully";
  // } else {
  //   echo "Error: " . $sql . "<br>" . $conn->error;
  // }
  $conn->close();
}
