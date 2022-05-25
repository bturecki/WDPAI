<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Car.php';

class CarRepository extends Repository
{

    public function getCar(int $id): ?Car
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.t_car WHERE id = :id
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
            $car['image']
        );
    }

    public function addCar($car): void
    {
        $date = new DateTime();
        $stmt = $this->database->connect()->prepare('
            INSERT INTO t_car (make, model, image)
            VALUES (?, ?, ?)
        ');

        //TODO you should get this value from logged user session
        $assignedById = 1;

        $stmt->execute([
            $car->getTitle(),
            $car->getDescription(),
            $car->getImage()
        ]);
    }

    public function getCars(): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM t_car;
        ');
        $stmt->execute();
        $cars = $stmt->fetchAll(PDO::FETCH_ASSOC);

         foreach ($cars as $car) {
             $result[] = new Car(
                 $car['make'],
                 $car['model'],
                 $car['image']
             );
         }

        return $result;
    }
}