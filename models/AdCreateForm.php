<?php
namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Ad;

class AdCreateForm extends Model
{
    public $name;
    public $description;
    public $price;

    public function attributeLabels()
    {
        return [
            'name' => 'AdController name',
            'description' => 'AdController description',
        ];
    }

    public function rules()
    {
        return [
            [['name', 'description', 'price'], 'trim'],
            [['name', 'description', 'price'], 'required'],

            [['name'], 'string', 'min' => 3, 'max' => 200],
            [['description'], 'string', 'max' => 1000],

        ];
    }

    public function save()
    {
        if($this->validate()){
            $ad = new Ad();
            $ad->name = $this->name;
            $ad->description = $this->description;
            $ad->created_at = $time = time();
            $ad->updated_at = $time;
            $ad->user_id = Yii::$app->user->identity->id;
            $ad->price = $this->price;

            return $ad->save();
        }
        return false;
    }
}