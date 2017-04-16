<?php

namespace app\controllers;

use Yii;
use yii\filters\VerbFilter;
use app\controllers\BaseController as Controller;


class WindowController extends Controller {

  public $layout = 'window';

  public function show($type = 0, $algoritm = 1){
    //Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    $type+=1;
    //$algoritm+=1;
    Yii::$app->params['type'] = $type;
    Yii::$app->params['algoritm'] = $algoritm;

    \app\assets\WindowAsset::register(Yii::$app->getView());
    if($algoritm){
      \app\assets\AlgoritmAsset::register(Yii::$app->getView());
    }

    return $this->renderAjax('window_'.$type);
  }

  public function actionCompose($url = false){
    if(!$url){
      return false;
    }
    $site = \app\models\Site::find()->where(['like','url',$url])->one();

    if(!$site || !$site->enabled) {
/*
      $randWindow = \app\models\Window::find()->where(['type'=>1])->one();
      return $this->show($randWindow->type, $randAlgo->type);*/

      return false;

    }
    $randWindow = $site->getWindows()->orderBy(new yii\db\Expression('rand()'))->one();
    $randAlgo = $site->getAlgoritms()->orderBy(new yii\db\Expression('rand()'))->one();

    if(!$randWindow){
      $randWindow = \app\models\Window::find()->where(['type'=>$site->window_default ? $site->window_default : 1])->one();
      $randAlgo = false;
    }

    return $this->show($randWindow->type, $randAlgo ? $randAlgo->type : false);
  }

  public function actionStatistics(){
    $post = Yii::$app->request->post();

    Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

    if($post){

      $site = \app\models\Site::find()->where(['like','url',$post['s']])->one();
      $algo = $site->getAlgoritms()->where(['type'=>$post['a']])->one();
      $window = $site->getWindows()->where(['type'=>(int)$post['w']-1])->one();

      if($post['t'] == 'show'){
        $algo->shows = $algo->shows ? $algo->shows+1 : 1;
        $window->shows = $window->shows ? $window->shows+1 : 1;
      }

      if($post['t'] == 'click'){
        $algo->clicks = $algo->clicks ? $algo->clicks+1 : 1;
        $window->clicks = $window->clicks ? $window->clicks+1 : 1;
      }

      if($post['t'] == 'call'){
        $algo->calls = $algo->calls ? $algo->calls+1 : 1;
        $window->calls = $window->calls ? $window->calls+1 : 1;
      }

      $algo->save();
      $window->save();

      return $algo;
    } else {
      return false;
    }

  }


}