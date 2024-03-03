<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<section class="py-5"
    style="background-image: url('metis-assets/backgrounds/intersect.svg'); background-size: contain; background-repeat: no-repeat; background-position: top;">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 col-md-8 col-lg-7 mx-auto text-center">
                <h2 class="mb-3 fs-1 fw-bold">
                    <span>Start saving time today and</span>
                    <span class="text-primary">choose</span>
                    <span>your best plan</span>
                </h2>
                <p class="mb-0 text-muted">Best for freelance developers who need to save their time.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4 mb-4">
                <div class="px-3 py-5 text-center bg-white rounded shadow-sm">
                    <h3 class="mb-2 fs-1 fw-bold">Ankara-İstanbul</h3>
                    <span class="fs-1 fw-bold text-primary">$32.99</span>
                    <p class="mt-1 text-muted">2020.01.01</p>
                    <div class="my-4 py-2">
                        <ul class="list-unstyled text-start text-muted mb-4">
                            <li class="mb-" style="text-align: center;">
                                <svg class="me-2 text-success" width="24" height="24" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewbox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span>3/35 Seats Free</span>
                            </li>
                        </ul>
                        <?= view('partials/bus_seats.php') ?>
                    </div>
                    <div>
                        <a class="btn btn-primary me-2" href="#">Add to Card</a>
                        <a class="btn btn-outline-secondary" href="#">Reservation</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<?= $this->endSection()?>