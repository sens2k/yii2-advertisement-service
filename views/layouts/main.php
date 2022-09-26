<?php

/** @var yii\web\View $this */
/** @var string $content */

use yii\helpers\Html;
use yii\bootstrap4\Modal;
use yii\helpers\Url;
use app\assets\AppAsset;

AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language?>"?
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo $this->registerCsrfMetaTags() ?>
    <title>Login</title>
    <?php echo $this->head() ?>
</head>
<body>
<?php echo $this->beginBody() ?>
<!--Header-->
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light ">
        <div class="container">
            <?= Html::a ('Ad.ru', '/site', ['class' => 'navbar-brand'])?>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <?='<li class="nav-item">' .Html::a('Wall', '/ad', ['class' => 'nav-link active']).'</li>'?>

                    <?php if (Yii::$app->user->isGuest) : ?>
                        <?= /*login*/
                            '<li class="nav-item">' .Html::a('Login', '/site/login', ['class' => 'nav-link active']).'</li>',

                            /**sign up**/
                            '<li class="nav-item">' .Html::a('Sign up', '/site/signup', ['class' => 'nav-link active']).'</li>'
                        ?>
                    <?php else : ?>
                        <?=
                            /*profile*/
                            '<li class="nav-item">'.Html::a('Profile', ['/profile', 'id' => Yii::$app->user->id], ['class' => 'nav-link active']) .'</li>',

                            /*logout*/
                            '<li class="nav-item">'.Html::beginForm(['/site/logout'],'post', ['class' => 'form-inline'])
                                .Html::submitButton('Logout (' . Yii::$app->user->identity->login . ')',
                                    [
                                        'class' => 'btn btn-link nav-link active',
                                    ])
                                .Html::endForm().
                            '</li>'
                        ?>
                    <?php endif;?>
                    <?='<li class="nav-item">'.Html::a('Add ad', '/ad/add-ad', ['class' => 'btn btn-outline-success']).'</li>'?>
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
</html>
<?php $this->endPage() ?>
