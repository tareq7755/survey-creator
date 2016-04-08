<?php

namespace app\models;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 */
class RegisterForm extends Model
{
    public $firstName;
    public $lastName;
    public $email;        
    public $age;
    public $role;
    public $department;
    public $gender;
    
    public $password;
    public $universityId;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        
        return [
            ['firstName', 'filter', 'filter' => 'trim'],
            ['firstName', 'required'],
            ['firstName', 'string', 'length' => [3, 50]],
            
            ['lastName', 'filter', 'filter' => 'trim'],
            ['lastName', 'required'],
            ['lastName', 'string', 'length' => [3, 50]],
            
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This email address has already been taken.'],
            
            ['age', 'required'],
            ['age', 'integer', 'min'=>18,'max'=>100],
            
            ['role', 'required'],
            ['role', 'integer'],
            
            ['department', 'required'],
            ['department', 'integer'],
            
            ['gender', 'required'],
            ['gender', 'boolean'],
            
            ['password', 'required'],
            ['password', 'string', 'min' => 4],
            
            ['universityId', 'required'],
            ['universityId', 'integer'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function register(){
        if(!$this->validate()){
            return null;
        }
        $user = new User();
        
        $user->first_name    = $this->firstName;
        $user->last_name     = $this->lastName;
        $user->email         = $this->email;
        $user->age           = $this->age;
        $user->role_id       = $this->role;
        $user->department_id = $this->department;
        $user->gender        = $this->gender;
        $user->university_id = $this->universityId;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        return $user->save() ? $user : null;
    }

}
