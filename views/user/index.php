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
                        <div>
                            <?= Html::a('Roles', '/role') ?>
                            <br />
                            <?= Html::a('Departments', '/department') ?>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>