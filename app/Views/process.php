<?= $this->extend('layouts/process') ?>
<?= $this->section('process') ?>
<section class="mt-3 container">
    <div class="d-flex flex-column flex-md-row align-items-center justify-content-center">
        <div
            class="d-flex align-items-center <?= in_array(esc($event), ['select_going_seats', 'select_returning_seats', 'payment']) ? 'fw-bold': '' ?>">
            <div class="d-inline-flex me-4 justify-content-center align-items-center rounded-pill fs-9"
                style="width: 30px; height: 30px;">1</div>
            <span class="">Select Going Seats</span>
        </div>
        <span class="my-4 my-md-0 mx-md-8 mx-lg-16">
            <svg width="18" height="14" viewbox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.5"
                    d="M10.6667 1.16669L16.5 7.00002M16.5 7.00002L10.6667 12.8334M16.5 7.00002L1.5 7.00002"
                    stroke="#84878A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </span>
        <div
            class="d-flex align-items-center <?= in_array(esc($event), ['select_returning_seats', 'payment']) ? 'fw-bold': '' ?>">
            <div class="d-inline-flex me-4 justify-content-center align-items-center rounded-pill fs-9"
                style="width: 30px; height: 30px;">2</div>
            <span class="">Select Returning Seats</span>
        </div>
        <span class="my-4 my-md-0 mx-md-8 mx-lg-16">
            <svg width="18" height="14" viewbox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.5"
                    d="M10.6667 1.16669L16.5 7.00002M16.5 7.00002L10.6667 12.8334M16.5 7.00002L1.5 7.00002"
                    stroke="#84878A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </span>
        <div class="d-flex align-items-center <?= esc($event)==='payment' ? 'fw-bold': '' ?>">
            <div class="d-inline-flex me-4 justify-content-center align-items-center rounded-pill fs-9"
                style="width: 30px; height: 30px;">3</div>
            <span class="">Payment</span>
        </div>
    </div>
    <?php
        $data = [
            'seats' => [
                '1' => 'reserved',
                '2' => 'bought',
                '3' => 'free',
                '4' => 'reserved',
                '5' => 'bought',
                '6' => 'free',
            ],
            'type' => 'Going'
        ];

        $view_content = "";

        if ($event === 'select_going_seats') {
            $view_content = view('partials/bus_seats.php', $data);
        } elseif ($event === 'select_returning_seats') {
            $data['type']='Returning';
            $view_content=view('partials/bus_seats.php',$data);
        }
        elseif ($event === 'payment') {
            $view_content = view('payment');
        }
        ?>
    <?= $view_content ?>

</section>
<?= $this->endSection()?>