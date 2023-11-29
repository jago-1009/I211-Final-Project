<?php
/**
 * Author: Nate Osborne
 * Date: 11/29/2023
 * File Name: photographer_view.class.php
 * Description:
 */

class PhotographerView extends View {
    public function display($photographers){
        parent::displayheader("Photographer Library");
        ?>

        <div class="head">
            <p class="header">Photographers</p>
        </div>

        <div class="container">
            <?php
            if($photographers === 0){
                echo "No photo was found.";
            } else {
                foreach ($photographers as $photographers){
                    $photographerID = $photographers->getPhotographerID();
                    $firstname = $photographers->getFirstName();
                    $lastname = $photographers->getLastName();
                    $birthdate = $photographers->getBirthDate();
                    $email = $photographers->getEmail();

                    echo "<div class='photo-list'>
                        <div class='photo-list-details'><h1>$firstname $lastname</h1><h4>$birthdate</h4><h4>$email</h4><p>ID: $photographerID</p></div>
                    </div>";
                }
            }
            ?>
        </div>
        <?php
        parent::displayfooter();
    }
}
?>