<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Inventory;

/**
 * InventorySearch represents the model behind the search form about `common\models\Inventory`.
 */
class InventorySearch extends Inventory
{
    public function attributes()
    {
        return array_merge(parent::attributes(),['goods.g_name']);
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'g_id', 'g_masterid', 'inventory', 'sales_volume'], 'integer'],
            [['goods.g_name'], 'safe']
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
        $query = Inventory::find();

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
            'id' => $this->id,
            'g_id' => $this->g_id,
            'g_masterid' => $this->g_masterid,
            'inventory' => $this->inventory,
            'sales_volume' => $this->sales_volume,
        ]);
        $query->join('INNER JOIN','goods','Inventory.g_id = goods.g_id');
        $query->andFilterWhere([
            'like','goods.g_name',$this->getAttribute('goods.g_name')
        ]);

        $dataProvider->sort->attributes['goods.g_name'] = 
        [
            'asc' => ['goods.g_name' => SORT_ASC],
            'desc' => ['goods.g_name' => SORT_DESC],
        ];
        return $dataProvider;
    }
}
