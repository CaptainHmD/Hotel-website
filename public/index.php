<?php
session_start();

require_once("utils/utils.php");

if(is_logged_in()){
    header("Location: /index-after-login.php");
    die();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Information System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

</head>
<body class="main-body">
    <!-- <div class="container"> -->
    <nav id="navbar">
        <div class="nav-section" id="logo-section">
            <div id="logo-wrapper"> <a href="http://172.104.152.80:5001/add_apartment.php" id="d-gap">
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
                    <li><a href="#home-travel" class="dropdown-item">Home</a></li>
                    <li><a href="#our-services-wrapper" class="dropdown-item">Our Services</a></li>
                    <li><a href="#img-tr" class="dropdown-item">Top Rating</a></li>
                </ul>

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

    <main class="main-section">

        <article class="main-page-view article-style" id="home-travel">
            <div id="img-full-fill">

                <div class="title-text-section">
                    <div class="title">
                        <h1>The Vacation Heaven</h1>
                    </div>
                    <h4 class="info-text ">
                        There is no Vacation in UQU bi... &nbsp;&nbsp;&nbsp;D:
                    </h4>
                </div>


            </div>
        </article>

        <!-- <div class="article-section"></div> -->
        <!-- after main view will be our services then the text animation and img swapping -->
        <article class="article-section article-style" id="our-services-wrapper">
            <div id="our-services">
                <div class="services-title">
                    <h2>Our Services</h2>
                </div>
                <div class="services-wrapper">
                    <div class="cards box-shadow">
                        <h5 class="cards-title">Professional photography</h5>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Read More
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="Professional-Modal"
                            aria-hidden="true">
                            <div class="modal-dialog ">
                                <div class="modal-content bgdcolor">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="Professional-Modal">Professional photography
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        A single picture tells more than a thousand words. That’s why we’ll send over
                                        one of our professional real estate photographers to capture your home from its
                                        best side. Expect photographs worthy of a magazine cover.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cards box-shadow">
                        <h5 class="cards-title"> price optimization</h5>

                        <!-- modal; -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#price">
                            Read More
                        </button>
                        <div class="modal fade" id="price" tabindex="-1" aria-labelledby="price -Modal"
                            aria-hidden="true">
                            <div class="modal-dialog ">
                                <div class="modal-content bgdcolor">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="price -Modal"> price optimization
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Our team of pricing experts dives deep into the data to ensure your occupancy
                                        and profit rates are fully optimised. “Never a missed opportunity” is our adage
                                        for success. Expect best in class yield from your property in Riyadh.
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- modal end  -->

                    </div>




                    <div class="cards box-shadow">
                        <h5 class="cards-title">Guest communication</h5>

                        <!-- modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Guest">
                            Read More
                        </button>
                        <div class="modal fade" id="Guest" tabindex="-1" aria-labelledby="Guest-Modal"
                            aria-hidden="true">
                            <div class="modal-dialog ">
                                <div class="modal-content bgdcolor">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="Guest-Modal">Guest communication
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        From the very first contact to constant on-site support - we’ll make sure your
                                        home is safe, and your guests well taken care of throughout their stay. Expect
                                        happy guests, very happy guests.
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- modal end  -->
                    </div>
                    <div class="cards box-shadow">
                        <h5 class="cards-title">Guest approval</h5>
                        <!-- modal -->

                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#approval">
                            Read More
                        </button>
                        <div class="modal fade" id="approval" tabindex="-1" aria-labelledby="approval-Modal"
                            aria-hidden="true">
                            <div class="modal-dialog ">
                                <div class="modal-content bgdcolor">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="approval-Modal">Guest approval
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        With GuestReady, your Riyadh home is in good hands. We thoroughly screen
                                        potential guests to ensure only the most reputable guests will be staying in
                                        your home.
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- modal end  -->
                    </div>



                    <div class="cards box-shadow">
                        <h5 class="cards-title">Guided Check-out</h5>

                        <!-- modal -->

                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Guided">
                            Read More
                        </button>
                        <div class="modal fade" id="Guided" tabindex="-1" aria-labelledby="Guided-Modal"
                            aria-hidden="true">
                            <div class="modal-dialog ">
                                <div class="modal-content bgdcolor">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="Guided-Modal">Guided Check-out
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        We will aid your guests throughout the check-out process, ensuring that your
                                        place is in order, windows and doors are locked, keys collected and your guests
                                        ready for their onward journey. Expect best in class safety
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- modal end  -->
                    </div>



                    <div class="cards box-shadow">
                        <h5 class="cards-title">Professional housekeeping</h5>
                        <!-- modal -->

                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#housekeeping">
                            Read More
                        </button>
                        <div class="modal fade" id="housekeeping" tabindex="-1" aria-labelledby="housekeeping-Modal"
                            aria-hidden="true">
                            <div class="modal-dialog ">
                                <div class="modal-content bgdcolor">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="housekeeping-Modal">Professional housekeeping
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Empowered with our team of professional housekeepers with years of experience in
                                        hotels, GuestReady will add a touch of home, to your property. Expect an
                                        impeccably clean place, each time.
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- modal end  -->

                    </div>
                </div>
            </div>
        </article>

        <article class="img-view article-style" id="img-tr">
            <!-- <div class="article-section" id="img-text-section"> -->

            <div id="text-section">
                <h2 class="text-title text-size">Top Rating&nbsp;<h2 id="text-animation" class="text-title text-size"
                        data-text="Single Room~"></h2>
                </h2>
            </div>
            <div id="img-section">

                <div id="carouselExampleDark" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                            aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="3000">
                            <img src="../resources/hotel-images/single room4.jpg" class="d-block w-auto" alt="...">
                        </div>
                        <div class="carousel-item" data-bs-interval="3000">
                            <img src="../resources/hotel-images/single room.jpg" class="d-block w-auto" alt="...">
                        </div>
                        <div class="carousel-item" data-bs-interval="3000">
                            <img src="../resources/hotel-images/single room2.jpg" class="d-block w-auto" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <!-- </div> -->
        </article>
        <!-- <article></article>
        <article></article>
        <article></article> -->
        <div style="margin-bottom: 10vh;"></div>

        <!-- footer -->
        <div class="footer">
            <div class="col-6 d-flex-with-gap">
                <h6> &copy; 2022 WP Hotel</h6>
                <h6>Privacy</h6>
                <h6>Terms</h6>
                <h6>Sitemap</h6>
                <h6>Destinations</h6>
            </div>
            <div class="col-5 d-flex-with-gap ps-5">
                <h6>&#9728; English (US)</h6>
                <h6>SR
                    SAR</h6>
                <h6><a href="https://github.com/CaptainHmD/Hotel-website"><img src="../resources/icons/code-2-16.png"
                            alt=""> &nbsp;source code</a></h6>
            </div>
        </div>
        <!-- footer end -->
    </main>

    <script src="../js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
        integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk"
        crossorigin="anonymous"></script>
</body>

</html>