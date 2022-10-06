<?php

namespace app\controllers;

use app\models\ChangePassword;
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
                'only' => ['index', 'change-password'],
                'rules' => [
                    [
                        'actions' => ['index', 'change-password'],
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


    public function actionChangePassword()
    {
        $model = new ChangePassword();
        if($model->load(Yii::$app->request->post()) && $model->validate()){
            if($model->changePassword()) return $this->goBack();
        }
        return $this->render('changePassword', ['model' => $model]);
    }

}