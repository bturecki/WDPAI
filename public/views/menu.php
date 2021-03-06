<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/cars.css">

    <script src="https://kit.fontawesome.com/723297a893.js" crossorigin="anonymous"></script>
    <title>CARS</title>
</head>

<body>
    <div class="base-container">
        <nav>
            <img src="public/img/logo.svg">
            <ul>
                <li>
                    <i class="fas fa-car-diagram"></i>
                    <a href="cars" class="button">cars</a>
                </li>
                <li>
                    <i class="fas fa-car-diagram"></i>
                    <a href="addCar" class="button">add car</a>
                </li>
                <li>
                    <i class="fas fa-car-diagram"></i>
                    <a href="map" class="button">supported locations</a>
                </li>
                <?php if(isset($_COOKIE['is_admin']) && $_COOKIE['is_admin'] == 1) : ?>
                <li>
                    <i class="fas fa-car-diagram"></i>
                    <a href="users" class="button">users</a>
                </li>
                <?php endif; ?>
                <li>
                    <i class="fas fa-car-diagram"></i>
                    <a href=".." class="button">log out</a>
                </li>
            </ul>
        </nav>
    </div>
</body>