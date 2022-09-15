<?php
namespace app\models;

use yii\db\ActiveRecord;

class Ad extends ActiveRecord
{
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    public function fields()
    {
        return ['id', 'name', 'description', 'price'];
    }
}