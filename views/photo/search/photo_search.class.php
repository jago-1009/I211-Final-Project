<?php
/**
 * Name : Deep Patel
 * Date : 11/21/23
 * File : photo_search.class.php
 * Description:
 */
class PhotoSearch extends PhotoView {

    public function display($photos) {
        //display page header

        parent::displayHeader("Search Results");
        ?>
        <div id="main-header"> Search Results for <i><?= $photos ?></i></div>
        <span class="rcd-numbers">
            <?php
            echo ((!is_array($photos)) ? "( 0 - 0 )" : "( 1 - " . count($photos) . " )");
            ?>
        </span>
        <hr>

        <!-- display all records in a grid -->
        <div class="grid-container">
            <?php
            if ($photos === 0) {
                echo "No photo was found.<br><br><br><br><br>";
            } else {
                //display photos in a grid;
                foreach ($photos as $photo) {
                    $id = $photo->getPhotoId();
                    $imgPath = $photo->getImgPath();
                    $size = $photo->getSize();
                    $camera = $photo->getCamera();
                    $description = $photo->getDescription();
                    $title = $photo->getTitle();

                    if (strpos($imgPath, "http://") === false and strpos($imgPath, "https://") === false) {
                        $image = IMG_URL . PHOTO_IMG . $imgPath;
                    }

                    echo "<div class='item'><p><a href='" . BASE_URL . "/photo/detail/$id'><img src='$image'></a><span>$name<br>Description: $description<br>" . " Author: $author<br>". " Price: $price<br>"."</span></p></div>";

                }
            }
            ?>
        </div>
        <a href="<?= BASE_URL ?>/photo/index">Go to photo gallery list</a>
        <?php
        //display page footer
        parent::displayFooter();
    }

//end of display method
}