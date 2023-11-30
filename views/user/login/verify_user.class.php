<?php
/**
 * Name : Deep Patel
 * Date : 11/21/23
 * File : verify_user.class.php
 * Description:
 */
class Verify extends IndexView {


    public function display($message) {

        //display page header
        parent::displayHeader("Photo Store");

        //if the login was successful display the corresponding message and links
        if ($message == true) {

            $id = $_COOKIE['id'];

        }
        ?>
        <div id="main-header">
        <p>You have successfully logged in.</p>
        <?php
        //hide features from users
        if ($_COOKIE['role'] == 2) {
            ?>
            <a href="<?= BASE_URL ?>/admin/index" class="btn btn-info" role="button">Dashboard</a>
            <?php
        } elseif ($_COOKIE['role'] == 1) {
            echo "<a href=" . BASE_URL . "/user/index/$id class='btn btn-success' role='button'>Dashboard</a>";

            ?>
            </div>
            <?php
            //if the login was unsuccessful display the corresponding message and links
        } else {
            ?>
            <div id="main-header">

                <p>Your last attempt to login failed. Please try again.</p>

                <span style="float: left">Already have an account? <a href="<?= BASE_URL ?>/user/login">Login</a></span>
            </div>

            <?php
            parent::displayFooter();
        }
    }

}