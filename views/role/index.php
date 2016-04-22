<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Roles';
$this->params['breadcrumbs'][] = $this->title;
echo $this->render('../partials/siteHeader');
//echo '<pre>';
//print_r($dataProvider);
//die('te3waaaz');
?>

<div class="main-container">
    <?= $this->render('../partials/sideNav'); ?>
    <div class="content-container">
        <div class="page-dashboard">
            <div class="row">
                <div class="col m12">
                    <div class="panel">
                        <div class="role-index">
                            <p>
                                <?= Html::a('Create Role', ['create'], ['class' => 'btn btn-success']) ?>
                            </p>

                            <?=
                            GridView::widget([
                                'dataProvider' => $dataProvider,
                                'columns' => [
                                    ['class' => 'yii\grid\SerialColumn'],
                                    'id',
                                    'name',
                                    'created_at',
                                    'updated_at',
                                    ['class' => 'yii\grid\ActionColumn'],
                                ],
                            ]);
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


