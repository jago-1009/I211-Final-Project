<?php
/**
 * Name : Deep Patel
 * Date : 11/29/23
 * File : collections_controller.php
 * Description:
 */
class CollectionsController {

    private CollectionsModel $collections_model;

    public function __construct() {
        // CollectionsModel class
        $this->collections_model = new CollectionsModel();
    }

    // Index action
    public function index() {
        // collections  in an array
        $collections = $this->collections_model->getCollections();

        if (!$collections) {
            // Display error
            $message = "There was a problem displaying the collections.";
            $this->error($message);
            return;
        }

        // Display collections
        $view = new CollectionsView();
        $view->display($collections);
    }

    // details of a collection
    public function detail($id) {
        // Retrieve the specific collection
        $collection = $this->collections_model->viewCollection($id);

        if (!$collection) {
            // Display error
            $message = "There was a problem displaying the collection with id='" . $id . "'.";
            $this->error($message);
            return;
        }

        // Display collection
        $view = new CollectionDetail();
        $view->display($collection);
    }

    // Search collections
    public function search() {
        // query terms from search
        $query_terms = trim($_GET['query-terms']);

        //  list all collections
        if ($query_terms == "") {
            $this->index();
        }

        // Search  collections
        $collections = $this->collections_model->searchCollection($query_terms);

        if ($collections === false) {
            // error
            $message = "An error has occurred.";
            $this->error($message);
            return;
        }

        // Display collections
        $search = new CollectionSearch();
        $search->display($query_terms, $collections);
    }

    //error
    public function error($message) {
        //  Error class
        $error = new CollectionError();

        // error page
        $error->display($message);
    }


    public function __call($name, $arguments) {
        $message = "Calling method '$name' caused errors. Route does not exist.";
        $this->error($message);
        return;
    }
}
