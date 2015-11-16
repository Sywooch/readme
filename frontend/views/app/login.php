<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\models\LoginForm;

$this->title = Yii::t('frontend', 'Sign into the system');

?>

<div id="sidebar-left" class="cols sidebar">
    <div id="sidebar-left-content">

        <?php include_once("../views/layouts/menu.php"); ?>

    </div>
</div>

<div id="main-content" class="cols" >
    <div id="main_content">

        <div id="app-login">
            <div class="wrap-box">
                <div class="wrap-box-title"><?= Html::encode($this->title) ?></div>

            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'fieldConfig' => [
                    'options' => ['class' => 'wrap-box-row'],
                    'template' => '<div class="label-wrapper cols">{label}</div><div class="input-wrapper cols">{input}<div class="error-wrapper">{error}</div></div>',
                    'labelOptions' => ['class' => 'label-test'],
                    'inputOptions' => ['class' => 'app-input'],
                ],
            ]); ?>
                <?php $model = new LoginForm(); ?>

                <?= $form->field($model, 'username')->textInput(['size' => 60]) ?>

                <?= $form->field($model, 'password')->passwordInput(['size' => 60]) ?>

                <div class="wrap-box-row">
                    <div class="input-wrapper">
                <?php echo Yii::t('frontend', 'If you forgot your password you can ')
                            . Html::a(Yii::t('frontend', 'reset it'), ['request-password-reset']); ?>
                    </div>
                </div>

                <?= $form->field($model, 'rememberMe', [
                    'template' => '<div class="label-wrapper cols"></div><div class="input-wrapper cols">
{label}<div class="error-wrapper cols">{error}</div></div>',
                ])->checkbox(['labelOptions' => ['class' => 'label-test']]) ?>

            <div class="wrap-box-row-submit">
                <div class="wrap-box-value">
                    <?= Html::submitButton(Yii::t('frontend', 'Signin'),
                        ['class' => 'buttonOrange', 'name' => 'login-button']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>

<div id="sidebar-right" class="cols sidebar">

    <div id="sidebar-right-content">



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

