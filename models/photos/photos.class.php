<?php

/**
 * Author: Jacob Garwood
 * Date: 11/7/2023
 * File: photos.class.php
 * Description:
 */
class Photos
{
    //properties of a Photo object
    private $photoId,$size,$camera, $title, $description, $creationDate, $imgPath;

//constructor that initializes photo properties

    public function __construct($photoId, $size, $camera, $title, $description, $creationDate, $imgPath)
    {
        $this->photoId = $photoId;
        $this->size = $size;
        $this->camera = $camera;
        $this->title = $title;
        $this->description = $description;
        $this->creationDate = $creationDate;
        $this->imgPath = $imgPath;
    }

    /**
     * @return mixed
     */
    public function getPhotoId()
    {
        return $this->photoId;
    }

    /**
     * @return mixed
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @return mixed
     */
    public function getCamera()
    {
        return $this->camera;
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
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * @return mixed
     */
    public function getImgPath()
    {
        return $this->imgPath;
    }

    /**
     * @param mixed $photoId
     */
    public function setId($photoId)
    {
        $this->photoId = $photoId;
    }
}
