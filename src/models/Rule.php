<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rule".
 *
 * @property integer $id
 * @property string $timezone
 * @property string $regions
 * @property integer $show_everywhere
 * @property integer $site_id
 */
class Rule extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rule';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['show_everywhere', 'site_id'], 'integer'],
            [['timezone', 'regions'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'timezone' => Yii::t('app', 'Timezone'),
            'regions' => Yii::t('app', 'Regions'),
            'show_everywhere' => Yii::t('app', 'Show Everywhere'),
            'site_id' => Yii::t('app', 'Site ID'),
        ];
    }
}
