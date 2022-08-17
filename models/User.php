<?php

namespace app\models;
use yii\db\ActiveRecord;
use Yii;

/**
 *
 * @property integer $id
 * @property string $login [TEXT]
 * @property string $password [TEXT]
 * @property-read string $authKey
 * @property string $auth_key [TEXT]
 */

class User extends ActiveRecord implements \yii\web\IdentityInterface
{

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
        return static::findOne(['login' => $login] || ['email' => '$login']);
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
