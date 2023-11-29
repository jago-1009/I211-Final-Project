<?php
/**
 * Author: Nate Osborne
 * Date: 11/29/2023
 * File Name: collectionerror.class.php
 * Description:
 */

class CollectionError {

    public function display($message) {

        // display Header
        parent::displayHeader("Error");
        ?>
        <div id="main-header"></div>
        <div><?= urldecode($message) ?></div>
        <br><br><br>
        <a href="<?= BASE_URL ?>/collection/index">Back to Homepage</a>
        <?php

        parent::displayFooter();
    }

}