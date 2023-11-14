<?php
/**
 * Author: Nate Osborne
 * Date: 11/13/2023
 * File Name: photo_controller.class.php
 * Description:
 */

class PhotoController {
    private $photo_model;

    public function __construct(){
        $this->photo_model = new PhotoModel();
    }

    public function index(){
        $view = new Index();
        $view->display();
    }
}