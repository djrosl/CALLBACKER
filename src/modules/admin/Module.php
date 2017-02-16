<?php

namespace app\modules\admin;

use Yii;
use nullref\admin\Module as BaseModule;
use nullref\core\interfaces\IAdminModule;
/**
* 
*/
class Module extends BaseModule implements IAdminModule
{

    public static function getAdminMenu()
    {
        return [
            'label' => Yii::t('admin', 'Dashboard'),
            'url' => ['/admin/main'],
            'icon' => 'dashboard',
            'items'=>[
              [
                'label' => \Yii::t('app', 'Администраторы'), 
                'url' => ['/admin/user']
              ],
              [
                'label' => \Yii::t('app', 'Сайты'), 
                'url' => ['/admin/site']
              ],
              [
                'label' => \Yii::t('app', 'Виджеты'), 
                'url' => ['/admin/widget']
              ],
              [
                'label' => \Yii::t('app', 'Окна'), 
                'url' => ['/admin/window']
              ],
              [
                'label' => \Yii::t('app', 'Расписание'), 
                'url' => ['/admin/schedule']
              ],
              [
                'label' => \Yii::t('app', 'Алгоритмы'), 
                'url' => ['/admin/algoritm']
              ],
            ]
        ];
    }
  
}