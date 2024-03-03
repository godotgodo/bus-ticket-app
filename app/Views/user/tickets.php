<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<ul class="mt-3 nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="current-tab" data-bs-toggle="tab" data-bs-target="#current" type="button"
            role="tab" aria-controls="current" aria-selected="true">Current Tickets</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="old-tab" data-bs-toggle="tab" data-bs-target="#old" type="button" role="tab"
            aria-controls="old" aria-selected="false">Old Tickets</button>
    </li>
</ul>
<div class="mt-2 tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="current" role="tabpanel" aria-labelledby="current-tab">
        <h3>Current Tickets</h3>
        <?php foreach (esc($currentTickets) as $ticket): ?>
        <?php include(APPPATH . 'Views/partials/ticket.php'); ?>
        <?php endforeach; ?>
    </div>
    <div class="tab-pane fade" id="old" role="tabpanel" aria-labelledby="old-tab">
        <h3>Old Tickets</h3>
        <?php foreach (esc($oldTickets) as $ticket): ?>
        <?php include(APPPATH . 'Views/partials/ticket.php'); ?>
        <?php endforeach; ?>
    </div>
</div>
<?= $this->endSection() ?>