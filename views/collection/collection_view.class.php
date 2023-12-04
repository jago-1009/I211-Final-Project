<?php
/**
 * Author: Nate Osborne
 * Date: 11/29/2023
 * File Name: collection_view.class.php
 * Description:
 */

class CollectionView extends View {
    public function display($collections){
        parent::displayheader("Collections");
        ?>

        <div class="head">
            <p class="header">Collections</p>
        </div>

        <div class="container">
            <?php
            if($collections === 0){
                echo "No photo was found.";
            } else {
                foreach ($collections as $collection){
                    $collectionID = $collection->getCollectionID();
                    $title = $collection->getTitle();
                    $description = $collection->getDescription();
                    $active = $collection->getActive();

                    echo "<div class='photo-list'>
                        <div class='photo-list-details'><h1>$title</h1><h4>$description</h4><h4>$active</h4><p>ID: $collectionID</p></div>
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