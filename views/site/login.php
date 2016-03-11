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
        <div class="col l4 offset-l4 m8 offset-m2 s10 offset-s1">

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
                    <?= $form->field($model, 'email', ['options' => ['class' => 'input-field email-field']]) ?>
                    <i class="material-icons prefix">email</i>
                   <label for="email" class="">Email</label>
                </div>
              </div>

              <div class="row">
                <div class="col s10 offset-s1">
                  <div class="input-field password-field">
                    <i class="material-icons prefix">vpn_key</i>
                    <?= $form->field($model, 'password', ['options' => ['class' => 'validate']])->passwordInput() ?>
                    <i class="material-icons prefix">vpn_key</i>
                   <label for="password" class="">Password</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col s10 offset-s1">
                  <div class="form-controllers">
                    <div class="row">
                      <div class="col s12 m6">
                        <div class="form-forgot-wrapper">
                          <span class="form-forgot">Forgot Password?</span>
                        </div>
                      </div>
                      <div class="col s12 m6">
                        <div class="login-btn-wrapper">
                          <?= Html::submitButton('Login', ['class' => 'waves-effect waves-light btn red lighten-2 login-btn', 'name' => 'login-button']) ?>
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
