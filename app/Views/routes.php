<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<section class="py-5"
    style="background-image: url('metis-assets/backgrounds/intersect.svg'); background-size: contain; background-repeat: no-repeat; background-position: top;">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 col-md-8 col-lg-7 mx-auto text-center">
                <h2 class="mb-3 fs-1 fw-bold">
                    <span>Start selecting your bus ticket and</span>
                    <span class="text-primary">choose</span>
                    <span>your preferred plan</span>
                </h2>
                <p class="mb-0 text-muted">Best for travelers who want to save time.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4 mb-4">
                <div class="px-3 py-5 text-center bg-white rounded shadow-sm">
                    <h3 class="mb-2 fs-1 fw-bold">Ankara-İstanbul</h3>
                    <div class="my-4 py-2">
                        <ul class="mt-3 nav nav-tabs" id="ticket-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="one-way" data-bs-toggle="tab" data-bs-target="#one"
                                    type="button" role="tab" aria-controls="current" aria-selected="true">One
                                    Way</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="round-trip" data-bs-toggle="tab" data-bs-target="#round"
                                    type="button" role="tab" aria-controls="round" aria-selected="false">Round
                                    Trip</button>
                            </li>
                        </ul>
                        <div class="mt-2 tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="one" role="tabpanel"
                                aria-labelledby="current-tab">
                                <form method="post">
                                    <input type="hidden" name="route-id" value="example-id">
                                    <ul class="list-unstyled text-center text-muted mb-4">
                                        <span class="fs-1 fw-bold text-primary">$32.99</span>
                                        <p class="mt-1 text-muted">2020.01.01</p>
                                        <li class="mb-" style="text-align: center;">
                                            <svg class="me-2 text-success" width="24" height="24"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <span>3/35 Seats Free</span>
                                        </li>
                                    </ul>
                                    <?= view('partials/bus_seats.php', ['type'=>'going','seats'=>[
                                        '1'=>'free',
                                        '2'=>'reserved',
                                        '3'=>'bought',
                                        '4'=>'free',
                                    ] ]) ?>
                                    <div>
                                        <input type="submit" formaction="addToCard" name="addToCard"
                                            class="btn btn-primary me-2" value="Add to Card" />
                                        <input type="submit" formaction="addToReservation" name="addToReservation"
                                            class="btn btn-outline-secondary" value="Reservation" />
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="round" role="tabpanel" aria-labelledby="round">
                                <form method="post">
                                    <input type="hidden" name="route-id" value="example-id">
                                    <div>
                                        Select Going
                                        <select name="round-trip-going" id="round-trip-going">
                                            <option>2023.01.01 $5</option>
                                            <option>2023.01.02 $6</option>
                                        </select>
                                        <?= view('partials/bus_seats.php', ['type'=>'going']) ?>
                                    </div>
                                    Select Returning
                                    <select name="round-trip-returning" id="round-trip-returning">
                                        <option>2023.02.05 $5</option>
                                        <option>2023.02.10 $6</option>
                                    </select>
                                    <?= view('partials/bus_seats.php', ['type'=>'returning']) ?>
                                    <div>
                                        <input type="submit" formaction="addToCard" name="addToCard"
                                            class="btn btn-primary me-2" value="Add to Card" />
                                        <input type="submit" formaction="addToReservation" name="addToReservation"
                                            class="btn btn-outline-secondary" value="Reservation" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<?= $this->endSection()?>