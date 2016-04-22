<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title                   = 'User';
$this->params['breadcrumbs'][] = $this->title;
echo $this->render('../partials/siteHeader');
?>

<div class="main-container">
    <?= $this->render('../partials/sideNav'); ?>
    <div class="content-container">
        <div class="page-dashboard">
            <div class="row">
                <div class="col m12">
                    <div class="panel">                        
                        <div class="users-managment-links-container">
                            <h5 class="users-managment-title">Users Managment</h5>
                            <div class="users-managment-link">
                                <a href="/role"><i class="material-icons prefix">person_pin_circle</i> Roles</a>
                            </div>
                            <div class="users-managment-link">
                                <a href="/department"><i class="material-icons prefix">account_balance</i> Departments</a>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<!--Html::a('Roles', '/role')-->
<!--Html::a('Departments', '/department')-->