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
class SiiAsset extends AssetBundle
{
    public $sourcePath = '@app/assets';
    public $basePath = null;
    public $baseUrl = null;

    public $css = [
        'yii2-sii-file-mgr.css'
    ];
    public $js = [
    ];
    public $depends = [
        'app\assets\W3schoolsAsset',
    ];
}