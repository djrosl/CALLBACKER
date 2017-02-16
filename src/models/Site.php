<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "site".
 *
 * @property integer $id
 * @property string $url
 * @property integer $enabled
 * @property string $registered_at
 * @property integer $visits_count
 */
class Site extends \yii\db\ActiveRecord
{



    public function behaviors()
    {
        return [
            [
                'class' => \yii\behaviors\TimestampBehavior::className(),
                'attributes' => [
                    \yii\db\ActiveRecord::EVENT_BEFORE_INSERT => ['registered_at'],
                ],
                // если вместо метки времени UNIX используется datetime:
                 'value' => new \yii\db\Expression('NOW()'),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'site';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['enabled', 'visits_count'], 'integer'],
            [['registered_at'], 'safe'],
            [['url'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'url' => Yii::t('app', 'Url'),
            'enabled' => Yii::t('app', 'Enabled'),
            'registered_at' => Yii::t('app', 'Registered At'),
            'visits_count' => Yii::t('app', 'Visits Count'),
        ];
    }

    public function getWindows() {
        return $this->hasMany(\app\models\Window::className(), [
            'site_id'=>'id'
        ])->where(['enabled' => 1]);
    }

    public function getAlgoritms() {
        return $this->hasMany(\app\models\Algoritm::className(), [
            'site_id'=>'id'
        ])->where(['enabled' => 1]);
    }
}
