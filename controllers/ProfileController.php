<?php

namespace app\controllers;

use yii\web\Controller;
use yii\filters\AccessControl;
use app\models\Ad;
use Yii;

class ProfileController extends Controller
{

    public function behaviors()
    {
        return [
            'access' =>
            [
                'class' => AccessControl::className(),
                'only' => ['index'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex($id)
    {
        $ads = Ad::findAll(['user_id' => $id]);
        return $this->render('index', ['ads' => $ads]);
    }

}