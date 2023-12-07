<?php

/**
 * Name : Deep Patel
 * Date : 11/21/23
 * File : photographerdetails.php
 * Description:
 */
class PhotographerDetails extends View
{

    public function display($results)
    {
        $photographer = $results["Photographer"];
        //display page header
        parent::displayHeader("Photo Details");
        $firstName = $photographer->getFirstName();
        $lastName = $photographer->getLastName();
        $birthDate = $photographer->getBirthDate();
        $email = $photographer->getEmail();

        ?>
        <!DOCTYPE html>
        <html>
    <head>

        <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
        <link type='text/css' rel='stylesheet' href='../../www/styles/styles.css'/>
        <h4 class="search-back"><a href="<?= BASE_URL ?>/photographer/index">< Back to Photographers</a></h4>
        <div class="photodetails">
            <!-- display product details in a table -->
            <div class="detailtext">
                <h1 class="details-title">This is <?= $firstName, " ", $lastName ?></h1>
                <h3 class="details-desc">Born on <?= $birthDate ?>, they have created many photographs that continue to dazzle and wow
                    us.</h3>
                <?php if (is_null($email) == true) {
                    echo "<p>Unfortunately, this person has since left us. May their photos continue to stay in our memory forever.</p>";
                } else {
                    echo "<p>If you would like to contact them, please email them at $email<p>";
                };
                ?>
            </div>
            <div class="detailimg">
                <img class="photographer-img" src="<?= BASE_URL ?>/www/img/<?=$firstName,$lastName?>.jpeg">
            </div>

        </div>

        <?php
        //display page footer
        parent::displayFooter();
    }

//end of display method
}