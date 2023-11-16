<?php
/**
 * Author: Nate Osborne
 * Date: 11/15/2023
 * File Name: photo_view.class.php
 * Description:
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
                        <div class='image'><img src='" . $imgPath . "'></div><h1>$id</h1><h1>$title</h1><h2>$imgPath</h2><h3>$size</h3><h4>$camera</h4><h5>$description</h5>
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