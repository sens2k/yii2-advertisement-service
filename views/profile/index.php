<?php

use yii\helpers\Html;

?>

<div class="col-lg-6 offset-lg-3 text-center" style="margin-top: 5%">
    <hr class="my-1">
    <p class="lead"><?='Your name: '.Yii::$app->user->identity->name." "
        .Yii::$app->user->identity->surname?></p>
</div>
<div class="col-lg-6 offset-lg-3 text-center" >
    <p class="lead"><?='Your email: '.Yii::$app->user->identity->email?></p>
</div>
<div class="col-lg-6 offset-lg-3 text-center" >
    <p class="lead"><?= 'Your user id: '.Yii::$app->user->identity->id?></p>
    <hr class="my-1">
</div>

<div class="col-lg-2 offset-lg-5 text-center">
    <?= Html::beginForm(['/site/logout'],'post', ['class' => 'form-inline']).
    Html::submitButton('Logout',
        [
            'class' => 'btn btn-outline-dark btn-block',
        ])
    .Html::endForm()
    ?>
</div>
