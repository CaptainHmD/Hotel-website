<?php
require_once("utils/mysql_config.php");
require_once("utils/utils.php");

$url = strtok($_SERVER["REQUEST_URI"], '?'); // current page url no query string

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]); // remove white spaces
    $password = trim($_POST["password"]);
    $confirmPassword = $_POST["confirmPassword"];
    if (strcmp($password, $confirmPassword) !== 0){
        header("Location: " + "$url" +"?email=$email&redirected_for=password"); // if validation fails return to form page with populated form field
        die();
    }
    $hashed_password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 9]); // randomly salted 

    // add user to db
    // check if user exists
    $sql_stmt_email = "select id from User where email='".$email."';";
    $sql_stmt_user = "select id from User where username='".$username."';";
    $result_email = $mysqli_conn->query($sql_stmt_email);
    $result_user = $mysqli_conn->query($sql_stmt_user);
    if ($result_email->num_rows > 0){
        header("Location: $url?email=$email&username=$username&redirected_for=email"); // if validation fails return to form page with populated form field
        die();
    }else if($result_user->num_rows > 0){
        header("Location: $url?email=$email&username=$username&redirected_for=email"); // if validation fails return to form page with populated form field
        die();
    } else {
        $sql_stmt = "insert into User (username, email, password) values ('$username', '$email', '$hashed_password');";
        if(!$mysqli_conn->query($sql_stmt)){
            die("Err. could not preform the query ".$sql_stmt.PHP_EOL.$mysqli_conn->error);
        }else{
            header("Location: /login.php?sign_up=true");
        }

    }


}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style2.css">
    <title>Register</title>
</head>
<body class="register-body">

 <!-- <div class="container"> -->
 <nav id="navbar">
        <div class="nav-section" id="logo-section">
            <div id="logo-wrapper"> <a href=<?php echo get_url("/") ?> id="d-gap">
                    <img id="logo" src="../resources/icons/a6c89eb25f20c37a608f1cef9ca70d24.svg" alt="">
                    <div id="nav-text-wrapper">
                        <h1 class="nav-text" id="hotel-nav">hotel</h1>
                    </div>
                </a>
            </div>
        </div>

        <div class="nav-section" id="register-section">
            <h1>
                <a href=<?php echo get_url("/register.php") ?> id="register-text" class="nav-text">Sign Up</a>
            </h1>
        </div>
        <div class="nav-section" id="login-logout-section">
            <a href=<?php echo get_url("/login.php") ?>>
                <h2 class="nav-text">Login</h2>
            </a>
        </div>
    </nav>
    <!-- end nav -->

    <!-- content wrapper -->
    <div class="container parent-cont add-form-parent-cont ">
        <div class="row justify-content-center  parent-row">
            <div class="col-sm-10 col-md-8 parent-col">
                <form action=" " method="POST" enctype="multipart/form-data" id="apartment_form" class="container my-cont">
                    <div class="form-fields-wrapper">
                        <div class="form-row justify-content-center add_apartment_margined_row my-row">
                            <div class='col-12 my-col text-center'>
                                <h1 id="form-title">
                                    Registration Form
                                </h1>
                            </div>
                        </div>

                        <div class="form-row row justify-content-center add_apartment_margined_row my-row">
                            <div class='col-sm-12 my-col'>
                                <div class="mb-3">
                                    <label for="username-register" class="form-label add_form_label">Username</label>
                                    <input type="text" name="username" class="form-control add_form_field" id="username-register" placeholder="Username" required>
                                </div>
                            </div>
                            <div class='col-sm-12 my-col'>
                                <div class="mb-3">
                                <label for="email-register" class="form-label add_form_label">Email</label>
                                    <input type="email" name="email" class="form-control add_form_field" id="email-register" placeholder="Email@hotel.com"  required>
                                </div>
                            </div>
                        </div>
                            <div class='col-sm-12 my-col'>
                                <div class="mb-3">
                                <label for="password-register" class="form-label add_form_label">Password</label>
                                    <input type="password" name="password" class="form-control add_form_field" id="password-register" placeholder="Password" minlength="8" required>
                                </div>
                            </div>
                            <div class='col-sm-12 my-col'>
                                <div class="mb-3">
                                <label for="repassword-register" class="form-label add_form_label">Confirm Password</label>
                                    <input type="password" name="confirmPassword" class="form-control add_form_field" id="repassword-register" placeholder="Confirm Password" minlength="8" required>
                                </div>
                            </div>

                            <!-- terms -->
                            <div class='col-sm-12 my-col'>
                                <div class="mb-3 d-flex flex-row justify-content-center align-check">
                                <label for="terms-register" class="form-label add_form_label" ><div class="res-text">I read and agree to <a href="#" class=""> Terms & Conditions</a></div></label>
                                    <input type="checkbox" name="terms-register" class="" id="terms-register"  required>
                                </div>
                            </div>
                        </div>

                        <div class="form-row row justify-content-center add_apartment_margined_row my-row">
                            <div class='col-12 my-col '>
                                <div class="mb-3 d-flex justify-content-center align-check">
                                    <label for="remember" class="form-label add_form_label ">Remember me</label>
                                    <input type="checkbox" name="remember" class="checkbox-remember" id="remember" placeholder="Remember Me">
                                </div>
                            </div>
                        </div>


                        <div class="form-row row justify-content-center add_apartment_margined_row my-row ">
                            <div class='col-sm-5 my-col'>
                                <div class="mb-3">
                                    <input type="submit" name="submit" value="submit" id="submit_add_form" class="form-control add_app_submit" >
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- footer -->
    <div class="footer">
                <div class="col-6 d-flex-with-gap"><h6>	&copy; 2022 WP Hotel</h6> <h6>Privacy</h6> <h6>Terms</h6> <h6>Sitemap</h6> <h6>Destinations</h6></div>
                <div class="col-5 d-flex-with-gap ps-5"> <h6>&#9728; English (US)</h6> <h6>SR
                    SAR</h6> <h6><a href="https://github.com/CaptainHmD/Hotel-website"><img src="../resources/icons/code-2-16.png"   alt=""> &nbsp;source code</a></h6></div>
            </div>
            <!-- footer end -->
    
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="../js/script.js"></script>
</body>
</html>