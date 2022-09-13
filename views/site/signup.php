<?php

/** @var app\models\RegistrationForm $model **/

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

?>
<div class="container">
    <div class="col-lg-4 offset-lg-4 text-center" style="margin-top: 5%">
        <p class="lead">Sign up</p>
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
                <?= $form->field($model, 'firstName')->textInput(['autofocus'=>true]) ?>
                <?= $form->field($model, 'secondName')->textInput(['autofocus'=>true])?>
                <?= $form->field($model, 'email')->input('email')?>
                <?= $form->field($model, 'login')->textInput()?>
                <?= $form->field($model, 'password')->passwordInput()?>
                <?= $form->field($model, 'confirmPassword')->passwordInput()?>
            </div>
            <?=Html::submitButton('Sign up', ['class' => 'btn btn-success btn-block'])?>
        </form>
        <?php $form = ActiveForm::end();?>
    </div>
</div>