<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ProductRating;

/**
 * ProductRatingSearch represents the model behind the search form about `common\models\ProductRating`.
 */
class ProductRatingSearch extends ProductRating
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_product', 'user_id'], 'integer'],
            [['helpful', 'overall'], 'safe'],
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
        $query = ProductRating::find();

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
            'id_product' => $this->id_product,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'helpful', $this->helpful])
            ->andFilterWhere(['like', 'overall', $this->overall]);

        return $dataProvider;
    }
}
