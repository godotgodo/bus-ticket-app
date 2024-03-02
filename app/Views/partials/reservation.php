<div class="card mb-3">
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <div class="d-flex flex-row align-items-center">
                <div>
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-shopping-carts/img1.webp"
                        class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                </div>
                <div class="ms-3">
                    <h5><?= $reservation['startingDestination'] ?> -
                        <?= $reservation['endingDestination'] ?></h5>
                    <p class="small mb-0"><?= $reservation['datetime'] ?></p>
                    <p class="small mb-0"><?= $reservation['busPlate'] ?></p>
                    <p class="small mb-0">
                        <?= $reservation['roundTrip'] ? 'Round Trip' : 'One Way' ?></p>
                </div>
            </div>
            <div class="d-flex flex-row align-items-center">
                <div style="width: 50px;">
                    <h5 class="fw-normal mb-0">
                        <?= getenv('currency') . $reservation['price'] ?></h5>
                </div>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                    data-bs-target="#<?= 'deleteReservation'.$reservation['reservation_id'] ?>" >
                    Delete
                </button>
                <?= view('partials/modal', [
                    'modal_id' => 'deleteReservation'.$reservation['reservation_id'],
                    'title' => 'Delete Reservation',
                    'content' => 'Are you sure you want to cancel the reservation?',
                    'endpoint' => '/user/deleteReservation/'.$reservation['reservation_id'],
                    'method' => 'post',
                    'close' => 'Cancel',
                    'confirm' => 'Delete',
                ]); ?>
            </div>
        </div>
    </div>
</div>