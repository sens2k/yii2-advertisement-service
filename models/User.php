<?php

namespace app\models;
use yii\db\ActiveRecord;
use Yii;

/**
 * @property string $name [TEXT]
 * @property string $surname [TEXT]
 * @property string $email [TEXT]
 * @property string $login [TEXT]
 */

class User extends ActiveRecord implements \yii\web\IdentityInterface
{

    public function getAds()
    {
        return $this->hasMany(Ad::class, ['user _id' => 'id']);
    }

    public static function tableName()
    {
        return 'user';
    }


    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {

    }

    /**
     * Finds user by login
     *
     */
    public static function findByLogin($login)
    {
        return static::findOne(['login' => $login]);
    }

    public static function findByUsername($name)
    {
        return static::findOne(['name' => $name]);
    }


    public static function findByEmail($email)
    {
        return static::findOne(['email' => $email]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }


    /**
     * Validates password
     *
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);

    }

    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }




}
