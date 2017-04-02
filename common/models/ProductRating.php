<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_rating".
 *
 * @property integer $id
 * @property integer $id_product
 * @property string $helpful
 * @property string $overall
 * @property integer $user_id
 *
 * @property Product $idProduct
 * @property User $user
 */
class ProductRating extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_rating';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_product', 'user_id'], 'required'],
            [['id_product', 'user_id'], 'integer'],
            [['helpful', 'overall'], 'string', 'max' => 11],
            [['id_product'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['id_product' => 'product_id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_product' => 'Id Product',
            'helpful' => 'Helpful',
            'overall' => 'Overall',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProduct()
    {
        return $this->hasOne(Product::className(), ['product_id' => 'id_product']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
