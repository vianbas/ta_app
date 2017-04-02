<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\Kategori */

$this->title = $model->category_name;
$this->params['breadcrumbs'][] = ['label' => 'Category', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kategori-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'category_name',
        ],
    ])
    ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'product_name',
                'format' => 'raw',
                'value' => function($model) {
                    return Html::a('' . $model->product_name . '', ['product/view', 'id' => $model->product_id]);
                }
                    ],
                    'asin',
                    'product_price',
                ],
            ])
            ?>

</div>
