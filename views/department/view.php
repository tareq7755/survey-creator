<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Department */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Departments', 'url' => ['index']];
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
                        <div class="department-view">

                            <h1><?= Html::encode($this->title) ?></h1>
                            <?=
                            DetailView::widget([
                                'model' => $model,
                                'attributes' => [
                                    'id',
                                    'name',
                                    'created_at',                                    
                                ],
                            ])
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
