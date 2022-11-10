<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/apartment_detail_view.css">
    <title>View apartment</title>
</head>
<body>
    <div class="container-fluid parent-cont my-cont">
        <div class="row parent-row justify-content-center my-row">
            <div class="col-12 parent-col my-col">
                <div class="container-fluid content-cont my-cont">
                    <div class="row content-row justify-content-start my-row">
                        <div class="col-sm-2 col-5 non-padded-col my-col rating-info-col margined-info info-col">
                            <p class="rating">8.1</p>
                        </div>
                        <div class="col-sm-2 col-5 non-padded-col my-col reviews-info-col margined-info info-col">
                            <p class="reviews left-aligned-text">24591 reviews</p>
                        </div>
                        <div class="col-sm-5 col-12 non-padded-col my-col address-info-col info-col">
                            <p class="country left-aligned-text">Barcelona, Spain</p>
                        </div>
                    </div>

                    <div class="row content-row images-row justify-content-start my-row">
                        <div class="col-sm-12 col-md-5 col-md-5-detail detail-image-col non-padded-col my-col">
                            <img src="https://www.thearmitage.com/assets/images/home/2000/home_banner_v7.jpg" alt="" class="detail-image left-image">
                        </div>
                        <div class="col-sm-12 col-md-5 col-md-5-detail images-right-col my-col">
                            <div class="container-fluid images-right-cont my-cont">
                                <div class="row justify-content-between images-row my-row">
                                    <div class="col-5 col-5-detail-right detail-image-col non-padded-col my-col">
                                        <img src="https://images1.apartments.com/i2/1zpSWQwDVnd-mQZVCUuBqDtPT_U2fB6EcHMIhsBqGus/117/blake-lofts-los-angeles-ca-building-photo.jpg" alt="" class="detail-image right-image">
                                    </div>
                                    <div class="col-5 col-5-detail-right detail-image-col non-padded-col my-col">
                                        <img src="https://images1.apartments.com/i2/KiAh59Odk3yaqTrbWICxK7rvRxYhRBWJUNVCyoMVOjM/117/bristol-station-apartments-carteret-nj-building-photo.jpg" alt="" class="detail-image right-image">
                                    </div>
                                    <div class="col-5 col-5-detail-right detail-image-col non-padded-col align-self-end my-col">
                                        <img src="https://images1.apartments.com/i2/qTHy4dIvoEVeXrVhVwTzWu1ygQ0xeUXjvgiOwIxWSnE/117/livingston-apartment-flats-chesterfield-va-building-photo.jpg" alt="" class="detail-image right-image">
                                    </div>
                                    <div class="col-5 col-5-detail-right detail-image-col non-padded-col align-self-end my-col">
                                        <img src="https://www.benttreeapartments.com/content/dam/aimco-properties/bent-tree-apartments/1920x1121/interior/BentTree-ChestnutPremier-Kitchen1_staged.jpg" alt="" class="detail-image right-image">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row content-row price-row justify-content-start my-row">
                        <div class="col-2 col-2-info price-col my-col non-padded-col info-col">
                            <p class="price left-aligned-text">1200$/month</p>
                        </div>
                    </div>

                    <div class="row content-row justify-content-start my-row">
                        <div class="col-sm-3 col-sm-3-info col-5 col-5-info my-col non-padded-col margined-info info-col">
                            <p class="left-aligned-text">length: 125m</p>
                        </div>
                        <div class="col-sm-3 col-sm-3-info col-5 col-5-info my-col non-padded-col margined-info info-col">
                            <p class="left-aligned-text">width: 200m</p>
                        </div>
                        <div class="col-sm-3 col-sm-3-info col-5 col-5-info my-col non-padded-col margined-info info-col">
                            <p class="left-aligned-text">rooms: 5</p>
                        </div>
                        <div class="col-sm-3 col-sm-3-info col-5 col-5-info my-col non-padded-col info-col">
                            <p class="left-aligned-text">bathrooms: 3</p>
                        </div>
                    </div>

                    <div class="row content-row justify-content-start my-row">
                        <div class="col my-col non-padded-col info-col">
                            <p class="address left-aligned-text">Annakasa, awal bait, ala alyasar</p>
                        </div>
                    </div>

                    <div class="row content-row justify-content-start my-row">
                        <div class="col-11 my-col info-col non-padded-col description-info-col">
                            <p class="description left-aligned-text">a modern apartment that has a nice beach view with all the necessary utilities</p>
                        </div>
                    </div>

                    <div class="row content-row justify-content-start my-row">
                        <div class="col-11 my-col info-col non-padded-col">
                            <button type="button" class="btn btn-primary rating-btn" data-bs-toggle="modal" data-bs-target="#rating-modal">
                                Leave a rating
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="rating-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="rating-modal-label" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5 rating-modal-label" id="rating-modal-label">Rate this apartment</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="mb-3">
                                                <label for="message-text" class="col-form-label">Comment</label>
                                                <textarea class="form-control modal-text-area" id="message-text" placeholder="it was a nice stay..."></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="customRange2" class="form-label">rating</label>
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

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>