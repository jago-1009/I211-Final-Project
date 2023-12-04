<?php

/**
 * Name : Deep Patel
 * Date : 11/21/23
 * File : photo_search.class.php
 * Description:
 */
class PhotoSearch extends PhotoView
{

    public function display($photos)
    {
        //display page header

        parent::displayHeader("Search Results");
        ?>
        <h4 class="search-back"><a href="<?= BASE_URL ?>/photo/index">< Back to Photo Gallery List</a></h4>
        <div id="main-header"> Search Results:</i></div>
        <span class="rcd-numbers">
            <?php
            echo((!is_array($photos)) ? "( 0 - 0 )" : "( 1 - " . count($photos) . " )");
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


                    echo "<div class='photo-list'>
                    <div class='img-search'><a href='" . BASE_URL . "/photo/detail/$id'><img src='../$imgPath'></a><div class='photo-list-details'><h1>$title</h1><p>$description</p></div>
                    </div>
                    </div>";

                }
            }
            ?>
        </div>
        <?php
        //display page footer
        parent::displayFooter();
    }

//end of display method
}