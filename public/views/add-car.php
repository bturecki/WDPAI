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
                    
                <fieldset>
                    <legend>Select a city:</legend>

                    <div>
                    <input type="radio" id="cracow" name="city" value="1"
                            checked>
                    <label for="Cracow">Cracow</label>
                    </div>

                    <div>
                    <input type="radio" id="warsaw" name="city" value="2">
                    <label for="warsaw">Warsaw</label>
                    </div>
                </fieldset>

                    <input type="file" name="file"/><br/>
                    <button type="submit">send</button>
                </form>
            </section>
        </main>
    </div>
</body>