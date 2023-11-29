<?php
/**
 * Author: Nate Osborne
 * Date: 11/29/2023
 * File Name: photographererror.class.php
 * Description:
 */

class PhotographerError {

    public function display($message) {

        // display Header
        parent::displayHeader("Error");
        ?>
        <div id="main-header"></div>
        <div><?= urldecode($message) ?></div>
        <br><br><br>
        <a href="<?= BASE_URL ?>/photographer/index">Back to Homepage</a>
        <?php

        parent::displayFooter();
    }

}