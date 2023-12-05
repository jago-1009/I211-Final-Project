<?php

/**
 * Author: Jacob Garwood
 * Date: 11/21/2023
 * File: photographers.class.php
 * Description:
 */
class Photographers
{
private $photographerID, $firstName, $lastName, $birthDate, $email;

    /**
     * @param $photographerID
     * @param $firstName
     * @param $lastName
     * @param $birthDate
     * @param $email
     */
    public function __construct($photographerID, $firstName, $lastName, $birthDate, $email)
    {
        $this->photographerID = $photographerID;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->birthDate = $birthDate;
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPhotographerID()
    {
        return $this->photographerID;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @return mixed
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }
    public function setPhotographerID($photographerID)
    {
        $this->photographerID = $photographerID;
    }
}