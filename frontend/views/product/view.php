<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = 'Nama Product : '.$model->product_name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <!--?= Html::a('Update', ['update', 'id' => $model->product_id], ['class' => 'btn btn-primary']) ?-->
        <!--?= Html::a('Delete', ['delete', 'id' => $model->product_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?-->
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'product_id',
            'asin',
            'category.category_name',
            'product_name:ntext',
            'product_price',
        ],
    ]);
    foreach($item as $key => $value) {
        echo '<h5><b>Nama Reviewer : '.$value['auth_key'].'</h5></b>';
        echo '<p>Rating : ' .$value['overall'].' ';
    }
    ?>
</div>
