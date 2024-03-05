<div class="card mb-3">
    <form method="post">
        <input type="hidden" name="ticket-id" value="<?= $ticket['ticket_id'] ?>">
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
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                        data-bs-target="#<?= 'releaseTheTicket'.$ticket['ticket_id'] ?>">
                        Release the Ticket
                    </button>
                    <?= view('partials/modal', [
                    'modal_id' => 'releaseTheTicket'.$ticket['ticket_id'],
                    'title' => 'Release the Ticket',
                    'content' => 'Are you sure you want to release the ticket?',
                    'endpoint' => '/user/releaseTheTicket/'.$ticket['ticket_id'],
                    'method' => 'post',
                    'close' => 'Cancel',
                    'confirm' => 'Release',
                ]); ?>
                </div>
            </div>
        </div>
    </form>

</div>