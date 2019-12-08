<?php
if(isset($_POST['SubmitButton'])){

      function userRegistration($name, $address, $userId, $email, $phone, $password) {
      require 'dbconnect.php';
      $sql = "INSERT INTO customer_details (name, address, userId, email, phone, password)
                     VALUES ('$name', '$address', '$userId', '$email', '$phone', '$password')";
      if ($conn->query($sql) === TRUE) {
          return true;
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }
  }
  $name = $_POST['name'];
  $address = $_POST['address'];
  $userId = $_POST['userId'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $password = $_POST['password'];

  if(userRegistration($name, $address, $userId, $email, $phone, $password)) {
    echo '<script language="javascript">';
    echo "location.href = 'login.php'";
    echo '</script>';
  }
}
?>
