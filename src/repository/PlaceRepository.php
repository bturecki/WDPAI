<?php

require_once 'Repository.php';

class PlaceRepository extends Repository
{

    public function getPlaces(): array
    {
        $stmt = $this->database->connect()->prepare('
            SELECT t.id, t.city_name title, t.city_name description, t.coordinates FROM t_city t;
        ');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);;
    }
}