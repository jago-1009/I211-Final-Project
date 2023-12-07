<?php
/**
 * Name : Deep Patel
 * Date : 11/21/23
 * File : photoerror.class.php
 * Description:
 */
class PhotoError extends View {

    public function display($message) {

        // display Header
        parent::displayHeader("Error");
        ?>
        <link type='text/css' rel='stylesheet' href='../../www/styles/styles.css'/>

        <div id="main-header"></div>
        <img src="<?=BASE_URL?>/www/img/error.gif" class="img-search" style="width:300px; height:300px;">
        <div><?= urldecode($message) ?></div>
        <br><br><br>
        <a href="<?= BASE_URL ?>/photo/index">Back to Homepage</a>
        <?php

        parent::displayFooter();
    }

}