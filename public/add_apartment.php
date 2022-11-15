<?php
session_start();

require_once("utils/mysql_config.php");
require_once("utils/utils.php");

$url = strtok($_SERVER["REQUEST_URI"], '?');
login_only($url);

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $country = trim($_POST["country"]);
    $city = trim($_POST["city"]);
    $address = trim($_POST["address"]);
    $length = trim($_POST["length"]);
    $width = trim($_POST["width"]);
    $rooms = trim($_POST["rooms"]);
    $bathrooms = trim($_POST["bathrooms"]);
    $price = trim($_POST["price"]);
    $configured_image_name = handle_apartment_images($_FILES["apartment_images"], "./images/", $mysqli_conn);
    $description = trim($_POST["description"]);
    $user = retrieve_current_user($mysqli_conn);
    $user_id = $user['id'];

    // add apartment to db
    $sql_stmt = "insert into Apartment (country, city, address, length, width, rooms, bathrooms, price, image_name, description, user_id) values ('$country', '$city', '$address', '$length', '$width', '$rooms', '$bathrooms', '$price', '$configured_image_name', '$description', '$user_id');";
    if(!$mysqli_conn->query($sql_stmt)){
        die("Err. could not preform the query ".$sql_stmt.PHP_EOL.$mysqli_conn->error);
    }else{
        header("Location: /browse_apartments.php");
    }

}
$user = retrieve_current_user($mysqli_conn);
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
    <title>Post a new apartment</title>
</head>
<body>
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

            <!-- must be list and reveal result on hover -->
            <div class="dropdown">


                <!-- <h2 class="nav-section nav-text" id="fast-travail">Fast Travel&nbsp;</h2>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-caret-down-fill" style="margin-top: 4px;white-space: nowrap;" viewBox="0 0 16 16" s>
                    <path
                        d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                </svg> -->

                <button class="btn  btn-secondary dropdown-toggle dropdown-btn" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Site Pages
                </button>
                <ul class="dropdown-menu">
                    <li><a href=<?php echo get_url("/add_apartment.php") ?> class="dropdown-item">Add Apartment</a>
                    </li>
                    <li><a href=<?php echo get_url("/browse_apartments.php") ?> class="dropdown-item">Browse
                            Apartments</a></li>
                    <!-- <li><a href="#img-tr" class="dropdown-item">img-travel</a></li> -->
                </ul>

            </div>
        </div>

        <div class="nav-section" id="register-section">
            <h1>
                <a href=<?php echo get_url("/logout.php") ?> id="register-text" class="nav-text">Logout</a>
            </h1>
        </div>
        <div class="nav-section" id="login-logout-section">
                <h2 class="nav-text"><?php echo $user['username']?></h2>
        </div>
    </nav>
    <!-- end nav -->

    <!-- content wrapper -->
    <div class="container parent-cont add-form-parent-cont">
        <div class="row justify-content-center parent-row">
            <div class="col-sm-10 col-md-8 parent-col">
                <form action=" " method="POST" enctype="multipart/form-data" id="apartment_form" class="container my-cont">
                    <div class="form-fields-wrapper">
                        <div class="form-row justify-content-center add_apartment_margined_row my-row">
                            <div class='col-12 my-col text-center'>
                                <h1 id="form-title">
                                    Post a new apartment
                                </h1>
                            </div>
                        </div>

                        <div class="form-row row justify-content-center add_apartment_margined_row my-row">
                            <div class='col-sm-6 my-col'>
                                <div class="mb-3">
                                    <label for="country_add_form" class="form-label add_form_label">Apartment country</label>
                                    <input type="text" name="country" class="form-control add_form_field" id="country_add_form" placeholder="Saudi Arabia">
                                </div>
                            </div>
                            <div class='col-sm-6 my-col'>
                                <div class="mb-3">
                                <label for="city_add_form" class="form-label add_form_label">Apartment city</label>
                                    <input type="text" name="city" class="form-control add_form_field" id="city_add_form" placeholder="Makkah">
                                </div>
                            </div>
                        </div>

                        <div class="form-row row justify-content-center add_apartment_margined_row my-row">
                            <div class='col-12 my-col'>
                                <div class="mb-3">
                                    <label for="address_add_form" class="form-label add_form_label">Apartment Address</label>
                                    <input type="text" name="address" class="form-control add_form_field" id="address_add_form" placeholder="Annuzha, Alqadi street, building 444...">
                                </div>
                            </div>
                        </div>

                        <div class="form-row row justify-content-center add_apartment_margined_row my-row">
                            <div class='col-md-6 my-col'>
                                <div class="mb-3">
                                    <label for="length_add_form" class="form-label add_form_label">Apartment length (meters)</label>
                                    <input type="number" name="length" class="form-control add_form_field" id="length_add_form" min=10 max=1000>
                                </div>
                            </div>
                            <div class='col-md-6 my-col'>
                                <div class="mb-3">
                                    <label for="width_add_form" class="form-label add_form_label">Apartment width (meters)</label>
                                    <input type="number" name="width" class="form-control add_form_field" id="width_add_form" min=10 max=1000>
                                </div>
                            </div>
                        </div>

                        <div class="form-row row justify-content-center add_apartment_margined_row my-row">
                            <div class='col-md-6 my-col'>
                                <div class="mb-3">
                                    <label for="rooms_add_form" class="form-label add_form_label">Number of rooms</label>
                                    <input type="number" name="rooms" class="form-control add_form_field" id="rooms_add_form" min=1 max=50>
                                </div>
                            </div>
                            <div class='col-md-6 my-col'>
                                <div class="mb-3">
                                    <label for="bathrooms_add_form" class="form-label add_form_label">Number of bathrooms</label>
                                    <input type="number" name="bathrooms" class="form-control add_form_field" id="bathrooms_add_form" min=0 max=50>
                                </div>
                            </div>
                        </div>

                        <div class="form-row row justify-content-center add_apartment_margined_row my-row">
                            <div class='col-md-6 my-col'>
                                <div class="mb-3">
                                    <label for="price_add_form" class="form-label add_form_label">Apartment price per month</label>
                                    <input type="number" name="price" class="form-control add_form_field" id="price_add_form" min=1>
                                </div>
                            </div>
                            <div class='col-md-8 col-lg-6 my-col'>
                                <div class="mb-3">
                                    <div class="mb-3">
                                        <label for="apartment_images_add_form" class="form-label add_form_label">Apartment images</label>
                                        <input class="form-control add_form_field" type="file" id="apartment_images_add_form" name="apartment_images[]" accept="image/png, image/jpeg, image/jpg" multiple="multiple">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row row justify-content-center add_apartment_margined_row my-row">
                            <div class='col-sm-10 my-col'>
                                <div class="mb-3">
                                    <label for="description_add_form" class="form-label add_form_label">Apartment description</label>
                                    <textarea name="description" class="form-control add_form_field" id="description_add_form" cols="60" rows="5" placeholder="A modern apartment with a beach view..."></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="form-row row justify-content-center my-row">
                            <div class='col-sm-10 my-col'>
                                <div class="mb-3">
                                    <label for="apartment_images" class="form-label">Apartment images</label>
                                    <input class="form-control" type="file" id="apartment_images" name="apartment_images" multiple>
                                </div>
                            </div>
                        </div> -->

                        <div class="form-row row justify-content-center add_apartment_margined_row my-row">
                            <div class='col-sm-5 my-col'>
                                <div class="mb-3">
                                    <input type="submit" name="submit" value="submit" id="submit_add_form" class="form-control add_app_submit">
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