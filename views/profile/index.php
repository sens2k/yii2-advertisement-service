<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>
<div class="container">
    <div class="col-lg-6 offset-lg-3 text-center" style="margin-top: 5%">
        <hr class="my-1">
        <p class="lead"><?='Your name: '.Yii::$app->user->identity->name." "
            .Yii::$app->user->identity->surname?></p>
    </div>
    <div class="col-lg-6 offset-lg-3 text-center" >
        <p class="lead"><?='Your email: '.Yii::$app->user->identity->email?></p>
    </div>
    <div class="col-lg-6 offset-lg-3 text-center" >
        <p class="lead"><?= 'Your login: '.Yii::$app->user->identity->login?></p>
    </div>
    <div class="col-lg-4 offset-4">
        <?= Html::a('Change password', 'profile/change-password', ['class' => 'btn btn-outline-dark btn-block']) ?>
    </div>
    <div class="col-lg-6 offset-lg-3 text-center" style="margin-top: 2%">
        <hr class="my-1">
        <p class="lead"><?='Your ads:'?></p>
    </div>

    <?php foreach ($ads as $ad):?>
        <div class="col-lg-12 text-left">
            <div class="card border-dark" style="width: 100%; margin-top: 1rem;">
                <h5 class="card-header"><?= Html::encode($ad->name)?></h5>
                <div class="card-body">
                    <p class="card-text"><?= Html::encode( $ad->description )?></p>
                </div>
                <hr class="my-1">
                <div class="card-body">
                    <div class="col-lg-6"><?= Html::encode($ad->price.' ₽' )?></div>
                    <div class="col-lg-6"><?= Html::encode('Date create : '.date('d-m-y', $ad->created_at))?></div>
                </div>
                <div class="card-footer bg-transparent border-success">
                    <th><?= Html::a('Show ad', Url::to(['/ad/view', 'id' => $ad->id]), ['class' => 'btn btn-outline-success']) ?></th>
                </div>
            </div>
        </div>
    <?php endforeach;?>
</div>



