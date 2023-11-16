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

        <div class="header">Photographs</div>

        <div class="container">
            <?php
            if($photos === 0){
                echo "No photo was found.";
            } else {
                foreach ($photos as $photo){
                    $id = $photo->getPhotoId();
                    $size = $photo->getSize();
                    $camera = $photo->getCamera();
                    $decription = $photo->getDescription();

                }
            }
            ?>
        </div>
<?php
        parent::displayfooter();
    }
}
?>