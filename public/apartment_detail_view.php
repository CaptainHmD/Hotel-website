<?php
session_start();

require_once("utils/mysql_config.php");
require_once("utils/utils.php");

$url = strtok($_SERVER["REQUEST_URI"], '?');
login_only($url);

if ($_SERVER["REQUEST_METHOD"] === "GET"){
    $apartmentId = intval($_GET["apartment-id"]);

    // get apartment from db
    $apartment = retrieve_apartment_by_id($mysqli_conn, $apartmentId);
    if(!$apartment){
        die("Err. could not preform the query ".$sql_stmt.PHP_EOL.$mysqli_conn->error);
    };
    $images = extract_apartment_images($apartment["image_name"], "/images/");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style2.css">
    <title>View apartment</title>
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



    <div class="container-fluid parent-cont apartment-detail-parent-cont my-cont">
        <div class="row parent-row justify-content-center my-row">
            <div class="col-12 parent-col-detail-view parent-col my-col">
                <div class="container-fluid content-cont my-cont">
                    <div class="row content-row justify-content-start my-row">
                        <div class="col-sm-2 col-5 non-padded-col my-col rating-info-col margined-info info-col">
                            <p class="rating">8.1</p>
                        </div>
                        <div class="col-sm-2 col-5 non-padded-col my-col reviews-info-col margined-info info-col">
                            <p class="reviews left-aligned-text">24591 reviews</p>
                        </div>
                        <div class="col-sm-5 col-12 non-padded-col my-col address-info-col info-col">
                            <p class="country left-aligned-text"><?php echo $apartment['country'] . ", " . $apartment['city']?></p>
                        </div>
                    </div>

                    <div class="row content-row images-row justify-content-start my-row">
                        <div class="col-sm-12 col-md-5 col-md-5-detail detail-image-col non-padded-col my-col">
                            <img src=<?php echo $images[0]?> alt="Apartment image" class="detail-image left-image">
                        </div>
                        <div class="col-sm-12 col-md-5 col-md-5-detail images-right-col my-col">
                            <div class="container-fluid images-right-cont my-cont">
                                <div class="row justify-content-between images-row my-row">
                                    <?php if (isset($images[1])) {
                                    ?>
                                    <div class="col-5 col-5-detail-right detail-image-col detail-image-col-right align-self-start  non-padded-col my-col">
                                        <img src=<?php echo $images[1];?> alt="Apartment image" class="detail-image right-image">
                                    </div>
                                    <?php
                                    }
                                    ?>
                                    <?php if (isset($images[2])) {
                                    ?>
                                    <div class="col-5 col-5-detail-right detail-image-col detail-image-col-right align-self-start non-padded-col my-col">
                                        <img src=<?php echo $images[2];?> alt="Apartment image" class="detail-image right-image">
                                    </div>
                                    <?php
                                    }
                                    ?>
                                    <?php if (isset($images[3])) {
                                    ?>
                                    <div class="col-5 col-5-detail-right detail-image-col detail-image-col-right align-self-end non-padded-col my-col">
                                        <img src=<?php echo $images[3];?> alt="Apartment image" class="detail-image right-image">
                                    </div>
                                    <?php
                                    }
                                    ?>
                                    <?php if (isset($images[4])) {
                                    ?>
                                    <div class="col-5 col-5-detail-right detail-image-col detail-image-col-right align-self-end non-padded-col my-col">
                                        <img src=<?php echo $images[4];?> alt="Apartment image" class="detail-image right-image">
                                    </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row content-row price-row-detail-view justify-content-start my-row">
                        <div class="col-2 col-2-info price-col my-col non-padded-col info-col">
                            <p class="price left-aligned-text"><?php echo $apartment['price'] . "$/month"?></p>
                        </div>
                    </div>

                    <div class="row content-row justify-content-start my-row">
                        <div class="col-sm-3 col-sm-3-info col-5 col-5-info my-col non-padded-col margined-info info-col">
                            <p class="left-aligned-text"><?php echo "length: " . $apartment['length'] . "m"?></p>
                        </div>
                        <div class="col-sm-3 col-sm-3-info col-5 col-5-info my-col non-padded-col margined-info info-col">
                            <p class="left-aligned-text"><?php echo "width: " . $apartment['width'] . "m"?></p>
                        </div>
                        <div class="col-sm-3 col-sm-3-info col-5 col-5-info my-col non-padded-col margined-info info-col">
                            <p class="left-aligned-text"><?php echo "rooms: " . $apartment['rooms']?></p>
                        </div>
                        <div class="col-sm-3 col-sm-3-info col-5 col-5-info my-col non-padded-col info-col">
                            <p class="left-aligned-text"><?php echo "bathrooms: " . $apartment['bathrooms']?></p>
                        </div>
                    </div>

                    <div class="row content-row justify-content-start my-row">
                        <div class="col my-col non-padded-col info-col">
                            <p class="address left-aligned-text"><?php echo $apartment['address'] ?></p>
                        </div>
                    </div>

                    

                    <div class="row content-row justify-content-start my-row">
                        <div class="col-10 my-col non-padded-col info-col separator-hr-col">
                            <hr class="separator-hr">
                        </div>
                        <div class="col-11 my-col info-col non-padded-col description-info-col">
                            <p class="description left-aligned-text"><?php echo $apartment['description']?></p>
                        </div>
                    </div>

                    <div class="row content-row justify-content-start my-row rating-btn-row">
                        <div class="col-11 my-col info-col non-padded-col rating-btn-col">
                            <button type="button" class="btn btn-primary rating-btn" data-bs-toggle="modal" data-bs-target="#rating-modal">
                                Leave a rating
                            </button>

                            <!-- Modal -->
                            <div class="modal modal-detail-view fade" id="rating-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="rating-modal-label" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5 rating-modal-label modal-text" id="rating-modal-label">Rate this apartment</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="mb-3">
                                                <label for="message-text" class="col-form-label modal-text">Comment</label>
                                                <textarea class="form-control modal-text-area" id="message-text" placeholder="it was a nice stay..."></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="customRange2" class="form-label modal-text">rating</label>
                                                <input type="range" class="form-range" min="1" max="10" step="1" value="5" id="customRange2" oninput="this.nextElementSibling.value = this.value">
                                                <output>5</output>
                                            </div>
                                            <div class="mb-3">
                                            <button type="button" class="btn rating-btn-submit">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                        <!-- <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn rating-btn-submit">Save changes</button>
                                        </div> -->
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row content-row justify-content-start my-row main-separator-row">
                        <div class="col-12 my-col non-padded-col info-col separator-hr-col">
                            <hr class="separator-hr">
                        </div>
                    </div>

                    <div class="row content-row justify-content-start user-comments-row my-row">
                        <div class="col-md-5 my-col non-padded-col user-feedback-wrapper-col">
                            <div class="container-fluid user-feedback-cont my-cont">
                                <div class="row justify-content-start user-feedback-row my-row">
                                    <div class="col-3 user-feedback-col user-feedback-col-small non-padded-col margined-info my-col">
                                            <p class="left-aligned-text">Hamad</p>
                                    </div>
                                    <div class="col-3 user-feedback-col user-feedback-col-small non-padded-col my-col">
                                            <p class="left-aligned-text">2 days ago</p>
                                    </div>
                                </div>
                                <div class="row justify-content-start user-feedback-row my-row">
                                    <div class="col-3 user-feedback-col user-feedback-col-small non-padded-col my-col">
                                            <p class="left-aligned-text">9.5</p>
                                    </div>
                                </div>
                                <div class="row justify-content-start user-feedback-row my-row">
                                    <div class="col-12 user-feedback-col non-padded-col my-col">
                                            <p class="left-aligned-text">it was the best apartment iv'e ever been to in my life</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5 my-col non-padded-col user-feedback-wrapper-col">
                            <div class="container-fluid user-feedback-cont my-cont">
                                <div class="row justify-content-start user-feedback-row my-row">
                                    <div class="col-3 user-feedback-col user-feedback-col-small non-padded-col margined-info my-col">
                                            <p class="left-aligned-text">Ammar</p>
                                    </div>
                                    <div class="col-3 user-feedback-col user-feedback-col-small non-padded-col my-col">
                                            <p class="left-aligned-text">1 month ago</p>
                                    </div>
                                </div>
                                <div class="row justify-content-start user-feedback-row my-row">
                                    <div class="col-3 user-feedback-col user-feedback-col-small non-padded-col my-col">
                                            <p class="left-aligned-text">1.2</p>
                                    </div>
                                </div>
                                <div class="row justify-content-start user-feedback-row my-row">
                                    <div class="col-12 user-feedback-col non-padded-col my-col">
                                            <p class="left-aligned-text">worst apartment ever.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce dolor enim, posuere et quam at, luctus lacinia mi. Nunc fermentum molestie magna sed tristique.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5 my-col non-padded-col user-feedback-wrapper-col">
                            <div class="container-fluid user-feedback-cont my-cont">
                                <div class="row justify-content-start user-feedback-row my-row">
                                    <div class="col-3 user-feedback-col user-feedback-col-small non-padded-col margined-info my-col">
                                            <p class="left-aligned-text">Homsi</p>
                                    </div>
                                    <div class="col-3 user-feedback-col user-feedback-col-small non-padded-col my-col">
                                            <p class="left-aligned-text">1 year ago</p>
                                    </div>
                                </div>
                                <div class="row justify-content-start user-feedback-row my-row">
                                    <div class="col-3 user-feedback-col user-feedback-col-small non-padded-col my-col">
                                            <p class="left-aligned-text">5.5</p>
                                    </div>
                                </div>
                                <div class="row justify-content-start user-feedback-row my-row">
                                    <div class="col-12 user-feedback-col non-padded-col my-col">
                                            <p class="left-aligned-text">يعني نص ونص.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5 my-col non-padded-col user-feedback-wrapper-col">
                            <div class="container-fluid user-feedback-cont my-cont">
                                <div class="row justify-content-start user-feedback-row my-row">
                                    <div class="col-3 user-feedback-col user-feedback-col-small non-padded-col margined-info my-col">
                                            <p class="left-aligned-text">Ahmad</p>
                                    </div>
                                    <div class="col-3 user-feedback-col user-feedback-col-small non-padded-col my-col">
                                            <p class="left-aligned-text">1 moth ago</p>
                                    </div>
                                </div>
                                <div class="row justify-content-start user-feedback-row my-row">
                                    <div class="col-3 user-feedback-col user-feedback-col-small non-padded-col my-col">
                                            <p class="left-aligned-text">9.5</p>
                                    </div>
                                </div>
                                <div class="row justify-content-start user-feedback-row my-row">
                                    <div class="col-12 user-feedback-col non-padded-col my-col">
                                            <p class="left-aligned-text">very good. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce dolor enim, posuere et quam at, luctus lacinia mi. Nunc fermentum molestie magna sed tristique.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
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