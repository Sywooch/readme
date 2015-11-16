<?php
use app\helpers\MyBreadcrumbs;

?>
<div class="app_about">
    <div id="sidebar-left" class="cols sidebar">

        <?php include_once("../views/layouts/menu.php"); ?>

    </div>

    <div id="main-content" class="cols">
        <div>
            <?= MyBreadcrumbs::widget([
                'homeLink' => [
                    'label' => Yii::t('yii', 'Home'),
                    'url' => Yii::$app->homeUrl,
                ],
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>

        </div>

        <?php echo("This is App's About page."); ?>

    </div>

    <div id="sidebar-right" class="cols sidebar">

            <div class="box">

                <div class="title">Categories</div>

                <div class="content">
                    <ul>
                        <li><a href="http://templates.arcsin.se/category/website-templates/">Website Templates</a></li>
                        <li><a href="http://templates.arcsin.se/category/wordpress-themes/">Wordpress Themes</a></li>
                        <li><a href="http://templates.arcsin.se/professional-templates/">Professional Templates</a></li>
                        <li><a href="http://templates.arcsin.se/category/blogger-templates/">Blogger Templates</a></li>
                        <li><a href="http://templates.arcsin.se/category/joomla-templates/">Joomla Templates</a></li>
                    </ul>
                </div>

            </div>

            <div class="box">

                <div class="title">Resources</div>

                <div class="content">
                    <ul>
                        <li><a href="http://templates.arcsin.se/">Arcsin Web Templates</a></li>
                        <li><a href="http://www.google.com/" rel="nofollow">Google</a> - Web Search</li>
                        <li><a href="http://www.w3schools.com/" rel="nofollow">W3Schools</a> - Online Web Tutorials</li>
                        <li><a href="http://www.wordpress.org/" rel="nofollow">WordPress</a> - Blog Platform</li>
                        <li><a href="http://cakephp.org/" rel="nofollow">CakePHP</a> - PHP Framework</li>
                    </ul>
                </div>

            </div>

            <div class="box">

                <div class="title">Gallery</div>

                <div class="content">

                    <div class="thumbnails">

                        <a href="#" class="thumb"><img
                                src="<?php echo Yii::$app->request->baseUrl; ?>/css/img/sample-thumbnail.jpg" width="75"
                                height="75" alt=""/></a>
                        <a href="#" class="thumb"><img
                                src="<?php echo Yii::$app->request->baseUrl; ?>/css/img/sample-thumbnail.jpg" width="75"
                                height="75" alt=""/></a>
                        <a href="#" class="thumb"><img
                                src="<?php echo Yii::$app->request->baseUrl; ?>/css/img/sample-thumbnail.jpg" width="75"
                                height="75" alt=""/></a>
                        <a href="#" class="thumb"><img
                                src="<?php echo Yii::$app->request->baseUrl; ?>/css/img/sample-thumbnail.jpg" width="75"
                                height="75" alt=""/></a>
                        <a href="#" class="thumb"><img
                                src="<?php echo Yii::$app->request->baseUrl; ?>/css/img/sample-thumbnail.jpg" width="75"
                                height="75" alt=""/></a>
                        <a href="#" class="thumb"><img
                                src="<?php echo Yii::$app->request->baseUrl; ?>/css/img/sample-thumbnail.jpg" width="75"
                                height="75" alt=""/></a>

                        <div class="clearer">&nbsp;</div>

                    </div>

                </div>

            </div>

    </div>
</div>
