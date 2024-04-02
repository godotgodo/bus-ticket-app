<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container mt-5">
    <h2>Search Results</h2>

    <p><strong>Starting Destination:</strong> <?= ucfirst($starting_destination) ?></p>
    <p><strong>Ending Destination:</strong> <?= ucfirst($ending_destination) ?></p>
    <p><strong>Going Date:</strong> <?= $going_date ?></p>
    <?php if ($returning_date) : ?>
        <p><strong>Returning Date:</strong> <?= $returning_date ?></p>
    <?php endif; ?>

    <hr>

    <?php if (!empty($onGoingTickets)) : ?>
        <h3>On Going Tickets</h3>
        <table id="table1" class="table">
            <thead>
                <tr>
                    <th>Arrival Date</th>
                    <th>Time</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($onGoingTickets as $ticket) : ?>
                    <tr>
                        <td><?= $ticket['arrival_date'] ?></td>
                        <td><?= $ticket['time'] ?></td>
                        <td>
                            <form action="seatselect" method="post">
                                <input type="text" hidden name="returning_date" value="<?= $returning_date ?>">
                                <input type="text" hidden name="on_going_route" value="<?= $ticket['route_id'] ?>">
                                <button class="btn btn-primary" type="submit">Select</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php elseif(session()->has('on_going_route')) : ?>
        <p></p>
    <?php else: ?>
        <p>No tickets found.</p>
    <?php endif; ?>

    <?php if (!empty($returningTickets)) : ?>
        <h3>Returning Tickets</h3>
        <table id="table1" class="table">
            <thead>
            <tr>
                <th>Arrival Date</th>
                <th>Time</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($returningTickets as $ticket) : ?>
                <tr>
                    <td><?= $ticket['arrival_date'] ?></td>
                    <td><?= $ticket['time'] ?></td>
                    <td>
                        <form action="seatselect" method="post">
                            <input type="text" hidden name="returning_route" value="<?= $ticket['route_id'] ?>">
                            <button class="btn btn-primary" type="submit">Select</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php elseif(!session()->has('on_going_route')) : ?>
        <p></p>
    <?php else : ?>
        <p>No tickets found.</p>
    <?php endif; ?>
</div>
<?= $this->endSection() ?>