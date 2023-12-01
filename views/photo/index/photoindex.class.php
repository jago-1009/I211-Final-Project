<?php
/**
 * Name : Deep Patel
 * Date : 11/21/23
 * File : photoindex.class.php
 * Description:
 */
class PhotoIndex extends PhotoView {
//this method displays the page header
    static public function displayHeader($page_title) {


        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title> <?php echo $page_title ?> </title>
            <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
            <link type='text/css' rel='stylesheet' href='../www/styles/styles.css' />

<!--            <link type='text/css' rel='stylesheet' href='--><?//= IMG_URL ?><!--/www/css/photogallerystyle.css' />-->
            <script>
                //create the JavaScript variable for the base url
                var base_url = "<?= BASE_URL ?>";
            </script>
        </head>
        <body>
        <div id="top"></div>
        <div id='wrapper'>
        <div id="banner">
            <a href="<?= BASE_URL ?>../../../index.php" style="text-decoration: none" title="">
                <div id="left">
                    <img src='<?= IMG_URL ?>/www/img/logo.png' style="width: 180px; border: none" />
                    <h5> Photo Gallery <h5/>
                        <div style='color: #000; font-size: 14pt; font-weight: bold'>Welcome to our Photo Gallery</div>
                </div>
            </a>
            <!-- <div id="right">
                <img src="<?/*= BASE_URL */?>/www/img/ " style="width: 400px; border: none" />
            </div>-->
        </div>

        <div id="searchbar">
            <form method="get" action="<?= BASE_URL ?>/photo/search">
                <input type="text" name="query-terms" id="searchtextbox" placeholder="Search photos by title" autocomplete="off" onkeyup="handleKeyUp(event)">
                <input type="submit" class="gobutton" value="Go" />
            </form>
            <div id="suggestionDiv"></div>
        </div>
        <?php
    }//end of displayHeader function


    //this method displays the page footer
    public static function displayFooter() {
        ?>
        <br><br><br>
        <div id="push"></div>
        </div>
        <div id="footer"><br>&copy 2022 Indy Photo Gallery. All Rights Reserved.</div>
        <script type="text/javascript" src="<?= BASE_URL ?>/www/js/ajax_autosuggestion.js"></script>
        </body>
        </html>
        <?php
    } //end of displayFooter function
}