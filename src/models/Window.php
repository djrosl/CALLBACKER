<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "window".
 *
 * @property integer $id
 * @property integer $site_id
 * @property integer $type
 * @property string $title
 * @property integer $shows
 * @property integer $calls
 * @property string $calls_conversion
 * @property string $conversion
 * @property integer $enabled
 */
class Window extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'window';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['site_id', 'type', 'shows', 'calls', 'enabled'], 'integer'],
            [['calls_conversion', 'conversion'], 'number'],
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
            'site_id' => Yii::t('app', 'Site ID'),
            'type' => Yii::t('app', 'Type'),
            'title' => Yii::t('app', 'Title'),
            'shows' => Yii::t('app', 'Shows'),
            'calls' => Yii::t('app', 'Calls'),
            'calls_conversion' => Yii::t('app', 'Calls Conversion'),
            'conversion' => Yii::t('app', 'Conversion'),
            'enabled' => Yii::t('app', 'Enabled'),
        ];
    }
}
