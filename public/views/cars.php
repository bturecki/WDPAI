<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/cars.css">

    <script src="https://kit.fontawesome.com/723297a893.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/search.js" defer></script>
    <script type="text/javascript" src="./public/js/comments.js" defer></script>
    <title>CARS</title>
</head>

<body>
    <div class="base-container">
        <?php include('menu.php') ?>
        <main>
            <header>
                <div class="search-bar">
                    <input placeholder="search car">
                </div>
            </header>
            <section class="cars">
                <?php foreach($cars as $car): ?>
                    <div id="<?= $car->getId(); ?>">
                        <img src="public/uploads/<?= $car->getImage(); ?>">
                        <div>
                            <h2><?= $car->getCity() . ", " . $car->getTitle() . " " . $car->getDescription() ?></h2>
                            <i class="fas fa-comment">comment</i>
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