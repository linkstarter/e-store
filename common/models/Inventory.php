<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "inventory".
 *
 * @property integer $id
 * @property integer $g_id
 * @property integer $g_masterid
 * @property integer $inventory
 * @property integer $sales_volume
 *
 * @property Adminuser $gMaster
 * @property Goods $g
 */
class Inventory extends \yii\db\ActiveRecord
{
    const DEFAULT_INVENTORY = 0;
    const DEFAULT_SALES_VOLUME = 0;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inventory';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['g_id', 'g_masterid', 'inventory', 'sales_volume'], 'required'],
            [['g_id', 'g_masterid'], 'required'],
            [['g_id', 'g_masterid', 'inventory', 'sales_volume'], 'integer'],
            [['g_masterid'], 'exist', 'skipOnError' => true, 'targetClass' => Adminuser::className(), 'targetAttribute' => ['g_masterid' => 'id']],
            [['g_id'], 'exist', 'skipOnError' => true, 'targetClass' => Goods::className(), 'targetAttribute' => ['g_id' => 'g_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'g_id' => '商品ID',
            'g_masterid' => '卖家',
            'inventory' => '库存',
            'sales_volume' => '销量',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGMaster()
    {
        return $this->hasOne(Adminuser::className(), ['id' => 'g_masterid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getG()
    {
        return $this->hasOne(Goods::className(), ['g_id' => 'g_id']);
    }
}
