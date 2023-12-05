<?php
/**
 * Name : Deep Patel
 * Date : 11/21/23
 * File : photographerdetails.php
 * Description:
 */
class PhotoDetails  extends View{

    public function display($photo, $confirm = "") {
        //display page header
        parent::displayHeader("Photo Details");

        $id = $photo->getPhotoId();
        $imgPath = $photo->getImgPath();
        $size = $photo->getSize();
        $camera = $photo->getCamera();
        $description = $photo->getDescription();
        $title = $photo->getTitle();
        $creationDate = $photo->getCreationDate();

        if (strpos($imgPath, "http://") === false and strpos($imgPath, "https://") === false) {
            $imgPath = BASE_URL . "/"  . $imgPath;
        }
        ?>
        <!DOCTYPE html>
        <html>
    <head>

        <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
        <link type='text/css' rel='stylesheet' href='../../www/styles/styles.css' />
        <h4 class="search-back"><a href="<?= BASE_URL ?>/photo/index">< Back to Photo Gallery List</a></h4>
        <div class="details-title"><h1><?= $title?></h1></div>
        <!-- display product details in a table -->
        <div class="detailHolder">
        <table id="detail">
            <tr class="info">
                <td>
                    <img src="<?= $imgPath ?>" alt="<?= $title ?>" class="detailImg" />
                </td>
                <td class="infoText">
                    <h3><?= $description ?></h3>
                    <p><strong>Size: </strong><?= $size ?></p>
                    <p><strong>Camera: </strong><?= $camera ?></p>
                    <p><strong>Creation Date: </strong><?= $creationDate ?></p>
                    <p><strong>ID: </strong><?= $id ?></p>
                    <div id="button-group">
                        <input type="button" id="edit-button" value="   Edit   "
                               onclick="window.location.href = '<?= BASE_URL ?>/photo/edit/<?= $id ?>'">&nbsp;
                    </div>

                </td>

            </tr>
        </table>
        </div>

        <?php
        //display page footer
        parent::displayFooter();
    }

//end of display method
}