<div id="main-menu">
    <div class="box">
        <div id="celebs">
            <ul id="accordion">
                <?php if (!empty($genreOptions)) { ?>
                    <?php foreach ($genreOptions as $genreOption) { ?>
                        <li><!--class="active"-->
                            <div class="item-title"><?php echo $genreOption['catName']; ?></div>
                            <div class="item-title-container">
                                <ul>
                                    <?php if (!empty($genreOption['catList'])) { ?>
                                        <?php foreach ($genreOption['catList'] as $genreItem) { ?>

                                                <a href="<?php echo Yii::$app->homeUrl . 'books?g[]=' . $genreItem['genre_id']; ?>">
                                                    <li><?php echo $genreItem['name']; ?></li></a>
                                        <?php } ?>
                                    <?php } ?>
                                </ul>
                            </div>
                        </li>
                    <?php } ?>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>