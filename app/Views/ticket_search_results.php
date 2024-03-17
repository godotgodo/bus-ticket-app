<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container mt-5">
    <h2>Search Results</h2>

    <p><strong>Starting Destination:</strong> <?= $starting_destination ?></p>
    <p><strong>Ending Destination:</strong> <?= $ending_destination ?></p>
    <p><strong>Going Date:</strong> <?= $going_date ?></p>
    <?php if ($returning_date) : ?>
        <p><strong>Returning Date:</strong> <?= $returning_date ?></p>
    <?php endif; ?>

    <hr>

    <?php if (!empty($tickets)) : ?>
        <h3>Available Tickets</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Route ID</th>
                    <th>Arrival Date</th>
                    <th>Bus ID</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tickets as $ticket) : ?>
                    <tr>
                        <td><?= $ticket['route_id'] ?></td>
                        <td><?= $ticket['arrival_date'] ?></td>
                        <td><?= $ticket['bus_id'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p>No tickets found.</p>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>