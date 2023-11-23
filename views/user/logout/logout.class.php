<?php
/**
 * Name : Deep Patel
 * Date : 11/21/23
 * File : logout.class.php
 * Description:
 */
class Logout extends IndexView {

    public function display() {

        parent::displayHeader("Photo Store");

        ?>
        <div id="main-header">
            <!--Display the message-->
            <p>You have been logged out.</p>
            <!--Display the links-->
            <span style="float: left">Already have an account? <a href="<?= BASE_URL ?>/user/login">Login</a></span>
            <span style="float: right">Don't have an account? <a href="<?= BASE_URL ?>/user/user_register">Register</a></span>
        </div>
        <?php
        parent::displayFooter();
    }

}