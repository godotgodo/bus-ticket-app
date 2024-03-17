<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Ticket Reservation</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .seat {
            width: 40px;
            height: 40px;
            background-color: #ccc;
            margin: 5px;
            border-radius: 5px;
            text-align: center;
            line-height: 40px;
            cursor: pointer;
        }
        .seat.selected {
            background-color: #007bff;
            color: #fff;
        }
        .seat.selected-after {
            background-color: #007bff;
            color: #fff;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Otobüs Koltuk Seçimi</h2>
    <form action="seats" method="post">
        <?php
            if (session()->has('return'))
            {
                echo "<h5 class='mt-2'>Dönüş İçin Koltuk Seçiniz.</h5>";
            }
        ?>
    <div class="row">
        <?php

        $seatCount = 40;
        $user = ['gender' => 0];

        $selectedSeats = [3, 7, 10, 25];

        for ($i = 1; $i <= $seatCount; $i++) {

            $selectedClass = in_array($i, $selectedSeats) ? 'selected' : '';
            if ($i % 4 == 0) {

                $selected = $user['gender'] == 0 ? 'selected' : '';
                echo "<div><div class='seat $selectedClass' data-seat='$i'>$i</div></div>";

                echo "<div class='w-100'></div>";
            }
            else if($i % 2 == 0)
            {
                echo "<div class='mr-5'><div class='seat $selectedClass' data-seat='$i'>$i</div></div>";
            }
            else{
                echo "<div><div class='seat $selectedClass' data-seat='$i'>$i</div></div>";
            }
        }
        $return_id = 1;
        ?>
    </div>
    <div class="mt-4">
        <input type="hidden" name="seatNumbers" id="hiddenInput" value="">
        <input type="hidden" name="roundTripId" id="roundTrip" value="<?php echo $return_id?>">
        <button id="btnBuy" type="submit" class="btn btn-primary">Satın Al</button>
        <button id="btnReserve" type="submit" class="btn btn-primary">Reverzasyon Yap</button>
    </div>
    </form>
</div>
<div class="container mt-5">

</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {

        $('.seat').click(function () {
            $(this).toggleClass('selected-after');
        });
        $('.seat.selected').click(function () {
            //$(this).toggleClass('selected-after');
        });


        $('#btnReserve').click(function () {
            var selectedSeats = [];

            $('.seat.selected-after').each(function () {
                selectedSeats.push($(this).data('seat'));
            });

            console.log('Seçili Koltuklar:', selectedSeats);


            var seatString = selectedSeats.join("|");
            $('#hiddenInput').val(seatString);

        });
        $('#btnBuy').click(function () {
            var selectedSeats = [];

            $('.seat.selected-after').each(function () {
                selectedSeats.push($(this).data('seat'));
            });

            console.log('Seçili Koltuklar:', selectedSeats);


            var seatString = selectedSeats.join("|");
            $('#hiddenInput').val(seatString);

        });
    });
</script>
</body>
</html>
