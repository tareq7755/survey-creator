<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property integer $gender
 * @property integer $role_id
 * @property integer $department_id
 * @property integer $age
 * @property string $university_id
 * @property string $created_at
 * @property string $updated_at
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $auth_key
 */
class User extends ActiveRecord implements IdentityInterface{
    const ADMIM = 0;    

    /**
     * @inheritdoc
     */
    public static function tableName(){
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules(){
        return [
            [['email'], 'required'],
            [['gender', 'role_id', 'department_id', 'age'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['first_name', 'last_name'], 'string', 'max' => 50],
            [['email', 'university_id', 'password_hash', 'password_reset_token'], 'string', 'max' => 250],
            [['auth_key'], 'string', 'max' => 32],
            [['email'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels(){
        return [
            'id'                   => 'ID',
            'first_name'           => 'First Name',
            'last_name'            => 'Last Name',
            'email'                => 'Email',
            'gender'               => 'Gender',
            'role_id'              => 'Role ID',
            'departmnet_id'        => 'Department ID',
            'age'                  => 'Age',
            'university_id'        => 'University ID',
            'created_at'           => 'Created At',
            'updated_at'           => 'Updated At',
            'password_hash'        => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'auth_key'             => 'Auth Key',
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id){
        return static::findOne($id);
    }

    /**
     * Finds user by email
     *
     * @param  string      $email
     * @return static|null
     */
    public static function findByEmail($email){
        return static::findOne(['email' => $email]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null){
        return static::findOne(['access_token' => $token]);
    }

    public function getId(){
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey(){
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password){
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password){
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

}
