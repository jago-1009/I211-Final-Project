<?php
/**
 * Name : Deep Patel
 * Date : 11/21/23
 * File : photodeatils.class.php
 * Description:
 */
class PhotoDetail extends PhotoIndex {

    public function display($photo, $confirm = "") {
        //display page header
        parent::displayHeader("Photo Details");

        $id = $photo->getPhotoId();
        $imgPath = $photo->getImgPath();
        $size = $photo->getSize();
        $camera = $photo->getCamera();
        $description = $photo->getDescription();
        $title = $photo->getTitle();

        //retrieve photo details by calling get methods
        $id = $photo->getId();
        $name = $photo->getName();
        $desc = $photo->getDescription();
        $author = $photo->getAuthor();
        $price = $photo->getPrice();
        $image = $photo->getImage();
        if (strpos($image, "http://") === false and strpos($image, "https://") === false) {
            $image = BASE_URL . "/" . PHOTO_IMG . $image;
        }
        ?>

        <div id="main-header">Photo Details</div>
        <hr>
        <!-- display product details in a table -->
        <table id="detail">
            <tr>
                <td style="width: 150px;">
                    <img src="<?= $image ?>" alt="<?= $name ?>" />
                </td>
                <td style="width: 130px;">
                    <p><strong>Product Name:</strong></p>
                    <p><strong>Description:</strong></p>
                    <p><strong>Author:</strong></p>
                    <p><strong>Price:</strong></p>
                    <div id="button-group">
                        <input type="button" id="edit-button" value="   Edit   "
                               onclick="window.location.href = '<?= BASE_URL ?>/photo/edit/<?= $id ?>'">&nbsp;
                    </div>
                </td>
                <td>
                    <p><?= $name ?></p>
                    <p><?= $desc ?></p>
                    <p><?= $author ?></p>
                    <p><?= $price ?></p>
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