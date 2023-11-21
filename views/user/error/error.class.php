<?php
/**
 * Name : Deep Patel
 * Date : 11/21/23
 * File : error.class.php
 * Description:
 */
/**
 * Description of error
 *
 * @author ryand
 */
class UserError extends IndexView {

    public function display() {
        parent::displayHeader("Photo Store");
        ?>
        <div id="main-header">

            <!--display an error on the page without breaking the application -->
            <h4>Sorry, something went wrong with creating your account.</h4>
            <p>Try a different username or email.</p>
        </div>
        <?php
        parent::displayFooter();
    }

}
