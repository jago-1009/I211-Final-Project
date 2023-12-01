<?php
/**
 * Author: Nate Osborne
 * Date: 11/21/2023
 * File Name: welcome_index.class.php
 * Description:
 */

class WelcomeIndex extends View {

    public function display() {
        //display page header
        parent::displayHeader("Welcome");
        ?>
        <link type='text/css' rel='stylesheet' href='./www/styles/styles.css' />

        <div class="hero">
            <div class="hero-text">
            <h1>Welcome to Photo Gallery!</h1>
            <p><a href="<?= BASE_URL ?>/photo/index">Start Browsing</a></p>
            </div>
        </div>

        <?php
        //display page footer
        parent::displayFooter();
    }

}
