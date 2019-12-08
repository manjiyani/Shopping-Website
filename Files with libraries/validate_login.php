<?php
if(isset($_POST['SubmitButton'])){
  function customerLogin($username, $password){
      require 'dbconnect.php';
      $sql = "SELECT * FROM customer_details WHERE userId = '$username' AND password = '$password'";
      $result = $conn->query($sql);
      if($result)
      {
        if ($result->num_rows > 0) {
           return true;
        }else{
            return false;
        }
      }
      else{
        return false;
      }

  }


  $username = $_POST['userId'];
  $password = $_POST['password'];

  if(customerLogin($username, $password)) {
    session_start();
    $_SESSION["userName"] = $username;
    echo "<script>
    sessionStorage.setItem('userId', '$username');
    location.href = 'index.html';
    </script>";
  }
}

 ?>
