<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "schedule".
 *
 * @property integer $id
 * @property integer $rule_id
 * @property integer $day
 * @property string $start_time
 * @property string $end_time
 * @property integer $no_break
 * @property integer $day_and_night
 */
class Schedule extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'schedule';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rule_id', 'day', 'no_break', 'day_and_night'], 'integer'],
            [['start_time', 'end_time'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'rule_id' => Yii::t('app', 'Rule ID'),
            'day' => Yii::t('app', 'Day'),
            'start_time' => Yii::t('app', 'Start Time'),
            'end_time' => Yii::t('app', 'End Time'),
            'no_break' => Yii::t('app', 'No Break'),
            'day_and_night' => Yii::t('app', 'Day And Night'),
        ];
    }
}
