<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Goods;

/**
 * GoodsSearch represents the model behind the search form about `common\models\Goods`.
 */
class GoodsSearch extends Goods
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['g_id', 'g_status', 'g_type', 'g_masterid', 'create_at', 'update_at'], 'integer'],
            [['g_name', 'g_thumb', 'g_description'], 'safe'],
            [['g_price'], 'number'],
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
        $query = Goods::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'g_id' => $this->g_id,
            'g_status' => $this->g_status,
            'g_price' => $this->g_price,
            'g_type' => $this->g_type,
            'g_masterid' => $this->g_masterid,
            'create_at' => $this->create_at,
            'update_at' => $this->update_at,
        ]);

        $query->andFilterWhere(['like', 'g_name', $this->g_name])
            ->andFilterWhere(['like', 'g_thumb', $this->g_thumb])
            ->andFilterWhere(['like', 'g_description', $this->g_description]);

        return $dataProvider;
    }
}
