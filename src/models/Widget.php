<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "widget".
 *
 * @property integer $id
 * @property integer $enabled
 * @property integer $site_id
 * @property integer $shows
 * @property integer $clicks
 * @property string $conversion
 * @property string $title
 * @property integer $type
 * @property integer $calls
 * @property string $calls_conversion
 */
class Widget extends \yii\db\ActiveRecord
{

    const TYPES = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16];

    public function behaviors()
    {
        return [
            'conversion' => [
                'class' => 'app\components\ConversionBehavior'
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'widget';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['enabled', 'site_id', 'shows', 'clicks', 'type', 'calls'], 'integer'],
            [['conversion', 'calls_conversion'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'enabled' => Yii::t('app', 'Enabled'),
            'site_id' => Yii::t('app', 'Site ID'),
            'shows' => Yii::t('app', 'Shows'),
            'clicks' => Yii::t('app', 'Clicks'),
            'conversion' => Yii::t('app', 'Conversion'),
            'title' => Yii::t('app', 'Title'),
            'type' => Yii::t('app', 'Type'),
            'calls' => Yii::t('app', 'Calls'),
            'calls_conversion' => Yii::t('app', 'Calls Conversion'),
        ];
    }
}
