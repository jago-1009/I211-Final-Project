<?php
/**
 * Name : Deep Patel
 * Date : 11/21/23
 * File : photographerdetails.php
 * Description:
 */
class PhotographerDetails  extends View{

    public function display($results) {
        $photographer = $results["Photographer"];
        $photos = $results["photos"];
        //display page header
        parent::displayHeader("Photo Details");
        $firstName = $photographer->getFirstName();
        $lastName = $photographer->getLastName();
        $birthDate = $photographer->getBirthDate();
        $email = $photographer->getEmail();
//        $photoID = $photos->getPhotoId();
//        $photoImgPath = $photos->getImgPath();
//        $photoSize = $photos->getSize();
//        $photoCamera = $photos->getCamera();
//        $photoDescription = $photos->getDescription();
//        $photoTitle = $photos->getTitle();
//        $photoCreationDate = $photos->getCreationDate();
//        if (strpos($photoImgPath, "http://") === false and strpos($photoImgPath, "https://") === false) {
//            $photoImgPath = BASE_URL . "/"  . $photoImgPath;
//        }
        ?>
        <!DOCTYPE html>
        <html>
    <head>

        <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
        <link type='text/css' rel='stylesheet' href='../../www/styles/styles.css' />
        <h4 class="search-back"><a href="<?= BASE_URL ?>/photo/index">< Back to Photo Gallery List</a></h4>
        <div class="details-title"><h1><?=$firstName, $lastName ?></h1></div>
        <!-- display product details in a table -->
        <div class="detailHolder">
        <table id="detail">
            <tr class="info">
                <td>
                   <h1><?=$firstName, $lastName ?></h1>
                </td>
                <td class="infoText">

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