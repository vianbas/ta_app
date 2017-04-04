<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ProductRating */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Product Ratings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-rating-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <!--p>
        <!--?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?-->
        <!--?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p-->

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_product',
            'helpful',
            'overall',
            'user_id',
            'user.username',
        ],
    ]) ?>

</div>
