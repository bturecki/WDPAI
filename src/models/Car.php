<?php

class Car {
    private $title;
    private $description;
    private $image;
    private $city;
    private $id;

    public function __construct($title, $description, $image, $city, $id = null)
    {
        $this->title = $title;
        $this->description = $description;
        $this->image = $image;
        $this->city = $city;
        $this->id = $id;
    }

    public function getTitle():string
    {
        return $this->title;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    public function getDescription():string
    {
        return $this->description;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    public function getImage():string
    {
        return $this->image;
    }

    public function setImage(string $image)
    {
        $this->image = $image;
    }

    public function getCity():string
    {
        return $this->city;
    }

    public function setCity(string $city)
    {
        $this->city = $city;
    }

    public function getId():string
    {
        return $this->id;
    }

    public function setId(string $id)
    {
        $this->id = $id;
    }
}