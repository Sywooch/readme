<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;



$this->title = 'Напишіть нам';
?>

<div id="sidebar-left" class="cols sidebar">
    <div id="sidebar-left-content">

        <?php include_once("../views/layouts/menu.php"); ?>

    </div>
</div>

<div id="main-content" class="cols">
    <div id="main_content">
        <div id="app-contact">
            <div class="wrap-box">
                <div class="wrap-box-title"><?= Html::encode($this->title) ?></div>

                <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

                    <div class="success">
                        Thank you for contacting us. We will respond to you as soon as possible.
                    </div>

                <?php else: ?>


                    <?php $form = ActiveForm::begin([
                        'id' => 'contact-form',
                        'enableAjaxValidation' => true,
                        'enableClientValidation' => true,
                        'fieldConfig' => [
                            'options' => ['class' => 'wrap-box-row'],
                            'template' => '<div class="label-wrapper cols">{label}</div><div class="input-wrapper cols">{input}<div class="error-wrapper">{error}</div></div>',
                            'labelOptions' => ['class' => 'label-test'],
                            'inputOptions' => ['class' => 'app-input'],
                        ],
                    ]); ?>

                    <?= $form->field($model, 'name')->textInput(['size' => 60]) ?>
                    <?= $form->field($model, 'email')->textInput(['size' => 60]) ?>
                    <?= $form->field($model, 'subject')->textInput(['size' => 60]) ?>
                    <?= $form->field($model, 'text')->textarea(['rows' => 10, 'cols' => 80]) ?>
                    <?= $form->field($model, 'captcha')->widget(Captcha::className(),[
                        'model' => $model,
                        'attribute' => 'captcha',
                        'captchaAction' => '/app/captcha',
                        'template' => '<div class="cols">{image}</div> <div class="cols">{input}</div>',
                    ]) ?>

                    <div class="wrap-box-row-submit">
                        <div class="wrap-box-value">
                            <?= Html::submitButton('Відправити', ['class' => 'buttonOrange', 'name' => 'contact-button']) ?>
                        </div>
                    </div>
                    <?php ActiveForm::end(); ?>


                <?php endif; ?>
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

