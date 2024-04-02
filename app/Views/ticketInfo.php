<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<?php

if (session()->has('seats') && session()->has('trip_type'))
{
    $seats = session()->getFlashdata('seats');
    $trip_type = session()->getFlashdata('trip_type');
}

?>

<div class="container w-50 mt-5">
    <div class="row mw-3">
        <?php if (session()->getFlashdata('errors')) : ?>
            <div class="alert alert-danger" role="alert">
                <ul>
                    <li><?= session()->getFlashdata('errors') ?></li>
                </ul>
            </div>
        <?php endif ?>
        <form action="checkTicketInfo" method="post">
        <?php
            for ($i = 0; $i<count($seats); $i++)
            {
                $num = $i+1;
                $fullname = "name".$num;
                $gender = "gender".$num;
                echo "<div>
                        <div class='card mb-3'>
                            <div class='card-body'>
                                <h5 class='card-title'>Person $num</h5>
                                <h3 class='card-text'>Seat $seats[$i]</h3>
                                <div class='form-group'>
                                    <label for='$fullname'>Fullname</label>
                                    <input type='text' class='form-control' id='$fullname' name='$fullname'>
                                </div>
                                <div class='form-group'>
                                    <label for='gender1'>Cinsiyet</label>
                                    <select class='form-control' id='gender' name='$gender'>
                                        <option value='0'>Male</option>
                                        <option value='1'>Female</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                     </div>";
            }
        ?>
            <input type="text" name="trip_type" hidden value="<?= $trip_type ?>">
            <button class="btn btn-primary" type="submit">Continue</button>
        </form>
    </div>
</div>


<?= $this->endSection() ?>
