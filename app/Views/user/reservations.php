<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="mt-3">
    <h3>Reservations</h3>
    <?php foreach (esc($reservations) as $reservation): ?>
    <?php include(APPPATH . 'Views/partials/reservation.php'); ?>
    <?php endforeach; ?>
</div>
<?= $this->endSection() ?>