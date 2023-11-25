<?php

/**
 * Author: Jacob Garwood
 * Date: 11/7/2023
 * File: index_view.class.php
 * Description:
 */


class View {
static public function displayheader($page_title) {
?>
<!doctype html>
<html lang="en">
<head>
    <title><?php echo $page_title ?></title>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type='text/css' rel='stylesheet' href='../www/styles/styles.css' />
    <title>Document</title>
    <div class="nav">
        <div class="home">
            <a href="<?= BASE_URL ?>/index">Home</a>
        </div>
        <div class="links">
            <a href="<?= BASE_URL ?>/photo/index">Our Photos</a>
            <p>|</p>
            <a href="<?= BASE_URL ?>/photographer/index">Photographers</a>
            <p>|</p>
            <a href="<?= BASE_URL ?>/collection/index">Collections</a>
            <p>|</p>
            <a href="">Log In</a>
        </div>
    </div>
</head>
<body>

</body>
</html>
<?php
}

static public function displayfooter(){
    ?>
    <div class="footer">
        <p>&copy 2023 Photography Website</p>
    </div>
<?php
}

}

?>