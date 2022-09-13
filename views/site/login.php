<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var app\models\LoginForm $model */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\helpers\Url;

?>
<div class="site-login">
    <!--Login form-->
    <div class="container">
        <div class="col-lg-4 offset-lg-4 text-center" style="margin-top: 5%">
            <p class="lead">Login</p>
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
                    <?=$form->field($model, 'email')->textInput(['autofocus'=>true])?>
                </div>
                <div class="form-group">
                    <?=$form->field($model, 'password')->passwordInput()?>
                </div>
                <?=Html::submitButton('Login', ['class' => 'btn btn-success btn-block', 'name' => 'login-button'])?>
            </form>
            <?php $form = ActiveForm::end();?>
        </div>
        <div class="row">
            <div class="container">
                <div class="col-lg-4 offset-lg-4 " style="margin-top: 2%">
                    <div class="card border-dark">
                        <div class="card-body text-center">
                            <p class="card-text font-weight-light">
                                New user ? <?=Html::a('Create an account.', Url::to(['/site/signup']), ['class' => 'font-weight-light'])?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
