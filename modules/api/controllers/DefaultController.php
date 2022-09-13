<?php

namespace app\modules\api\controllers;

use yii\web\Controller;
use yii\rest\ActiveController;
use app\models\Ad;


class DefaultController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
