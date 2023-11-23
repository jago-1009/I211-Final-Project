<?php
/**
 * Name : Deep Patel
 * Date : 11/21/23
 * File : user_register.class.php
 * Description:
 */
class UserRegister extends IndexView {

    //create and display the registration form
    public function display() {

        parent::displayHeader("Photo Store");
        ?>
        <div id="main-header">
            <h4>Create an account</h4>

            <!--Post registration data to model-->
            <form action="<?= BASE_URL ?>/user/UserRegisterVerify" method="post">
                <!--Get user registration data-->
                <label for="username">Username:</label>
                <input type="text" class="form-control col-3" name="username" placeholder="Username" required>
                <label for="password">Password:</label>
                <input type="password" class="form-control col-3" name="password" placeholder="Password, 5 characters minimum" minlength="5" required>
                <label for="email">Email:</label>
                <input type="email" class="form-control col-3" name="email" placeholder="Email" required><br/>
                <input type="submit" class="btn btn-info" name="submit" placeholder="Register">
            </form>
            <br/>
            <!--Display the links-->
            <span style="float: left">Already have an account? <a href="<?= BASE_URL ?>/user/login">Login</a></span>
        </div>

        <?php
        parent::displayFooter();
    }

}
