<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\helpers\MyBreadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= isset($this->title) ? Html::encode($this->title) . ' - ' : Html::encode($this->title);
        echo Yii::t('frontend', 'My Company') . ' - '
            . Yii::t('frontend', 'online library')?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div id="header">
    <div class="center_wrapper">

        <div id="top-links-pane">
            <div id="top-links-inner">
                <?php if(Yii::$app->user->isGuest) { ?>
                    <a href="/login"><?php echo Yii::t('frontend', 'SignIn'); ?></a> |
                    <a href="/signup"><?php echo Yii::t('frontend', 'SignUp'); ?></a> |
                <?php } else { ?>
                    <a href="/logout"><?php echo Yii::t('frontend', 'Logout'); ?>
                        (<?php echo Yii::$app->user->identity->username; ?>)</a> |
                <?php } ?>
                <a href="#"><?php echo Yii::t('frontend', 'FAQ'); ?></a></a>
            </div>
        </div>

        <div id="title"><a href="<?php echo Yii::$app->homeUrl; ?>"><span>ЧАС </span>ЧИТАТИ</a></div>
        <div id="sub-title"><?php echo Yii::t('frontend',
    '... when a person stops reading, he stops thinking ...'); ?></div>

    </div>
</div>

<div id="navigation">
    <div class="center_wrapper">

        <ul>
            <li class="current_page_item"><a
                    href="<?php echo Yii::$app->homeUrl; ?>"><?php echo Yii::t('frontend', 'Home') ?></a></li>
            <li><a href="#"><?php echo Yii::t('frontend', 'Top-100'); ?></a></li>
            <li><a href="/books"><?php echo Yii::t('frontend', 'Books'); ?></a></li>
            <li><a href="/authors"><?php echo Yii::t('frontend', 'Authors'); ?></a></li>
            <li><a href="/publishhouses"><?php echo Yii::t('frontend', 'Publishing Houses'); ?></a></li>
            <li><a href="/genres"><?php echo Yii::t('frontend', 'Genres'); ?></a></li>
            <li><a href="/about"><?php echo Yii::t('frontend', 'About'); ?></a></li>
            <li><a href="/contact"><?php echo Yii::t('frontend', 'Contact us'); ?></a></li>
        </ul>

        <div class="clearer">&nbsp;</div>

    </div>
</div>

<div id="main-block">
    <div id="main_wrapper_outer">
        <div id="main_wrapper_inner">
            <div class="center_wrapper">
                <div id="content">

                    <!-- ------------------------ -->
                    <?= $content ?>
                    <!-- ------------------------ -->

                </div>
                <div class="clearer">&nbsp;</div>
            </div>
        </div>
    </div>
</div>
<div id="dashboard">

    <div class="center_wrapper">
        <div id="dashboard-content">
            <div class="dash-column cols">
                <h4>Головне меню</h4>
                <ul>
                    <li class="current_page_item"><a
                            href="<?php echo Yii::$app->homeUrl; ?>"><?php echo Yii::t('frontend', 'Home') ?></a></li>
                    <li><a href="#"><?php echo Yii::t('frontend', 'Top-100'); ?></a></li>
                    <li><a href="/books"><?php echo Yii::t('frontend', 'Books'); ?></a></li>
                    <li><a href="/authors"><?php echo Yii::t('frontend', 'Authors'); ?></a></li>
                    <li><a href="/publishhouses"><?php echo Yii::t('frontend', 'Publishing Houses'); ?></a></li>
                    <li><a href="/genres"><?php echo Yii::t('frontend', 'Genres'); ?></a></li>
                    <li><a href="/about"><?php echo Yii::t('frontend', 'About'); ?></a></li>
                    <li><a href="/contact"><?php echo Yii::t('frontend', 'Contact us'); ?></a></li>
                </ul>
            </div>

            <div class="dash-column cols">
                <h4>Fermentum</h4>
                <ul>
                    <li><a href="#">Semper fermentum</a></li>
                    <li><a href="#">Sem justo</a></li>
                    <li><a href="#">Magna sed purus</a></li>
                    <li><a href="#">Tincidunt nisl</a></li>
                    <li><a href="#">Consequat molestie</a></li>
                </ul>
            </div>

            <div class="dash-column cols">
                <h4>Praesent</h4>
                <ul>
                    <li><a href="#">Semper lobortis</a></li>
                    <li><a href="#">Consequat molestie</a></li>
                    <li><a href="#">Magna sed purus</a></li>
                    <li><a href="#">Sem morbi</a></li>
                    <li><a href="#">Tincidunt sed</a></li>
                </ul>
            </div>

            <div class="dash-column cols">
                <h4>Fermentum</h4>
                <ul>
                    <li><a href="#">Semper fermentum</a></li>
                    <li><a href="#">Sem justo</a></li>
                    <li><a href="#">Magna sed purus</a></li>
                    <li><a href="#">Tincidunt nisl</a></li>
                    <li><a href="#">Consequat molestie</a></li>
                </ul>
            </div>

            <div class="clearer">&nbsp;</div>

        </div>
    </div>
</div>
<footer class="footer">
    <div id="footer">
        <div class="center_wrapper">

            <div class="left">
                &copy; <?= Yii::t('frontend', 'My Company') . '! '; ?><?= date('Y') ?>
            </div>
            <div class="right">made by <span class="yellow">kshukost</span></div>

            <div class="clearer">&nbsp;</div>

        </div>
    </div>
</footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
