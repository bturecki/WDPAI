<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/Car.php';
require_once __DIR__.'/../repository/CarRepository.php';

class CarController extends AppController {


    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $messages = [];
    private $carRepository;

    public function __construct()
    {
        parent::__construct();
        $this->carRepository = new CarRepository();
    }


    public function cars()
    {
        $cars = $this->carRepository->getCars();
        $this->render('cars', ['cars' => $cars]);
    }

    public function addCar()
    {   
        if ($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])) {
            move_uploaded_file(
                $_FILES['file']['tmp_name'], 
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );

            $car = new Car($_POST['title'], $_POST['description'], $_FILES['file']['name'], $_POST['city']);
            $this->carRepository->addCar($car);
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/cars");
        }
        $this->render('add-car', ['messages' => $this->message]);
    }

    public function commentCar()
    {   
        if ($this->isPost()) 
        {
            $this->carRepository->addCarComment($_POST['carId'], $_POST['comment']);
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/cars");
        }
        $carComments = $this->carRepository->getCarComments($_GET['id']);
        $this->render('comment-car', ['carComments' => $carComments]);
    }

    public function search()
    {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);

            echo json_encode($this->carRepository->getCarByMake($decoded['search']));
        }
    }

    private function validate(array $file): bool
    {
        if ($file['size'] > self::MAX_FILE_SIZE) {
            $this->message[] = 'File is too large for destination file system.';
            return false;
        }

        if (!isset($file['type']) || !in_array($file['type'], self::SUPPORTED_TYPES)) {
            $this->message[] = 'File type is not supported.';
            return false;
        }
        return true;
    }
}