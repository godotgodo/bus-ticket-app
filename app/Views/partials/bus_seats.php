<div style="margin: auto; width: 40%;">
    <ul style="display: flex; gap: .5rem; flex-wrap: wrap; list-style: none; justify-content: space-between;">
        <!-- <li class="seat">
            <input type="checkbox" value="None" id="seat1" name="check" />
            <label for="1">1</label>
        </li> -->
        <!-- TEMPORARLY -->
        <span>Input seats</span>
        <?php foreach ($seats as $seatNumber => $status): ?>
        <?= "Seat $seatNumber: $status <br>"; ?>
        <?php endforeach; ?>
        <input type="text" id="<?= $type.'-list' ?>" name="<?= $type.'-list' ?>" style="width: 5rem;" />
    </ul>
</div>
<style>
h1 {
    color: #eee;
    font: 30px Arial, sans-serif;
    text-shadow: 0px 1px black;
    text-align: center;
}

input[type=checkbox] {
    visibility: hidden;
}

.containerbus {
    display: flex;
    justify-content: center;
}

.autobus {
    background: lightgray;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    width: 120px;
    height: 200px;
}

.seat {
    width: 21px;
    height: 21px;
    color: white;
    font-size: 10;
    text-align: center;
    background: #fcfff4;
    background: linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
    margin: 5px auto;
    box-shadow: inset 0px 1px 1px white, 0px 1px 3px rgba(0, 0, 0, 0.5);
    position: relative;
}

.seat label {
    cursor: pointer;
    position: absolute;
    width: 15px;
    height: 15px;
    left: 3px;
    top: 3px;
    box-shadow: inset 0px 1px 1px rgba(0, 0, 0, 0.5), 0px 1px 0px rgba(255, 255, 255, 1);
    background: linear-gradient(top, #222 0%, #45484d 100%);
}

.seat label:after {
    filter: alpha(opacity=0);
    opacity: 0;
    content: '';
    position: absolute;
    width: 15px;
    height: 15px;
    background: green;
    background: linear-gradient(top, #0895d3 0%, #0966a8 100%);
    top: 0px;
    left: 0px;
    box-shadow: inset 0px 1px 1px white, 0px 1px 3px rgba(0, 0, 0, 0.5);
}

.seat label:hover::after {
    filter: alpha(opacity=30);
    opacity: 0.3;
}

.seat input[type=checkbox]:checked+label:after {
    filter: alpha(opacity=100);
    opacity: 1;
}
</style>