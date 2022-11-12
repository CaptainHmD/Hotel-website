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

    <!-- content wrapper -->
    <div class="container parent-cont">
        <div class="row justify-content-center parent-row">
            <div class="col-sm-8 parent-col">
                <form action="/add_apartment.php" method="POST" enctype="multipart/form-data" id="apartment_form" class="container my-cont">
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
                            <div class='col-md-6 my-col'>
                                <div class="mb-3">
                                    <div class="mb-3">
                                        <label for="apartment_images_add_form" class="form-label add_form_label">Apartment images</label>
                                        <input class="form-control add_form_field" type="file" id="apartment_images_add_form" name="apartment_images" accept="image/png, image/jpeg, image/jpg" multiple>
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
    
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="js/ammar.js"></script>
</body>
</html>