<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function index()
    {
        session_start();
        session_destroy();
        $this->render('login');
    }

}