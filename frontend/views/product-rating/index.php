<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProductRatingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Product Ratings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-rating-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <!--?= Html::a('Create Product Rating', ['create'], ['class' => 'btn btn-success']) ?-->
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'id_product',
                'format' => 'raw',
                'value' => function($model) {
                    return Html::a('' . $model->id_product . '', ['product-rating/view', 'id' => $model->id_product]);
                }
            ],
//            'helpful',
            'overall',
            'user.username',
            [
                'attribute' => 'user id',
                'format' => 'raw',
                'value' => function($model) {
                    return Html::a('' . $model->user_id . '', ['user/view', 'id' => $model->user_id]);
                }
            ],

//            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
