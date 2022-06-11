<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/cars.css">

    <script src="https://kit.fontawesome.com/723297a893.js" crossorigin="anonymous"></script>
    <title>CARS</title>
</head>

<body>
    <div class="base-container">
    <?php include('menu.php') ?>
        <main>
            <section class="car-form">
            <?php foreach($carComments as $comment): ?>
                    <div>
                        <div>
                            <p><?= $comment->getUserEmail().": ".$comment->getComment(); ?></p>
                            <div class="social-section">
                        </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <h1>COMMENT CAR</h1>
                <form action="commentCar" method="POST" ENCTYPE="multipart/form-data">
                <div class="messages">
                        <?php
                            if(isset($messages)){
                                foreach($messages as $message) {
                                    echo $message;
                                }
                            }
                        ?>
                    </div>
                    <input name="carId" type="hidden" value="<?php echo $_GET['id']?>"></textarea>
                    <textarea name="comment" rows=5 placeholder="comment"></textarea>
                    <button type="submit">send</button>
                </form>
            </section>
        </main>
    </div>
</body>