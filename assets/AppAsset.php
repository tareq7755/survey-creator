<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/materialize.min.css',
        'css/site.css',
        'css/style.css',
        'css/mobile.css'
    ];
    public $js = [
        'js/materialize.min.js', 
        'js/script.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
