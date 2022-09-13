<?php

namespace app\modules\api\controllers;

use yii\rest\ActiveController;
use app\models\Ad;

class AdController extends ActiveController
{
    public $modelClass = Ad::class;
}