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

    //default constructor
    public function __construct() {
        //create an instance of the PhotoModel class
        $this->photo_model = new PhotoModel();
    }

    //index action that displays all photos
    public function index() {
        //retrieve all photos and store them in an array
        $photos = $this->photo_model->getPhotos();

        if (!$photos) {
            //display an error
            $message = "There was a problem displaying the photos.";
            $this->error($message);
            return;
        }

        // display all photography products
        $view = new PhotoView();
        $view->display($photos);
    }

    //show details of a photograph product
    public function detail($id) {
        //retrieve the specific photograph

        $photos = $this->photo_model->view_photo($id);

        if (!$photos) {
            //display an error
            $message = "There was a problem displaying the photo id='" . $id . "'.";
            $this->error($message);
            return;
        }

        //display photo details
        $view = new PhotoDetail();
        $view->display($photos);
    }



    //search photos
    public function search() {
        //retrieve query terms from search form
        $query_terms = trim($_GET['query-terms']);

        //if search term is empty, list all photos
        if ($query_terms == "") {
            $this->index();
        }

        //search the database for matching photos
        $photos = $this->photo_model->search_photo($query_terms);

        if ($photos === false) {
            //handle error
            $message = "An error has occurred.";
            $this->error($message);
            return;
        }
        //display matched photos
        $search = new PhotoSearch();
        $search->display($query_terms, $photos);
    }


    //search the database for photos that match words in titles. Return an array of photos if successful; false otherwise.
    public function search_photo($terms) {
        $terms = explode(" ", $terms); //explode multiple terms into an array


        foreach ($terms as $term) {
            $sql .= " AND product_name LIKE '%" . $term . "%'";
        }

        $sql .= ")";

        //execute the query
        $query = $this->dbConnection->query($sql);

        // the search failed, return false.
        if (!$query)
            throw new DataMissingException(
                "Database exclusion failed. ");

        //search succeeded, but no photo was found.
        if ($query->num_rows == 0)
            return 0;

        //search succeeded, and found at least 1 photo found.
        //create an array to store all the returned photos
        $photos = array();

        //loop through all rows in the returned recordsets
        while ($obj = $query->fetch_object()) {
            $photo = new Photo($obj->product_name, $obj->description, $obj->author, $obj->img);

            //set the id for the photo
            $photo->setId($obj->id);

            //add the photo into the array
            $photos[] = $photo;
        }
        return $photos;
    }


    //handle an error
    public function error($message) {
        //create an object of the Error class
        $error = new PhotoError();

        //display the error page
        $error->display($message);
    }

    //handle calling inaccessible methods
    public function __call($name, $arguments) {

        $message = "Calling method '$name' caused errors. Route does not exist.";

        $this->error($message);
        return;
    }

}
