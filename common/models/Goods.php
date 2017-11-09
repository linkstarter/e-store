<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "goods".
 *
 * @property integer $g_id
 * @property string $g_name
 * @property string $g_thumb
 * @property integer $g_status
 * @property string $g_price
 * @property integer $g_type
 * @property string $g_description
 * @property integer $g_masterid
 * @property integer $create_at
 * @property integer $update_at
 *
 * @property Cart $cart
 * @property User[] $ids
 * @property Comment[] $comments
 * @property Adminuser $gMaster
 */
class Goods extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'goods';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['g_thumb'], 'safe'],
            [['g_name', 'g_thumb', 'g_price', 'g_type', 'g_description'], 'required'],
            [['g_status', 'g_type', 'g_masterid', 'create_at', 'update_at'], 'integer'],
            [['g_price'], 'number'],
            [['g_description'], 'string'],
            [['g_name', 'g_thumb'], 'string', 'max' => 128],
            [['g_masterid'], 'exist', 'skipOnError' => true, 'targetClass' => Adminuser::className(), 'targetAttribute' => ['g_masterid' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'g_id' => 'G ID',
            'g_name' => '商品名称',
            'g_thumb' => '商品图片',
            'g_status' => '商品状态',
            'g_price' => '商品价格',
            'g_type' => '商品类型',
            'g_description' => '商品描述',
            'g_masterid' => '卖家',
            'create_at' => '创建日期',
            'update_at' => '修改日期',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCart()
    {
        return $this->hasOne(Cart::className(), ['id' => 'g_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIds()
    {
        return $this->hasMany(User::className(), ['id' => 'id'])->viaTable('cart', ['id' => 'g_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['g_id' => 'g_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGMaster()
    {
        return $this->hasOne(Adminuser::className(), ['id' => 'g_masterid']);
    }

    public function beforeSave($insert)
    {
        if(parent::beforeSave($insert))
        {
            if($insert)
            {
                $this->create_at = time();
                $this->update_at = time();
            }
            else
            {
                $this->update_at = time();
            }
            
            return true;
        }
        else
        {
            return false;
        }
            
        
    }
}
