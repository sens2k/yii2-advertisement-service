<?php

/* @var array $ads */
/* @var array $pagination */
/* @var array $sort */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\widgets\Pjax;

?>

<?php if(Yii::$app->session->getFlash('success')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Well done!</strong> Your ad has been successfully added.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif;?>

<div class="row">
    <div class="col-lg-6">
        <div class="sort text-right" style="margin-top: 1rem;">
            <p class = 'text-uppercase'><?= $sort->link('price')?></p>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="sort text-left" style="margin-top: 1rem;">
            <p class = 'text-uppercase'><?= $sort->link('created_at')?></p>
        </div>
    </div>

    <?php foreach ($ads as $ad): ?>
    <div class="col-12">
        <div class="card border-dark" style="width: 100%; margin-top: 1rem;">
            <h5 class="card-header"><?= Html::encode($ad->name)?></h5>
            <div class="card-body">
                <p class="card-text"><?= Html::encode( $ad->description )?></p>
            </div>
            <hr class="my-1">
            <div class="card-body">
                <div class="col-lg-6"><?= Html::encode($ad->price.' ₽' )?></div>
                <div class="col-lg-6"><?= Html::encode('Date create : '.date('d-m-y', $ad->created_at))?></div>
            </div>
            <div class="card-footer bg-transparent border-success">
                <th><?= Html::a('Show ad', Url::to(['/ad/show-ad', 'id' => $ad->id]), ['class' => 'btn btn-outline-success']) ?></th>
            </div>
        </div>
    </div>
    <?php endforeach; ?>

    <div class="col-lg-12">
        <?= LinkPager::widget(['pagination' => $pagination, 'class' => 'pagination']) ?>
    </div>
</div>
