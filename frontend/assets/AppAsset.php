<?php
namespace app\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/readme.less'
    ];
    public $js = [
        'js/sidebarmenu.js',
        'js/filterpopup.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
    public $jsOptions = ['position' => \yii\web\View::POS_BEGIN];
}
