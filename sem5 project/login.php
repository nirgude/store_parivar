<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

</head>

<?php
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

<body>
    <div class="container form-container my-5">
        <h1 class="mb-4">Login</h1>
        <form method="POST" action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>'>




            <div class="mb-3">
                <label for="inputEmail" class="form-label">Email address</label>
                <input type="email" name="Email" class="form-control" id="inputEmail" aria-describedby="emailHelp">
                <div id="emailError" class="form-text  text-danger"></div>
            </div>


            <div class="mb-3">
                <label for="inputPassword" class="form-label">Password</label>
                <input type="password" name="Password" class="form-control" id="inputPassword">
                <div id="passwordError" class="form-text  text-danger"></div>
            </div>
            <input class="btn btn-primary" type="submit" name="login" value="Login">
            <!-- <button type="submit" name="register" class="btn btn-primary">Submit</button> -->
            <br> <label class="form-label redirect">Don't have an account ? <a href="register.php">Register</a></label>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>

</html>
