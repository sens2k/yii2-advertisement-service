<?php

namespace app\models;

use yii\base\Model;
use app\models\User;
use Yii;

class ChangePassword extends Model
{
    public $password;
    public $newPassword;
    public $confirmNewPassword;

    public function attributeLabels()
    {
        return [
            'newPassword' => 'New password',
            'confirmNewPassword' => 'Confirm new password'
        ];
    }

    public function rules()
    {
        return [
            [['password', 'newPassword', 'confirmNewPassword'], 'trim'],
            [['password', 'newPassword', 'confirmNewPassword'], 'required'],
            ['password', 'validatePassword'],
            ['confirmNewPassword', 'compare', 'compareAttribute' => 'newPassword', 'message' => 'Invalid password, try again']
        ];
    }

    public function validatePassword($attribute, $params)
    {
        if(!Yii::$app->user->identity->validatePassword($this->password)){
            $this->addError($attribute, 'Incorrect password');
        }
    }

    public function changePassword()
    {
        if($this->validate())
        {
            $user = User::findOne(['id' => Yii::$app->user->identity->id]);
            $user->password = Yii::$app->getSecurity()->generatePasswordHash($this->newPassword);
            return $user->save();
        }
        return false;
    }
}