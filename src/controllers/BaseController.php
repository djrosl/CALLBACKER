<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;


class BaseController extends Controller {


  public static function allowedDomains()
{
    return [
        '*',                        // star allows all domains
        
    ];
}  

/*

public function behaviors()
    {
        return array_merge(parent::behaviors(), [

            // For cross-domain AJAX request
            'corsFilter'  => [
                'class' => \yii\filters\Cors::className(),
                'cors'  => [
                    // restrict access to domains:
                    'Origin'                           => static::allowedDomains(),
                    'Access-Control-Allow-Origin'=> '*',
                    'Access-Control-Request-Method'    => ['POST', 'GET'],
                    'Access-Control-Allow-Credentials' => true,
                    'Access-Control-Max-Age'           => 3600,                 // Cache (seconds)

                ],
            ],

        ]);
    }*/


  protected function getUserIP() {
    if( array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER) && !empty($_SERVER['HTTP_X_FORWARDED_FOR']) ) {
        if (strpos($_SERVER['HTTP_X_FORWARDED_FOR'], ',')>0) {
            $addr = explode(",",$_SERVER['HTTP_X_FORWARDED_FOR']);
            return trim($addr[0]);
        } else {
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
    }
    else {
        return $_SERVER['REMOTE_ADDR'];
    }
  }

  public function beforeAction($action){

    $this->enableCsrfValidation = false;

    $site = \app\models\Site::find()->where(['like', 'url', [Yii::$app->request->get('url')]])->one();

    if(!$site){
        return false;
    }

    $rule = \app\models\Rule::findOne(['id'=>$site->id]);
    if($rule){
        $zone_rule = $rule->show_everywhere;
    } else {
        $zone_rule = false;
    }
    if(!$zone_rule){
      $ip = '';
      $zone_rule = true; //TODO
    } else {
        $original = new \DateTime("now", new \DateTimeZone('UTC'));
        $timezoneName = timezone_name_from_abbr("", ((int)$rule->timezone)*3600, false);
        $modified = $original->setTimezone(new \DateTimezone($timezoneName));

        $hour = $modified->format('G');

        $schedule = \app\models\Schedule::find()->where(['rule_id'=>1, 'day'=>$modified->format('N')])->one();

        $time_rule = false;
        if($hour > $schedule->start_time && $hour < $schedule->end_time) {
          if(!$schedule->no_break){
            if($hour < $schedule->lunch_start || $hour > $schedule->lunch_end){
              $time_rule = true;  
            }
          } else {
            $time_rule = true;
          }
        }
    }

    /*if(!$zone_rule || !$time_rule){
      return false;
    }*/
    
    return parent::beforeAction($action);
  }

}