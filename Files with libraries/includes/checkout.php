<?php
session_start();

require 'dbconnect.php';
if(isset($_POST['userName']) && !empty($_POST['userName']))
{
  $userName = $_POST['userName'];
  $sql = "SELECT customer_id FROM customer_details WHERE userId='$userName'";
  $result = $conn->query($sql);
  if( $result && $result->num_rows > 0)
  {
        // output data of each row
          $row = $result->fetch_assoc();
          $customer_id = $row["customer_id"];

          $array=json_decode($_POST['orderSummary']);
          $cols = array();
          foreach($array as $option)
          {


              foreach($option as $key => $value)
              {

                if($key%6 == 0)
                {

                }
                else{
                  $col = $value;
                  $cols[] = "{$col}";
                  }



              }
              $cols[] = $customer_id;
              require 'dbconnect.php';
              $data = "'" . implode("','", $cols) . "'";
              $sql = "INSERT INTO order_details (name, price, product_id, quantity, total_price, customer_id)
                             VALUES ( $data)";
              if ($conn->query($sql) === TRUE) {

              } else {
                  echo "Error: " . $sql . "<br>" . $conn->error;
              }
              $cols = array();
          }
  }
}
else{
  $array=json_decode($_POST['orderSummary']);
  $cols = array();
  foreach($array as $option)
  {


      foreach($option as $key => $value)
      {

        if($key%6 == 0)
        {

        }
        else{
          $col = $value;
          $cols[] = "{$col}";
          }



      }
      $cols[] = "0";
      require 'dbconnect.php';
      $data = "'" . implode("','", $cols) . "'";
      $sql = "INSERT INTO order_details (name, price, product_id, quantity, total_price, customer_id)
                     VALUES ( $data)";
      if ($conn->query($sql) === TRUE) {

      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }
      $cols = array();
  }
}




        // echo '<script language="javascript">';
        // echo "location.href = 'login.php'";
        // echo '</script>';


?>
