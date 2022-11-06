<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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


    $Name = test_input($_POST["Name"]);
    $Username = test_input($_POST["Username"]);
    $Phone = test_input($_POST["Phone"]);
    $Email = test_input($_POST["Email"]);
    $Pincode = test_input($_POST["Pincode"]);
    $Address = test_input($_POST["Address"]);
    $Password = test_input($_POST["Password"]);
    $ConfirmPassword = test_input($_POST["ConfirmPassword"]);

    try {
        if ($Pincode != '400706') {
            echo "<script>alert('Sorry delivery is only available for 400706')</script>";
        } else {
            $sql = "INSERT INTO users(name, username, phone, address, pincode, email, password)
            VALUES ('{$Name}', '{$Username}', '{$Phone}', '{$Address}', '{$Pincode}', '{$Email}', '{$Password}')";

            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Registered'); location.href='index.html'</script>";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }

        mysqli_close($conn);
    } catch (Exception $e) {
        echo "<script>alert('{$e->getMessage()}')</script>";
    }
}
?>

<body>
    <div class="container form-container my-5">
        <h1 class="mb-4">Register</h1>
        <form method="POST" action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>'>
            <div class="container nameContainer">
                <div class="row">
                    <div class="col mb-3 px-0">
                        <label for="inputName" class="form-label">Name</label>
                        <input type="text" name="Name" class="form-control" id="inputName" aria-describedby="emailHelp">
                        <div id="NameError" class="form-text  text-danger"></div>
                    </div>

                    <div class="col mb-3 px-0">
                        <label for="inputUsername" class="form-label">Username</label>
                        <input type="text" name="Username" class="form-control" id="inputUsername" aria-describedby="emailHelp">
                        <div id="UsernameError" class="form-text  text-danger"></div>
                    </div>
                </div>
            </div>


            <div class="mb-3">
                <label for="inputPhone" class="form-label">Phone Number</label>
                <input type="text" name="Phone" class="form-control" id="inputPhone" aria-describedby="emailHelp">
                <div id="PhoneError" class="form-text  text-danger"></div>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Address</label>
                <textarea class="form-control" name="Address" id="" rows="3"></textarea>
                <div id="AddressError" class="form-text  text-danger"></div>

            </div>

            <div class="mb-3">
                <label for="inputPincode" class="form-label">Pincode</label>
                <input type="text" name="Pincode" class="form-control" id="inputPincode" aria-describedby="emailHelp">
                <div id="PincodeError" class="form-text  text-danger"></div>
            </div>

            <div class="mb-3">
                <label for="inputEmail" class="form-label">Email address</label>
                <input type="email" name="Email" class="form-control" id="inputEmail" aria-describedby="emailHelp">
                <div id="EmailError" class="form-text  text-danger"></div>
            </div>


            <div class="mb-3">
                <label for="inputPassword" class="form-label">Password</label>
                <input type="password" name="Password" class="form-control" id="inputPassword">
                <div id="PasswordError" class="form-text  text-danger"></div>
            </div>

            <div class="mb-3">
                <label for="inputConfirmPassword" class="form-label">Confirm Password</label>
                <input type="password" name="ConfirmPassword" class="form-control" id="inputConfirmPassword">
                <div id="ConfirmPasswordError" class="form-text  text-danger"></div>
            </div>
            <input class="btn btn-primary" type="button" name="register" value="Register">
            <!-- <button type="submit" name="register" class="btn btn-primary">Submit</button> -->
            <br> <label class="form-label redirect">Already have an account ? <a href="login.php">Login</a></label>

        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script>
        const btn = document.querySelector(".btn");

        function checkPassword(str) {
            var re = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{6,}$/;
            return re.test(str);
        }

        function checkEmail(str){
            var re = /^\S+@\S+\.\S+$/;
            return re.test(str);
        }

        btn.addEventListener("click", e => {
                const inputArray = document.querySelectorAll(".form-control");
                let isError = false;
                inputArray.forEach(e => {
                    try {
                        const error = document.querySelector("#" + e.name + "Error");
                        if (e.value == "") {
                            error.innerText = "Required";
                            isError = true;
                        } else {
                            error.innerText = "";
                        }
                    } catch (error) {

                    }

                });
                const password = document.querySelector("#inputPassword").value;
                const cnfrPass = document.querySelector("#inputConfirmPassword").value;
                const email = document.querySelector("#inputEmail").value;
                const phone = document.querySelector("#inputPhone").value;

                if(phone.length != 10){
                    const error = document.querySelector("#PhoneError");
                    error.innerText = "Phone number must be of 10 digits";
                    isError = true;
                }else{
                    const error = document.querySelector("#PhoneError");
                    error.innerText = "";
                }

                if (password !== cnfrPass) {
                    const error = document.querySelector("#ConfirmPassword" + "Error");
                    error.innerText = "Passwords do not match";
                    isError = true;
                }else{
                    const error = document.querySelector("#ConfirmPassword" + "Error");
                    error.innerText = "";
                }

                if(!checkPassword(password)){
                    const error = document.querySelector("#Password" + "Error");
                    error.innerText = "minimum 6 letter password, with at least a symbol, upper and lower case letters and a number required";
                    isError = true;
                }else{
                    const error = document.querySelector("#Password" + "Error");
                    error.innerText = "";
                }

                if(!checkEmail(email)){
                    const error = document.querySelector("#Email" + "Error");
                    error.innerText = "Invalid email format";
                    isError = true;
                }else{
                    const error = document.querySelector("#Email" + "Error");
                    error.innerText = "";
                }


                if (!isError) {
                    document.querySelector("form").submit();
                }
            }

        );
    </script>
</body>

</html>
