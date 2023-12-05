<?php

/*
 * Author: Deep Patel
 * Date: 11/14/23
 * user_controller.class.php
 * allow the user to perform account-related actions on the site
 */

class LoginController {


    private $user_model;

    // UserModel object
    public function __construct() {
        $this->user_model = UserModel::getUserModel();
    }

    // login page
    public function login() {

        // index
        $view = new Login();
        $view->display();
    }

    public function verify() {

        $result = $this->user_model->verify_user();

        //display result
        $view = new Verify();
        $view->display($result);
    }

    // login page
    public function index() {
        //  photo gallery
        $this->photoGallery();
    }

// Display photo gallery
    public function photoGallery() {
        //  all photos store them in an array
        $photos = $this->user_model->getPhotos();

        // photo gallery
        $view = new PhotoGalleryView();
        $view->display($photos);
    }

    //user account
    public function user_register() {

        //call the user_register.class.php view (might need fix)
        $view = new UserRegister();
        $view->display();
    }


    public function UserRegisterVerify() {

        // addUser method
        $result = $this->user_model->add_user();
        if (!$result) {
            //handle errors
            $message = "There was a problem creating your account.";
            $this->error($message);
            return;
        }

        // creation was successful.
        $success = "Welcome to Photo store. We welcome you";

        $view = new UserRegisterVerify();
        $view->display(true);
    }

    //logout function
    public function logout() {

        // user_model object
        $this->user_model->logout();
        $view = new Logout();
        $view->display();
    }

    // error message
    public function error($message) {
        $view = new UserError();
        $view->display($message);
    }

}
