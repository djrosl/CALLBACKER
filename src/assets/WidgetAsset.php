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
class WidgetAsset extends AssetBundle
{
    public $type = 1;
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        
    ];
    public $js = [
        'http://callbacker.acrux.tk/templates/js/widget_common.js'
    ];
    public $depends = [
        /*'yii\web\YiiAsset',*/
    ];
    public function init(){
        parent::init();
        $this->css = [
            'http://callbacker.acrux.tk/templates/css/widget_'. \Yii::$app->params['type'].'.css',
            'http://callbacker.acrux.tk/templates/css/widget_common.css'
        ];
    }
}
