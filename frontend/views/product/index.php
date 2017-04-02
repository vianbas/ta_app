<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<!--    <p>-->
        <!--?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?-->
<!--    </p>-->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
//            'product_id',
            'asin',
            'category.category_name',
            [
                'attribute' => 'produk_nama',
                'format' => 'raw',
                'value' => function($model) {
                    return Html::a('' . $model->product_name . '', ['product/view', 'id' => $model->product_id]);
                }
            ],
            'product_price',
//            'product_name:ntext',
//            [
//                'attribute' => 'product_name',
//                'format' => 'raw',
//            ],
//            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
