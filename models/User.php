<?php

namespace app\models;

class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public $firstName;
    public $lastName;    
    public $age;
    public $role;
    public $gender;
    public $universityId;
    public $id;
    public $email;
    public $password;
    
    public $authKey;
    public $accessToken;

    private static $users = [
        '100' => [
            'id' => '100',
            'firstName' => 'raed',
            'lastName' => 'bustami',
            'email'    => 'raed@example.com',
            'password' => 'raed',
            'age' => '22',
            'role' => 'student',
            'universityId' => '0091789',
            'gender' => 'male',
            
            'authKey' => 'test100key',
            'accessToken' => '100-token',
        ],
//        '101' => [
//            'id' => '101',
//            'username' => 'demo',
//            'email'    => 'demo@example.com',
//            'password' => 'demo',
//            'authKey' => 'test101key',
//            'accessToken' => '101-token',
//        ],
    ];

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by email
     *
     * @param  string      $email
     * @return static|null
     */
    public static function findByEmail($email)
    {
        foreach (self::$users as $user) {
            if (strcasecmp($user['email'], $email) === 0) {
                return new static($user);
            }
        }

        return null;
    }


    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
    
    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = \Yii::$app->security->generatePasswordHash($password);
    }
    
    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = \Yii::$app->security->generateRandomString();
    }
}
