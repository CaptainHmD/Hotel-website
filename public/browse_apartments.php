<?php
session_start();

require_once("utils/mysql_config.php");
require_once("utils/utils.php");

$url = strtok($_SERVER["REQUEST_URI"], '?');
login_only($url);
$hotels = retrieve_hotels($mysqli_conn);
$len_hotels = $hotels->num_rows;
$user = retrieve_current_user($mysqli_conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style2.css">
    <title>Browse apartments</title>
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


    <div class="container-fluid parent-cont cards-parent-cont my-cont">
        <div class="row cards-row justify-content-between my-row">
            <?php
            for ($i = 0; $i < $len_hotels; $i++){
                $hotels->data_seek($i);
                $hotel = $hotels->fetch_assoc();
            ?>
            <div class="col-md-4 col-md-4-card col-sm-5 col-sm-5-card col-lg-3 col-lg-3-card card-col non-padded-col my-col">
                <a href=<?php echo get_url("/apartment_detail_view.php?apartment-id=") . $hotel["id"]?>>
                <div class="container-fluid card-inner-cont my-cont">
                    <div class="row card-inner-row card-carousel-row my-row">
                        <div class="col-12 card-inner-col non-padded-col my-col">
                            <div id=<?php echo "carouselExampleIndicators".$i?> class="carousel slide" data-bs-ride="true">
                                <div class="carousel-indicators carousel-indicators-apartments">
                                    <button type="button" data-bs-target=<?php echo "#carouselExampleIndicators".$i?> data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <?php 
                                    $images = extract_apartment_images($hotel["image_name"], "/images/");
                                    for ($j  = 1; $j < count($images); $j++){
                                    ?>
                                    <button type="button" data-bs-target=<?php echo "#carouselExampleIndicators".$i?> data-bs-slide-to=<?php echo $j?> aria-label=<?php echo "Slide " . $j ?>></button>
                                    <?php }?>
                                </div>
                                <div class="carousel-inner">
                                    <?php
                                        for ($j  = 0; $j < count($images); $j++){
                                    ?>
                                    <?php
                                            if ($j == 0){
                                                echo "<div class='carousel-item active'>";
                                            } else {
                                                echo "<div class='carousel-item'>";
                                            }
                                    ?>
                                            <img src=<?php echo $images[$j] ?> class="d-block carousel-img" alt="apartment">
                                    </div>
                                    <?php } ?>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target=<?php echo "#carouselExampleIndicators".$i?> data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target=<?php echo "#carouselExampleIndicators".$i?> data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="row card-inner-row my-row">
                        <div class="col-12 card-inner-col non-padded-col my-col">
                            <p class="card-address"><?php echo $hotel["city"] . ' ,' . $hotel["country"]?></p>
                        </div>
                    </div>
                    <div class="row card-inner-row my-row">
                        <div class="col-12 card-inner-col non-padded-col my-col">
                            <p class="card-price"><?php echo $hotel["price"] . '/' . "month"?></p>
                        </div>
                    </div>
                    <div class="row card-inner-row my-row">
                        <div class="col-sm-2 card-inner-col non-padded-col my-col card-rating">
                            <p class="card-rating">9.8</p>
                        </div>
                        <div class="col-sm-10 card-inner-col non-padded-col my-col">
                            <p class="card-reviews">1589 reviews</p>
                        </div>
                    </div>

                </div>
                </a>
            </div>
            <?php
            }
            ?>

        </div>
    </div>

     <!-- footer -->
     <div class="footer">
                <div class="col-6 d-flex-with-gap"><h6>	&copy; 2022 WP Hotel</h6> <h6>Privacy</h6> <h6>Terms</h6> <h6>Sitemap</h6> <h6>Destinations</h6></div>
                <div class="col-5 d-flex-with-gap ps-5"> <h6>&#9728; English (US)</h6> <h6>SR
                    SAR</h6> <h6><a href="https://github.com/CaptainHmD/Hotel-website"><img src="../resources/icons/code-2-16.png"   alt=""> &nbsp;source code</a></h6></div>
            </div>
            <!-- footer end -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>
</html>