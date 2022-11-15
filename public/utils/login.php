<?php
session_start();

require_once("utils/mysql_config.php");
// require_once("utils/form_validators.php");

$url = strtok($_SERVER["REQUEST_URI"], '?'); // current page url no query string

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $username = trim($_POST["username"]); // remove white spaces
    $password = trim($_POST["password"]);

    // retrieve user from db
    $sql_stmt = "select * from User where username='".$username."';";
    $result = $mysqli_conn->query($sql_stmt);
    if ($result->num_rows > 0){
        $result->data_seek(0);
        $row = $result->fetch_assoc();
        $correct_password = password_verify($password, $row["password"]);
        if ($correct_password){
            $_SESSION["user_id"] = $row["id"];
            if(isset($_GET["redirect"])){
                header("Location: $_GET[redirect]?login=true");
                die();
            }
            header("Location: /index-after-login.php?login=true");
            die();
        }else{
            header("Location: /login.php?username=username&redirected_for=password"); // if validation fails return to form page with populated form field
            die();
        }
    }else{
        header("Location: /login.php?username=$username&redirected_for=email"); // if validation fails return to form page with populated form field
        die();
    }


}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مدير المستخدمين</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="static/css/index.css">
</head>
<body>
<nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">مدير المستخدمين</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="sign_up.php">سجل</a>
        </li>
      </ul>
    </div>
  </div>
</nav>


    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </symbol>
    </svg>

    <div class="container parent-container">
        <div class="row justify-content-center form-row">
            <?php
            if ($_SERVER["REQUEST_METHOD"] === "GET"){
                // preform action depending on get params in case of redirection
                if ($_GET["redirected_for"] === "email"){
                    echo <<<END
                        <div class="col-sm-11 col-md-8 form-col">
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                <div>
                                    لا يوجد حساب بهذا الايميل
                                </div>
                            </div>
                        </div>
                    END;
                }
                if ($_GET["redirected_for"] === "password"){
                    echo <<<END
                        <div class="col-sm-11 col-md-8 form-col">
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                <div>
                                    الرجاء التأكد من صحة الرقم السري
                                </div>
                            </div>
                        </div>
                    END;
                }

                if ($_GET["sign_up"] === "true"){
                    echo <<<END
                        <div class="col-sm-11 col-md-8 form-col">
                            <div class="alert alert-success d-flex align-items-center" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                                <div>
                                    تم تسجيلك بنجاح, قم بتسجيل الدخول
                                </div>
                            </div>
                        </div>
                    END;
                }

                if ($_GET["logout"] === "true"){
                    echo <<<END
                        <div class="col-sm-11 col-md-8 form-col">
                            <div class="alert alert-success d-flex align-items-center" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                                <div>
                                    تم تسجيل الخروج بنجاح
                                </div>
                            </div>
                        </div>
                    END;
                }
                
            }
            ?>
            <div class="col-sm-11 col-md-8 form-col">
            <form action=" " method="post" class="container form">

            <div class="form-fields-wrapper">
                <div class="form-row">
                    <div class="col-12">
                        <h1 id="form-title">سجل دخول</h1>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-12 form-col">
                        <label for="email" class="form-label">الايميل الشخصي</label>
                        <input type="text" class="form-control" id="email" name="email" value="<?php echo $_GET['email']; ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-12 form-col">
                        <label for="password" class="form-label">الرقم السري</label>
                        <input type="password" class="form-control" id="password" aria-describedby="passwordHelp" name="password">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-12 form-col">
                        <input type="submit" class="btn btn-primary" value="سجل دخول">
                    </div>
                </div>
                </div>
                </form>
            </div>
        </div>
    </div>



    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>

