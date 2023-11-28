<?php

/**
 * Author: Jacob Garwood
 * Date: 11/25/2023
 * File: collections_model.class.php
 * Description:
 */
class CollectionsModel
{
    private $db; //database object
    private $dbConnection; //database connection object

    public function __construct()
    {
        $this->db = Database::getInstance();
        $this->dbConnection = $this->db->getConnection();
        $this->tblCollections = $this->db->getCollectionsTable();
    }

    public function getCollections()
    {
        //SQL select statement
        $sql = "SELECT * FROM " . $this->tblCollections;

        //execute the query
        $query = $this->dbConnection->query($sql);

        if ($query && $query->num_rows > 0) {
            //array to store all photographers
            $collections = array();
            //loop through all rows
            while ($query_row = $query->fetch_assoc()) {
                //push the photographers into the array
                // $photoId,$size,$camera, $title, $description, $creationDate, $imgPath;
                $collections[] = new Collections($query_row["collectionID"],
                    $query_row["title"],
                    $query_row["description"],
                    $query_row["active"]

                );
            }
            return $collections;
        }
        return false;
    }
}