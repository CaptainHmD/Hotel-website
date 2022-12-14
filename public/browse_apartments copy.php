<?php
session_start();

require_once("utils/mysql_config.php");
require_once("utils/utils.php");

$url = strtok($_SERVER["REQUEST_URI"], '?');
login_only($url);
$hotels = retrieve_hotels($mysqli_conn);
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

                <button class="btn  btn-secondary dropdown-toggle dropdown-btn nav-text" type="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Fast Travel
                </button>
                <ul class="dropdown-menu">
                    <li><a href="#home-travel" class="dropdown-item">home-travel</a></li>
                    <li><a href="#our-services-wrapper" class="dropdown-item">services-travel</a></li>
                    <li><a href="#img-tr" class="dropdown-item">img-travel</a></li>
                </ul>

            </div>
        </div>

        <div class="nav-section" id="register-section">
            <h1>
                <a href="/register" id="register-text" class="nav-text">Sign Up</a>
            </h1>
        </div>
        <div class="nav-section" id="login-logout-section">
            <a href="">
                <h2 class="nav-text">Login</h2>
            </a>
        </div>
    </nav>
        <!-- end nav -->


    <div class="container-fluid parent-cont cards-parent-cont my-cont">
        <div class="row cards-row justify-content-between my-row">
            <div class="col-md-4 col-md-4-card col-sm-5 col-sm-5-card col-lg-3 col-lg-3-card card-col non-padded-col my-col">
                <a href="http://172.104.152.80:5001/apartment_detail_view.php">
                <div class="container-fluid card-inner-cont my-cont">
                    <div class="row card-inner-row card-carousel-row my-row">
                        <div class="col-12 card-inner-col non-padded-col my-col">
                            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                                <div class="carousel-indicators carousel-indicators-apartments">
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                </div>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="https://www.essentialliving.co.uk/wp-content/uploads/2015/09/esssential-living-1-bed-apartment-5.jpg" class="d-block carousel-img" alt="apartment">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="https://www.aveliving.com/AVE/media/Property_Images/Florham%20Park/hero/flor-apt-living-(2)-hero.jpg?ext=.jpg" class="d-block carousel-img" alt="apartment">
                                    </div>
                                     <div class="carousel-item">
                                        <img src="https://images1.apartments.com/i2/OEjzITWGhM0-zCrkrs79pKucbevWq8OR7SOIRj-yzfo/111/the-kace-apartments-grand-prairie-tx-primary-photo.jpg?p=1" class="d-block carousel-img" alt="apartment">
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="row card-inner-row my-row">
                        <div class="col-12 card-inner-col non-padded-col my-col">
                            <p class="card-address">London, UK</p>
                        </div>
                    </div>
                    <div class="row card-inner-row my-row">
                        <div class="col-12 card-inner-col non-padded-col my-col">
                            <p class="card-price">1000/month</p>
                        </div>
                    </div>
                    <div class="row card-inner-row my-row">
                        <div class="col-sm-2 card-inner-col non-padded-col my-col card-rating">
                            <p class="card-rating">9.5</p>
                        </div>
                        <div class="col-sm-10 card-inner-col non-padded-col my-col">
                            <p class="card-reviews">1589 reviews</p>
                        </div>
                    </div>

                </div>
                </a>
            </div>
            
            <div class="col-md-4 col-md-4-card col-sm-5 col-sm-5-card col-lg-3 col-lg-3-card card-col non-padded-col my-col">
            <a href="http://172.104.152.80:5001/apartment_detail_view.php">
                <div class="container-fluid card-inner-cont my-cont">
                    <div class="row card-inner-row card-carousel-row my-row">
                        <div class="col-12 card-inner-col non-padded-col my-col">
                            <div id="carouselExampleIndicators2" class="carousel slide" data-bs-ride="true">
                                <div class="carousel-indicators carousel-indicators-apartments">
                                    <button type="button" data-bs-target="#carouselExampleIndicators2" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators2" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators2" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                </div>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="https://images1.forrent.com/i2/P-li1Js-r2HcDVX0vEb-L_6bNElgY46SCy6ed0dsBcU/117/image.jpg" class="d-block carousel-img" alt="apartment">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="https://www.benttreeapartments.com/content/dam/aimco-properties/bent-tree-apartments/1920x1121/interior/BentTree-ChestnutPremier-Kitchen1_staged.jpg" class="d-block carousel-img" alt="apartment">
                                    </div>
                                     <div class="carousel-item">
                                        <img src="https://photos.zillowstatic.com/fp/1ed9dae2e85d62a37e9877d6f9d18f7f-se_large_800_400.jpg" class="d-block carousel-img" alt="apartment">
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators2" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators2" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="row card-inner-row my-row">
                        <div class="col-12 card-inner-col non-padded-col my-col">
                            <p class="card-address">Doha, Bahrain</p>
                        </div>
                    </div>
                    <div class="row card-inner-row my-row">
                        <div class="col-12 card-inner-col non-padded-col my-col">
                            <p class="card-price">2000/month</p>
                        </div>
                    </div>
                    <div class="row card-inner-row my-row">
                        <div class="col-sm-2 card-inner-col non-padded-col my-col card-rating">
                            <p class="card-rating">7.4</p>
                        </div>
                        <div class="col-sm-10 card-inner-col non-padded-col my-col">
                            <p class="card-reviews">1054 reviews</p>
                        </div>
                    </div>

                </div>
            </a>
            </div>

            <div class="col-md-4 col-md-4-card col-sm-5 col-sm-5-card col-lg-3 col-lg-3-card card-col non-padded-col my-col">
            <a href="http://172.104.152.80:5001/apartment_detail_view.php">
                <div class="container-fluid card-inner-cont my-cont">
                    <div class="row card-inner-row card-carousel-row my-row">
                        <div class="col-12 card-inner-col non-padded-col my-col">
                            <div id="carouselExampleIndicators3" class="carousel slide" data-bs-ride="true">
                                <div class="carousel-indicators carousel-indicators-apartments">
                                    <button type="button" data-bs-target="#carouselExampleIndicators3" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators3" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators3" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                </div>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="https://www.thearmitage.com/assets/images/home/2000/home_banner_v7.jpg" class="d-block carousel-img" alt="apartment">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="https://images1.apartments.com/i2/1zpSWQwDVnd-mQZVCUuBqDtPT_U2fB6EcHMIhsBqGus/117/blake-lofts-los-angeles-ca-building-photo.jpg" class="d-block carousel-img" alt="apartment">
                                    </div>
                                     <div class="carousel-item">
                                        <img src="https://images1.apartments.com/i2/KiAh59Odk3yaqTrbWICxK7rvRxYhRBWJUNVCyoMVOjM/117/bristol-station-apartments-carteret-nj-building-photo.jpg" class="d-block carousel-img" alt="apartment">
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators3" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators3" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="row card-inner-row my-row">
                        <div class="col-12 card-inner-col non-padded-col my-col">
                            <p class="card-address">Barcelona, Spain</p>
                        </div>
                    </div>
                    <div class="row card-inner-row my-row">
                        <div class="col-12 card-inner-col non-padded-col my-col">
                            <p class="card-price">1200/month</p>
                        </div>
                    </div>
                    <div class="row card-inner-row my-row">
                        <div class="col-sm-2 card-inner-col non-padded-col my-col card-rating">
                            <p class="card-rating">8.1</p>
                        </div>
                        <div class="col-sm-10 card-inner-col non-padded-col my-col">
                            <p class="card-reviews">24591 reviews</p>
                        </div>
                    </div>

                </div>
            </a>
            </div>

            <div class="col-md-4 col-md-4-card col-sm-5 col-sm-5-card col-lg-3 col-lg-3-card card-col non-padded-col my-col">
            <a href="http://172.104.152.80:5001/apartment_detail_view.php">
                <div class="container-fluid card-inner-cont my-cont">
                    <div class="row card-inner-row card-carousel-row my-row">
                        <div class="col-12 card-inner-col non-padded-col my-col">
                            <div id="carouselExampleIndicators4" class="carousel slide" data-bs-ride="true">
                                <div class="carousel-indicators carousel-indicators-apartments">
                                    <button type="button" data-bs-target="#carouselExampleIndicators4" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators4" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators4" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                </div>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="https://images1.apartments.com/i2/bnGLl7A2NVSPLecMz07SbGBIzaj6syqdFjg5segt9BE/117/motiva-greenbelt-md-building-photo.jpg" class="d-block carousel-img" alt="apartment">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="https://millerapartments.com.au/wp-content/uploads/2019/09/miller-apartments-1bed-executive-lounge-960x580.jpg" class="d-block carousel-img" alt="apartment">
                                    </div>
                                     <div class="carousel-item">
                                        <img src="https://g5-assets-cld-res.cloudinary.com/image/upload/q_auto,f_auto,fl_lossy/v1604076161/g5/g5-c-j0id33u1-vantage-management-client/g5-cl-1gufhsyjr2-washington-apartments/uploads/019_1205_1_2_7TH_ST_NW_313684_585513_krg3n0.jpg" class="d-block carousel-img" alt="apartment">
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators4" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators4" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="row card-inner-row my-row">
                        <div class="col-12 card-inner-col non-padded-col my-col">
                            <p class="card-address">Dubai, UAE</p>
                        </div>
                    </div>
                    <div class="row card-inner-row my-row">
                        <div class="col-12 card-inner-col non-padded-col my-col">
                            <p class="card-price">1500/month</p>
                        </div>
                    </div>
                    <div class="row card-inner-row my-row">
                        <div class="col-sm-2 card-inner-col non-padded-col my-col card-rating">
                            <p class="card-rating">7.7</p>
                        </div>
                        <div class="col-sm-10 card-inner-col non-padded-col my-col">
                            <p class="card-reviews">30239 reviews</p>
                        </div>
                    </div>

                </div>
            </a>
            </div>

            <div class="col-md-4 col-md-4-card col-sm-5 col-sm-5-card col-lg-3 col-lg-3-card card-col non-padded-col my-col">
            <a href="http://172.104.152.80:5001/apartment_detail_view.php">
                <div class="container-fluid card-inner-cont my-cont">
                    <div class="row card-inner-row card-carousel-row my-row">
                        <div class="col-12 card-inner-col my-col non-padded-col carousel-indicators-apartments">
                            <div id="carouselExampleIndicators5" class="carousel slide" data-bs-ride="true">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselExampleIndicators5" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators5" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators5" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                </div>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="https://cf.bstatic.com/xdata/images/hotel/max1024x768/257987839.jpg?k=d45b86c0628ef1d45c23e99d8da4868171ae57bd5c91d57cb30e626078c3540e&o=&hp=1" class="d-block carousel-img" alt="apartment">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS3se3tLxll81g12fTPaSiWSed_qSWr6mEDcg&usqp=CAU" class="d-block carousel-img" alt="apartment">
                                    </div>
                                     <div class="carousel-item">
                                        <img src="https://images1.apartments.com/i2/qTHy4dIvoEVeXrVhVwTzWu1ygQ0xeUXjvgiOwIxWSnE/117/livingston-apartment-flats-chesterfield-va-building-photo.jpg" class="d-block carousel-img" alt="apartment">
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators5" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators5" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="row card-inner-row my-row">
                        <div class="col-12 card-inner-col non-padded-col my-col">
                            <p class="card-address">Jedda, Saudi Arabia</p>
                        </div>
                    </div>
                    <div class="row card-inner-row my-row">
                        <div class="col-12 card-inner-col non-padded-col my-col">
                            <p class="card-price">1500/month</p>
                        </div>
                    </div>
                    <div class="row card-inner-row my-row">
                        <div class="col-sm-2 card-inner-col non-padded-col my-col card-rating">
                            <p class="card-rating">9.1</p>
                        </div>
                        <div class="col-sm-10 card-inner-col non-padded-col my-col">
                            <p class="card-reviews">2390 reviews</p>
                        </div>
                    </div>

                </div>
            </a>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>
</html>