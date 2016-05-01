<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <div class="wall"></div>

    <div class="container">
      <div class="row">
        <div class="login-form-container">

          <div class="login-form card hoverable">

            <div class="login-form-header center-align section">Login</div>
            <div class="divider"></div>

           <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'method' => 'POST',
            'action' => Url::to(['site/login']),
            ]); ?>

              <div class="row">
                <div class="col s10 offset-s1">       
                    <div class="input-field login-field input-field-with-icon">
                        <?= $form->field($model, 'email') ?>
                        <i class="material-icons prefix">email</i>   
                    </div>
                </div>
              </div>

              <div class="row">
                <div class="col s10 offset-s1">
                    <div class="input-field login-field input-field-with-icon">
                        <?= $form->field($model, 'password')->passwordInput() ?>
                        <i class="material-icons prefix">vpn_key</i>
                    </div>
                </div>
              </div>
              <div class="row">
                <div class="col s10 offset-s1">
                  <div class="form-controllers">
                    <div class="row">
                      <div class="col s12">
                        <div class="login-btn-wrapper">
                          <?= Html::submitButton('Login', ['class' => 'waves-effect waves-light btn login-btn', 'name' => 'login-button']) ?>
                        </div>
                        <div class="register-btn-wrapper">
                          <span><?=Html::a('Register', ['/site/register'])?></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            <?php ActiveForm::end(); ?>

          </div>

        </div>
      </div>
    </div>
</div>
