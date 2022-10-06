<?php

/** @var app\models\RegistrationForm $model **/

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

?>
<div class="container">
    <div class="col-lg-4 offset-lg-4 text-center" style="margin-top: 5%">
        <p class="lead">Change password</p>
        <hr class="my-1">
    </div>
    <div class="col-lg-4 offset-lg-4">
        <?php $form = ActiveForm::begin(
            [
                'fieldConfig' => [
                    'labelOptions' => ['class' => 'font-weight-light'],
                    'inputOptions' => ['class' => 'form-control']

                ]
            ]
        ) ?>
        <form>
            <div class="form-group">
                <?= $form->field($model, 'password')->input('password') ?>
                <?= $form->field($model, 'newPassword')->input('password') ?>
                <?= $form->field($model, 'confirmNewPassword')->input('password')?>
            </div>
            <?=Html::submitButton('Change', ['class' => 'btn btn-success btn-block'])?>
        </form>
        <?php $form = ActiveForm::end();?>
    </div>
</div>
