<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('frontend', 'SignUp');
$this->params['breadcrumbs'][] = $this->title;
?>
<div id="sidebar-left" class="cols sidebar">

    <?php include_once("../views/layouts/menu.php"); ?>

</div>

<div id="main-content" class="cols">
    <div id="app-signup">
        <div class="wrap-box">
            <div class="wrap-box-title"><?= Html::encode($this->title) ?></div>
            <?php $form = ActiveForm::begin([
                'id' => 'form-signup',
                'fieldConfig' => [
                    'options' => ['class' => 'wrap-box-row'],
                    'template' => '<div class="label-wrapper cols">{label}</div><div class="input-wrapper cols">{input}<div class="error-wrapper">{error}</div></div>',
                    'labelOptions' => ['class' => 'label-test'],
                    'inputOptions' => ['class' => 'app-input'],
                ],
            ]); ?>

            <?= $form->field($model, 'username')->textInput(['size' => 60]) ?>

            <?= $form->field($model, 'password')->passwordInput(['size' => 60]) ?>

            <?= $form->field($model, 'email')->textInput(['size' => 60]) ?>

            <div class="wrap-box-row-submit">
                <div class="wrap-box-value">
                    <?= Html::submitButton(Yii::t('frontend', 'Signup'), ['class' => 'buttonOrange', 'name' => 'signup-button']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>

<div id="sidebar-right" class="cols sidebar">

    <div id="sidebar-right-content">


        <div class="box">

            <div class="title">Categories</div>

            <div class="content">
                <ul>
                    <li><a href="http://templates.arcsin.se/category/website-templates/">Website Templates</a>
                    </li>
                    <li><a href="http://templates.arcsin.se/category/wordpress-themes/">Wordpress Themes</a>
                    </li>
                    <li><a href="http://templates.arcsin.se/professional-templates/">Professional Templates</a>
                    </li>
                    <li><a href="http://templates.arcsin.se/category/blogger-templates/">Blogger Templates</a>
                    </li>
                    <li><a href="http://templates.arcsin.se/category/joomla-templates/">Joomla Templates</a>
                    </li>
                </ul>
            </div>

        </div>

        <div class="box">

            <div class="title">Resources</div>

            <div class="content">
                <ul>
                    <li><a href="http://templates.arcsin.se/">Arcsin Web Templates</a></li>
                    <li><a href="http://www.google.com/" rel="nofollow">Google</a> - Web Search</li>
                    <li><a href="http://www.w3schools.com/" rel="nofollow">W3Schools</a> - Online Web Tutorials
                    </li>
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
                            src="<?php echo Yii::$app->request->baseUrl; ?>/css/img/sample-thumbnail.jpg"
                            width="75"
                            height="75" alt=""/></a>
                    <a href="#" class="thumb"><img
                            src="<?php echo Yii::$app->request->baseUrl; ?>/css/img/sample-thumbnail.jpg"
                            width="75"
                            height="75" alt=""/></a>
                    <a href="#" class="thumb"><img
                            src="<?php echo Yii::$app->request->baseUrl; ?>/css/img/sample-thumbnail.jpg"
                            width="75"
                            height="75" alt=""/></a>
                    <a href="#" class="thumb"><img
                            src="<?php echo Yii::$app->request->baseUrl; ?>/css/img/sample-thumbnail.jpg"
                            width="75"
                            height="75" alt=""/></a>
                    <a href="#" class="thumb"><img
                            src="<?php echo Yii::$app->request->baseUrl; ?>/css/img/sample-thumbnail.jpg"
                            width="75"
                            height="75" alt=""/></a>
                    <a href="#" class="thumb"><img
                            src="<?php echo Yii::$app->request->baseUrl; ?>/css/img/sample-thumbnail.jpg"
                            width="75"
                            height="75" alt=""/></a>

                    <div class="clearer">&nbsp;</div>

                </div>

            </div>

        </div>

    </div>

</div>

