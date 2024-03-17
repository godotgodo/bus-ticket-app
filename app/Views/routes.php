<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<section class="py-5" style="background-image: url('metis-assets/backgrounds/intersect.svg'); background-size: contain; background-repeat: no-repeat; background-position: top;">
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
            <?php foreach (esc($routes) as $route) : ?>
                <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <div class="px-3 py-5 text-center bg-white rounded shadow-sm">
                        <h3 class="mb-2 fs-1 fw-bold"><?= $route['startingDestination'] ?>-<?= $route['endingDestination'] ?></h3>
                        <div class="my-4 py-2">
                            <div class="mt-2">
                                <div class="fade show active" id="one">
                                    <form method="post">
                                        <input type="hidden" name="route-id" value="<?= $route['route-id'] ?>">
                                        <ul class="list-unstyled text-center text-muted mb-4">
                                            <span class="fs-1 fw-bold text-primary">$32.99</span>
                                            <p class="mt-1 text-muted"><?= $route['datetime'] ?></p>
                                            <li class="mb-" style="text-align: center;">
                                                <svg class="me-2 text-success" width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                <span><?= $route['freeSeats'] ?>/35 Seats Free</span>
                                            </li>
                                        </ul>
                                        <div>
                                            <input type="submit" formaction="selectRoute" class="btn btn-primary me-2" value="Select Seat" />
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?= $this->endSection() ?>