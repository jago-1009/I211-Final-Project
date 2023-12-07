<?php

/**
 * Author: Jacob Garwood
 * Date: 11/7/2023
 * File: database.class.php
 * Description:
 *
**/
class Database
{

    //define database parameters
    private $param = array(
        'host' => 'localhost',
        'login' => 'phpuser',
        'password' => 'phpuser',
        'database' => 'web_gallery',
        'tblPhotos' => 'photos',
        'tblPhotographers' => 'photographers',
    );
    //define the database connection object
    private $objDBConnection = NULL;
    static private $_instance = NULL;

    //constructor
    public function __construct()
    {

        $this->objDBConnection = @new mysqli(
            $this->param['host'],
            $this->param['login'],
            $this->param['password'],
            $this->param['database']
        );
        if (mysqli_connect_errno() != 0) {
           throw new DatabaseConnectionException();
        }
    }

    //static method to ensure there is just one Database instance
    static public function getInstance()
    {
        if (self::$_instance == NULL) {
            self::$_instance = new Database();
        }
        return self::$_instance;
    }

    //this function returns the database connection object
    public function getConnection()
    {
        return $this->objDBConnection;
    }

    //returns the name of the table storing the photos

    public function getPhotoTable()
    {
        return $this->param['tblPhotos'];
    }

    //returns the name of the table storing the photographers

    public function getPhotographerTable()
    {
        return $this->param['tblPhotographers'];
    }

    //returns the name of the collections

    public function getCollectionsTable()
    {
        return $this->param['tblCollections'];
    }

    //returns the intersection table between collections and photos
    //UNSURE IF NEEDED

    public function getPhotoCollectionTable()
    {
        return $this->param['tblPhotoCollections'];
    }
}
