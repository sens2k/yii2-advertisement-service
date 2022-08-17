<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
?>
<!--Authentication page-->
<div class="container">
    <div class="container" style="margin-top: 5%;">
        <?php if (!Yii::$app->user->isGuest) : ?>
            <div class="col-lg-6 offset-lg-3 text-center">
                <h1 class="font-weight-light text-uppercase">Welcome <?= Yii::$app->user->identity->login ?></h1>
                <hr class="my-1">
            </div>
            <div class="col-lg-6 offset-lg-3 text-center">
                <?= Html::beginForm(['/site/logout'],'post')
                    .Html::submitButton('Logout ('.Yii::$app->user->identity->login.') ',
                    [
                        'class' => 'btn btn-outline-dark btn-block',
                        'style' => 'margin-top: 5%;',
                    ]) ?>
            </div>
        <?php else : ?>
            <div class="col-lg-4 offset-lg-4 text-center">
                <h1 class="font-weight-light text-uppercase">Please login</h1>
                <hr class="my-1">
                <?= Html::a('Login', 'index.php?r=site%2Flogin',
                    [
                        'class' => 'btn btn-outline-dark btn-block',
                        'style' => 'margin-top: 5%;',
                    ]) ?>
            </div>
        <?php endif; ?>
    </div>
</div>
