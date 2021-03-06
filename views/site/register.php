<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use app\models\User;

$this->title                   = 'Register';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-register">

    <div class="wall"></div>

    <div class="container">
        <div class="row">
            <div class="register-form-container">

                <div class="register-form card hoverable">

                    <div class="register-form-header center-align section">Registration</div>
                    <div class="divider"></div>

                    <?php
                    $form                          = ActiveForm::begin([
                                'id'     => 'form-signup',
                                'method' => 'POST',
                                'action' => Url::to(['site/register']),
                    ]);
                    ?>

                    <div class="row">
                        <div class="col s10 offset-s1">
                            <div class="input-field firstName-field">
                                <?= $form->field($model, 'firstName', ['options' => ['class' => 'validate']])->textInput(['autofocus' => true]) ?>
                                <!--<label for="first_name">First Name</label>-->
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s10 offset-s1">
                            <div class="input-field lastName-field">
                                <?= $form->field($model, 'lastName', ['options' => ['class' => 'validate']]) ?>
                                <!--<label for="last_name">Last Name</label>-->
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s10 offset-s1">
                            <div class="input-field email-field">
                                <?= $form->field($model, 'email', ['options' => ['class' => 'input-field email-field validate']]) ?>
                                <!--<label for="email">Email</label>-->
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s10 offset-s1">
                            <div class="input-field password-field">
                                <?= $form->field($model, 'password', ['options' => ['class' => 'validate input-field password-field']])->passwordInput() ?>
                                <!--                                <label for="password">Password</label>-->
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s10 offset-s1">
                            <div class="input-field id-field">
                                <?= $form->field($model, 'universityId', ['options' => ['class' => 'validate']]) ?>
                                <!--<label for="id">University ID</label>-->
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s10 offset-s1">
                            <div class="input-field age-field">
                                <?= $form->field($model, 'age', ['options' => ['class' => 'validate']]) ?>
                                <!--<label for="age">Age</label>-->
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s10 offset-s1">
                            <div class="role-wrapper">
                                <div class="role-radio">                                    
                                    <?= $form->field($model, 'role')->dropDownList(ArrayHelper::map($roleModel->find()->where('id != ' . User::ADMIM)->all(), 'id', 'name'))->label(); ?>
                                </div>                                
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s10 offset-s1">
                            <div class="role-wrapper">
                                <div class="department-radio">
                                    <?= $form->field($model, 'department')->dropDownList(ArrayHelper::map($departmentModel->find()->all(), 'id', 'name'))->label(); ?>
                                </div>                                
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s10 offset-s1 m5 offset-m1">
                            <div class="gender-wrapper">
                                <div class="gender-radio">
                                    <?= $form->field($model, 'gender')->dropDownList(['Female', 'Male'])->label(); ?>
                                </div>                                
                            </div>
                        </div>
                        <div class="col s10 offset-s1 m5">
                            <div class="submit-btn-wrapper">
                                <?= Html::submitButton('Register', ['class' => 'btn waves-effect waves-light right submit-btn', 'name' => 'register-button']) ?>
                            </div>
                        </div>
                    </div>              

                </div>

            </div>
        </div>
    </div>
</div>