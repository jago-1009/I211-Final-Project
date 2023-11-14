<?php

/**
 * Author: Jacob Garwood
 * Date: 11/7/2023
 * File: photos_model.class.php
 * Description:
 */
class photos_model
{
    //Private Variables
    private $db;
    private $dbConnection;


    //Constructor
    public function __construct() {
        $this->db = Database::getInstance();
        $this->dbConnection = $this->db->getConnection();
    }
}

//class PhotoModel
//{
//    private $db; //database object
//    private $dbConnection; //database connection object
//    private $tblProducts;
//    private $tblOrder_details;
//
//    public function __construct() {
//        $this->db = Database::getDatabase();
//        $this->dbConnection = $this->db->getConnection();
//        $this->tblProducts = $this->db->getProducts();
//        $this->tblOrder_details = $this->db->getOrderDetails();
//    }
//
//    /*
//    * this method retrieves all photos from the database and
//    * returns an array of photos objects if successful or false if failed.
//    */
//    public function getPhotos() {
//        //SQL select statement
//        $sql = "SELECT * FROM " . $this->db->getProducts();
//
//        //execute the query
//        $query = $this->dbConnection->query($sql);
//
//        if ($query && $query->num_rows > 0) {
//            //array to store all photos
//            $photos = array();
//
//            //loop through all rows
//            while ($query_row = $query->fetch_assoc()) {
//                $photosNew = new Photo($query_row["product_id"],
//                    $query_row["product_name"],
//                    $query_row["description"],
//                    $query_row["author"],
//                    $query_row["price"],
//                    $query_row["img"]);
//
//
//
//                //push the photos into the array
//                $photos[] = $photosNew;
//            }
//            return $photos;
//        }
//        return false;
//    }
//    //search the database for photos that match words in titles. Return an array of photos if successful; false otherwise.
//    public function search_photo($terms) {
//        $terms = explode(" ", $terms); //explode multiple terms into an array
//        //select statement for AND search
//        $sql = "SELECT * FROM " . $this->tblProducts .
//            " WHERE 1";
//
//        foreach ($terms as $term) {
//            $sql .= " AND product_name LIKE '%" . $term . "%'";
//        }
//
//
//
//        //execute the query
//        $query = $this->dbConnection->query($sql);
//
//        // the search failed, return false.
//        if (!$query)
//            throw new DataMissingException(
//                "Database exclusion failed. ");
//
//        //search succeeded, but no photo was found.
//        if ($query->num_rows == 0)
//            return 0;
//
//        //search succeeded, and found at least 1 photo found.
//        //create an array to store all the returned photos
//        $photos = array();
//
//        //loop through all rows in the returned recordsets
//        while ($obj = $query->fetch_object()) {
//            $photo = new Photo($obj->product_id, $obj->product_name, $obj->description, $obj->author, $obj->price, $obj->img);
//
//            //set the id for the photo
//            // $photo->setId($obj->product_id);
//
//            //add the photo into the array
//            $photos[] = $photo;
//        }
//
//        return $photos;
//
//    }
//
//    public function view_photo($id)
//    {
//        //the select sql statement
//
//        $sql = "SELECT * FROM " . $this->tblProducts ."," .$this->tblOrder_details.
//            " WHERE " . $this->tblProducts . ".product_id=" . $this->tblOrder_details . ".product_id" .
//            " AND " . $this->tblProducts . " .product_id='$id'";
//
//        $query = $this->dbConnection->query($sql);
//
//        if (!$query) {
//            echo "failed";
//        }
//
//        if ($query && $query->num_rows > 0) {
//            $obj = $query->fetch_object();
//
//            //create a photo object
//            $photo = new Photo(null,$obj->product_name, $obj->description, $obj->author, $obj->price, $obj->img);
//
//            //set the id for the product
//            $photo->setId($obj->product_id);
//
//            //create a photo object
//            //$photo = new Photo(stripslashes($obj->product_name), stripslashes($obj->description), stripslashes($obj->author), stripslashes($obj->price), stripslashes($obj->image) );
//
//
//
//
//
//            return $photo;
//        }
//
//
//    }
//
//
//}