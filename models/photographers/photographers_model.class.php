<?php

/**
 * Author: Jacob Garwood
 * Date: 11/21/2023
 * File: photographers_model.class.php
 * Description:
 */
class PhotographersModel
{
    private $db; //database object
    private $dbConnection; //database connection object

    public function __construct()
    {
        $this->db = Database::getInstance();
        $this->dbConnection = $this->db->getConnection();
        $this->tblPhotographers = $this->db->getPhotographerTable();
    }

    //this method retrieves all photos from the database and
    // returns an array of photos objects if successful or false if failed.

    public function getPhotographers()
    {
        //SQL select statement
        $sql = "SELECT * FROM " . $this->tblPhotographers;

        //execute the query
        $query = $this->dbConnection->query($sql);

        if ($query && $query->num_rows > 0) {
            //array to store all photographers
            $photographers = array();
            //loop through all rows
            while ($query_row = $query->fetch_assoc()) {
                //push the photographers into the array
                // $photoId,$size,$camera, $title, $description, $creationDate, $imgPath;
                $photographers[] = new Photographers($query_row["photographerID"],
                    $query_row["firstName"],
                    $query_row["lastName"],
                    $query_row["birthDate"],
                    $query_row["email"]
                );

            }
            return $photographers;
        }
        return false;
    }

//search the database for photos that match words in titles. Return an array of photos if successful; false otherwise.
    public function search_photographer($terms)
    {
        $terms = explode(" ", $terms); //explode multiple terms into an array
        //select statement for AND search
        $sql = "SELECT * FROM " . $this->tblPhotographers .
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
            $photo = new Photo($obj->photoID, $obj->size, $obj->camera, $obj->title, $obj->description, $obj->creationDate, $obj->imgPath);
            //add the photo into the array
            $photos[] += $photo;
        }

        return $photos;
    }
    public function view_photographer($id)
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
            $photographer = new Photographers(null, $obj->product_name, $obj->description, $obj->author, $obj->img);

            //set the id for the product
            $photographer->setId($obj->photographer_id);

            //create a photo object




            return $photo;
        }


    }
}