<?php
use app\helpers\CatalogLinkPager;

?>
<div id="comments">
    <div class="empty_separator"></div>

    <div class="wrap-box">
        <div class="wrap-box-title">Коментарі</div>

        <?php if (count($comments) > 0) { ?>

        <?php foreach ($comments as $comment) { ?>
            <div class="wrap-box-row">
                <div class="wrap-box-row-inner">
                    <div class="gravatar left">
                        <img alt="" src="<?php echo Yii::$app->request->baseUrl; ?>/css/img/gravatar.gif" height="64"
                             width="64"/>
                    </div>

                    <div class="author left">
                        <?php echo $comment->user; ?>
                        <div class="date">
                            створено: <?php echo $comment->createdAt; ?> (редаговано: <?php echo $comment->updatedAt; ?>
                            )
                        </div>
                    </div>
                    <div class="clearer">&nbsp;</div>
                    <div class="body">
                        <div><?php echo $comment->text; ?></div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <div class="wrap-box-row-submit">
            <div class="pagination-pan">
                <?php

                echo CatalogLinkPager::widget([
                    'pagination' => $pages,
                ]);

                ?>
            </div>
        </div>
    </div>
    <?php } else { ?>
    <!--    <div class="notification">-->
    <div class="wrap-box-row">
        <div class="wrap-box-row-inner">
            На жаль, тут ще ніхто нічого не написав. Будь першим!
        </div>
    </div>
</div>
<?php } ?>

<?php if (Yii::$app->user->isGuest) { ?>

    <div class="notice">
        Для додавання коментарів, необхідно <a href="/signup">зареєструватися</a> та
        <a href="/login">увійти на сайт</a>.
    </div>
<?php } else { ?>
    <div id="reply">
        <form action="" method="post">
            <input type="hidden" name="user" value="<?php echo Yii::$app->user->id; ?>"/>

            <div class="wrap-box">

                <div class="wrap-box-title">Залишити відгук</div>
                <div class="wrap-box-row">

                    <div class="wrap-box-property wrap-box-row-required">Коментар</div>
                    <div class="wrap-box-value"><textarea rows="10" cols="60" name="comment"></textarea></div>

                    <div class="clearer">&nbsp;</div>

                </div>

                <div class="wrap-box-row-submit">

                    <div class="wrap-box-value"><input type="submit" class="buttonOrange" value="Відправити"/></div>

                    <div class="clearer">&nbsp;</div>

                </div>

            </div>

        </form>
    </div>
<?php } ?>
</div>
