<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">

    <script src="https://kit.fontawesome.com/723297a893.js" crossorigin="anonymous"></script>
    <title>USERS</title>
</head>

<body>
    <div class="base-container">
    <?php include('menu.php') ?>
        <main>
        <section class="users">
            <table>
                    <td>USER ID</td>
                    <td>USER NAME</td>
                    <td>USER SURNAME</td>
                    <td>USER EMAIL</td>
                    <td>USER PHONE</td>
                <?php foreach($users as $user): ?>
                  <tr>
                    <td><?= $user->getId(); ?></td>
                    <td><?= $user->getName(); ?></td>
                    <td><?= $user->getSurName(); ?></td>
                    <td><?= $user->getEmail(); ?></td>
                    <td><?= $user->getPhone(); ?></td>
                </tr>
                <?php endforeach; ?>
                </table>
            </section>
        </main>
    </div>
</body>