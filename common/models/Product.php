<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property integer $product_id
 * @property string $asin
 * @property integer $category_id
 * @property string $product_name
 * @property string $product_price
 *
 * @property Category $category
 * @property ProductRating[] $productRatings
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['asin', 'category_id', 'product_name', 'product_price'], 'required'],
            [['category_id'], 'integer'],
            [['product_name'], 'string'],
            [['asin', 'product_price'], 'string', 'max' => 11],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'asin' => 'Asin',
            'category_id' => 'Category ID',
            'product_name' => 'Product Name',
            'product_price' => 'Product Price',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['category_id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductRatings()
    {
        return $this->hasMany(ProductRating::className(), ['id_product' => 'product_id']);
    }
}
