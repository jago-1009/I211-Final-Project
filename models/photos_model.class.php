<?php

/**
 * Author: Jacob Garwood
 * Date: 11/7/2023
 * File: photos_model.class.php
 * Description:
 */

class PhotoModel
{
    private $db; //database object
    private $dbConnection; //database connection object

    public function __construct() {
        $this->db = Database::getInstance();
        $this->dbConnection = $this->db->getConnection();
        $this->tblPhotos = $this->db->getPhotoTable();
        $this->tblPhotographers= $this->db->getPhotographerTable();
    }


    //this method retrieves all photos from the database and
    // returns an array of photos objects if successful or false if failed.

    public function getPhotos() {
        //SQL select statement
        $sql = "SELECT * FROM " . $this->tblPhotos;

        //execute the query
        $query = $this->dbConnection->query($sql);

        if ($query && $query->num_rows > 0) {
            //array to store all photos
            $photos = array();

            //loop through all rows
            while ($query_row = $query->fetch_assoc()) {
                //push the photos into the array
                // $photoId,$size,$camera, $title, $description, $creationDate, $imgPath;
                $photos[] = new Photos($query_row["photoID"],
                    $query_row["size"],
                    $query_row["camera"],
                    $query_row["title"],
                    $query_row["description"],
                    $query_row["creationDate"],
                    $query_row["imgPath"]);
            }
            return $photos;
        }
        return false;
    }
    //search the database for photos that match words in titles. Return an array of photos if successful; false otherwise.
    public function search_photo($terms) {
        $terms = explode(" ", $terms); //explode multiple terms into an array
        //select statement for AND search
        $sql = "SELECT * FROM " . $this->tblPhotos .
            " WHERE 1";

        foreach ($terms as $term) {
            $sql .= " AND title LIKE '%" . $term . "%'";
        }
        foreach ($terms as $term) {
            $sql .= " AND description LIKE '%" . $term . "%'";
        }



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
            // $photoId,$size,$camera, $title, $description, $creationDate, $imgPath;
            $photo = new Photo($obj->photoID,$obj->size,$obj->camera, $obj->title, $obj->description,$obj->creationDate,$obj->imgPath);
            //add the photo into the array
            $photos[] += $photo;
        }

        return $photos;

    }

    public function view_photo($id)
    {
        //the select sql statement

        $sql = "SELECT * FROM " . $this->tblPhotos ."," .$this->tblPhotographers.
            " WHERE " . $this->tblPhotos . ".photographerID =" . $this->tblPhotographers . ".photographerID" .
            " AND " . $this->tblPhotos . " .photoID='$id'";

        $query = $this->dbConnection->query($sql);

        if (!$query) {
            echo "failed";
        }

        if ($query && $query->num_rows > 0) {
            $obj = $query->fetch_object();

            //create a photo object
            $photo = new Photo(null, $obj->product_name, $obj->description, $obj->author, $obj->img);

            //set the id for the product
            $photo->setId($obj->product_id);

            //create a photo object




            return $photo;
        }


    }


}