<?php

if(isset($_POST['userName']) && !empty($_POST['userName']))
{

require 'dbconnect.php';
$userName = $_POST['userName'];
$sql = "SELECT customer_id FROM customer_details WHERE userId='$userName'";
$result = $conn->query($sql);
if( $result && $result->num_rows > 0)
{
  // output data of each row
  $row = $result->fetch_assoc();
  $customer_id = $row["customer_id"];

  $sql = "select sum(total_price) from order_details where customer_id in ($customer_id);";
  $result = $conn->query($sql);
  if( $result && $result->num_rows > 0)
  {
    $row = $result->fetch_assoc();
    echo $row['sum(total_price)'];
  }
  else{
      echo "0";
  }
}
}
else{
  echo "0";
}

 ?>
