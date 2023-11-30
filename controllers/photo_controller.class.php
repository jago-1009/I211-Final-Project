<?php

/*
 * Author: Deep Patel
 * Date: 11/14/23
 * File: photo_controller.class.php
 * Description: the photo controller
 *
 */

class PhotoController {

    private $photo_model;

    //constructor
    public function __construct() {
        // PhotoModel class
        $this->photo_model = new PhotoModel();
    }

    //  displays all photos
    public function index() {
        // photos and store them in an array
        $photos = $this->photo_model->getPhotos();

        if (!$photos) {
            //  error
            $message = "There was a problem displaying the photos.";
            $this->error($message);
            return;
        }

        //  photography products
        $view = new PhotoView();
        $view->display($photos);
    }

    //  photograph product
    public function detail($id) {
        //  photograph
        $photos = $this->photo_model->view_photo($id);

        if (!$photos) {
            // error
            $message = "There was a problem displaying the photo id='" . $id . "'.";
            $this->error($message);
            return;
        }

        //  photo details
        $view = new PhotoDetails();
        $view->display($photos);
    }

    // Search photos
    public function search() {
        // query terms  search form
        $query_terms = trim($_GET['query-terms']);

        // If search empty list all photos
        if ($query_terms == "") {
            $this->index();
        }

        // Search the database
        $photos = $this->search_photo($query_terms);

        if ($photos === false) {
            //  error
            $message = "An error has occurred.";
            $this->error($message);
            return;
        }

        //  matched photos
        $search = new PhotoSearch();
        $search->display($query_terms, $photos);
    }

    // Search the database for photos that match words in titles
    public function search_photo($terms) {
      $photos = $this->photo_model->search_photo($terms);
        if (!$photos) {
            // error
            $message = "There was a problem displaying the terms='" . $terms . "'.";
            $this->error($message);
            return;
        }

        //  photo details
        $view = new PhotoSearch();
        $view->display($photos);

    }

    //  error
    public function error($message) {
        //  Error class
        $error = new PhotoError();

        // error page
        $error->display($message);
    }

    // Handle
    public function __call($name, $arguments) {
        $message = "Calling method '$name' caused errors. Route does not exist.";
        $this->error($message);
        return;
    }
}

