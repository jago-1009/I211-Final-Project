<?php
/**
 * Name : Deep Patel
 * Date : 11/29/23
 * File : photographer_controller.php
 * Description:
 */

class PhotographerController {

    private $photographer_model;

    public function __construct() {
        //  PhotographerModel
        $this->photographer_model = new PhotographersModel();
    }

    //   all photographers
    public function index() {
        //  in an array
        $photographers = $this->photographer_model->getPhotographers();

        if (!$photographers) {
            //  error
            $message = "There was a problem displaying the photographers.";
            $this->error($message);
            return;
        }

        // all photographers
        $view = new PhotographerIndex();
        $view->display($photographers);
    }

    //  photographer
    public function detail($id) {
        //photographer
        $photographer = $this->photographer_model->viewPhotographer($id);

        if (!$photographer) {
            // Display an error
            $message = "There was a problem displaying the photographer with id='" . $id . "'.";
            $this->error($message);
            return;
        }

        //photographer details
        $view = new PhotographerDetail();
        $view->display($photographer);
    }

    // Search photographers
    public function search() {
        //  search form
        $query_terms = trim($_GET['query-terms']);

        //  search term is empty
        if ($query_terms == "") {
            $this->index();
        }


        $photographers = $this->photographer_model->searchPhotographer($query_terms);

        if ($photographers === false) {
            // Handle error
            $message = "An error has occurred.";
            $this->error($message);
            return;
        }

        //  matched photographers
        $search = new PhotographerSearch();
        $search->display($query_terms, $photographers);
    }

    // Handle  error
    public function error($message) {
        //  Error class
        $error = new PhotographerError();

        // error page
        $error->display($message);
    }

    // Handler
    public function __call($name, $arguments) {
        $message = "Calling method '$name' caused errors. Route does not exist.";
        $this->error($message);
        return;
    }
}
