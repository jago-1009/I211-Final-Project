<?php
/**
 * Name : Deep Patel
 * Date : 11/21/23
 * File : photodetails.class.php
 * Description:
 */
class PhotoDetails {

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

        <div id="main-header">Photo Details</div>
        <hr>
        <!-- display product details in a table -->
        <table id="detail">
            <tr>
                <td style="width: 150px;">
                    <img src="<?= $imgPath ?>" alt="<?= $title ?>" />
                </td>
                <td style="width: 130px;">
                    <p><strong>Title:</strong></p>
                    <p><strong>Description:</strong></p>
                    <p><strong>Size:</strong></p>
                    <p><strong>Camera:</strong></p>
                    <p><strong>Creation Date:</strong></p>
                    <p><strong>ID:</strong></p>
                    <div id="button-group">
                        <input type="button" id="edit-button" value="   Edit   "
                               onclick="window.location.href = '<?= BASE_URL ?>/photo/edit/<?= $id ?>'">&nbsp;
                    </div>
                </td>
                <td>
                    <p><?= $title ?></p>
                    <p><?= $description ?></p>
                    <p><?= $size ?></p>
                    <p><?= $camera ?></p>
                    <p><?= $creationDate ?></p>
                    <p><?= $id ?></p>
                    <div id="confirm-message"><?= $confirm ?></div>
                </td>
            </tr>
        </table>
        <a href="<?= BASE_URL ?>/photo/index">Go to photo list</a>

        <?php
        //display page footer
        parent::displayFooter();
    }

//end of display method
}