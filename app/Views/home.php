<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<section class="position-relative h-100 pb-5 bg-light" style="min-height: 100vh;">
    <div class="container pt-5">
        <div class="row align-items-center">
            <div class="col-12  mx-auto mx-lg-0 mb-5">
                <h2 class="display-4 fw-bold mb-5">Find Your Bus Tickets Easily.</h2>
                <p class="lead text-muted mb-5">Discover and book bus tickets hassle-free. Build a reliable brand that
                    caters to everyone's needs. Continuously develop resources and integrate them with previous
                    projects.</p>
                <div class="d-flex justify-content-center">
                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                        <button type="button" id="oneWay" class="btn btn-primary">Tek Yön</button>
                        <button type="button" id="roundTrip" class="btn btn-outline-primary">Gidiş Dönüş</button>
                    </div>
                </div>
                <form class="d-flex mt-3" action="searchTickets" method="get">
                    <div class="col-sm me-2">
                        <label for="starting_destination">Kalkış Yeri</label>
                        <select class="form-select" name="starting_destination" aria-label="Default select example">
                            <option value="antalya" selected>Antalya</option>
                            <option value="ankara">Ankara</option>
                            <option value="istanbul">İstanbul</option>
                            <option value="izmir">İzmir</option>
                        </select>
                    </div>
                    <div class="col-sm me-2">
                        <label for="ending_destination">Varış Yeri</label>
                        <select class="form-select" name="ending_destination" aria-label="Default select example">
                            <option value="antalya">Antalya</option>
                            <option selected value="ankara">Ankara</option>
                            <option value="istanbul">İstanbul</option>
                            <option value="izmir">İzmir</option>
                        </select>
                    </div>
                    <div class="col-sm me-2 d-flex flex-column">
                        <label for="going_date">Gidiş Tarihi</label>
                        <input class="h-100" type="date" name="going_date" id="">
                    </div>
                    <div class="col-sm me-2 d-flex flex-column">
                        <label for="returning_date">Dönüş Tarihi</label>
                        <input disabled class="h-100" type="date"  value="" name="returning_date" id="returning_date">
                    </div>

                    <button class="btn btn-primary h-100 mt-4">Search</button>
                </form>
            </div>
            <div class="col-12 col-lg-6 offset-lg-1 pb-5">
                <img class="mx-auto img-fluid rounded" src="https://picsum.photos/600/400" alt="">
            </div>
        </div>
    </div>
</section>
    <script>
        document.getElementById('oneWay').addEventListener('click', function() {

            var returningDate = document.getElementById('returning_date');
            var oneWayBtn = document.getElementById('oneWay');
            var roundTripBtn = document.getElementById('roundTrip');

            returningDate.disabled = true;

            // Butonun sınıfını güncelle (btn-outline-primary --> btn-primary)
            oneWayBtn.classList.remove('btn-outline-primary');
            oneWayBtn.classList.add('btn-primary');
            roundTripBtn.classList.remove('btn-primary');
            roundTripBtn.classList.add('btn-outline-primary');
        });
        document.getElementById('roundTrip').addEventListener('click', function() {
            var returningDate = document.getElementById('returning_date');
            var oneWayBtn = document.getElementById('oneWay');
            var roundTripBtn = document.getElementById('roundTrip');

            returningDate.disabled = false;

            oneWayBtn.classList.remove('btn-primary');
            oneWayBtn.classList.add('btn-outline-primary');
            roundTripBtn.classList.remove('btn-outline-primary');
            roundTripBtn.classList.add('btn-primary');
        });
    </script>
<?= $this->endSection()?>