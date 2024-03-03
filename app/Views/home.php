<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<section class="position-relative h-100 pb-5 bg-light" style="min-height: 100vh;">
    <div class="container pt-5">
        <div class="row align-items-center">
            <div class="col-12 col-md-9 col-lg-5 mx-auto mx-lg-0 mb-5">
                <h2 class="display-4 fw-bold mb-5">Find Your Bus Tickets Easily.</h2>
                <p class="lead text-muted mb-5">Discover and book bus tickets hassle-free. Build a reliable brand that
                    caters to everyone's needs. Continuously develop resources and integrate them with previous
                    projects.</p>
                <form class="d-flex" action="searchTickets" method="get">
                    <input class="form-control me-2" type="text" name="startingDestination" placeholder="Starting Destination">
                    <input class="form-control me-2" type="text" name="endingDestination" placeholder="Ending Destination">
                    <button class="btn btn-primary">Search</button>
                </form>
            </div>
            <div class="col-12 col-lg-6 offset-lg-1 pb-5">
                <img class="mx-auto img-fluid rounded" src="https://picsum.photos/600/400" alt="">
            </div>
        </div>
    </div>
</section>
<?= $this->endSection()?>