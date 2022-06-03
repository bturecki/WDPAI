<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/cars.css">

    <script src="https://kit.fontawesome.com/723297a893.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/search.js" defer></script>
    <title>CARS</title>
</head>

<body>
    <div class="base-container">
        <nav>
            <img src="public/img/logo.svg">
            <ul>
                <li>
                    <i class="fas fa-car-diagram"></i>
                    <a href="#" class="button">cars</a>
                </li>
                <li>
                    <i class="fas fa-car-diagram"></i>
                    <a href="#" class="button">add car</a>
                </li>
                <li>
                    <i class="fas fa-car-diagram"></i>
                    <a href="#" class="button">users</a>
                </li>
                <li>
                    <i class="fas fa-car-diagram"></i>
                    <a href=".." class="button">log out</a>
                </li>
            </ul>
        </nav>
        <main>
            <header>
                <div class="search-bar">
                    <input placeholder="search car">
                </div>
            </header>
            <section class="cars">
                <?php foreach($cars as $car): ?>
                    <div id="car-1">
                        <img src="public/uploads/<?= $car->getImage(); ?>">
                        <div>
                            <h2><?= $car->getTitle(); ?></h2>
                            <p><?= $car->getDescription(); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </section>
        </main>
    </div>
</body>

<template id="car-template">
    <div id="">
        <img src="">
        <div>
            <h2>title</h2>
            <p>description</p>
        </div>
    </div>
</template>