<?php

namespace app\controllers;

use yii\data\Pagination;
use yii\data\Sort;
use yii\web\Controller;
use yii\filters\AccessControl;
use app\models\AdCreateForm;
use app\models\Ad;
use Yii;

class AdController extends Controller
{


    public function behaviors()
    {
        return [
            'access' =>
                [
                    'class' => AccessControl::className(),
                    'only' => [ 'add-ad'],
                    'rules' => [
                        [
                            'actions' => ['add-ad'],
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                    ],
                ],
        ];
    }
    public function actionIndex()
    {
        $sort = new Sort([
            'attributes' => [
                'price' => [
                    'label' => 'Price',
                ],
                'created_at' => [
                    'label' => 'Date',
                ],
            ],
        ]);
        $query = Ad::find();
        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);
        $ads = $query->orderBy('created_at')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->joinWith('user')
            ->orderBy($sort->orders)
            ->all();
        return $this->render('wall', ['ads' => $ads, 'pagination' => $pagination, 'sort' => $sort]);
    }

    public function actionAddAd()
    {
        $model = new AdCreateForm();
        if($model->load(Yii::$app->request->post()) && $model->validate()){
            if($model->save()){
                Yii::$app->session->setFlash('success', 'Объявление добавлено');
                return $this->redirect(['ad/index']);
            } else Yii::$app->session->setFlash('Error', 'Error adding ad');
        }
        return $this->render('create', ['model' => $model]);
    }

    public function actionShowAd()
    {
        $id = Yii::$app->request->get('id');
        if($id) $ad = Ad::findOne(['id'=>$id]);
        else return $this->redirect(['ad/index']);
        return $this->render('page', ['ad' => $ad]);
    }

}