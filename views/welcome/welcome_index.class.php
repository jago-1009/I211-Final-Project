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
        parent::displayHeader();
        ?>
            <div>Welcome to Photo Gallery!</div>
        <?php
        //display page footer
        parent::displayFooter();
    }

}
