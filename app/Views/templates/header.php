<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="bg-body-tertiary">
        <nav class="navbar navbar-expand-lg container">
            <a class="navbar-brand" href="/"><?= getenv('BRAND_NAME') ?> </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/routes">Routes</a>
                    </li>
                </ul>
            </div>
            <div>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php if(session()->has('logged_in')): ?>
                        <li class="nav-item">
                            <a class="nav-link active" href="#"><i class="bi bi-wallet2"></i> <?php echo session()->get('balance') ?> ₺</a>

                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                               aria-expanded="false">
                                Profile
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/user/tickets">Tickets</a></li>
                                <li><a class="dropdown-item" href="/user/reservations">Reservations</a></li>
                                <li><a class="dropdown-item" href="/user/settings">Settings</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><form method="post" action="/logout"><button class="dropdown-item" type="submit">Log out</button></form></li>
                            </ul>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link active" href="/login">Log in</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/register">Sign Up</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    </div>