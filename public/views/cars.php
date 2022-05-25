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
                    <a href="#" class="button">cars</a>
                </li>
                <li>
                    <i class="fas fa-car-diagram"></i>
                    <a href="#" class="button">cars</a>
                </li>
                <li>
                    <i class="fas fa-car-diagram"></i>
                    <a href="#" class="button">cars</a>
                </li>
                <li>
                    <i class="fas fa-car-diagram"></i>
                    <a href="#" class="button">cars</a>
                </li>
            </ul>
        </nav>
        <main>
            <header>
                <div class="search-bar">
                    <form>
                        <input placeholder="search car">
                    </form>
                </div>
                <div class="add-car">
                    <i class="fas fa-plus"></i> add car
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