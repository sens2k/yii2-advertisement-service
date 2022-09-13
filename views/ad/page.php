<?php

/* @var array $ad */
/* @var $id */

use yii\helpers\Html;

?>

<div class="text-left">
    <div class="col-lg-6" style="margin-top: 5%">
        <h1 class="lead"><?='Name: '. Html::encode($ad->name)?></h1>
    </div>

    <div class="col-lg-6">
        <h1 class="lead"><?='Description: '. Html::encode($ad->description)?></h1>
    </div>

    <div class="col-lg-6">
        <h1 class="lead"> <?='Price: '. Html::encode( $ad->price.' ₽' )?></h1>
    </div>

    <div class="col-lg-4" >
        <h1 class="lead"><?='Date create: '. Html::encode(date('d-m-y', $ad->created_at))?></h1>
        <hr class="my-1">
    </div>
</div>
