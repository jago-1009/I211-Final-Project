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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link type='text/css' rel='stylesheet' href='../www/styles/styles.css' />
    <script>
        var base_url = "<?=BASE_URL?>";
    </script>
    <title>Document</title>
</head>
    <body>
    <div class="nav">
        <div class="home">
            <a href="<?= BASE_URL ?>/index">Home</a>
        </div>
        <div class="links">
            <p>|</p>
            <a href="<?= BASE_URL ?>/photo/index">Our Photos</a>
            <p>|</p>
            <a href="<?= BASE_URL ?>/photographer/index">Photographers</a>

        </div>
    </div>




<?php
}

static public function displayfooter(){
    ?>
    <div class="footer">
        <p>&copy 2023 Photography Website</p>
    </div>

    </body>
    </html>
<?php
}

}

?>