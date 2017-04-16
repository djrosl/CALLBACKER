<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Algoritm;

/**
 * AlgoritmSearch represents the model behind the search form of `app\models\Algoritm`.
 */
class AlgoritmSearch extends Algoritm
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'type', 'shows', 'clicks', 'calls', 'conversion', 'calls_conversion'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Algoritm::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);



        $this->load($params);

        return $dataProvider;

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'type' => $this->type,
            'shows' => $this->shows,
            'clicks' => $this->clicks,
            'conversion' => $this->conversion,
            'calls' => $this->calls,
            'calls_conversion' => $this->calls_conversion,
        ]);

        
    }
}
