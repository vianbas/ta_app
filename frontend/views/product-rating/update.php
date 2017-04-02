<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ProductRating */

$this->title = 'Update Product Rating: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Product Ratings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="product-rating-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
