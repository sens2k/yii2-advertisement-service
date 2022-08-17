<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\User;
use yii\base\Security;

class RegistrationForm extends Model
{
    public $firstName;
    public $secondName;
    public $email;
    public $login;
    public $password;


    public function attributeLabels()
    {
        return [
            'firstName' => 'First name',
            'secondName' => 'Second name',
        ];
    }

    public function rules()
    {
        return [

            [['firstName', 'secondName', 'email', 'login'], 'trim'],
            [['firstName', 'secondName', 'email', 'login', 'password'], 'required'],

            ['firstName', 'string', 'min' => 2, 'max' => 40],
            ['secondName', 'string', 'min' => 2, 'max' => 40],

            ['email', 'email'],
            ['email', 'string', 'max' => 255],

            ['password', 'string', 'min'=> 6, 'max' => 255],

            [['email', 'login'], 'unique', 'targetClass' => User::className()]

        ];
    }

    public  function save()
    {
        if($this->validate())
        {
            $user = new User();
            $user->name = $this->firstName;
            $user->surname = $this->secondName;
            $user->email = $this->email;
            $user->login = $this->login;
            $user->created_at = $time = time();
            $user->updated_at = $time;
            $user->auth_key = Yii::$app->security->generateRandomString();
            $user->password = Yii::$app->security->generatePasswordHash($this->password);

            return $user->save();

        }
        return false;
    }

}