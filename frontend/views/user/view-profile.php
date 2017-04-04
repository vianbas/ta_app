<?php
/**
 * Created by PhpStorm.
 * User: viko
 * Date: 02/04/2017
 * Time: 18.03
 */
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = 'My Profile';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="member-view">

    <h1><?php $model->auth_key?>My Profile</h1>

    <!--    <p>-->
    <!--?= Html::a('Update Profile', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?-->
    <!--?= Html::a('Change Password', ['account/changepassword'], ['class' => 'btn btn-primary']) ?-->
    <!--    </p>-->
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'auth_key',
            'email',
        ],
    ]);
    echo '<h2>Product Review</h2>';
    foreach($item as $key => $value) {
        echo '<h5>Id Product : '.$value['id_product'].'</h5>';
        echo '<h5>Helpful : '.$value['helpful'].'</h5>';
        echo '<p>Rating : ' .$value['overall'].' ';
    }
    ?>
</div>
