<?php
/**

Author: Nate Osborne
Date: 11/15/2023
File Name: photo_view.class.php
Description:
 */

class PhotoView extends View {
    public function display($photos){
        parent::displayheader("Photo Library");
        ?>

        <div class="head">
            <p class="header">Photographs</p>
        </div>

        <div class="container">
            <?php
            if($photos === 0){
                echo "No photo was found.";
            } else {
                foreach ($photos as $photo){
                    $id = $photo->getPhotoId();
                    $imgPath = $photo->getImgPath();
                    $size = $photo->getSize();
                    $camera = $photo->getCamera();
                    $description = $photo->getDescription();
                    $title = $photo->getTitle();

                    echo "<div class='photo-list'>
                        <div class='image'><a href='", BASE_URL, "/photo/detail/$id'><img src='../".$imgPath."'></a></div><div class='photo-list-details'><h1>$title</h1><h4>$size</h4><h4>$camera</h4><p>$description</p><p>ID: $id</p><p>$imgPath</p></div>
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