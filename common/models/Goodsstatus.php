<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "goodsstatus".
 *
 * @property integer $id
 * @property string $name
 * @property integer $position
 * @property Goods[] $goods 
 */
class Goodsstatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'goodsstatus';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'position'], 'required'],
            [['position'], 'integer'],
            [['name'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'position' => 'Position',
        ];
    }

    /** 
    * @return \yii\db\ActiveQuery 
    */ 
    public function getGoods() 
    { 
        return $this->hasMany(Goods::className(), ['g_status' => 'id']); 
    } 
}
