<?php

/** @var app\models\AdCreateForm $model **/

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

?>

<div class="col-lg-4 offset-lg-4 text-center" style="margin-top: 5%">
    <p class="lead">Create add</p>
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
    )?>
    <form>
        <div class="form-group">
            <?= $form->field($model, 'name')->textInput(['autofocus'=>true]) ?>
            <?= $form->field($model, 'description')->textInput(['autofocus'=>true])->textarea(['rows' => 6])?>
            <?= $form->field($model, 'price')->textInput(['autofocus'=>false]) ?>
        </div>
        <?= Html::submitButton('Create', ['class' => 'btn btn-success btn-block', 'name' => 'login-button'])?>
    </form>
    <?php $form = ActiveForm::end();?>
</div>
