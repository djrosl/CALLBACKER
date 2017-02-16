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
class AlgoritmAsset extends AssetBundle
{
    public $type = 1;
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //'templates/css/window_'.$this->type.'.css'
    ];
    public $js = [
        //'templates/js/window_'.$this->type.'.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
    public function init(){
        parent::init();
        $this->js = [
            'templates/js/algoritm_'. \Yii::$app->params['algoritm'].'.js'
        ];
    }
}
