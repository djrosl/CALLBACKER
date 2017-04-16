<?php

namespace app\components;

use yii;
use yii\base\Behavior;
use yii\db\ActiveRecord;

class ConversionBehavior extends Behavior {
 
  public function events() {
    return [
      ActiveRecord::EVENT_AFTER_VALIDATE => 'getConversion'
    ];
  } 

  public function getConversion(){
    $this->owner->conversion = $this->owner->shows ? $this->owner->clicks / $this->owner->shows * 100 : 0;
    $this->owner->calls_conversion = $this->owner->clicks ? $this->owner->calls / $this->owner->clicks * 100 : 0;
  }

}