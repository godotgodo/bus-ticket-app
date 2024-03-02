<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<section class="h-100 h-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
                <div class="card">
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-lg-7">
                                <h5 class="mb-3"><a href="#!" class="text-body"><i
                                            class="fas fa-long-arrow-alt-left me-2"></i>Continue shopping</a></h5>
                                <hr>
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <div>
                                        <p class="mb-1">Shopping cart</p>
                                        <p class="mb-0">You have <?= count(esc($tickets)) ?> items in your cart</p>
                                    </div>
                                    <div>
                                        <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="#!"
                                                class="text-body">price <i class="fas fa-angle-down mt-1"></i></a></p>
                                    </div>
                                </div>

                                <?php foreach (esc($tickets) as $ticket): ?>
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex flex-row align-items-center">
                                                <div>
                                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-shopping-carts/img1.webp"
                                                        class="img-fluid rounded-3" alt="Shopping item"
                                                        style="width: 65px;">
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
                                                <a href="#!" style="color: #cecece;"><i
                                                        class="fas fa-trash-alt"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>

                            </div>
                            <div class="col-lg-5">

                                <div class="card bg-primary text-white rounded-3">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center mb-4">
                                            <h5 class="mb-0">Card details</h5>
                                        </div>
                                        <form class="mt-4" action="payment" method="post">
                                            <div class="form-outline form-white mb-4">
                                                <input type="text" id="name" name="name"
                                                    class="form-control form-control-lg" siez="17"
                                                    placeholder="Cardholder's Name" />
                                                <label class="form-label" for="typeName">Cardholder's Name</label>
                                            </div>

                                            <div class="form-outline form-white mb-4">
                                                <input type="text" id="number" name="number"
                                                    class="form-control form-control-lg" size="17"
                                                    placeholder="1234 5678 9012 3457" minlength="19" maxlength="19" />

                                                <label class="form-label" for="typeText">Card Number</label>
                                            </div>

                                            <div class="row mb-4">
                                                <div class="col-md-6">
                                                    <div class="form-outline form-white">
                                                        <input type="text" id="expiration" name="expiration"
                                                            class="form-control form-control-lg" placeholder="MM/YYYY"
                                                            size="7" id="exp" minlength="7" maxlength="7" />
                                                        <label class="form-label" for="typeExp">Expiration</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-outline form-white">
                                                        <input type="password" id="cvv"
                                                            class="form-control form-control-lg" name="cvv"
                                                            placeholder="&#9679;&#9679;&#9679;" size="1" minlength="3"
                                                            maxlength="3" />
                                                        <label class="form-label" for="typeText">Cvv</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="my-4">

                                            <div class="d-flex justify-content-between">
                                                <p class="mb-2">Subtotal</p>
                                                <p class="fw-normal mb-0"><?= getenv('currency') . esc($subTotal) ?></p>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <p class="mb-2">Discount (%<?= esc($discountPercentage) ?>)</p>
                                                <p class="fw-normal mb-0">
                                                    <?= getenv('currency') . esc($discountAmount) ?>
                                                </p>
                                            </div>
                                            <div class="d-flex justify-content-between mb-4">
                                                <p class="mb-2">Total Price</p>
                                                <p class="fw-normal mb-0"><?= getenv('currency') . esc($totalPrice) ?>
                                                </p>
                                            </div>

                                            <input type="submit" class="btn btn-info btn-block btn-lg"
                                                value="<?= getenv('currency') . esc($totalPrice) ?> Checkout">
                                            </input>
                                        </form>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection()?>