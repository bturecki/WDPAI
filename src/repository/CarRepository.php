<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Car.php';
require_once __DIR__.'/../models/CarComment.php';

class CarRepository extends Repository
{

    public function getCar(int $id): ?Car
    {
        $stmt = $this->database->connect()->prepare('
            SELECT t.*, c.city_name FROM public.t_car t inner join t_city c on t.city_id = c.id WHERE id = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $car = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($car == false) {
            return null;
        }

        return new Car(
            $car['title'],
            $car['description'],
            $car['image'],
            $car['city_name']
        );
    }

    public function addCar($car): void
    {
        $date = new DateTime();
        $stmt = $this->database->connect()->prepare('
            INSERT INTO t_car (make, model, image, city_id, car_owner)
            VALUES (?, ?, ?, ?, ?)
        ');

        session_start();
        $addedById = $_SESSION['user_id'];

        $stmt->execute([
            $car->getTitle(),
            $car->getDescription(),
            $car->getImage(),
            $car->getCity(),
            $addedById
        ]);
    }

    public function addCarComment(int $carId, string $comment): void
    {
        $stmt = $this->database->connect()->prepare('
        INSERT INTO t_car_comment (comment, i_user, car_id)
        VALUES (?, ?, ?)
        ');

        session_start();
        $addedById = $_SESSION['user_id'];

        $stmt->execute([
            $comment,
            $addedById,
            $carId
        ]);
    }

    public function getCars(): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT t.*, c.city_name FROM public.t_car t inner join t_city c on t.city_id = c.id;
        ');
        $stmt->execute();
        $cars = $stmt->fetchAll(PDO::FETCH_ASSOC);

         foreach ($cars as $car) {
             $result[] = new Car(
                 $car['make'],
                 $car['model'],
                 $car['image'],
                 $car['city_name'],
                 $car['id']
             );
         }

        return $result;
    }

    public function getCarComments(int $carId): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM v_user_car_comments WHERE car_id = :carId;
        ');
        $stmt->bindParam(':carId', $carId, PDO::PARAM_INT);
        $stmt->execute();

        $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

         foreach ($comments as $comment) {
             $result[] = new CarComment(
                 $comment['comment'],
                 $comment['email']
             );
         }

        return $result;
    }

    public function getCarByMake(string $searchString)
    {
        $searchString = '%' . strtolower($searchString) . '%';

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM t_car WHERE LOWER(make) LIKE :search OR LOWER(model) LIKE :search
        ');
        $stmt->bindParam(':search', $searchString, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}