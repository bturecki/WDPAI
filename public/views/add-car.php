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
                    <form>
                        <input placeholder="search car">
                    </form>
                </div>
                <div class="add-car">
                    <i class="fas fa-plus"></i> add car
                </div>
            </header>
            <section class="car-form">
                <h1>UPLOAD</h1>
                <form action="addCar" method="POST" ENCTYPE="multipart/form-data">
                    <div class="messages">
                        <?php
                            if(isset($messages)){
                                foreach($messages as $message) {
                                    echo $message;
                                }
                            }
                        ?>
                    </div>
                    <input name="title" type="text" placeholder="title">
                    <textarea name="description" rows=5 placeholder="description"></textarea>

                    <input type="file" name="file"/><br/>
                    <button type="submit">send</button>
                </form>
            </section>
        </main>
    </div>
</body>