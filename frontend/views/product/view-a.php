<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Toko;
use common\models\Pelanggan;
use kartik\rating\StarRating;
use yii\grid\GridView;
use yii\helpers\Url;
use common\models\User;

/* @var $this yii\web\View */
/* @var $model common\models\Produk */

$this->title = $model->product_name;
$this->params['breadcrumbs'][] = ['label' => 'Produk', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produk-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="col-md-12">
        <div class="col-md-3">
            <?php
            if (Yii::$app->user->isGuest) {
                ?>
                <?= Html::a('Beli', ['beli', 'id' => $model->product_id], ['class' => 'btn btn-danger']) ?>
                <?php
            } else {
                $user = User::find()->where(['id' => Yii::$app->user->identity->id])->one();
                }
                ?>
        </div>
        <div class="col-md-9">
            <?php
            echo StarRating::widget([
                'name' => 'rating',
                'value' => $rating,
                'pluginOptions' => ['displayOnly' => true]
            ]);
            ?>
        </div>
    </div>
    <p>
    <div class="col-md-12">
        <div class="col-md-3">
            <?= Html::img(Yii::$app->urlManagerFrontend->baseUrl . '/gambar/produk/' . $model->produk_id . '.jpg', ['width' => '180', 'height' => '255']) ?>
        </div>
        <div class="col-md-9"> 
            <?=
            DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'produk_harga',
//                    'produk_rating',
                ],
            ])
            ?>
        </div>     
        <br>
        <br>
        <h3>Ulasan <?= Html::encode($model->produk_nama) ?></h3>
        <div class="container">
            <div class="row"> 
                <?php
                $m = 0;
                $namas = array();
                $isi_ratings = array();
                $ratingPelanggan = array();
                foreach ($ratingproduks as $ratings) {
                    $namas[] = $ratings->pelanggan->pelanggan_nama;
                    $isi_ratings[] = $ratings->komentar;
                    $ratingPelanggan[] = $ratings->rating_produk;
                    $m++;
                }
                ?>   
                <!-- Testimonials -->
                <section class="testimonials mt50">
                    <div class="col-md-12 col-sm-12">
                        <div id="owl-reviews" class="owl-carousel mt30">
                            <div class="item">
                                <?php for ($k = 0; $k < $m; $k++) { ?>
                                    <div class="row">
                                       <div class="col-lg-2 col-md-4 col-sm-2 col-xs-12"> <?= Html::img(Yii::$app->urlManagerFrontend->baseUrl . '/gambar/rating/review-01.png') ?></div> 
                                        <input class="rating" value="<?= $ratingPelanggan[$k] ?>" type="number" showclear="false" showcaption="false" data-size="xs" data-readonly="true" min="0" max="5" step="0.1"/>
                                        <div class="col-lg-10 col-md-8 col-sm-10 col-xs-12">
                                            <div class="text-balloon">
                                                <?= $isi_ratings[$k] ?><span><?= $namas[$k] ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?> 
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>  
</div>
