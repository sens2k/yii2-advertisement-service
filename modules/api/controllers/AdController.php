<?php

namespace app\modules\api\controllers;

use yii\rest\ActiveController;
use app\models\Ad;

class AdController extends BaseApiController
{
    public function checkAccess($action, $model = null, $params = [])
    {
        switch ($action){
            case ($action === 'create') :
                if (\Yii::$app->user->isGuest){
                    throw new \yii\web\ForbiddenHttpException(sprintf('Login for create ad'));
                };
                break;
            case ($action === 'update' || $action === 'delete'):
                if (\Yii::$app->user->isGuest){
                    throw new \yii\web\ForbiddenHttpException(sprintf('You should login'));
                }
                else if ($model->user_id != \Yii::$app->user->id){
                    throw new \yii\web\ForbiddenHttpException(sprintf('You have no right'));
                }
        }
    }
    public $modelClass = Ad::class;
}