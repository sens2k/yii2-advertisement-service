<?php
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
/** @var app\models\RegistrationForm $model **/

?>
<div class="container">
    <div class="col-lg-4 offset-lg-4 text-center" style="margin-top: 5%">
        <p class="lead">Sign up</p>
        <hr class="my-1">
    </div>
    <div class="col-lg-4 offset-lg-4">
        <?php $form = ActiveForm::begin(
            [
                'id' => 'login-form',
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
            </div>

            <?= Html::submitButton('Sign up', ['class' => 'btn btn-success btn-block', 'name' => 'login-button'])?>
        </form>
        <?php $form = ActiveForm::end();?>
</div>