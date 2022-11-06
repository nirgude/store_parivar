<?php
session_start();
require_once("db.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // echo $_POST["register"];

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $Email = test_input($_POST["Email"]);

    $Password = test_input($_POST["Password"]);



    $sql = "Select * from users where email='{$Email}' and password='{$Password}'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Logged IN')</script>";
        while($row = mysqli_fetch_assoc($result)) {
            echo "id: " . $row["id"];
          }
      } else {
        echo "<script>alert('Invalid email password')</script>";
      }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parivar Store</title>
    <link rel="shortcut icon" type="x-icon" href="logo.png">

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>

<!-- header section starts  -->

<header class="header">
    <img align=”left” margin-left:5pc; src="logo.png" width="90" height="90" alt="">
    <a href="#" class="logo"><i class="fas fa"></i>Parivar Super Market</a>
    <nav class="navbar">
        <a href="#home">home</a>
        <a href="#features">features</a>
        <a href="#categories">categories</a>
    </nav>

    <div class="icons">
        <div class="fas fa-bars" id="menu-btn"></div>
        <div class="fas fa-search" id="search-btn"></div>
        <div class="fas fa-shopping-cart" id="cart-btn">
        
            <!-- <a href="mycart.php"></a> -->
        </div>
        <div class="fas fa-user" id="login-btn"></div>
    </div>

    <form action="" class="search-form">
        <input type="search" id="search-box" placeholder="search here...">
        <label for="search-box" class="fas fa-search"></label>
    </form>



</div>
<div class="container">

  <form method="POST" class="login-form" action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>'>
    <h3>login now</h3>
      <input type="email" placeholder="your email" class="box" name="Email" >
      <input type="password" placeholder="your password" class="box" name="Password">
      <p>forget your password <a href="#">click here</a></p>
      <p>don't have an account <a href="register.php">create now</a></p>
      <input type="submit" value="login now" class="btn" name="login" >
  </form>

</div>


</header>

<!-- header section ends -->

<!-- home section starts  -->

<section class="home" id="home">

    <div class="content">
        <h3>Reasonable and <span>quality</span> products for you</h3>

        <a href="#categories" class="btn">shop now</a>
    </div>

</section>

<!-- home section ends -->

<!-- features section starts  -->

<section class="features" id="features">

    <h1 class="heading"> our <span>features</span> </h1>

    <div class="box-container">

        <div class="box">
            <img src="Images/Quality.webp" alt="">
            <h3>Reasonable and quality product</h3>
            <p>Our interest is having the best quality product at a competitive price. </p>
            <a href="#" class="btn">read more</a>
        </div>

        <div class="box">
            <img src="Images/Free Delivery.png" alt="">
            <h3>free delivery</h3>
            <br>
            <br>
            <br>
            <p>We offer free delivery for customer. So it's great advantage for customer</p>
            <a href="#" class="btn">read more</a>
        </div>

        <div class="box">
            <img src="Images/Easy pay.webp" alt="">
            <h3>easy payments</h3>
            <p>Cashless payments are accepted for example payments through UPI Paytm and other online platforms also card has made shopping and payment really easy</p>
            <a href="#" class="btn">read more</a>
        </div>

    </div>

</section>

<!-- features section ends -->


<!-- categories section starts  -->
<a name="categories"></a>

<section class="categories" id="categories">

    <h1 class="heading"> product <span>categories</span> </h1>

    <div class="box-container">

        <div class="box">
            <img src="Images/snack6.png" alt="">
            <h3>Snack</h3>
            <br>
            <br>

            <a href="Snack.php" class="btn">shop now</a>
        </div>

        <div class="box">
            <img src="Images/Dairy Product1.jpg" alt="">
            <h3>Dairy Product</h3>
            <br>
            <br>

            <a href="Dairy.php" class="btn">shop now</a>
        </div>

        <div class="box">
            <img src="Images/beverage.png" alt="">
            <h3>Beverage</h3>
            <br>
            <br>

            <a href="Beverage.php" class="btn">shop now</a>
        </div>

        <div class="box">
            <img src="Images/Grains.jpg" alt="">
            <h3>Flour,Cereals & Pasta</h3>

            <a href="Grains.php" class="btn">shop now</a>
        </div>

        <div class="box">
            <img src="Images/spices2.png" alt="">
            <h3>Spices</h3>
            <br>
            <br>
            <a href="Spices.php" class="btn">shop now</a>
        </div>




        <div class="box">
            <img src="Images/health2.jpg" alt="">
            <h3>Health And Beauty Supplies</h3>

            <a href="health & beauty.php" class="btn">shop now</a>
        </div>

        <div class="box">
            <img src="Images/household1.jpg" alt="">
            <h3>Household Supplies</h3>



            <a href="Household.php" class="btn">shop now</a>
        </div>

        <div class="box">
            <img src="Images/baking1.jpg" alt="">
            <h3>Baking Goods</h3>
            <br>
            <br>
            <a href="cake.php" class="btn">shop now</a>
        </div>

        <div class="box">
            <img src="Images/Chocalates1.png" alt="">
            <h3>Chocolates</h3>
            <br>
            <br>
            <a href="chocolate.php" class="btn">shop now</a>
        </div>

        <div class="box">
            <img src="Images/veg.jpg" alt="">
            <h3>Vegtable</h3>
            <br>
            <br>
            <a href="#" class="btn">shop now</a>
        </div>


    </div>

</section>

<!-- categories section ends -->

<!-- review section starts  -->
















script
<script>
    const cartButton = document.querySelector("#cart-btn");
    cartButton.addEventListener("click", e => {
        const cartWindow = window.open("mycart.php","_blank");
    })
</script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>
