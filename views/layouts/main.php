<?php

/** @var yii\web\View $this */
/** @var string $content */

use yii\helpers\Html;

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language?>"?
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Login</title>

<?php echo $this->head() ?>
</head>
<body>
<?php echo $this->beginBody() ?>


<!--Header-->
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light ">

        <div class="container">
            <?= Html::a ('Authentication', 'index.php?r=site%2Findex', ['class' => 'navbar-brand'])?>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav ">
                    <?php if (Yii::$app->user->isGuest) : ?>

                        <?= '<li class="nav-item">'
                            .Html::a('Login', 'index.php?r=site%2Flogin', ['class' => 'nav-link active'])
                            .'</li>'?>
                        <?= '<li class="nav-item">'
                        .Html::a('Sign up', 'index.php?r=site%2Fsignup', ['class' => 'nav-link active'])
                        .'</li>'?>
                    <?php else : ?>
                    <?= '<li class="nav-item">'.Html::beginForm(['/site/logout'],'post', ['class' => 'form-inline'])
                        .Html::submitButton('Logout (' . Yii::$app->user->identity->login . ')',
                            [
                                'class' => 'btn btn-link nav-link',
                            ])
                        .Html::endForm().'</li>'?>
                    <?php endif; ?>
                </ul>
            </div>

        </div>
    </nav>
</header>

<div class="container">
    <?= $content?>
</div>





<?php echo $this->endBody() ?>
</body>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script></html>
<?php $this->endPage() ?>
