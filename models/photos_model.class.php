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