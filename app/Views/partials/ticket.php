<div class="card mb-3">
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <div class="d-flex flex-row align-items-center">
                <div>
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-shopping-carts/img1.webp"
                        class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                </div>
                <div class="ms-3">
                    <h5><?= $ticket['startingDestination'] ?> -
                        <?= $ticket['endingDestination'] ?></h5>
                    <p class="small mb-0"><?= $ticket['datetime'] ?></p>
                    <p class="small mb-0"><?= $ticket['busPlate'] ?></p>
                    <p class="small mb-0">
                        <?= $ticket['roundTrip'] ? 'Round Trip' : 'One Way' ?></p>
                </div>
            </div>
            <div class="d-flex flex-row align-items-center">
                <div style="width: 50px;">
                    <h5 class="fw-normal mb-0">
                        <?= getenv('currency') . $ticket['price'] ?></h5>
                </div>
                <a href="#!" style="color: #cecece;"><i class="fas fa-trash-alt"></i></a>
            </div>
        </div>
    </div>
</div>