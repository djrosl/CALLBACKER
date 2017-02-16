<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "algoritm".
 *
 * @property integer $id
 * @property integer $type
 * @property integer $shows
 * @property integer $clicks
 * @property string $conversion
 * @property integer $calls
 * @property string $calls_conversion
 */
class Algoritm extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'algoritm';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'shows', 'clicks', 'calls', 'site_id', 'enabled'], 'integer'],
            [['conversion', 'calls_conversion'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'type' => Yii::t('app', 'Type'),
            'shows' => Yii::t('app', 'Shows'),
            'clicks' => Yii::t('app', 'Clicks'),
            'conversion' => Yii::t('app', 'Conversion'),
            'calls' => Yii::t('app', 'Calls'),
            'calls_conversion' => Yii::t('app', 'Calls Conversion'),
        ];
    }
}
