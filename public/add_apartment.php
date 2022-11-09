<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/add_apartment.css">
    <title>Post a new apartment</title>
</head>
<body>

    <!-- content wrapper -->
    <div class="container parent-cont">
        <div class="row justify-content-center parent-row">
            <div class="col-sm-8 parent-col">
                <form action="/add_apartment.php" method="POST" enctype="multipart/form-data" id="apartment_form" class="container my-cont" onsubmit="DoSubmit()">
                    <div class="form-fields-wrapper">
                        <div class="form-row justify-content-center my-row">
                            <div class='col-12 my-col text-center'>
                                <h1 id="form-title">
                                    Post a new apartment
                                </h1>
                            </div>
                        </div>

                        <div class="form-row row justify-content-center my-row">
                            <div class='col-12 my-col'>
                                <div class="mb-3">
                                    <label for="address" class="form-label">Apartment Address</label>
                                    <input type="text" name="address" class="form-control" id="address" placeholder="Saudi Arabia, Makkah, Annuzha, Alqadi...">
                                </div>
                            </div>
                        </div>

                        <div class="form-row row justify-content-center my-row">
                            <div class='col-sm-6 my-col'>
                                <div class="mb-3">
                                    <label for="length" class="form-label">Apartment length (meters)</label>
                                    <input type="number" name="length" class="form-control" id="length" min=10>
                                </div>
                            </div>
                            <div class='col-sm-6 my-col'>
                                <div class="mb-3">
                                    <label for="width" class="form-label">Apartment width (meters)</label>
                                    <input type="number" name="width" class="form-control" id="width" min=10>
                                </div>
                            </div>
                        </div>

                        <div class="form-row row justify-content-center my-row">
                            <div class='col-sm-6 my-col'>
                                <div class="mb-3">
                                    <label for="rooms" class="form-label">Number of rooms</label>
                                    <input type="number" name="rooms" class="form-control" id="rooms" min=1>
                                </div>
                            </div>
                            <div class='col-sm-6 my-col'>
                                <div class="mb-3">
                                    <label for="bathrooms" class="form-label">Number of bathrooms</label>
                                    <input type="number" name="bathrooms" class="form-control" id="bathrooms" min=1>
                                </div>
                            </div>
                        </div>

                        <div class="form-row row justify-content-center my-row">
                            <div class='col-sm-6 my-col'>
                                <div class="mb-3">
                                    <label for="price" class="form-label">Apartment price per month</label>
                                    <input type="number" name="price" class="form-control" id="price" min=1>
                                </div>
                            </div>
                        </div>

                        <div class="form-row row justify-content-center my-row">
                            <div class='col-sm-10 my-col'>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Apartment description</label>
                                    <textarea name="description" class="form-control" id="description" cols="60" rows="5" placeholder="A modern apartment with a beach view..."></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-row row justify-content-center my-row">
                            <div class='col-sm-5 my-col'>
                                <div class="mb-3">
                                    <input type="submit" name="submit" value="submit" id="submit" class="form-control">
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
</body>
</html>