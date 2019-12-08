<?php 
session_start(); 


?>


<html lang="en">
<head>
	<title>My Orders</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/themify/themify-icons.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/elegant-font/html-css/style.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
    
    
<style>
    input[type=text]{
  width: 10%;
  padding: 12px 20px;
  margin: auto;
  display: inline-block;
  border: 1px solid #dddd;
  border-radius: 4px;
  box-sizing: border-box;
        text-align: center;
}
    .f {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>    

</head>
<body class="animsition">


		<!-- Header -->
		<header class="header1">
			<!-- Header desktop -->
			<div class="container-menu-header">
				<div class="topbar">
					<div class="topbar-social">
						<a href="#" class="topbar-social-item fa fa-facebook"></a>
						<a href="#" class="topbar-social-item fa fa-instagram"></a>
						<a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
						<a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
						<a href="#" class="topbar-social-item fa fa-youtube-play"></a>
					</div>

					<span class="topbar-child1">
						Free shipping for all Orders
					</span>

					<div class="topbar-child2">
						<span class="topbar-email">

						</span>

						<div class="topbar-language rs1-select2">

						</div>
					</div>
				</div>

				<div class="wrap_header">
					<!-- Logo -->
					<a href="index.html" class="logo">
						<img src="images/icons/logo.png" alt="IMG-LOGO">
					</a>

					<!-- Menu -->
					<div class="wrap_menu">
						<nav class="menu">
							<ul class="main_menu">
								<li>
									<a href="index.html">Home</a>
								</li>

								<li>
									<a href="product.html">Shop</a>
								</li>

								<!-- <li>
									<a href="about.html">About</a>
								</li> -->

								<li>
									<a href="contact.html">Contact</a>
								</li>

								<li>
									<a href="login.php" id="login" style="display:block;">Login</a>
								</li>
								<li>
									<a href="customerSignUp.php" id="signup" style="display:block;">Register for upto 15% off </a>
								</li>
								<li>
									<a href="" id="logout" onclick="logout()" style="display:none;">Log out</a>
								</li>
                                <li>    
                                <a href="myorders.php" id="myorders" style="display:block;">My Orders</a>
                            </li>
							</ul>
						</nav>
					</div>

					<!-- Header Icon -->
					<div class="header-icons">
						<a href="#" class="header-wrapicon1 dis-block">
							<img src="images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
						</a>

						<span class="linedivide1"></span>

						<div class="header-wrapicon2">

							<div class="w-size22">
								<!-- Button -->
								<button onclick="location.href='cart.html'" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4 header-wrapicon1">
									Cart
								</button>
							</div>

						</div>
					</div>
				</div>
			</div>
		</header>

	<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(images/heading-pages-02.jpg);">
		<h2 class="l-text2 t-center">
			My Orders!
		</h2>
	</section>
    <br><br><br>
	<!-- Order List -->
    
<?php

    
    require 'includes/dbconnect.php';
    include 'includes/validate_login.php';
    
    
    $userName=$_SESSION["userName"];
    
    
        $sql = "SELECT customer_id FROM customer_details WHERE userId='$userName'";
    
        $result = $conn->query($sql);
        $trow = $result -> fetch_assoc();
        $cid = $trow["customer_id"];
    
        $mysql = "SELECT * FROM order_details WHERE customer_id='$cid'";
        $result1 = $conn->query($mysql);
    
        
        if( $result && $result->num_rows > 0)
            {
                echo("<table>
                    <tr>
                        <th>Order ID</th>
                        <th>Name of Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Receipt</th>
                        
                        
                ");
                while($row = mysqli_fetch_array($result1))
                {
                    echo ("<tr>");
                    echo ("<td>".$row['orderId']."</td>");
                    echo ("<td><a href='product-detail.html'>".$row['name']."</a></td>");
                    echo ("<td>$".$row['price']."</td>");
                    echo ("<td>".$row['quantity']."</td>");
                    echo ("<td>$".$row['total_price']."</td>");
                    echo ("<td><button type='button' class='btn btn-success' onclick='myPrint()'>Print</button></td>");
                    echo ("</tr>");
                }
                echo("</table>");
        }
            else
            {
                echo("No Orders Found!!");
            }
            
        
    

?>
    <br><br>
    <form method="post" action="myorders.php">
        <div class="f">
    <center>Enter the Order Id to be cancelled!<br><input type="text" name="del_item"></center>
            <center><button type="submit" class="btn btn-danger">Cancel Order</button></center></div>
    </form>
    
    <?php
        
        if(isset($_POST['del_item']))
        {
            $userName = $_SESSION['userName'];
            $delete_item = $_POST['del_item'];
            
            $sql = "SELECT customer_id FROM customer_details WHERE userId='$userName'";
            $result = $conn->query($sql);
            $trow = $result -> fetch_assoc();
            $cid = $trow["customer_id"];
            
            
            $mysql = "SELECT * FROM order_details WHERE orderId='$delete_item' AND customer_id='$cid'";
            $result = $conn->query($mysql);
            $row = mysqli_fetch_array($result);
    
            if($row==NULL)
            {
                echo("<br><center>Sorry Please Check Your Order ID!</center>");
            }

            else
            {
                $mysql = "DELETE FROM order_details WHERE orderId='$delete_item' AND customer_id='$cid'";
                $result = $conn->query($mysql);

            }
        }

    
    ?>
	
   <br><br>
	<!-- Footer -->
	<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
		<div class="flex-w p-b-90">
			<div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					GET IN TOUCH
				</h4>

				<div>
					<p class="s-text7 w-size27">
						Any questions? Let us know in store at 8th floor, 379 Hudson St, New York, NY 10018 or call us on (+1) 96 716 6879
					</p>

					<div class="flex-m p-t-30">
						<a href="#" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-pinterest-p"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-snapchat-ghost"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-youtube-play"></a>
					</div>
				</div>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Categories
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="#" class="s-text7">
							Men
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Women
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Dresses
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Sunglasses
						</a>
					</li>
				</ul>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Links
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="#" class="s-text7">
							Search
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							About Us
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Contact Us
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Returns
						</a>
					</li>
				</ul>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Help
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="#" class="s-text7">
							Track Order
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Returns
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Shipping
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							FAQs
						</a>
					</li>
				</ul>
			</div>

			<div class="w-size8 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					Newsletter
				</h4>

				<form>
					<div class="effect1 w-size9">
						<input class="s-text7 bg6 w-full p-b-5" type="text" name="email" placeholder="email@example.com">
						<span class="effect1-line"></span>
					</div>

					<div class="w-size2 p-t-20">
						<!-- Button -->
						<button class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
							Subscribe
						</button>
					</div>

				</form>
			</div>
		</div>

		<div class="t-center p-l-15 p-r-15">
			<a href="#">
				<img class="h-size2" src="images/icons/paypal.png" alt="IMG-PAYPAL">
			</a>

			<a href="#">
				<img class="h-size2" src="images/icons/visa.png" alt="IMG-VISA">
			</a>

			<a href="#">
				<img class="h-size2" src="images/icons/mastercard.png" alt="IMG-MASTERCARD">
			</a>

			<a href="#">
				<img class="h-size2" src="images/icons/express.png" alt="IMG-EXPRESS">
			</a>

			<a href="#">
				<img class="h-size2" src="images/icons/discover.png" alt="IMG-DISCOVER">
			</a>

			<div class="t-center s-text8 p-t-20">
				Copyright © 2018 All rights reserved. | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
			</div>
		</div>
	</footer>



	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection -->
	<div id="dropDownSelect1"></div>
	<div id="dropDownSelect2"></div>



<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyClnH5HRAMi0MWqrHg2Mc-Vt-3wsxmMFkc&libraries=places&callback=initMap"
    async defer></script>
	<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyClnH5HRAMi0MWqrHg2Mc-Vt-3wsxmMFkc&libraries=places&callback=nearest"
	    async defer></script> -->
  <script type="text/javascript" src="js/cart.js"></script>
	<script type="text/javascript" src="vendor/select2/select2.min.js"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});

		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect2')
		});
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<script src="js/header.js"></script>
    <script>
        function myPrint() {
            window.print();
        }
        
</script>
</body>
</html>