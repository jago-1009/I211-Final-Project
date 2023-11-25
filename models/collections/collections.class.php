<?php

/**
 * Author: Jacob Garwood
 * Date: 11/25/2023
 * File: collections.class.php
 * Description:
 */
class Collections
{
 private $collectionID, $title, $description, $active;

    /**
     * @param $collectionID
     * @param $title
     * @param $description
     * @param $active
     */
    public function __construct($collectionID, $title, $description, $active)
    {
        $this->collectionID = $collectionID;
        $this->title = $title;
        $this->description = $description;
        $this->active = $active;
    }

    /**
     * @return mixed
     */
    public function getCollectionID()
    {
        return $this->collectionID;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getActive()
    {
        return $this->active;
    }

}