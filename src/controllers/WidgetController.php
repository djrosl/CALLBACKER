<?php

namespace app\controllers;

use Yii;
use yii\filters\VerbFilter;
use app\controllers\BaseController as Controller;

class WidgetController extends Controller {

  public $layout = 'widget';


  public function show($type = 0){

    $type+=1;
    Yii::$app->params['type'] = $type;

    \app\assets\WidgetAsset::register(Yii::$app->getView());

    return $this->renderAjax('widget_'.$type);
  }

  public function actionCompose($url = false, $force = false){
    if(!$url){
      return false;
    }
    $site = \app\models\Site::find()->where(['like','url',$url])->one();
    if(!$site || !$site->enabled) {
      return false;
    }

    if($force !== false){
      return $this->show($force);
    } else {
      $randWidget = $site->getWidgets()->orderBy(new yii\db\Expression('rand()'))->one();
    }


    return $this->show($randWidget->type);
  }

  public function actionStatistics(){
    $post = Yii::$app->request->post();

    Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

    if($post){

      $site = \app\models\Site::find()->where(['like','url',[$post['s']]])->one();
      $widget = $site->getWidgets()->where(['type'=>(int)$post['w']-1])->one();

      if(!$widget){
        return false;
      }

      if($post['t'] == 'show'){
        $widget->shows = $widget->shows ? $widget->shows+1 : 1;
      }

      if($post['t'] == 'click'){
        $widget->clicks = $widget->clicks ? $widget->clicks+1 : 1;
        /*$algo->clicks = $algo->clicks ? $algo->clicks+1 : 1;
        $window->clicks = $window->clicks ? $window->clicks+1 : 1;*/
      }

      $widget->save();

      return $widget;
    } else {
      return false;
    }

  }

}