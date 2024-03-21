<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ödeme Başarılı</title>
    <script src="https://cdn.jsdelivr.net/npm/qrious@4.0.2/dist/qrious.min.js"></script>
</head>

<body>
    <h1>Ödeme Başarılı</h1>
    <p>Ödemeniz başarıyla gerçekleştirildi.</p>
    <p>PNR Numaranız: <?php echo $pnrCode; ?></p>
    <canvas id="qrcodeCanvas"></canvas>

    <script>
        var pnrCode = '<?php echo $pnrCode; ?>';
        var qr = new QRious({
            element: document.getElementById('qrcodeCanvas'),
            value: pnrCode,
            size: 200
        });
    </script>
</body>

</html>